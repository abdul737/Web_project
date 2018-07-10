<?php

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/13/2018
 * Time: 8:41 PM
 */
class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function page_missing()
    {
        $data['directory'] = VIEWPATH;
        $this->load->view('errors/html/page_missing', $data);
    }
}