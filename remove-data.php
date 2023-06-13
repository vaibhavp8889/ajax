<?php

    $sid = $_POST['s_id'];
    $conn = mysqli_connect("localhost","root","Crud1010@","test") or die("connection failed");
    $sql = "DELETE FROM students WHERE id = $sid";
    if(mysqli_query($conn,$sql)){
        mysqli_close($conn);
        echo 1;
    }else{
        mysqli_close($conn);
        echo 0;
    }

?>