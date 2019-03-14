<?php
	session_start();
	//$conn = mysqli_connect("localhost","root","admin","Examination") or die("Connection failed".mysqli_connect_error());
		date_default_timezone_set("Asia/Kolkata");
		setcookie("clock", "", time() - 3600);
	if(isset($_POST["submit"]))
	{
		$name = $_POST["name"];
		$_SESSION["name"] = $name;
		$_SESSION["result"] = array(0,0,0,0,0,0,0,0,0,0);
		$_SESSION["answers"]=array("","","","","","","","","","");
		header('Location:TestPage.php?val=1');
	}
?>
<html>
<head>
<title>Internship</title>
<script>
function select(){
		var x = document.forms["form"]["name"].value;
    	if (x == "") {
        alert("Please Enter Your Name");
        return false;
    }
	}
</script>
<style>
body {background-color: #DFE1DA;}
#field{
    position: absolute;
    top: 35%;
    left: 35%;
    margin-top: -50px;
    margin-left: -50px;
    height: 210px;
    width: 500px;
    border-radius:8px;
    border:1px solid black;
}
#h41,,#ans,#link{
	float:left;
}
#submitbutton{
	float:center;
	padding: 10px 24px;
	border-radius: 4px;
	font-size: 16px;
	color: black;
    border: 1px solid #555555;
}
#submitbutton:hover {
    background-color: #555555;
    color: white;
    cursor: pointer;
}
#hr{
border-width: 2px;
}
</style>
</head>
<body>
	<center>
		<fieldset id="field">
			<h3>ONLINE ENTRANCE TEST</h3>
			<hr><br>
			<form action="" method="POST" name="form" onsubmit="return select()">
			Please Enter Name: <input type="text" id="name" name="name" autofocus><br><br>
			<hr><br>
			<input type="submit" name="submit" value="Begin Test" id="submitbutton">
		</form>
	</fieldset>
	</center>
</body>
</html>
