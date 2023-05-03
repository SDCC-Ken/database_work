<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.box{
	width: 50%;
	left: 25%;
	position: absolute;
	background: #FFF;
	border: solid 1px #cccccc;
}
</style>
<title>College Management System</title>
</head>
<body>
<p align="center">
<img src="icon.jpg" alt="icon.png" width="100" height="100" />
<font size="+6">College Management System</font> v4.2(Jelly Bean)</p>
<p align="center">&nbsp;</p>
<div class="box">
<font size="+1">
<form id="form1" name="form1" method="post" action="database_login.php">
<p align="center">Login name:<input type="text" name="loginname" id="loginname" /></p>
<p align="center">Password:<input type="password" name="password" id="password" /></p>
<p align="center">
</p>
<table width="100%">
  <tr>
    <td width="25%"><label>
      <input type="radio" name="Access_Right" value="Student" id="Access_Right_0" />
      Student</label></td>
    <td width="25%"><label>
      <input type="radio" name="Access_Right" value="Club" id="Access_Right_1" />
      Club</label></td>
    <td width="25%"><label>
      <input type="radio" name="Access_Right" value="Lecturer" id="Access_Right_2" />
      Lecturer</label></td>
    <td width="25%"><label>
      <input type="radio" name="Access_Right" value="Admin" id="Access_Right_3" />
      Admin</label></td>
  </tr>
</table>
<p align="center"></p>
<p align="center"><input  type="submit" name="Check" id="Check" value="Login" /></p>
<p align="center"><a href="forget_password.html" target="new">Forget Password</a></p>
</form>
</font>
</div>
</body>
</html>