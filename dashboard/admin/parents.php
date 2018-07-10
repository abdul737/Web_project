<?php

use \databaseManager\DBManager;
if(isset($user))
{
    if ($_POST) {

    }

    $allParents = $user->getAllParents();
    if (count($allParents) == 0)
    {
        $allParents = DBManager::selectAllParents();
        $user->setAllParents($allParents);
        foreach ($allParents as $parent){
            $parent->setStudents(DBManager::selectAllStudentsOfParentById($parent->getId(), $parent));
        }
        $_SESSION['admin'] = $user;
    }
}
else
{
    print "<SCRIPT type='text/javascript'>
                    alert('Session timed out or not found!');
                </SCRIPT > ";
    exit;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Parent list</h4>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Id</th>
                                <th>Full name</th>
                                <th>All students</th>
                                <th>Phone Number</th>
                                <th>E-mail</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                foreach($allParents as $parent){
                                    $id = sprintf("p%06d",$parent->getId());
                                    $name = $parent->getName();
                                    $surname = $parent->getSurname();
                                    $phoneNumber = $parent->getPhoneNumber();
                                    $email = $parent->getEmail();
                                    $studentName = "";
                                    foreach ($parent->getStudents() as $student){
                                        $studentName .= $student->getName()." ".$student->getSurname()."\n<br>";
                                    }
                                    echo "<tr>
                                                    <td class='text-center'>$i</td>
                                                    <td><i>$id</i></td>
                                                    <td><b>$name $surname</b></td>
                                                    <td>$studentName</td>
                                                    <td>$phoneNumber</td>
                                                    <td>$email</td>
                                                    <td class='td-actions text-right'>
                                                        <button type='button' rel='tooltip' class='btn btn-info'>
                                                            <i class='material-icons'>info</i>
                                                        </button>
                                                        <button type='button' rel='tooltip' class='btn btn-success'>
                                                            <i class='material-icons'>edit</i>
                                                        </button>
                                                        <button type='button' rel='tooltip' class='btn btn-danger'>
                                                            <i class='material-icons'>close</i>
                                                        </button>
                                                    </td>
                                                </tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
