<?php
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $conn = mysqli_connect("localhost","root","Crud1010@","Test") or die("connection failed");

    $sql = "INSERT INTO students(id,first_name,last_name) VALUES({$id},'{$first_name}','{$last_name}')";


    

    if(mysqli_query($conn,$sql)){
        mysqli_close($conn);
        echo 1;
    }else{
        mysqli_close($conn);
        echo 0;
    }

?>