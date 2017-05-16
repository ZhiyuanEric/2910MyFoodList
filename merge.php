<!DOCTYPE HTML>
<html>
    <head>
        <?php include("include/head.inc"); ?>
    </head>
    <body>
        <?php include("include/logged_in_header.inc"); ?>
        <main class="container">
            <div class="contentBox">
                <form name="form" method="get" action="grouplist.php">
                    <input type="text" name="users" />
                    <button type"submit">Go</button>
                </form>
            </div>
        </main>
    </body>
</html>