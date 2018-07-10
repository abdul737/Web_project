<body>
<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" filter-color="black" data-image="<?= $pre_path ?>views/assets/img/login.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card card-signup" id="registration">
                        <h2 class="card-title text-center">Register</h2>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form class="form" method="post"
                                      action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                      data-toggle="validator" role="form">
                                    <div class="card-content">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                            <input type="text" class="form-control" placeholder="First Name..."
                                                   name="name" required>
                                            <input type="text" class="form-control" placeholder="Last Name..."
                                                   name="surname" required>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">phone</i>
                                                </span>
                                            <input type="number" class="form-control" placeholder="Phone Number..."
                                                   name="phoneNumber" required>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            <input type="email" class="form-control" placeholder="Email..." name="email"
                                                   data-error="Bruh, that email address is invalid">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            <input type="password" data-minlength="6" placeholder="Password"
                                                   id="inputPassword" class="form-control" name="password" required/>
                                            <div class="help-block">Minimum of 6 characters</div>
                                        </div>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            <input type="password" placeholder="Confirm Password..."
                                                   class="form-control" name="confirmPassword"
                                                   data-match="#inputPassword"
                                                   data-match-error="Whoops, these don't match" required/>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="terms" data-error="Before you wreck yourself"
                                                       required>
                                                I accept to thank developers
                                                <div class="help-block with-errors"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>