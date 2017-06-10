<?php
/* Check for logout */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$logout = false;
if (isset($_SESSION['position']))
{
    if ($_SESSION['position'] == 'p')
    {
        if (!$_SESSION['parent'])
            $logout = true; //some other error will be displayed
    } else if ($_SESSION['position'] == 'a')
    {
        if (!$_SESSION['admin'])
            $logout = true; //some other error will be displayed
    } else if ($_SESSION['position'] == 's')
    {
        if (!$_SESSION['student'])
            $logout = true; //some other error will be displayed
    } else if ($_SESSION['position'] == 'i')
    {
        if (!$_SESSION['instructor'])
            $logout = true; //some other error will be displayed
    }
} else
{
    $logout = true; //some other error will be displayed
}
if ($logout) {
    print "<SCRIPT type='text/javascript'>
                    alert('You already logged out!');
                    window.location.replace('login.php');
                </SCRIPT > ";
    exit;
}
