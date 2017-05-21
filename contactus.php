<?php session_start(); ?>

<!-- Form validation to have fields be mandatory -->

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// define variables and set to empty values
$nameErr = $emailErr = $websiteErr = $commentErr = "";
$name = $email = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Please enter your name.";
    } else {
        $name = test_input($_POST["name"]);
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Your email is required.";
    } else {
        $email = test_input($_POST["email"]);
    }
    
    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $commentErr = "You must enter some comments.";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    /*
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    */
}

?>

<!-- HTML5 Form starts here -->

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
    <link rel="stylesheet" type="text/css" href="css/header.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    
</head>
    
<body>
    <?php include("include/logged_in_header.inc"); ?>
    <div class="container">
        <div class="content-box">
            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="POST">
                <!-- heading/title -->
                <div class="page-header">
                    <h1>Contact Us</h1>
                </div>
                
                <p>Please use our contact us form to submit any comments, questions, or concerns. Entries marked with an <span class="error">asterisk (*) are required.</span></p>

                <!-- NAME -->
                <div class="form-group">
                    <label for="fullName">Your full name:<span class="error"> *</span></label>
                    <input class="form-control" type="text" name="name" id="fullName" placeholder="Enter your full name" />
                    <span class="error"> <?php echo $nameErr; ?></span>
                </div>

                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email">Your email:<span class="error"> *</span></label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" />
                    <span class="error"> <?php echo $emailErr; ?></span>
                </div>

                <!-- COMMENTS -->
                <div class="form-group">
                    <label for="comments"> Your comments:<span class="error"> *</span> </label>
                    <textarea class="form-control" name="comment" id="comments" rows="5"></textarea>
                    <span class="error"> <?php echo $commentErr; ?></span>
                </div>

                <!-- SUBMIT -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php
        echo "<h4>Your Input:</h4>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
    ?>
    
    <?php include("include/footer.inc") ?>
</body>
</html>