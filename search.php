<?php
    $search_value = $_POST['search'];
    $conn = mysqli_connect("localhost","root","Crud1010@","test");

    $sql = "SELECT * from students WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";
    

    $output = "";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $output = "<table border='1px solid black' width='600px' cellpadding='10px' width='100%'' cellspacing='0'>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
        
        </tr>
        ";
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td><button class='edit' data-eid='{$row['id']}' value=''>Edit</button></td>
                    <td><button class='delete' data-id='{$row['id']}' value='Delete'>Delete</button></td>
            </tr>";
        }
        $output .= "</table>";

        mysqli_close($conn);
        echo $output;
    }else{
        mysqli_close($conn);
        echo "No Record Found";
    }

?>