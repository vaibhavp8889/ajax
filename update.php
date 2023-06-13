<?php

    $id = $_POST['id'];
    $conn = mysqli_connect("localhost","root","Crud1010@","test") or die("Connection failed");
    $sql = "SELECT * FROM students WHERE id = {$id}";

    $result = mysqli_query($conn,$sql) or die("Query failed");
    $output ="";
    if(mysqli_num_rows($result) > 0){
        
    $row = mysqli_fetch_assoc($result);
    
    $output .= "<tr>
                <td>First Name</td>
                <td><input type='text' value='{$row['first_name']}' id='edit-fname'></td>
                <td><input type='text' value='{$row['id']}' hidden id='edit-id'></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type='text' name='' value='{$row['last_name']}' id='edit-lname'></td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' name='' id='submit' value='save'></td>
            </tr>";
    

   
    echo $output;
    // mysqli_close($conn);
    
}
    ?>

    