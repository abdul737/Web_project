<?php
$position = $_SESSION['position'];
if ($position == 'p')
{
    $user = $_SESSION['parent'];
} else if ($position == 'a')
{
    $user = $_SESSION['admin'];
} else if ($position == 's')
{
    $user = $_SESSION['student'];
} else if ($position == 'i')
{
    $user = $_SESSION['instructor'];
} else
{
    print "<SCRIPT type='text/javascript'>
        alert('Session timed out or not found!');
    </SCRIPT > ";
    exit;
}

if(isset($user))
{
    if ($_POST) {
        foreach ($_POST as $item)
        {
            $item = \databaseManager\SecurityCheck::test_input($item);
        }
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $phoneNumber = $_POST["phoneNumber"];
        $email = $_POST["email"];

        $user->setName($firstName);
        $user->setSurname($lastName);
        $user->setEmail($email);
        $user->setPhoneNumber($phoneNumber);

        if (isset($_SESSION['parent']))
        {
            $passportFirstName = $_POST["passportFirstName"];
            $passportLastName = $_POST["passportLastName"];
            $passportPatronymic = $_POST["passportPatronymic"];
            $passportAddress = $_POST["passportAddress"];
            $passportSerial = $_POST["passportSerial"];
            $passportIssuedBy = $_POST["passportIssuedBy"];
            $passportDateOfIssue = $_POST["passportDateOfIssue"];
            $passportDateOfExpiry = $_POST["passportDateOfExpiry"];

            \databaseManager\DBManager::updateParent($user);
            $_SESSION['parent'] = $user;
        } else
            if(isset($_SESSION['admin']))
            {
                \databaseManager\DBManager::updateAdmin($user);
                $_SESSION['admin'] = $user;
            } else
                if(isset($_SESSION['instructor']))
                {
                    \databaseManager\DBManager::updateInstructor($user);
                    $_SESSION['instructor'] = $user;
                } else
                    if (isset($_SESSION['student']))
                    {
                        \databaseManager\DBManager::updateStudent($user);
                        $_SESSION['student'] = $user;
                    }
        $_POST = array();
        header("Location: editprofile.php");
        exit;
    }
}
else
{
    print('<script>alert("Session timed out or not found!");</script>');
    exit;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">perm_identity</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Profile -
                        <small class="category">Complete your profile</small>
                    </h4>
                    <form id="infoForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">ID Number</label>
                                    <input type="text" class="form-control" disabled value="p<?php printf("%05d", $user->getId());?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" name="phoneNumber" class="form-control" value="<?= $user->getPhoneNumber() ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email address</label>
                                    <input type="email" name="email" class="form-control" value="<?= $user->getEmail() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Fist Name</label>
                                    <input type="text" name="firstName" class="form-control" value="<?= $user->getName() ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" value="<?= $user->getSurname() ?>">
                                </div>
                            </div>
                        </div> </br >
                        <?php
                            if (isset($_SESSION['parent']))
                            {
                                include_once "common_pages/editpassportinfo.php";
                            }
                        ?>
                        <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>