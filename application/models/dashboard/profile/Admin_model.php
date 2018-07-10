<?php

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/14/2018
 * Time: 1:09 PM
 */
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPrereq()
    {
        $query = $this->db->query('SELECT courses.title AS course, reqcourses.title AS required_course FROM prereq JOIN courses ON (prereq.course_id=courses.id) JOIN courses AS reqcourses ON (prereq.required_course_id=reqcourses.id)');

        return $query->result_array();
    }

    public function getAllParents()
    {
        $parents = array();
        $allStudents = $this->getAllStudents();//getting all students

        $query = $this->db->query('SELECT * FROM parents NATURAL JOIN users');
        foreach ($query->result() as $parent) {

            $parentToBeAdded = new _Parent($parent->id, $parent->name, $parent->surname, NULL, $parent->email, $parent->phone_number);

            $miniQuery = $this->db->get_where('parenting_students', array('parentID' => $parent->id));

            $studentsOfParent = array();
            //getting kids of current parent
            foreach ($miniQuery->result_array() as $customer) {
                foreach ($allStudents as $student)// kids of parent among all students
                {
                    if ($student->getId() === $customer['studentID']) {
                        array_push($studentsOfParent, $student);
                    }
                }
            }
            //end of getting kids of the parent
            $parentToBeAdded->setStudents($studentsOfParent);

            array_push($parents, $parentToBeAdded);
        }
        return $parents;
    }

    public function getAllStudents()
    {
        $students = array();
        $all_groups = $this->getAllGroups();

        $query = $this->db->query('SELECT * FROM students NATURAL JOIN users');
        foreach ($query->result() as $student) {
            $student = new Student($student->id, $student->name, $student->surname, NULL, $student->birthdate,
                $student->email, $student->phone_number, $student->total_points);

            /*Adding groups for the selected student from table groups students */

            $sql_select_groups_of_student = "SELECT * FROM group_students WHERE student_id=?";
            $group_query = $this->db->query($sql_select_groups_of_student, array($student->getId()));
            foreach ($group_query->result_array() as $student_group) {
                $attended_group_object = null;
                foreach ($all_groups as $global_group) {
                    if ($global_group['id'] == $student_group['group_id']) {
                        $attended_group_object = $global_group;
                        break;
                    }
                }
                if ($attended_group_object == null) {
                    $error_message = "Undefined group id in group_students (group_id=" . $student_group->group_id . ")";
                    show_error($error_message, 2288, $heading = 'An Error Was Encountered');
                }
                $group_infolist = array(
                    'group' => $attended_group_object,
                    'total_points' => $student_group['points'],
                    'completion_date' => $student_group['completion_date'],
                    'certificate' => $student_group['certificate']
                );
                $student->addGroupInfolist($group_infolist);
            }
            /*End of adding group for the selected student*/


            array_push($students, $student);
        }
        return $students;
    }

    public function getAllGroups()
    {

        $query =
            $this->db->query('SELECT groups.id, course_id, timeslot_id, start_date, end_date, classroom_building, classroom_room, 
                        courses.title as course_title, courses.length as course_length, courses.price as course_price, courses.description as course_description  
                        FROM groups JOIN courses ON groups.course_id=courses.id');
        $groups = $query->result_array();

        $this->db->select('*');
        $this->db->from('group_instructors');
        $this->db->join('users', 'group_instructors.instructor_id = users.id');
        $query = $this->db->get();
        for ($i = 0; $i < count($groups); $i++) {
            foreach ($query->result_array() as $group_instructor) {
                if ($groups[$i]['id'] == $group_instructor['group_id']) {
                    if (empty($groups[$i]['instructors'])) {
                        $groups[$i]['instructors'] = array($group_instructor);
                    } else {
                        array_push($groups[$i]['instructors'], $group_instructor);
                    }
                }
            }
        }
        $query = $this->db->query('SELECT * FROM group_students 
                                    JOIN users ON group_students.student_id=users.id 
                                    JOIN students ON group_students.student_id=students.id');
        for ($i = 0; $i < count($groups); $i++) {
            foreach ($query->result_array() as $group_student) {
                if ($groups[$i]['id'] == $group_student['group_id']) {
                    if (!isset($groups[$i]['students'])) {
                        $students = array();
                        $groups[$i]['students'] = $students;
                    }
                    array_push($groups[$i]['students'], $group_student);
                }
            }
        }

        return $groups;
    }

    public function getAllInstructors()
    {
        $instructors = array();
        $query = $this->db->query('SELECT * FROM instructors NATURAL JOIN users');
        foreach ($query->result() as $instructor) {
            $instructorToBeAdded = new \Instructor($instructor->id, $instructor->name, $instructor->surname, null, $instructor->photoFieldId, $instructor->email, $instructor->phone_number);
            $instructorToBeAdded->setBirthdate($instructor->birthdate);
            array_push($instructors, $instructorToBeAdded);
        }
        return $instructors;
    }

    public function add_group()
    {
        /*
         * selected_course_id
         * selected_timeslot_id
         * start_date
         * end_date
         * selected_classroom; format: "Building [Building name], Room #[room number]"
         * selected_primary_instructors; format: csv row formatted id's of instructors
         * selected_secondary_instructors; format: csv row formatted id's of instructors
         * selected_students; csv row formatted id's of selected students
         * */

        $array = explode(", ", $this->input->post('selected_classroom'));
        $classroom_building = substr($array[0], 9);
        $classroom_room = substr($array[1], 6);

        $data = array(
            'course_id' => $this->input->post('selected_course_id'),
            'timeslot_id' => $this->input->post('selected_timeslot_id'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'classroom_building' => $classroom_building,
            'classroom_room' => $classroom_room
        );
        $this->db->insert('groups', $data);
        $group_id = $this->db->insert_id();


        /*Inserting(assigning) group instructors*/
        $selected_primary_instructors = explode(",", $this->input->post('selected_primary_instructors'));
        $selected_secondary_instructors = explode(",", $this->input->post('selected_secondary_instructors'));
        /*
         * if role is 0 then primary instructor
         * if role is 1 then secondary instructor
         */
        $data = array();
        foreach ($selected_primary_instructors as $primary_instructor) {
            array_push($data, array(
                'group_id' => $group_id,
                'instructor_id' => $primary_instructor,
                'role' => 0
            ));
        }
        $this->db->insert_batch('group_instructors', $data);
        $data = array();
        foreach ($selected_secondary_instructors as $secondary_instructor) {
            array_push($data, array(
                'group_id' => $group_id,
                'instructor_id' => $secondary_instructor,
                'role' => 1
            ));
        }
        $this->db->insert_batch('group_instructors', $data);


        /*Inserting(assigning) group students*/
        $selected_students = explode(",", $this->input->post('selected_students'));
        $data = array();
        foreach ($selected_students as $selected_student) {
            array_push($data, array(
                'group_id' => $group_id,
                'student_id' => $selected_student
            ));
        }
        $this->db->insert_batch('group_students', $data);

        return $group_id;
    }

    public function add_course()
    {
        $allCourses = $this->getAllCourses();

        $course_name = $this->input->post('course_name');

        foreach ($allCourses as $course) {
            if (strtolower($course->getTitle()) === strtolower($course_name)) {
                return FALSE;
            }
        }
        $data = array(
            'title' => $course_name,
            'length' => $this->input->post('course_dur'),
            'price' => is_numeric($this->input->post('price')) ? $this->input->post('price') : 0,
            'description' => $this->input->post('course_description')
        );
        $this->db->insert('courses', $data);

        return TRUE;
    }

    public function getAllCourses()
    {
        $courses = array();
        $query = $this->db->get('courses');
        foreach ($query->result_array() as $course) {
            array_push($courses, new Course($course['id'], $course['title'], $course['length'], $course['price'], null, $course['description'], $course['image_file_id']));
        }
        return $courses;
    }

    public function add_instructor()
    {
        $allUsers = $this->getAllUsers();

        $phone_number = $this->input->post('phone_number');
        $email = $this->input->post('email');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $birth_date = $this->input->post('date');


        foreach ($allUsers as $user) {
            if (strtolower($user->getPhoneNumber()) === strtolower($phone_number)) {
                $instructor = new Instructor(404, $first_name, $last_name, '', NULL, $email, $phone_number);
                $instructor->setBirthdate($birth_date);
                return $instructor;
            }
        }

        $dataForUser = array(
            'password' => password_hash(strtolower($last_name), PASSWORD_BCRYPT),
            'email' => strtolower($email),
            'name' => $first_name,
            'surname' => $last_name,
            'phone_number' => $phone_number,
            'position' => 'i'
        );

        $this->db->insert('users', $dataForUser);
        $instructor_id = $this->db->insert_id();
        $this->db->insert('instructors', array('id' => $instructor_id, 'birthdate' => $birth_date));

        return new Instructor($instructor_id, $first_name, $last_name, strtolower($last_name));
    }

    public function getAllUsers()
    {
        $users = array();
        $query = $this->db->query('SELECT * FROM users');
        foreach ($query->result() as $user) {
            $userToBeAdded = new \User($user->id, $user->name, $user->surname, null, $user->email, $user->phone_number);

            array_push($users, $userToBeAdded);
        }
        return $users;
    }

    public function add_student()
    {
        $parent_id = $this->input->post('student_parent_id');
        $first_name = $this->input->post('student_first_name');
        $last_name = $this->input->post('student_last_name');
        $birth_date = $this->input->post('student_birth_date');
        $phone_number = $this->input->post('student_phone_number');
        $email = $this->input->post('student_email');

        $parent_id = substr($parent_id, "1", strlen($parent_id));
        $dataForUser = array(
            'password' => password_hash(strtolower($last_name), PASSWORD_BCRYPT),
            'email' => $email,
            'name' => $first_name,
            'surname' => $last_name,
            'phone_number' => $phone_number,
            'position' => 's'
        );

        $this->db->insert('users', $dataForUser);
        $student_id = $this->db->insert_id();
        echo "Parent id " . $parent_id . "<br>\n";
        echo "Student id " . $student_id;
        $this->db->insert('students', array('id' => $student_id, 'birthdate' => $birth_date));

        $this->db->insert('parenting_students', array('parentID' => $parent_id, 'studentID' => $student_id));

        return new Student($student_id, $first_name, $last_name, strtolower($last_name), $birth_date, $email, $phone_number);
    }

    public function add_parent()
    {
        $allUsers = $this->getAllUsers();

        //parent info from the form
        $first_name = $this->input->post('parent_first_name');
        $last_name = $this->input->post('parent_last_name');
        $patronymic = $this->input->post('parent_patronymic');
        $phone_number = $this->input->post('parent_phone_number');
        $email = $this->input->post('parent_email');
        //individual type
        // 0 - individual
        // 1 - legal entity
        $parent_individual_type_checkbox = $this->input->post('parent_individual_type');
        //TODO: High coupling on $parent_individual_type_checkbox - should be changed
        if ($parent_individual_type_checkbox == 'on')
            $parent_individual_type = 0; // Individual
        else
            $parent_individual_type = 1; // Legal entity
        //in case individual
        //passport info
        $passport_address = $this->input->post('passport_address');
        $passport_serial = $this->input->post('passport_serial');
        $passport_number = $this->input->post('passport_number');
        $passport_who_give = $this->input->post('passport_who_give');
        $passport_when_give = $this->input->post('passport_when_give');
        $passport_file = $this->input->post('passport_file');
        //in case legal entity
        //office info
        $office_address = $this->input->post('office_address');
        $office_bank_account = $this->input->post('office_bank_account');
        $office_bank_code = $this->input->post('office_bank_code');
        $office_inn = $this->input->post('office_inn');
        $office_licence_file = $this->input->post('office_licence_file');

        foreach ($allUsers as $user) {
            if (strtolower($user->getPhoneNumber()) === strtolower($phone_number) OR
                strtolower($user->getEmail()) === strtolower($email)) {
                $parent = new _Parent(404, $first_name, $last_name, '', $email, $phone_number);
                $parent->setPatronymic($patronymic);
                $parent->setIndividualType($parent_individual_type);

                $parent->setPassportAddress($passport_address);
                $parent->setPassportSerial($passport_serial);
                $parent->setPassportNumber($passport_number);
                $parent->setPassportWhoGive($passport_who_give);
                $parent->setPassportWhenGive($passport_when_give);
                $parent->setPassportFile($passport_file);

                $parent->setOfficeAddress($office_address);
                $parent->setOfficeBankAccount($office_bank_account);
                $parent->setOfficeBankCode($office_bank_code);
                $parent->setOfficeInn($office_inn);
                $parent->setOfficeLicenceFile($office_licence_file);

                return $parent;
            }
        }

        $dataForUser = array(
            'password' => password_hash(strtolower($last_name), PASSWORD_BCRYPT),
            'email' => strtolower($email),
            'name' => $first_name,
            'surname' => $last_name,
            'phone_number' => $phone_number,
            'position' => 'p'
        );
        $this->db->insert('users', $dataForUser);

        $parent_id = $this->db->insert_id();
        $dataForParents = array(
            'id' => $parent_id,
            'patronymic' => $patronymic,
            'individual_type' => $parent_individual_type,
            'passport_address' => $passport_address,
            'passport_number' => $passport_number,
            'passport_serial' => $passport_serial,
            'passport_who_give' => $passport_who_give,
            'passport_when_give' => $passport_when_give,
            'passport_file' => $passport_file,
            'office_address' => $office_address,
            'office_bank_account' => $office_bank_account,
            'office_bank_code' => $office_bank_code,
            'office_inn' => $office_inn,
            'office_licence_file' => $office_licence_file
        );
        $this->db->insert('parents', $dataForParents);

        $parent = new _Parent($parent_id, $first_name, $last_name, strtolower($last_name), $email, $phone_number, $parent_individual_type);
        return $parent;
    }

    public function getSchoolBranches()
    {
        $query = $this->db->get('school_branches');

        return $query->result();
    }

    public function getClassrooms()
    {
        $query = $this->db->get('classrooms');

        return $query->result();
    }

    public function getTimeslots()
    {
        $query = $this->db->get('timeslots');

        return $query->result();
    }
}