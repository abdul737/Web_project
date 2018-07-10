<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <?php echo form_open('profile/admin_panel/add_course',
                        'class="form-horizontal"'); ?>
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">queue</i>
                    </div>
                    <h4 class="card-title"><?= $title ?></h4>
                    <div class="card-content">

                        <div class="row">
                            <label class="col-md-3 label-on-left"></label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Course name</label>
                                    <input class="form-control" type="text" name="course_name" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left"></label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Price (UZS)</label>
                                    <input class="form-control" type="number" name="price"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left"></label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Length (Lessons)</label>
                                    <input class="form-control" type="number" name="course_dur"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Course description</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="summernote" class="form-control note-editable"
                                              name="course_description"> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Upload Image for the course</label>
                            <div class="col-md-3 fileinput fileinput-new text-center" data-provides="fileinput">
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

                    <div class="card-footer text-center">
                        <p>
                            <?php echo validation_errors(); ?>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info btn-fill">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>