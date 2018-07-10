<?php

if ($_COOKIE['profile_content'] == 'admin_courses')
    include_once "admin/courses.php";
else
    if ($_COOKIE['profile_content'] == 'admin_students')
        include_once "admin/students.php";
    else
        if ($_COOKIE['profile_content'] == 'admin_parents')
            include_once "admin/parents.php";
        else
            if ($_COOKIE['profile_content'] == 'admin_addcourse')
                include_once "admin/addcourse.php";
            else
                if ($_COOKIE['profile_content'] == 'admin_addinstructor')
                    include_once "admin/addinstructor.php";
                else
                    if ($_COOKIE['profile_content'] == 'admin_addgroup')
                        include_once "admin/addgroup.php";
                    else
                        if ($_COOKIE['profile_content'] == 'admin_classroom_manager')
                            include_once "admin/classroom_manager.php";
?>