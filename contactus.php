<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    
</head>
<body>
    <div class="container">
        <div class="content-box">
            <form action="#" method="POST">
                <!-- heading/title -->
                <div class="page-header">
                    <h1>Contact Us</h1>
                </div>

                <!-- NAME -->
                <div class="form-group">
                    <label for="fullName">Your full name:</label>
                    <input class="form-control" type="text" name="Name" id="fullName" placeholder="Enter your full name" />
                </div>

                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email">Your email:</label>
                    <input class="form-control" type="email" name="Email" id="email" placeholder="Enter your email" />
                </div>

                <!-- COMMENTS -->
                <div class="form-group">
                    <label for="comments"> Your comments: </label>
                    <textarea class="form-control" name="comments" id="comments" rows="5"></textarea>
                </div>

                <!-- SUBMIT -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>