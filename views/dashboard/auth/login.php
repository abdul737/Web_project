<body>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="<?= $pre_path ?>views/assets/img/login.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <?php echo validation_errors(); ?>

                        <?php echo form_open('/'); ?>
                        <div class="card card-login card-hidden">
                            <div class="card-header text-center" data-background-color="blue">
                                <h4 class="card-title">Login</h4>
                            </div>
                            <div class="card-content">
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">perm_identity</i>
                                </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Login</label>
                                        <input title="login" name="login" id="login" data-minlength="6" type="text"
                                               required class="form-control">
                                    </div>
                                </div>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password</label>
                                        <input title="password" name="password" id="passwordTextBox" type="password"
                                               required class="form-control">
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="remember" checked>
                                            <span class="checkbox-material"><span class="check">
                                                    </span></span> Remember
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-info btn-simple btn-wd btn-lg">Let's go</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>