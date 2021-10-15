<?php $conn=new mysqli("localhost","root","","try");?>
<?php
if(isset($_GET['delete'])){
	$name=$_GET['delete'];
	$conn->query("DELETE FROM DEMO WHERE NAME='$name'");
}
$name="";
$password="";
if(isset($_GET['edit'])){
	$name=$_GET['edit'];
	$s=$conn->query("SELECT * FROM DEMO WHERE NAME='$name'");
	$row=$s->fetch_array();
	$password=$row['password'];
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="POST" action="page.php">
        	<div class="form-group" style="padding-top: 20px">
	            <label for="name">User name:</label>
	            <input type="text" name="name" value="<?php echo $name?>">
	        </div>
	        <div class="form-group">
	            <label for="password">Password: </label>
	            <input type="text" name="password" value="<?php echo $password?>">
	        </div><br>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <?php
                if(isset($_POST["submit"])){
                    $name=$_POST["name"];
                    $password=$_POST["password"];
                    $result=$conn->query("SELECT * FROM DEMO WHERE name='$name'")->fetch_assoc();
                    if($conn->query("SELECT * FROM DEMO WHERE name='$name'")->num_rows!=0){
                    	$s="UPDATE `demo` SET `name`='$name',`password`='$password' WHERE name='$name'";
                    	if($conn->query($s)){
                    		echo "Updated";
                    	}
                    	else{
                    		echo "Couldn't Update";
                    	}
                    }
                    else{
	                    $s="INSERT INTO `demo`(`name`, `password`) VALUES ('".$name."','".$password."')";
	                    if($conn->query($s))
	                    {
	                        echo "Inserted";
	                    }
	                    else
	                    {
	                        echo "CouLdn't Insert";
	                    }
	                }

                }
            ?>
        </form>
        <br>
        <div class="row justify-content-center">
            <table class="table table-borderless">
                    <tr>
                        <td>Name</td>
                        <td>Password</td>
                        <td>Options</td>
                    </tr>
                <?php
                $sql="SELECT * FROM demo ORDER BY NAME ASC";
                $res=$conn->query($sql);
                while($row=$res->fetch_assoc()): ?>
                    <tr>
	                    <td><?php echo "<p>".$row['name']."</p>";?></td>
	                    <td><?php echo "<p>".$row['password']."</p>";?></td>
	                    <td><a  href= "page.php?edit=<?php echo $row['name'];?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;
	                    <a href="page.php?delete=<?php echo $row['name'];?>" class='btn btn-danger'>Delete</a></td>
                	</tr>
                <?php endwhile;?>


            </table>
        </div>
    </div>

</body>
</html>