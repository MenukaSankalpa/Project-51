<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <input type="checkbox" name="" id="checkbox">
    <header class="header">
        <h2 class="u-name">SIDE <b>BAR</b>
            <label for="checkbox">
                <i id="navbtn" class="ri-menu-line"></i>
            </label>
        </h2>
        <i class="ri-user-fill"></i>
    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">
                <img src="img/user.jpg" alt="">
                <h4>Menuka</h4>
            </div>
            <?php
                $user = "admin";

                if($user == "employee"){
            ?>
            <!-- Employee Navigation Bar-->
            <ul>
                <li>
                    <a href="#">
                        <i class="ri-macbook-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-file-list-fill"></i>
                        <span>My Task</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-message-2-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-notification-3-fill"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <!--<li>
                    <a href="#">
                        <i class="ri-settings-fill"></i>
                        <span>Setting</span>
                    </a>
                </li>-->
                <li>
                    <a href="#">
                        <i class="ri-logout-circle-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        <?php } else { ?>
            <!-- Admin Navigation Bar-->
            <ul>
                <li>
                    <a href="#">
                        <i class="ri-macbook-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-group-fill"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-add-circle-fill"></i>
                        <span>Create Task</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-task-fill"></i>
                        <span>All Task</span>
                    </a>
                </li>
                <!--<li>
                    <a href="#">
                        <i class="ri-settings-fill"></i>
                        <span>Setting</span>
                    </a>
                </li>-->
                <li>
                    <a href="#">
                        <i class="ri-notification-3-fill"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ri-logout-circle-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        <?php } ?>
        </nav>
        <section class="section-1">
            <!--<h1>WELCOME</h1>
            <P>#Project Task Management System</P>-->
        </section>
    </div>
</body>
</html>