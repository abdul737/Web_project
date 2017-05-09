<?php

require_once("ObjectSources/Student.php");
require_once("ObjectSources/Admin.php");
use \Student;
use \_Admin;
session_start();

$admin = $_SESSION['admin'];

require_once("adminPageTop.html");
require_once("studentListTop.html");

$i = 1;
foreach($admin->getAllStudents() as $student){
    $name = $student->getName();
    $surname = $student->getSurname();
    $birthdate = $student->getBirthdate();
    $phoneNumber = $student->getPhoneNumber();
    $email = $student->getEmail();
    include("studentList.html");
    $i++;
}

echo "</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>";

require_once("adminPageBottom.html");
