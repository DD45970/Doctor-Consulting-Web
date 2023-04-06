<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.html?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.html?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM doctors WHERE USER='$uname' AND PASS='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['USER'] === $uname && $row['PASS'] === $pass) {
            	$_SESSION['USER'] = $row['USER'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	
            	switch ($_SESSION['USER']) {
					case "doc1":
						header("Location: doc1.php");
						break;
					case "doc2":
						header("Location: doc2.php");
						break;
					case "doc3":
						header("Location: doc3.php");
						break;
					case "doc4":
						header("Location: doc4.php");
						break;
					case "doc5":
						header("Location: doc5.php");
						break;
					case "doc6":
						header("Location: doc6.php");
						break;
					case "doc7":
						header("Location: doc7.php");
						break;
					case "doc8":
						header("Location: doc8.php");
						break;
					case "doc9":
						header("Location: doc9.php");
						break;
					case "doc10":
						header("Location: doc10.php");
						break;
					default:
						header("Location: error.html");
						break;
				}
		        exit();
            }else{
				header("Location: login.html?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: login.html?error=Incorrect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.html");
	exit();
}
?>
