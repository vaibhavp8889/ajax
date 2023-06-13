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
            background-color: cornflowerblue;
            width: auto;
            height: 50px;
            margin: auto;
            
        }
        #input{
            text-align: center;
            height: 60px;
            margin-bottom: 10px;
            background-color: paleturquoise;
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
        input{
            /* background-color: lemonchiffon; */
            float: inline-end;
            float: center;
            width: 150px;
            height: 25px;
            margin-top: 15px;
            margin-right: 20px;
            text-align: center;
        }
        #inpute{
            text-align: center;
        
            background-color: yellow;
            width: auto;
            height: 60px;

        }
        #error-message{
            color: red;
            position: absolute;
            background-color: #efdcdd;
            padding: 10px;
            margin: 10px;
            display: none; 
            right: 15px;
            top: 15px;

            
        }
        #success-message{
            color: green;
            position: absolute;
            background-color: #DEF1D8;
            padding: 10px;
            margin: 10px;
            display: none;
            right: 15px;
            top: 15px;

            
        }
        .delete{
            background-color: red;
            color: white;
            border-radius: 5px;
            
        }
        .edit{
            background-color: green;
            color: white;
            border-radius: 5px;
        }
        #model{
            background: rgba(0,0,0,0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
            
        }
        #modelform{
            background-color: #fff;
            width: 40%;
            position: relative;
            top: 20%;
            left: calc(50%-20%);
            padding: 15px;
            border-radius: 4px;
            margin: auto;

        }
        #close-btn{
            background: red;
            color: white;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            position: absolute;
            top: -15px;
            right: -15px;
            cursor: pointer;
        }
        h3{
            float: left;
            margin-top: 17px;
            margin-left: 25px;
        }
        #pagination {
            display: inline-block;
        }

        #pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        #pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
        #save-button, #add-button, #load-button, #delete-button, #update-button{
            background-color: yellowgreen;
        }
        

        #pagination a:hover:not(.active) {background-color: #ddd;}
        
    </style>
</head>
<body>
<h1>PHP with AJAX</h1>

<div id="inpute">
    <form action="" id="addform">
        <h3>Add Records:</h3>
        Id: <input type="numaber" name="id" id="id">
        First Name:<input type="text" name="fname" id="fname">
        Last Name:<input type="text" name="lname" id="lname">
        <input type="button" id="save-button" value="save">
    </form>

</div>

<div id="input">
    
    <input type="button" id="load-button" value="Load full data">
    <a href="insert-data.php"><input type="button" id="add-button" value="Add data"></a>
    <a href="update-data.php"><input type="button" id="update-button" value="Update data"></a>
    <a href="delete-data.php"><input type="button" id="delete-button" value="Delete data"></a>
    
    <label>Search :</label>
    <input type="text" id="search" autocomplete="off">

</div>


<div><table id="main" cellspacing="0">

        
<tr>
    <td id="table-data"> 
    </td>
</tr>
</table>
<div id="error-message"></div>
<div id="success-message"></div>
</div>
<div id="model">
    <div id="modelform">
        <h2>Edit Form</h2>
        <table cellpadding="0" width="100%">
            
        </table>
        <div id="close-btn">X</div>
    </div>
</div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // load data
            $("#load-button").click(function(){
                $.ajax({
                    url : "ajax-load.php",
                    type :"POST",
                    success : function(data){
                        $("#table-data").html(data);
                    }
                });
            })
        // function for show data
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
            // save data
        $("#save-button").click(function(e){
            e.preventDefault();
            
            
            var s_id = $("#id").val();
            var s_fname = $("#fname").val();
            var s_lname = $("#lname").val();
            if(s_fname == "" || s_lname == ""){
                $("#error-message").show();
                $("#error-message").html("Please fill all the fields").slideDown;
                $("#success-message").slideUp;
                setTimeout(() => {
                    $("#error-message").fadeOut("slow");
                }, 4000);
            }else{
                $.ajax({
                url : "save-data.php",
                type : "POST",
                data: {id:s_id, first_name:s_fname,last_name:s_lname},
                success: function(data){
                    if(data == 1){
                        $("#addform").trigger("reset");
                        loadtable();
                        $("#success-message").show();
                        $("#success-message").html("Data added successfully").slideDown;
                        $("#error-message").slideUp;
                        setTimeout(() => {
                            $("#success-message").fadeOut("slow");
                        }, 4000);
                       
                    }else{
                        
                        $("#error-message").show();
                        $("#error-message").html("Data not added").slideDown;
                        $("#success-message").slideUp;
                        setTimeout(() => {
                            $("#error-message").fadeOut("slow");
                        }, 4000);
                    }
                }

            })
            }
            
        })
        // delete data
        $(document).on("click",".delete",function(){
            $("#error-message").show();
            $("#success-message").show();
            var id = $(this).data("id");
            var element = this;
            $.ajax({
                url : "remove-data.php",
                type : "POST",
                data : {s_id:id},
                success : function(data){
                    if(data == 1){
                        $(element).closest("tr").fadeOut();
                    }else{
                        $("#error-message").html("Please fill all the fields").slideDown;
                        $("#success-message").slideUp;
                        setTimeout(() => {
                            $("#error-message").fadeOut("slow");
                        }, 4000);
                        
                    }
                    
                }
            })

        })
        // edit data
        $(document).on("click",".edit",function(){
            $("#model").show();
            var id = $(this).data("eid");
            

            $.ajax({
                url : "update.php",
                type : "POST",
                data : {id: id},
                success : function(data){
                    $("#modelform table").html(data);

                }
            })
            
                
        });

        // hide model box
        $("#close-btn").on("click",function(){
            $("#model").hide();
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
                        
                        $("#model").hide();
                        loadtable();
                    }else{
                        alert("data note update");
                    }
                    
                }
            })
                
        })
    // search
        $("#search").on("keyup",function(){
            var search = $(this).val();

            $.ajax({
                url: "search.php",
                type: "POST",
                data: {search:search},
                success: function(data){
                    $("#table-data").html(data);
                }
            })
        })

        // pagination load
        function loaddata(page){
            console.log(page);
            $.ajax({
                
                url: "ajax-pagination.php",
                type: "POST",
                data: {page: page},
                success: function(data){
                    $("#table-data").html(data);
                }

            })

        }
        loaddata();
        // pagination code
        $(document).on("click","#pagination a", function(e){
            e.preventDefault();
            var page = $(this).attr('id');
        
            loaddata(page);
        })
        })


    </script>
</body>
</html>