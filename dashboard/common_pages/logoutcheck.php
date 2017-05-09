<?php
if (session_status() == PHP_SESSION_NONE) {
    print "<SCRIPT type='text/javascript'>
                    alert('You already logged out!');
                    window.location.replace('login.php');
                </SCRIPT > ";
    exit;
}
