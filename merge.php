<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/merge.css">
        <link rel="stylesheet" href="css/footerpush.css" />
    </head>
    <body>
        <?php include("include/header.inc"); ?>
        <main class="container">
            <div class="contentBox">
                
                <!-- user list form -->
                <form name="form" method="get" action="grouplist.php">
                    <button type"submit" class="btn btn-primary btn-block">Create group list</button>
                    
                    <!-- user list -->
                    <div class="entry input-group">
                        <input class="form-control" name="users[]" type="text" id="userList" />
                    </div>
                </form>
                <div class="well" id="nameList">
                    
                </div>
                
                <!-- search -->
                <div class="panel panel-primary">
                    <!-- search field -->
                    <div class="panel-heading">
                        <form>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>   
                                <input class="form-control" id="userSearch" type="text" onkeyup="showResult(this.value)"/>
                            </div>
                        </form>
                    </div>

                    <!-- search results -->
                    <div class="panel-body">
                        <div class="list-group" id="livesearch">

                        </div>
                    </div>
                </div>
                

            </div>
        </main>

        <?php include("include/footer.inc"); ?>

    </body>

    <!-- SCRIPTS -->
    
    
    <script>
        var names = [];
        var ids = [];
        
        function addResult(ent) {
            name = ent.getAttribute('username');
            num = ent.getAttribute('userno');
            
            // no point doing a query for the same person
            // more then once
            if(!ids.includes(num)){
                // add to list
                names.push(name);
                ids.push(num);
                
                // add to name list
                $("#nameList").append("<div class=\"nameBlock\" userno=\"" + num + "\" username=\"" + name + "\">" + name + "<a href=\"#\" class=\"delete\" aria-label=\"close\" onclick=\"removeResult(this)\">×</a></div>");
                
                // update search value
                $("#userList").val(ids);
            } 
        };
        
        function removeResult(ent) {
            // get value from the nameblock
            name = ent.parentElement.getAttribute('username')
            num = ent.parentElement.getAttribute('userno')
            
            // remove from list (memory)
            names.splice(names.indexOf(name), 1);
            ids.splice(ids.indexOf(num), 1);
            
            // rerender name / remove div
            nameBlock = ent.parentElement;
            nameBlock.parentElement.removeChild(nameBlock);
            
            // update input values
            $("#userList").val(ids);
        }
        
        // clear the form because it doesn't match with memory on pressing back
        // quick fix
        $( document ).ready(function() {
            $("#userList").val('');
        });
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
