<?php
require_once ("ObjectSources/Student.php");
require_once ("ObjectSources/Admin.php");
use \Student;
use \_Admin;
session_start();

$admin = $_SESSION['admin'];

require_once("adminPageTop.html");

require_once ("createInstructorContent.html");

require_once("adminPageBottom.html");
