<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("include/head.inc"); ?>
    </head>
    <body>
        <?php include("include/header.inc"); ?>
        <main class="container">
            <div class="contentBox controls">
                <form name="form" method="get" action="grouplist.php">
                    <button type"submit">Go</button>
                    
                    <div class="entry input-group">
                        <input class="form-control" name="users[]" type="text" placeholder="Input a user's ID" onkeyup="showResult(this.value)" />
                        
                    	<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                        
                        
                    </div>
                    
                    
                </form>
                <div id="livesearch"></div>

                
            </div>
        </main>

        <?php include("include/footer.inc"); ?>

    </body>

    <!-- SCRIPTS -->
    
    
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
    
    
    <script>
    // see that page for src
    // https://bootsnipp.com/snippets/featured/dynamic-form-fields-add-amp-remove-bs3
    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e){
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });
    </script>
</html>
