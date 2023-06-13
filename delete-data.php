<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            background-color: yellow;
            width: auto;
            height: 60px;
            margin: auto;
        }
        #inpute{
            text-align: center;
        
            background-color: yellowgreen;
            width: auto;
            height: 60px;

        }
        input{
            border: 1px solid black;
            margin: 10px;
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: auto;
            
        }
        th, td {
            background-color: #96D4D4;
            text-align: center;
            
        }
        #load-button{
            background-color: #96A4F4;
            float: inline-end;
            float: center;
        }
    </style>
</head>
<body>
<h1>Remove Records with PHP & AJAX</h1>
<div id="inpute">
    ID<input type="number" name="id" id="id">
    
    <input type="button" id="delete-button" value="Remove">
</div>
<div><table id="main" cellspacing="0">

        
<tr>
    <td id="table-data"> 

    </td>
</tr>
</table></div>
    
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function loadtable(){
                $.ajax({
                    url : "ajax-load.php",
                    type : "POST",
                    success : function(data){
                        $("#table-data").html(data)
                    }
                })

            }
            loadtable();   
           $('#delete-button').click(function(e){
            e.preventDefault();
            var id = $('#id').val();
            
            $.ajax({
                url : "remove-data.php",
                type : "POST",
                data : {s_id:id},
                success : function(data){
                    if(data == 1){
                        console.log("<h4>Record successfully removed</h4>");
                        loadtable();
                    }else{
                        console.log("error");
                    }
                    
                }
            })
           })

            
        });
    </script>
</body>
</html>