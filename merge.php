<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/merge.css">
    </head>
    <body>
        <?php include("include/header.inc"); ?>
        <main class="container">
            <div class="contentBox">
                
                <!-- user list form -->
                <form name="form" method="get" action="grouplist.php">
                    <button type"submit">Go</button>
                    
                    <!-- user list -->
                    <div class="entry input-group">
                        <input class="form-control" name="users[]" type="text" id="userList" />
                    </div>
                </form>
                
                <!-- search -->
                <form>
                    <div class="panel panel-primary">
                        <!-- search field -->
                        <div class="panel-heading">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>   
                                <input class="form-control" id="userSearch" type="text" onkeyup="showResult(this.value)"/>
                            </div>
                        </div>
                        
                        <!-- search results -->
                        <div class="panel-body">
                            <div class="list-group" id="livesearch">
                                
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </main>

        <?php include("include/footer.inc"); ?>

    </body>

    <!-- SCRIPTS -->
    
    
    <script>
        var names = [];
        var ids = [];
        
        function addResult(ent) {
            name = ent.getAttribute('username')
            num = ent.getAttribute('userno')
            
            // no point doing a query for the same person
            // more then once
            if(!ids.includes(num)){
                names.push(name);
                ids.push(num);
                
                $("#userList").val(ids);
            } 
            
            
        };
        
    </script>
    
    
    <script>
    
    function showResult(str) {
        if (str.length==0) { 
            document.getElementById("livesearch").innerHTML="";
            document.getElementById("livesearch").display="none";
            return;
        }

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }  else {  
            // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("livesearch").innerHTML=this.responseText;
                document.getElementById("livesearch").display="block";
            }
        }
        
        xmlhttp.open("GET","getuser.php?q="+str, true);
        xmlhttp.send();
    }
    </script>
    
</html>
