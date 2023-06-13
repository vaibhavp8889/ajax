<?php

    
    $conn = mysqli_connect("localhost","root","Crud1010@","test");
    $limit = 5;
    if(isset($_POST['page'])){
        $page = $_POST['page'];
    }else{
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $sql = "SELECT * from students LIMIT $offset, $limit";

    $output = "";
    $result = mysqli_query($conn,$sql) or die("query failed");
    if(mysqli_num_rows($result) > 0){
        $output .= "<table border='1px solid black' width='600px' cellpadding='10px' width='100%'' cellspacing='0'>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
        
        </tr>";
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
            <td align='center'>{$row['id']}</td>
            <td>{$row['first_name']} {$row['last_name']}</td>
            <td><button class='edit' data-eid='{$row['id']}' value=''>Edit</button></td>
            <td><button class='delete' data-id='{$row['id']}' value='Delete'>Delete</button></td>
            </tr>";
        }      
        $output .= '</table>';

        $sql_total = "SELECT * FROM students";
        $result1 = mysqli_query($conn, $sql_total) or die("Query failed");
        $total_records = mysqli_num_rows($result1);
        
        $total_pages = ceil($total_records / $limit);
        // echo $total_pages;
        $output .= "<div id='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            if($i == $page){
                $active = "active";
            }else{
                $active = "";
            }

            $output .= "<a class='{$active}' id='{$i}'>{$i}</a>";
        }
        $output .= "</div>";
        mysqli_close($conn);
        echo $output;
    }

?>