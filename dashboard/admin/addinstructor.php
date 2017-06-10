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
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <form class="form-horizontal" action="#" method="#">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">add</i>
                    </div>
                    <h4 class="card-title">Add instructor</h4>
                    <div class="card-content">
                        <div class="row">
                            <label class="col-md-2 label-on-left">First name</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="first_name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Last name</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="last_name" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Upload</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <span class="btn btn-default btn-sm btn-file">
                                                        passport copy <input type="file">
                                                </span>
                                    <span class="btn btn-default btn-sm btn-file">
                                                        pension book <input type="file">
                                                </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-fill">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>