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
                                    <a href="#Classrooms" data-toggle="tab">
                                        <i class="material-icons">&#xE88A;</i>
                                        Classrooms
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="<?php if ($section == 1): ?> active <?php endif; ?>">
                                    <a href="#Timeslots" data-toggle="tab">
                                        <i class="material-icons">timer</i>
                                        Timeslots
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane <?php if ($section == 0): ?> active <?php endif; ?>" id="Classrooms">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">&#xE88A;</i>
                            </div>
                            <h4 class="card-title">Classrooms</h4>
                            <div class="card-content">
                                <div class="material-datatables">
                                    <table class="table table-hover" id="datatables">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Building</th>
                                            <th>Room</th>
                                            <th>Capacity</th>
                                            <th>Details</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($classrooms as $classroom) {
                                            if ($_SESSION['school_name'] == $classroom->school_name &&
                                                $_SESSION['branch_name'] == $classroom->branch_name)
                                                echo "<tr>
                                                <td class='text-center'>" . $i++ . "</td>
                                                <td><i>$classroom->building</i></td>
                                                <td><b>$classroom->room</b></td>
                                                <td>$classroom->capacity</td>
                                                <td>$classroom->details</td>
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
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane <?php if ($section == 1): ?> active <?php endif; ?>" id="Timeslots">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">timer</i>
                            </div>
                            <h4 class="card-title">Timeslots</h4>
                            <div class="card-content">
                                <div class="material-datatables">
                                    <table class="table table-hover" id="datatables2">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Duration(min)</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                            <th>Sun</th>
                                            <th class="disabled-sorting text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($timeslots as $timeslot): ?>
                                            <tr>
                                                <td><i><?= $timeslot->timeslot_name ?></i></td>
                                                <td><b><?= $timeslot->start_time ?></b></td>
                                                <td><b><?= $timeslot->end_time ?></b></td>
                                                <td><?= $timeslot->duration ?></td>
                                                <td><?php if ($timeslot->mon) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>
                                                <td><?php if ($timeslot->tue) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>
                                                <td><?php if ($timeslot->wed) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>
                                                <td><?php if ($timeslot->thu) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>
                                                <td><?php if ($timeslot->fri) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>
                                                <td><?php if ($timeslot->sat) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>
                                                <td><?php if ($timeslot->sun) {
                                                        echo "<i class='material-icons'>done</i>";
                                                    } ?>
                                                </td>

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
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
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