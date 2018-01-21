<?php
	session_start();
	$conn = mysqli_connect("localhost","root","admin","Examination") or die("Connection failed".mysqli_connect_error());
		date_default_timezone_set("Asia/Kolkata");
		$score = 0;
	$results = $_SESSION["result"];
	$name = $_SESSION["name"];
	$answers = array();
	setcookie("clock", "", time() - 3600);
	for($i=0;$i<sizeof($results);$i++)
	{
		if($results[$i] == 1)
			$score++;
	}
			$t=0;
	$sql = "SELECT * FROM question";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)){
		$answers[$t] = $row["Answer"];
		$t++;
	}
	if(isset($_POST["submit"])){
	$sql = "INSERT INTO user(Name,Score) values('$name',$score)";
	$conn->query($sql);
	header('Location:MainPage.php');
	}
?>
<html>
<head>
<title>Internship</title>
<style>
body {background-color: #DFE1DA;}
#field{
    position: absolute;
    top: 15%;
    left: 35%;
    margin-top: -50px;
    margin-left: -50px;
    height: 500px;
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
#table{
	text-align: center;
	border-collapse: collapse;
	padding: 15px;
	cursor: pointer;
}
</style>
</head>
<body>
	<center>
		<fieldset id="field">
			<h3>ONLINE ENTRANCE TEST</h3>
			<hr>
			<form action="" method="POST" name="form">
			<h4>Congrats <?php echo $name;?> , Your Score : <?php echo $score;?>/10. !!!</h4>
			<hr><br>
			<div style="overflow-x:auto;">
			<table border="1px" id="table">
				<tr><th>Question</th><th>Your Answer</th><th>Correct Answer</th><th>Points Scored</th></tr>
				<?php
				for($i=0;$i<10;$i++)
					{
						$temp = $i+1;
						if($results[$i] == 0)
						echo "<tr style='background-color: #FADBD8  ;'>";
						else
						echo "<tr style='background-color: #D5F5E3  ;'>";
						echo "<td>".$temp."</td><td>".$_SESSION["answer"][$i]."</td><td>".$answers[$i]."</td><td>".$results[$i]."</td></tr>";
					}
				?>
			</table>
		</div>
			<hr><br>
			<input type="submit" name="submit" value="Back To Main Page" id="submitbutton">
		</form>
	</fieldset>
	</center>
</body>
</html>