<?php

if ($_COOKIE['profile_content'] == 'parent_waitlist')
    include_once "parent/waitlist.php";
else
    if ($_COOKIE['profile_content'] == 'parent_registerkid')
        include_once "parent/registerkid.php";
    else
        if ($_COOKIE['profile_content'] == 'parent_registertocourse')
            include_once "parent/registertocourse.php";
        else
            if ($_COOKIE['profile_content'] == 'parent_kidperformance')
                include_once "parent/kidperformance.php";
            else
                if ($_COOKIE['profile_content'] == 'parent_account_info')
                    include_once "parent/account_info.php";
                else
                    if ($_COOKIE['profile_content'] == 'parent_leaderboard')
                        include_once "parent/leaderboard.php";

?>