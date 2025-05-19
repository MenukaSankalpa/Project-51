<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <input type="checkbox" name="" id="checkbox">
    <?php include "inc/header.php"?>
    <div class="body">
        <?php include "inc/nav.php"?>
        <section class="section-1">
            <h4 class="title">Add Users <a href="user.php">Users</a></h4>
            <form class="form-1">
                <div class="input-holder">
                    <label for="">Full Name</label>
                    <input type="text" class="input-1" placeholder="Full Name"><br><br>
                </div>
                <div class="input-holder">
                    <label for="">Username</label>
                    <input type="text" class="input-1" placeholder="Username"><br><br>
                </div>
                <div class="input-holder">
                    <label for="">Password</label>
                    <input type="text" class="input-1" placeholder="Password"><br><br>
                </div>
            </form>
            <button class=".edit-btn">Add</button>
        </section>
    </div>
<script>
    var active = document.querySelector("#navList li:nth-child(2)");
    active.classList.add("active");
</script>

</body>
</html>

?>