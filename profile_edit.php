<?php
	session_start();
	include("mysql_connect.inc.php");

	$accNo = $_SESSION['accNo'];

	if (isset($_POST['likes'])) {
    	$likes = json_decode($_POST['likes']);
		for ($i = 0; isset($likes[$i]); $i++) {
			$sql = "INSERT INTO Preference VALUES ($accNo, '$likes[$i]', 'like');";
			mysqli_query($db_link, $sql);
		}
	}
	if (isset($_POST['dislikes'])) {
		$dislikes = json_decode($_POST['dislikes']);
		for ($i = 0; isset($dislikes[$i]); $i++) {
			$sql = "INSERT INTO Preference VALUES ($accNo, '$dislikes[$i]', 'dislike');";
			mysqli_query($db_link, $sql);
		}
	}

	if (isset($_POST['allergies'])) {
    	$allergies = json_decode($_POST['allergies']);
		for ($i = 0; isset($allergies[$i]); $i++) {
			$sql = "INSERT INTO Preference VALUES ($accNo, '$allergies[$i]', 'allergies');";
			mysqli_query($db_link, $sql);
		}
	}

	if (isset($_POST['deletedLikes'])) {
    	$deletedLikes = json_decode($_POST['deletedLikes']);
		for ($i = 0; isset($deletedLikes[$i]); $i++) {
			$sql = "DELETE FROM Preference WHERE food = '$deletedLikes[$i]' AND accNo = $accNo;";
			mysqli_query($db_link, $sql);
		}
	}

	if (isset($_POST['deletedDislikes'])) {
		$deletedDislikes = json_decode($_POST['deletedDislikes']);
		for ($i = 0; isset($deletedDislikes[$i]); $i++) {
			$sql = "DELETE FROM Preference WHERE food = '$deletedDislikes[$i]' AND accNo = $accNo;";
			mysqli_query($db_link, $sql);
		}
	}
	if (isset($_POST['deletedAllergies'])) {
		$deletedAllergies = json_decode($_POST['deletedAllergies']);
		for ($i = 0; isset($deletedAllergies[$i]); $i++) {
			$sql = "DELETE FROM Preference WHERE food = '$deletedAllergies[$i]' AND accNo = $accNo;";
			mysqli_query($db_link, $sql);
		}
	}
	if (isset($_POST['newName'])) {
        $newName = $_POST['newName'];
        $sql = "UPDATE Details SET name = '$newName' WHERE accNo = $accNo;";
        mysqli_query($db_link, $sql);
    }
	if (isset($_POST['newDesc'])) {
        $newDesc = $_POST['newDesc'];
        $sql = "UPDATE Details SET bio = '$newDesc' WHERE accNo = $accNo;";
        mysqli_query($db_link, $sql);
    }
	if (isset($_POST['newImage'])) {
        $newImage = $_POST['newImage'];
        $sql = "UPDATE Details SET image = '$newImage' WHERE accNo = $accNo;";
        mysqli_query($db_link, $sql);
    }
	echo 'success';
?>
