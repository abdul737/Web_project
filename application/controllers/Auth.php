<?php

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/13/2018
 * Time: 2:50 PM
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->load->model('dashboard/auth_model');
    }

    public function login()
    {
        $data['title'] = 'Login to Codecraft system';
        $data['register'] = FALSE;

        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            session_destroy();
            $this->_load_view('dashboard/auth/login', $data);
        } else {
            if ($this->auth_model->login() === FALSE) // wrong credentials
            {
                $this->_load_view('dashboard/auth/login', $data);
                $this->notification->danger("Wrong credentials");
            } elseif ($this->auth_model->login() === TRUE) // correct credentials, NOTE: triple equal is compulsory
            {
                switch ($_SESSION['user_type']) {
                    case 'a': //admin
                        header('Location: ./profile/admin_panel');
                        break;
                    case 'p': //parent
                        header('Location: ./profile/parent_panel');
                        break;
                    case 'i': //instructor
                        header('Location: ./profile/instructor_panel');

                        break;
                    case 's': //student
                        header('Location: ./profile/student_panel');

                        break;
                    default:
                        $this->_load_view('dashboard/auth/login', $data);
                        $this->notification->danger("Unknown error has been occured, please contact the system administrator");
                        return;
                }
            } else // -1, unknown error
            {
                $this->_load_view('dashboard/auth/login', $data);
                $this->notification->danger("Unknown error has been occured, please contact the system administrator");
            }
        }
    }

    private function _load_view($view_path, $data = '')
    {
        $data['pre_path'] = '';
        $this->load->view('dashboard/include/include_header', $data);
        $this->load->view('dashboard/auth/navbar', $data);
        $this->load->view($view_path, $data);
        $this->load->view('dashboard/include/include_footer');
        if ($data['register']) {
            $this->load->view('dashboard/include/js/register_js');
        } else {
            $this->load->view('dashboard/include/js/login_js');
        }
    }

    public function register()
    {
        $data['title'] = 'Register to Codecraft system';
        $data['register'] = TRUE;

        $this->_load_view('dashboard/auth/register', $data);
    }
}