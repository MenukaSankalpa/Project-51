
<nav class="side-bar">
            <div class="user-p">
                <img src="img/user.jpg" alt="">
                <h4>@<?=$_SESSION['username']?></h4>
            </div>
            <?php
                if($_SESSION['role']== "employee"){
            ?>
            <!-- Employee Navigation Bar-->
            <ul id="navList">
                <li>
                    <a href="#">
                        <i class="ri-macbook-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="my_task.php">
                        <i class="ri-file-list-fill"></i>
                        <span>My Task</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php">
                        <i class="ri-message-2-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
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
                    <a href="logout.php">
                        <i class="ri-logout-circle-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        <?php } else { ?>
            <!-- Admin Navigation Bar-->
            <ul id="navList">
                <li>
                    <a href="#">
                        <i class="ri-macbook-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="ri-group-fill"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="create_task.php">
                        <i class="ri-add-circle-fill"></i>
                        <span>Create Task</span>
                    </a>
                </li>
                <li>
                    <a href="task.php">
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
                    <a href="notifications.php">
                        <i class="ri-notification-3-fill"></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="ri-logout-circle-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        <?php } ?>
        </nav>