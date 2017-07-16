<?php

use \databaseManager\DBManager;
if(isset($user))
{
    if ($_POST) {

    }
    $allCourses = $user->getAllCourses();
    if (count($allCourses) == 0)
    {
        $allCourses = DBManager::selectAllCourses();
        $user->setAllCourses($allCourses);
        $_SESSION['admin'] = $user;
    }
}
?>

<div class="container-fluid">
    <div class="text-right">
        <a href="<?=$file ?>" onclick="setCookie('profile_content', 'admin_classroom_manager', 7)" class="btn btn-info btn-fill">Add classroom</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Classrooms</h4>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Length</th>
                                <th>Age Limit</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                echo "\n<br>\n";
                                foreach($allCourses as $course){
                                    $title = $course->getTitle();
                                    $length = $course->getLength();
                                    $ageLimit = $course->getAgeLimit();
                                    echo "<tr>
                                            <td class='text-center'>$i</td>
                                            <td><b>$title</b></td>
                                            <td>$length</td>
                                            <td>$ageLimit</td>
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
