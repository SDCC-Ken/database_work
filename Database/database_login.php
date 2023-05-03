<?php
session_start();
include("server_config.php");
switch ($_POST['Access_Right']){
	case "Student":
		if($_POST['loginname']==$_POST['password']){
			$SQL1="SELECT Student_ID FROM student WHERE Student_ID = '".$_POST['loginname']."'";
			if ($result=mysqli_query($con,$SQL1))
				$rowcount1=mysqli_num_rows($result);
			if ($rowcount1 > 0){
				$_SESSION['login']=true;
				$_SESSION['SID']=$_POST['loginname'];
				header("Location:database_index_s.php");
			};
		};
		break;
	case "Lecturer":
		if($_POST['loginname']==$_POST['password']){
			$SQL2="SELECT Lecturer_ID FROM lecturer WHERE Lecturer_ID = ".$_POST['loginname'];
			if ($result=mysqli_query($con,$SQL2))
				$rowcount2=mysqli_num_rows($result);
			if ($rowcount2 > 0){
				$_SESSION['login']=true;
				$_SESSION['LID']=$_POST['loginname'];
				header("Location:database_index_l.php");
			};
		};
		break;
	case "Admin":
		if($_POST['loginname']= "admin" && $_POST['password']=="admin"){
			$_SESSION['login']=true;
			header("Location:database_index_a.php");
		}
		break;
	case "Club":
		if($_POST['loginname']==$_POST['password']){
			$SQL3="SELECT Club_ID FROM club WHERE Club_ID = ".$_POST['loginname'];
			if ($result=mysqli_query($con,$SQL3))
				$rowcount3=mysqli_num_rows($result);
			if ($rowcount3 > 0){
				$_SESSION['CID']=$_POST['loginname'];
				$_SESSION['login']=true;
				header("Location:database_index_c.php");
			};
		};
		break;
	default:
		header("Location:database_index.php");
};
?>