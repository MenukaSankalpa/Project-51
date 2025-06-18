<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    include "DB_connection.php";
    include "app/Model/Task.php";
    include "app/Model/User.php";

    $todaydue_task = count_tasks_due_today($conn);
    $overdue_task = count_tasks_overdue($conn);
    $nodeadline_task = count_tasks_NoDeadline($conn);
    $num_task = count_tasks($conn);
    $num_users = count_users($conn);
    $pending = count_pending_tasks($conn);
    $in_progress = count_in_progress_tasks($conn);
    $completed = count_completed_tasks($conn);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css?v=2">

</head>
<body>
    <input type="checkbox" name="" id="checkbox">
    <?php include "inc/header.php"?>
    <div class="body">
        <?php include "inc/nav.php"?>
        <section class="section-1">
            <?php if ($_SESSION['role'] == "admin"){ ?>
                <div class="dashboard">
                    <div class="dashboard-item">
                        <i class="ri-group-fill"></i>
                        <span><?=$num_users?> Employee(s)</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-task-fill"></i>
                        <span><?=$num_task?> All Tasks</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-close-fill"></i>
                        <span><?=$overdue_task?> Overdue</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-time-fill"></i>
                        <span><?=$nodeadline_task?> No Dead Line</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-group-fill"></i>
                        <span><?=$todaydue_task?> Due Today</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-notification-fill"></i>
                        <span><?=$overdue_task?> Notifications</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-pass-pending-fill"></i>
                        <span><?=$pending?> Pending</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-loop-left-fill"></i>
                        <span><?=$in_progress?> In Progress</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="ri-check-double-fill"></i>
                        <span><?=$completed?> Completed</span>
                    </div>
                </div>
            <?php }?>
        </section>
    </div>
<script>
    var active = document.querySelector("#navList li:nth-child(1)");
    active.classList.add("active");
</script>
</body>
</html>
<?php } else {
    $em = "first login";
    header("Location: login.php?error=$em");
    exit();
}
?>