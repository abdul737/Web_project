
<h4 class="card-title">Passport Info</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Fist Name</label>
            <input type="text" name="passportFirstName" class="form-control" value="<?= $user->getName() ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Last Name</label>
            <input type="text" name="passportLastName" class="form-control" value="<?= $user->getSurname() ?>">
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
            <input type="text" name="passportAddress" class="form-control" value="Amir-Temur street, 23a">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Passport Serial Number</label>
            <input type="text" name="passportSerial" class="form-control" value="AA1578854">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Issued by</label>
            <input type="text" name="passportIssuedBy" class="form-control" value="Toshkent shahar, Yunusobod tuman IIB">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Date of issue</label>
            <input type="text" name="passportDateOfIssue" class="form-control" value="11/10/2017">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Date of expiry</label>
            <input type="text" name="passportDateOfExpiry" class="form-control" value="11/10/2025">
        </div>
    </div>
</div>
