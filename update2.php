<?php


    $id = $_POST['sid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $conn = mysqli_connect("localhost","root","Crud1010@","test") or die("Connection failed");
    $sql = "UPDATE students SET id = {$id}, first_name = '{$fname}', last_name = '{$lname}' WHERE id = {$id}";
    
    
    if(mysqli_query($conn,$sql)){
        mysqli_close($conn);
        echo 1;
    }else{
        mysqli_close($conn);
        echo 0;
    }
?>
