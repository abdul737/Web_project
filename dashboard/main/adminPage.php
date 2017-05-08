<?php

require_once ("ObjectSources/Course.php");
require_once ("ObjectSources/Admin.php");
use \Course;
use \_Admin;
session_start();

$admin = $_SESSION['admin'];


require_once("adminPageTop.html");
require_once("courseListTop.html");

$i = 1;
foreach($admin->getAllCourses() as $course){
    $title = $course->getTitle();
    $length = $course->getLength();
    $ageLimit = $course->getAgeLimit();
    include("courseList.html");
    $i++;
}


require_once("adminPageBottom.html");
