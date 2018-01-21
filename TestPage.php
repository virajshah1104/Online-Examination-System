<?php
	session_start();
	$conn = mysqli_connect("localhost","root","admin","Examination") or die("Connection failed".mysqli_connect_error());
		date_default_timezone_set("Asia/Kolkata");
		$imageview = 0;
		$val = $_GET["val"];
		if(isset($_COOKIE["clock"]))
			$clock = $_COOKIE["clock"];
		else
			$clock = 300;
		$sql = "SELECT * FROM Question WHERE Id=".$val;
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
			$question = $row["Question"];
			$a1 = $row["A1"];
			$a2 = $row["A2"];
			$a3 = $row["A3"];
			$a4 = $row["A4"];
			$image = $row["Image"];
			$answer = $row["Answer"];
			if($image != null)
				$imageview = 1;
	if(isset($_POST["submit"]))
	{
		$temp = $val - 1;
		$ans = $_POST["q"];
		$_SESSION["answer"][$temp]=$ans;
		if($ans == $answer)
		{
			$_SESSION["result"][$temp] = 1;
		}
		else
		{
			$_SESSION["result"][$temp] = 0;
		}
		if($val == 10)
			header('Location:Result.php');
		else
			header('Location:TestPage.php?val='.($val+1));
	}
?>
<html>
<head>
<title>Internship</title>
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        var temp = timer-1;
        document.cookie = "clock="+temp;
        if (--timer < 0) {
        	alert("Times Up");
            location.href="Result.php";
        }
    }, 1000);
}
</script>
<script>
	window.onload = function () {
    var fiveMinutes = <?php echo $clock; ?>,
    display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
	};

	function select(){
		var radios = document.getElementsByName("q");
		var formValid = false;
		var i = 0;
    	while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    	}
    	if (!formValid) alert("Please Select Your Answer !!!");
    	return formValid;
	}
	</script>
<style>
body {background-color: #DFE1DA;}
<?php
echo "#field{";
    echo "position: absolute;";
    echo "top: 35%;";
    echo "left: 35%;";
    echo "margin-top: -50px;";
    echo "margin-left: -50px;";
    echo "border-radius:8px;";
    echo "border:1px solid black;";
    if($imageview == 1)
    	echo "height: 420px;";
	else
		echo "height: 320px;";
    echo "width: 500px;";
echo "}";
?>
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
#timer{
	float:right;
	text-align: center;
	align-content: center;
	text-align: center;
	height:40px;
	width:130px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	border-radius:8px;
    border:1px solid black;
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
	<fieldset id = "timer">
	<h4>Time Left : <span id="time"></span></h4>
	</fieldset>
	<center>
		<fieldset id="field">
			<h3>ONLINE ENTRANCE TEST</h3>
			<hr>
			<form action="" method="POST" name="form" onsubmit="return select()">
			<?php echo "<h4 id='h41'>Q".$val." ".$question."</h4>"; ?>
			<hr>
			<?php
				if($imageview == 1)
				{
					echo "<img style='width:100px;height:100px;' src='data:image/jpeg;base64,".base64_encode($image)."'/>";  				
					echo "<hr>";
				}
			?>
			<ul class="answers">
				<table>
					<tr><td>A)</td><td><input type="radio" name="q" id="q" value="<?php echo $a1;?>" id="q1a"><?php echo $a1;?></td></tr>
					<tr><td>B)</td><td><input type="radio" name="q" id="q" value="<?php echo $a2;?>" id="q1b"><?php echo $a2;?></td></tr>
					<tr><td>C)</td><td><input type="radio" name="q" id="q" value="<?php echo $a3;?>" id="q1c"><?php echo $a3;?></td></tr>
					<tr><td>D)</td><td><input type="radio" name="q" id="q" value="<?php echo $a4;?>" id="q1d"><?php echo $a4;?></td></tr>
				</table>
			</ul>
			<hr>
			<input type="submit" name="submit" value="Next   ->" id="submitbutton">
		</form>
	</fieldset>
	</center>
</body>
</html>