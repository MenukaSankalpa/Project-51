<?php
session_start();

if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" name="" id="checkbox">
    <?php include "inc/header.php"?>
    <div class="body">
        <?php include "inc/nav.php"?>
        <section class="section-1">
            <!--<h1>WELCOME</h1>
            <P>#Project Task Management System</P>-->
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