<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/footerpush.css" />
    </head>
    <body>
        <?php include("include/header.inc"); ?>
        <main class="container">
            <div class="contentBox controls">
                <form name="form" method="get" action="grouplist.php">
                    <button type"submit">Go</button>
                    <div class="entry input-group">
                        <input class="form-control" name="users[]" type="text" placeholder="Input a user's ID" />
                    	<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                        </span>
                    </div>

                </form>
            </div>
        </main>

        <?php include("include/footer.inc"); ?>

    </body>

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

    <script>
        $(document).ready(function(){
            $(".nav li:nth-child(2)").addClass("active");
        });
    </script>
</html>
