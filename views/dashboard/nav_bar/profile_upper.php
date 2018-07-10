<body
    <?php
    if (!isset($_COOKIE['sidebarOpen'])) {
        $_COOKIE['sidebarOpen'] = 1;
    }

    if ($_COOKIE['sidebarOpen'] == 0) {
        echo 'class="sidebar-mini"';
    }
    ?>>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="<?= $imageSidebar ?>">
        <div class="logo">
            <a href="#" class="simple-text">
                Edu Management System
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="#" class="simple-text">
                EMS
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="<?= $pre_path ?>views/assets/img/avatar_default.png"/>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#edit" class="collapsed">
                        <?= $user->getName() . " " . $user->getSurname(); ?>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="edit">
                        <ul class="nav">
                            <li>
                                <a href="edit_profile"">Edit Profile</a>
                            </li>
                            <li>
                                <a href="change_password">Change password</a>
                            </li>
                            <li>
                                <a href="logout">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>