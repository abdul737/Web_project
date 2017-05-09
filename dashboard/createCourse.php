<?php

require_once("ObjectSources/Admin.php");
require_once("ObjectSources/User.php");
use \Student;
use \User;
use \Admin;
session_start();

$admin = $_SESSION['admin'];

require_once("adminPageTop.html");

require_once("createCourseContent.html");

require_once("adminPageBottom.html");
