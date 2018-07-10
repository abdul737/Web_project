<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open('dashboard/profile/admin_panel/add_instructor',
                    ''); ?>
                <div class="card">
                    <div class="form-horizontal">
                        <div class="card-header card-header-icon" data-background-color="blue">
                            <i class="material-icons">add</i>
                        </div>
                        <h4 class="card-title"><?= $title ?></h4>
                        <div class="card-content">

                            <div class="row">
                                <div class="col-md-9 col-md-offset-1">
                                    <h3>
                                        <input id="individual_type" type="checkbox" data-toggle="toggle"
                                            <?= ($parent_individual_type === 0) ? 'checked' : '' ?>
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
                                               value="<?= $parent_email ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div id="passport_info" <?= ($parent_individual_type === 1) ? 'hidden' : '' ?>>
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
                                    <div class="col-md-3 fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="<?= $assets_path ?>/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="..."/>
                                                </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="office_info" <?= ($parent_individual_type === 0) ? 'hidden' : '' ?>>
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
                                    <div class="col-md-3 fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="<?= $assets_path ?>/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="..."/>
                                                </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                               data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <h3>Register student (optional)</h3>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="form-group label-floating">
                                        <label class="control-label">First name</label>
                                        <input class="form-control" type="text" name="student_first_name"
                                               value="<?= $student_first_name ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last name</label>
                                        <input class="form-control" type="text" name="student_last_name"
                                               value="<?= $student_last_name ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left  col-md-offset-1">Date of birth</label>
                                <div class="col-md-3">
                                    <div class="form-group label-floating ">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="date" name="student_birth_date"
                                               value="<?= $student_birth_date ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill">Register</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>