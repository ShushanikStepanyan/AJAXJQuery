<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title> AJAXjq </title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
        
        function funcBefore(){
            
            $("#information").text("Wait data..");
        }
        
        function funcSuccess (){
            
           $("#information").text(data);
        }
        
        $(document).ready(function(){
            
            $('#load').bind("click", function(){
                
                var admin = "Admin" ;
                
                $.ajax({
                    
                    url:"content.php",
                    
                    type:"POST",
                    
                    data:({name: admin}),
                    
                    dataType:"html",
                    
                    beforeSend: funcBefore,
                    
                    success: funcSuccess
                    
                });
                
            });
            
            $("#done").bind("click", function(){
                
                $.ajax({
                    
                    url:"check.php",
                    
                    type: "POST",
                    
                    data: ({name: $("#name").val()}),
                    
                    dataType: "html",
                    
                    beforeSend: function() {
                        
                        $("#information").text("Wait data..");
                  
                    },
                    
                    success: function (data) {
                        
                        if (data == "Fail")
                            
                            alert("Name is busy")
                        
                        else 
                            
                            $("#information").text(data);
                    }
                    
                });
                
            });
            
            
            
            
             
        });
        
        
        
        
    </script>
    
    
</head>
<body>
    
    <input type="text" id = "name" placeholder="Name"> 
    <input type = "button" id = 'done'value = "Send">
    <p id = "load" style = "cursor: pointer"> Load date</p>
    
    <div id = "information"></div>
    
    
    
</body>
</html>
