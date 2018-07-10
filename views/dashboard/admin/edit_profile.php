<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Profile -
                            <small class="category">Complete profile</small>
                        </h4>
                        <form id="infoForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                              method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">ID Number</label>
                                        <input type="text" class="form-control" disabled
                                               value="p<?php printf("%05d", $user->getId()); ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Phone Number</label>
                                        <input type="text" name="phoneNumber" class="form-control"
                                               value="<?= $user->getPhoneNumber() ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email address</label>
                                        <input type="email" name="email" class="form-control"
                                               value="<?= $user->getEmail() ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Fist Name</label>
                                        <input type="text" name="firstName" class="form-control"
                                               value="<?= $user->getName() ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" name="lastName" class="form-control"
                                               value="<?= $user->getSurname() ?>">
                                    </div>
                                </div>
                            </div>
                            </br >
                            <?php
                            if (isset($_SESSION['parent'])):
                                ?>
                                <h4 class="card-title">Passport Info</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fist Name</label>
                                            <input type="text" name="passportFirstName" class="form-control"
                                                   value="<?= $user->getName() ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" name="passportLastName" class="form-control"
                                                   value="<?= $user->getSurname() ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Patronymic</label>
                                            <input type="text" name="passportPatronymic" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="passportAddress" class="form-control"
                                                   value="Amir-Temur street, 23a">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Passport Serial Number</label>
                                            <input type="text" name="passportSerial" class="form-control"
                                                   value="AA1578854">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Issued by</label>
                                            <input type="text" name="passportIssuedBy" class="form-control"
                                                   value="Toshkent shahar, Yunusobod tuman IIB">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Date of issue</label>
                                            <input type="text" name="passportDateOfIssue" class="form-control"
                                                   value="11/10/2017">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Date of expiry</label>
                                            <input type="text" name="passportDateOfExpiry" class="form-control"
                                                   value="11/10/2025">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>