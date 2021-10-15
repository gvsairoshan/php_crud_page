<?php $conn=new mysqli("localhost","root","","try")or die(mysqli_error($conn)); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h1>PHP Practice</h1>
		<form method="POST" action="sidepage.php">
			<div class="form-group">
			<label for="covid">covid positive</label>
			<input type="radio" name="covid" value="YES">YES
			<input type="radio" name="covid" value="NO">NO
			<input type="radio" name="covid" value="MAYBE">MAYBE
			</div>
			<button type="submit" class="btn btn-success" name="submit">Save</button>
		</form>
		<?php 
		if(isset($_POST["submit"])){
			$name=$_POST["covid"];
			echo $name;
		}
		?>
	</div> 
</body>
</html>