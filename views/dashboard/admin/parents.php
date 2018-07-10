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
                                    <a href="#allparents" data-toggle="tab">
                                        <i class="material-icons">account_circle</i>
                                        All parents
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="<?php if ($section == 1): ?> active <?php endif; ?>">
                                    <a href="#registerparent" data-toggle="tab">
                                        <i class="material-icons">person_add</i>
                                        Register parent
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane <?php if ($section == 0): ?> active <?php endif; ?>" id="allparents">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">account_circle</i>
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
                                            <th>All students</th>
                                            <th>Phone Number</th>
                                            <th class="text-right">Actions</th>
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
                                            $studentName = "";
                                            foreach ($parent->getStudents() as $student) {
                                                $studentName .= $student->getName() . " " . $student->getSurname() . "\n<br>";
                                            }
                                            echo "<tr>
                                                                        <td class='text-center'>$i</td>
                                                                        <td><i>$id</i></td>
                                                                        <td><b>$name $surname</b></td>
                                                                        <td>$studentName</td>
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
                        <div class="tab-pane <?php if ($section == 1): ?> active <?php endif; ?>" id="registerparent">
                            <?php echo form_open('profile/admin_panel/parents',
                                ''); ?>
                            <div class="form-horizontal">
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">group_add</i>
                                </div>
                                <h4 class="card-title">Register parent</h4>
                                <div class="card-content">

                                    <div class="row">
                                        <div class="col-md-9 col-md-offset-1">
                                            <h3>
                                                <input id="individual_type" name="parent_individual_type"
                                                       type="checkbox" data-toggle="toggle"
                                                    <?= ($parent_individual_type == 0) ? 'checked' : '' ?>
                                                       data-style="ios" data-on="Individual" data-off="Legal entity"
                                                       data-onstyle="success" data-offstyle="warning">

                                                Register new parent</h3>
                                            <style>
                                                .toggle.ios, .toggle-on.ios, .toggle-off.ios {
                                                    border-radius: 10px;
                                                }

                                                .toggle.ios .toggle-handle {
                                                    border-radius: 20px;
                                                    background-color: honeydew;
                                                }

                                                .toggle.btn {
                                                    min-width: 120px
                                                }
                                            </style>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Fist Name</label>
                                                <input type="text" name="parent_first_name" class="form-control"
                                                       value="<?= $parent_first_name ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Last Name</label>
                                                <input type="text" name="parent_last_name" class="form-control"
                                                       value="<?= $parent_last_name ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Patronymic</label>
                                                <input type="text" name="parent_patronymic" class="form-control"
                                                       value="<?= $parent_patronymic ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Phone Number</label>
                                                <input class="form-control" type="number" name="parent_phone_number"
                                                       value="<?= $parent_phone_number ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email</label>
                                                <input class="form-control" type="email" name="parent_email"
                                                       value="<?= $parent_email ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="passport_info" <?= ($parent_individual_type == 1) ? 'hidden' : '' ?>>
                                        <div class="text-center">
                                            <h3>Passport info</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Address</label>
                                                    <input class="form-control" type="text" name="passport_address"
                                                           value="<?= $passport_address ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Passport serial</label>
                                                    <input class="form-control" type="text" name="passport_serial"
                                                           value="<?= $passport_serial ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Passport number</label>
                                                    <input class="form-control" type="number" name="passport_number"
                                                           value="<?= $passport_number ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Place of issue</label>
                                                    <input class="form-control" type="text" name="passport_who_give"
                                                           value="<?= $passport_who_give ?>"/>
                                                </div>
                                            </div>
                                            <label class="col-md-3 label-on-left">Date of issue</label>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <input class="form-control" type="date" name="passport_when_give"
                                                           value="<?= $passport_when_give ?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Upload passport scan</label>
                                            <div class="col-md-3 fileinput fileinput-new text-center"
                                                 data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?= $assets_path ?>/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="passport_scan"/>
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="office_info" <?= ($parent_individual_type == 0) ? 'hidden' : '' ?>>
                                        <div class="text-center">
                                            <h3>Office info</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Office address</label>
                                                    <input class="form-control" type="text" name="office_address"
                                                           value="<?= $office_address ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Bank Account Number</label>
                                                    <input class="form-control" type="text" name="office_bank_account"
                                                           value="<?= $office_bank_account ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Bank Code</label>
                                                    <input class="form-control" type="number" name="office_bank_code"
                                                           value="<?= $office_bank_code ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Office INN</label>
                                                    <input class="form-control" type="text" name="office_inn"
                                                           value="<?= $office_inn ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Upload licence scan</label>
                                            <div class="col-md-3 fileinput fileinput-new text-center"
                                                 data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?= $assets_path ?>/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="licence_scan"/>
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                       data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill">Register</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
