<?php

$admin = $_SESSION['admin'];

if(isset($admin))
{
    if ($_POST) {

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
                <h4 class="card-title">Student list</h4>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Birthdate</th>
                                <th>Phone Number</th>
                                <th>E-mail</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                print_r($admin->getAllStudents());
                                foreach($admin->getAllStudents() as $student){
                                    $name = $student->getName();
                                    $surname = $student->getSurname();
                                    $birthdate = $student->getBirthdate();
                                    $phoneNumber = $student->getPhoneNumber();
                                    $email = $student->getEmail();
                                    echo "<tr>
                                            <td class='text-center'>$i</td>
                                            <td>$name</td>
                                            <td>$surname</td>
                                            <td>$birthdate</td>
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
