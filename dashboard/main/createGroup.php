<?php

require_once ("ObjectSources/Student.php");
require_once ("ObjectSources/Admin.php");
require_once ("ObjectSources/Instructor.php");
require_once ("ObjectSources/Course.php");

session_start();

$admin = $_SESSION['admin'];

require_once ("adminPageTop.html");
require_once ("createGroupContent.html");
require_once ("adminPageBottom.html");