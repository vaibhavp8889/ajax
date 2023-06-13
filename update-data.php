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
            margin: 15px;
            text-align: center;
        }
        #get-data{
            background-color: pink;
            float: inline-end;
            float: center;
            width: 70px;
            height: 25px;
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
    </style>
</head>
<body>
    
    <h1>Update data with PHP & AJAX</h1>
    <div id="inpute">
        
        Id<input type="text" name="id" value="" id="id"/>
        <input type="button" name="get-data" id="get-data" value="Get data"/>
    </div>
    <div><table id="main" cellspacing="0">
        <tr>
            <td id="table-data"></td>
        </tr>
    </table></div>
    <div id="new_chq"></div>
    <div id="new_chq2"></div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#get-data").click(function(){
                var s_id = $('#id').val();
                $.ajax({
                    url : "update.php",
                    type : "POST",
                    data : {id:s_id},
                    success : function(data){
                        $("#table-data").html(data);
                        }
                    
                })
            })
            $(document).on("click","#submit",function(){
            var sid = $("#edit-id").val();
            var sfname = $("#edit-fname").val();
            var slname = $("#edit-lname").val();
            $.ajax({
                url: "update2.php",
                type: "POST",
                data: {sid:sid, fname:sfname, lname:slname},
                success: function(data){
                    if(data == 1){
                        alert("data updated successfully")
                        $("#model").hide();
                        
                    }else{
                        alert("data note update");
                    }
                    
                }
            })
                
            })
            
        });
    </script>
</body>
</html>