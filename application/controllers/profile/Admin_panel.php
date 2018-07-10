<?php /** @noinspection ALL */

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/13/2018
 * Time: 7:28 PM
 */
require_once(BASEPATH . "object_sources/_Parent.php");
require_once(BASEPATH . "object_sources/Student.php");
require_once(BASEPATH . "object_sources/Instructor.php");
require_once(BASEPATH . "object_sources/Admin.php");
require_once(BASEPATH . "object_sources/Course.php");
require_once(BASEPATH . "object_sources/User.php");
require_once(BASEPATH . "object_sources/Student.php");
require_once(BASEPATH . "object_sources/Group.php");

class Admin_panel extends CI_Controller
{
    private $admin;

    public function __construct()
    {
        parent::__construct();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'a' && isset($_SESSION['admin'])) {
            $this->admin = $_SESSION['admin'];

        } else {
            header('Location: ../errors/page_missing');
            exit;
        }

        $this->load->model('dashboard/profile/admin_model');

    }

    public function index()
    {
        //TODO: implement in v2 school and branches structure
        $_SESSION['school_name'] = 'Codecraft.uz';
        $_SESSION['school_website'] = 'http://codecraft.uz/';
        $_SESSION['branch_name'] = 'Main branch';
        $_SESSION['school_branches'] = $this->admin_model->getSchoolBranches();
        header('Location: ./admin_panel/groups?user=' . $this->admin->getName());
    }

    public function edit_profile($user_id = 0)
    {
        if ($user_id === 0) {
            $user_id = $this->session->user->getId();//not tested yet
        }
        $data['title'] = 'Groups';
        $data['user_id'] = $user_id;

        $data['allCourses'] = $this->admin_model->getAllCourses();

        $this->_load_view('dashboard/admin/edit_profile', $data);
        $this->notification->success("Logged in as " . $this->admin->getName() . " " . $this->admin->getSurname() . " (Administrator)");

    }

    private function _load_view($view_path, $data = '')
    {
        $data['pre_path'] = '../../';
        $data['assets_path'] = $data['pre_path'] . "views/assets";
        $data['user'] = $_SESSION['admin'];

        $_COOKIE['profile_content'] = "admin_" . str_replace(" ", "_", strtolower($data['title']));
        $data['imageSidebar'] = $data['pre_path'] . "views/assets/img/sidebar-2.jpg";

        $this->load->view('dashboard/include/include_header', $data);
        $this->load->view('dashboard/nav_bar/profile_upper', $data);
        $this->load->view('dashboard/nav_bar/nav_bar_admin', $data);
        $this->load->view('dashboard/nav_bar/top_nav_bar', $data);
        $this->load->view($view_path, $data);
        $this->load->view('dashboard/include/include_footer');
    }

    public function groups()
    {
        $data['title'] = 'Groups';

        $data['allCourses'] = $this->admin_model->getAllCourses();
        $data['groups'] = $this->admin_model->getAllGroups();
        $data['months'] = array(
            NULL,
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        );

        $this->_load_view('dashboard/admin/groups', $data);
        if ($this->input->get('user') === $this->admin->getName()) {
            $this->notification->success("Logged in as " . $this->admin->getName() . " " . $this->admin->getSurname() . " (Administrator)");
        }

    }

    public function create_group()
    {
        $data['title'] = 'Create group';

        $data['allInstructors'] = $this->admin_model->getAllInstructors();
        $data['allStudents'] = $this->admin_model->getAllStudents();
        $data['allParents'] = $this->admin_model->getAllParents();

        $data['allCourses'] = $this->admin_model->getAllCourses();
        $data['prereq'] = $this->admin_model->getPrereq();

        $data['classrooms'] = $this->admin_model->getClassrooms();
        $data['timeslots'] = $this->admin_model->getTimeslots();

        $this->form_validation->set_rules('selected_course_id', 'Select course', 'required');
        $this->form_validation->set_rules('selected_timeslot_id', 'Select timeslot', 'required');
        $this->form_validation->set_rules('start_date', 'Select start date', 'required');
        $this->form_validation->set_rules('end_date', 'Select end date', 'required');
        $this->form_validation->set_rules('selected_classroom', 'Select classroom', 'required');
        $this->form_validation->set_rules('selected_primary_instructors', 'Select primary instructor', 'required');
        $this->form_validation->set_rules('selected_students', 'Select students', 'required');

        if ($this->form_validation->run() === TRUE) {
            $group_id = $student = $this->admin_model->add_group();

            $this->notification->dialog('Registered to system', 'New group with id ' . $group_id .
                ' has been registered successfully', 'success');
        }

        $this->_load_view('dashboard/admin/create_group', $data);

    }

    public function students()
    {
        $data['title'] = 'Students';

        $data['student_parent_id'] = "";
        $data['student_first_name'] = "";
        $data['student_last_name'] = "";
        $data['student_birth_date'] = "";
        $data['student_phone_number'] = "";
        $data['student_email'] = "";

        $this->form_validation->set_rules('student_first_name', 'First Name', 'required');
        $this->form_validation->set_rules('student_last_name', 'Last Name', 'required');

        $data['allParents'] = $this->admin_model->getAllParents();

        if ($this->form_validation->run() === FALSE) {
            $data['section'] = 0;
        } else {
            $student = $this->admin_model->add_student();

            if (!isset($student) OR $student->getId() === 404) {
                $data['section'] = 1;

                $data['student_parent_id'] = "";
                $data['student_first_name'] = "";
                $data['student_last_name'] = "";
                $data['student_phone_number'] = "";
                $data['student_birth_date'] = "";

                $this->notification->dialog('Failed to register', 'There are some issues in registering new student', 'warning');

            } else {
                $data['section'] = 0;

                $this->notification->dialog('Registered to system', 'New student id: s' . $student->getId() .
                    '\nDefault password: ' . $student->getPassword(), 'success');
            }
        }

        $data['allStudents'] = $this->admin_model->getAllStudents();
        $this->_load_view('dashboard/admin/students', $data);
    }

    /**
     * @var $section
     *  if 0 then default view
     *  if 1 then register new parent
     */
    public function parents()
    {

        //individual type
        // 0 - individual
        // 1 - legal entity
        $data['parent_individual_type'] = 0;
        //parent info to restore
        $data['parent_first_name'] = '';
        $data['parent_last_name'] = '';
        $data['parent_patronymic'] = '';
        $data['parent_phone_number'] = '';
        $data['parent_email'] = '';
        //passport info to restore
        $data['passport_address'] = '';
        $data['passport_serial'] = '';
        $data['passport_number'] = '';
        $data['passport_who_give'] = '';
        $data['passport_when_give'] = '';
        $data['passport_file'] = '';
        //office info to restore
        $data['office_address'] = '';
        $data['office_bank_account'] = '';
        $data['office_bank_code'] = '';
        $data['office_inn'] = '';
        $data['office_licence_file'] = '';

        $this->form_validation->set_rules('parent_first_name', 'First Name', 'required');
        $this->form_validation->set_rules('parent_last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('parent_phone_number', 'Phone Number', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['section'] = 0;
            $data['title'] = 'Parents';
        } else {
            $parent = $this->admin_model->add_parent();

            if (!isset($parent) OR $parent->getId() === 404) {
                $data['section'] = 1;
                $data['title'] = 'Registering parent';

                $data['parent_first_name'] = $parent->getName();
                $data['parent_last_name'] = $parent->getSurname();
                $data['parent_phone_number'] = $parent->getPhoneNumber();
                $data['parent_email'] = $parent->getEmail();

                $data['parent_individual_type'] = $parent->getIndividualType();

                //passport info to restore
                $data['passport_address'] = $parent->getPassportAddress();
                $data['passport_serial'] = $parent->getPassportSerial();
                $data['passport_number'] = $parent->getPassportNumber();
                $data['passport_who_give'] = $parent->getPassportWhoGive();
                $data['passport_when_give'] = $parent->getPassportWhenGive();
                $data['passport_file'] = $parent->getPassportFile();
                //office info to restore
                $data['office_address'] = $parent->getOfficeAddress();
                $data['office_bank_account'] = $parent->getOfficeBankAccount();
                $data['office_bank_code'] = $parent->getOfficeBankCode();
                $data['office_inn'] = $parent->getOfficeInn();
                $data['office_licence_file'] = $parent->getOfficeLicenceFile();

                $this->notification->dialog('Failed to register', 'There are some issues in registering new parent, probably phone number is already registered for some other user', 'warning');

            } else {
                $data['section'] = 0;
                $data['title'] = 'Parents';

                $this->notification->dialog('Registered to system', 'New parent id: p' . $parent->getId() .
                    '\nDefault password: ' . $parent->getPassword(), 'success');
            }
        }

        $data['allParents'] = $this->admin_model->getAllParents();
        $this->_load_view('dashboard/admin/parents', $data);
    }

    public function courses()
    {
        $data['title'] = 'Courses';

        $data['allCourses'] = $this->admin_model->getAllCourses();
        $data['prereq'] = $this->admin_model->getPrereq();

        $this->_load_view('dashboard/admin/courses', $data);

    }

    public function add_course()
    {
        //TODO: Make course title as a primary key, at least as unique key
        //PS: It is better not to remove course ID
        $data['title'] = 'Add course';

        $this->form_validation->set_rules('course_name', 'Course Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->_load_view('dashboard/admin/add_course', $data);
        } else {
            if ($this->admin_model->add_course() === TRUE) {
                $this->_load_view('dashboard/admin/add_course', $data);
                $this->notification->dialog('Added to system', 'New course has been added successfully!');
            } else // possible duplicate
            {
                $this->_load_view('dashboard/admin/add_course', $data);
                $this->notification->dialog('Failed to add new course.', 'Course name already exist...', 'warning');
            }
        }
    }

    /**
     * @var $section
     *  if 0 then default view (all instructors)
     *  if 1 then register new instructor
     */
    public function instructors()
    {
        $data['title'] = 'Instructors';

        $data['instructor_first_name'] = '';
        $data['instructor_last_name'] = '';
        $data['instructor_birthdate'] = '';
        $data['instructor_phone_number'] = '';
        $data['instructor_email'] = '';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['section'] = 0;
        } else {
            $instructor = $this->admin_model->add_instructor();

            if (!isset($instructor) OR $instructor->getId() === 404) {
                $data['section'] = 1;
                $data['title'] = 'Registering instructor';

                $data['instructor_first_name'] = $instructor->getName();
                $data['instructor_last_name'] = $instructor->getSurname();
                $data['instructor_birthdate'] = $instructor->getBirthdate();
                $data['instructor_phone_number'] = $instructor->getPhoneNumber();
                $data['instructor_email'] = $instructor->getEmail();

                $this->notification->dialog('Failed to register', 'There are some issues in registering new instructor, probably phone number is already registered for some other user', 'warning');

            } else {
                $data['section'] = 0;
                $this->notification->dialog('Registered to system', 'New instructor id: i' . $instructor->getId() .
                    '\nDefault password: ' . $instructor->getPassword(), 'success');
            }
        }
        $data['all_instructors'] = $this->admin_model->getAllInstructors();
        $this->_load_view('dashboard/admin/instructors', $data);


    }

    public function classrooms_timeslots()
    {
        $data['title'] = 'Classroom & Timeslots Manager';

        $data['classrooms'] = $this->admin_model->getClassrooms();
        $data['timeslots'] = $this->admin_model->getTimeslots();
        $data['section'] = 0;

        $this->_load_view('dashboard/admin/classrooms_timeslots', $data);

    }

    function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        header("Location: codecraft.uz/dashboard");
    }
}