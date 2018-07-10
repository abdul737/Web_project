<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="col-md-12">
                <div class="card-header card-header-tabs" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title"></span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="<?php if ($section == 0): ?> active <?php endif; ?>">
                                    <a href="#allstudents" data-toggle="tab">
                                        <i class="material-icons">school</i>
                                        All students
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="<?php if ($section == 1): ?> active <?php endif; ?>">
                                    <a href="#registerstudent" data-toggle="tab">
                                        <i class="material-icons">person_add</i>
                                        Register student
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane <?php if ($section == 0): ?> active <?php endif; ?>" id="allstudents">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">school</i>
                            </div>
                            <h4 class="card-title"><?= $title ?></h4>
                            <div class="card-content">
                                <div class="material-datatables">
                                    <table class="table table-hover" id="datatables">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Id</th>
                                            <th>Full name</th>
                                            <th>Birthdate</th>
                                            <th>Phone Number</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($allStudents as $student) {
                                            $id = sprintf("s%06d", $student->getId());
                                            $name = $student->getName();
                                            $surname = $student->getSurname();
                                            $birthdate = $student->getBirthdate();
                                            $phoneNumber = $student->getPhoneNumber();
                                            echo "<tr>
                                                <td class='text-center'>$i</td>
                                                <td><i>$id</i></td>
                                                <td><b>$name $surname</b></td>
                                                <td>$birthdate</td>
                                                <td>$phoneNumber</td>
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
                        <div class="tab-pane <?php if ($section == 1): ?> active <?php endif; ?>" id="registerstudent">
                            <div class="col-md-12">
                                <?php echo form_open('profile/admin_panel/students',
                                    ''); ?>
                                <div class="card">
                                    <div class="form-horizontal">
                                        <div class="card-content">
                                            <div class="row">
                                                <div class="text-center">
                                                    <h3>Register student</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left  col-md-offset-1">Parent of a
                                                    student</label>

                                                <div class="col-md-3">
                                                    <!-- Trigger the modal with a button -->
                                                    <button type="button" id="select_parent"
                                                            class="btn btn-warning btn-fab-mini"
                                                            data-toggle="modal" data-target="#parents_modal"><i>Select
                                                            parent</i></button>
                                                    <input class="form-control hidden" type="text"
                                                           name="student_parent_id"
                                                           value="<?= $student_parent_id ?>"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-md-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">First name*</label>
                                                        <input class="form-control" type="text"
                                                               name="student_first_name"
                                                               value="<?= $student_first_name ?>" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Last
                                                            <name></name>
                                                        </label>
                                                        <input class="form-control" type="text" name="student_last_name"
                                                               value="<?= $student_last_name ?>" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-3 label-on-left  col-md-offset-1">Date of
                                                    birth</label>
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating ">
                                                        <label class="control-label"></label>
                                                        <input class="form-control" type="date"
                                                               name="student_birth_date"
                                                               value="<?= $student_birth_date ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-md-offset-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Phone number</label>
                                                        <input class="form-control" type="number"
                                                               name="student_phone_number"
                                                               value="<?= $student_phone_number ?>"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Email</label>
                                                        <input class="form-control" type="email" name="student_email"
                                                               value="<?= $student_email ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info btn-fill">Register</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal - for parents list -->
                        <div class="modal fade" id="parents_modal" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Select parent</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-content">
                                            <div class="material-datatables">
                                                <table class="table table-hover" id="parents_modal_datatables">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Full name</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($allParents as $parent) {
                                                        $id = sprintf("p%06d", $parent->getId());
                                                        $name = $parent->getName();
                                                        $surname = $parent->getSurname();
                                                        $phoneNumber = $parent->getPhoneNumber();
                                                        $email = $parent->getEmail();
                                                        $patronymic = $parent->getPatronymic();
                                                        echo "<tr>
                                                                        <td>$i</td>
                                                                        <td>$id</td>
                                                                        <td class='col-md-7'><b>$name $surname $patronymic</b></td>
                                                                        <td class='col-md-3'>$phoneNumber</td>
                                                                        <td class='text-right col-md-4'>$email</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>