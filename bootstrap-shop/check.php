<?php
session_start();
if(isset($_POST['submit'])){
	$username=$_POST["inputEmail"];
	$password=md5($_POST["inputPassword"]);

	$con = new mysqli("localhost", "root","","registration");
	$sql="SELECT * FROM login WHERE username='$username'";
		$result=$con->query($sql);
		while($data = $result->fetch_assoc()){
			$p = $data['password'];
			if($p===$password){
				echo "success";
				$_SESSION['name']=$data['fullname'];
				header("Location: index.php");
			}
		}
	}else{
		header("Location: index.php");
	}
?>
