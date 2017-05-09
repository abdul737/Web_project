<?php

require_once ("ObjectSources/_Parent.php");
require_once ("ObjectSources/Student.php");
require_once ("ObjectSources/Admin.php");
use \Student;
use \_Admin;
use \_Parent;

session_start();

$admin = $_SESSION['admin'];

require_once("adminPageTop.html");
require_once("parentListTop.html");

$i = 1;
foreach($admin->getAllParents() as $parent){
    foreach ($parent->getStudents() as $student){
        $name = $parent->getName();
        $surname = $parent->getSurname();
        $studentName = $student->getName()." ".$student->getSurname();
        $phoneNumber = $parent->getPhoneNumber();
        $email = $parent->getEmail();
        include("parentList.html");
        $i++;
    }
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
