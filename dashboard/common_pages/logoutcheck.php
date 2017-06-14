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


include "include/includesFooter.html";
include "include/includesHeader.html";
?>

<html>
</html>
<?php
if ($logout) {
    print '<SCRIPT type="text/javascript">
                    swal("Logout", "You already logged out!", "error");
                    swal({   title: "Logout",   
                             text: "You already logged out!",   
                             type: "error",  
                             confirmButtonText: "Back to login", 
                             confirmButtonColor: "blue",
                             closeOnConfirm: false,  
                             showLoaderOnConfirm: true }, 
                             function(isConfirm){   
                                 if (isConfirm) { 
                                     setTimeout(function(){     window.location.replace("login.php");   }, 1000); 
                                      }
                            });
                </SCRIPT > ';
    exit;
}
?>