<?php

require_once ("ObjectSources/Course.php");
require_once ("ObjectSources/Admin.php");
use \Course;
use \_Admin;
session_start();

$admin = $_SESSION['admin'];


require_once("adminPageTop.html");

foreach($admin->getAllCourses() as $course){
    $title = $course->getTitle();
    $length = $course->getLength();
    $ageLimit = $course->getAgeLimit();
    include("adminPageCourseListContent.html");
}


require_once("adminPageBottom.html");
