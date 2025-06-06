<?php

function insert_task($conn, $data){
    $sql = "INSERT INTO tasks (title, description, assigned_to) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function get_all_tasks($conn){
    $sql = "SELECT * FROM users WHERE role=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["employee"]);

    if($stmt->rowCount() > 0){
       $users = $stmt->fetchAll();
    }else $users = 0;

    return  $users;
}