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
                                    <a href="#allinstructors" data-toggle="tab">
                                        <i class="material-icons">contacts</i>
                                        All instructors
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="<?php if ($section == 1): ?> active <?php endif; ?>">
                                    <a href="#registerinstructor" data-toggle="tab">
                                        <i class="material-icons">person_add</i>
                                        Register instructor
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane <?php if ($section == 0): ?> active <?php endif; ?>" id="allinstructors">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">contacts</i>
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
                                            <th>Phone Number</th>
                                            <th>Birthdate</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($all_instructors as $instructor) {
                                            $id = sprintf("i%06d", $instructor->getId());
                                            $name = $instructor->getName();
                                            $surname = $instructor->getSurname();
                                            $phoneNumber = $instructor->getPhoneNumber();
                                            $birthdate = $instructor->getBirthdate();
                                            echo "<tr>
                                                                        <td class='text-center'>$i</td>
                                                                        <td><i>$id</i></td>
                                                                        <td><b>$name $surname</b></td>
                                                                        <td>$phoneNumber</td>
                                                                        <td>$birthdate</td>
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
                        <div class="tab-pane <?php if ($section == 1): ?> active <?php endif; ?>"
                             id="registerinstructor">
                            <?php echo form_open('profile/admin_panel/instructors',
                                'class="form-horizontal"'); ?>
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">person_add</i>
                            </div>
                            <h4 class="card-title"><?= $title ?></h4>
                            <div class="card-content">
                                <div class="row text-center">

                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                            <img src="<?= $assets_path ?>/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                                            <span class="btn btn-round btn-rose btn-file">
                                                <span class="fileinput-new">Add Photo</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="..."/></span>
                                            <br/>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <label class="col-md-2 label-on-left">First name</label>
                                    <div class="col-md-9">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="text" name="first_name"
                                                   value="<?= $instructor_first_name ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Last name</label>
                                    <div class="col-md-9">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="text" name="last_name"
                                                   value="<?= $instructor_last_name ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Date of birth</label>
                                    <div class="col-md-9">
                                        <div class="form-group label-floating ">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="date" value="<?= $instructor_birthdate ?>"
                                                   name="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Phone Number</label>
                                    <div class="col-md-9">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="number" name="phone_number"
                                                   value="<?= $instructor_phone_number ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Email</label>
                                    <div class="col-md-9">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="email" name="email"
                                                   value="<?= $instructor_email ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <p>
                                    <?php echo validation_errors(); ?>
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info btn-fill">Register</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
