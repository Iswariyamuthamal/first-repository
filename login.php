<?php
error_reporting(0);
session_start();
$connect=mysql_connect("localhost","root","");
$db =mysql_select_db("task1");
if($_POST['submit']!="")
{
	
	
$name = $_POST['name'];

$pass= $_POST['pass'];




$select=mysql_query("SELECT * FROM `registration` WHERE `name`='$name' AND`pass`='$pass'");
$fetch=mysql_fetch_array($select);


if(($fetch['name']==$name) and ($fetch['pass']==$pass))
{
	
	
	$_SESSION['id']=$fetch['id'];
	$_SESSION['name']=$fetch['name'];
	echo"your username and password is matched";
	if($_POST['remember']!=""){
		setcookie("name",$name,time()+3600);
		setcookie("pass",$pass,time()+3600);
	}	
	header("location:welcome.php");
}
else
{
	echo " your username and password is unmatched !!!please check";
}
}


?>
<html>
<body>
	<form method="POST" action="">
		
		<table width="300"border="1"style="background-color:pink">
			<tr>
<td>
NAME :
<input type="text"name="name"id="un"value="<?php echo $_COOKIE['name'];?>">


</td>
</tr>
<tr>
<td>
	PASSWORD :
	<input type="password"name="pass" id="ps"value="<?php echo $_COOKIE['pass'];?>">
</td>
</tr>
<tr>
<td>
	<tr>
	<td>
		<input type="checkbox" name="remember" value="true">Remember me
		<input type="submit"name="submit"value="submit" class="save">
		</td>
		</tr>
		<tr>
	<td>
		<a href="registration.php">SIGN UP</a>
		</td>
		</tr>
	</form>
</body>
</html>

	<script src="jquery-3.1.0.min.js"></script>

	

<script>
$(document).ready(function(){
	$(".save").click(function(){
	var a=$('#un').val();
	var b=$('#ps').val();
	if(a=="" && b=="")
	{
	alert("enter the name and password");
	return false;
}
else if(a!="" && b=="")
{
	alert("enter the password");
	return false;
}
else if(a=="" && b!="")
{
	alert("enter the name ");
	return false;
}
})
})	
</script>
