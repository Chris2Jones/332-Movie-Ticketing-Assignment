<html>
<head>
<title>Add Account</title>
</head>
<body>

<?php
if(isset($_POST['submit'])){
	
	$data_missing = array();
	
	if(empty($_POST['Password'])){
		$data_missing[]='First Name';
	}else{
		$password = trim($POST['Password']);
	}
	
	if(empty($_POST['Fname'])){
		$data_missing[]='First Name';
	}else{
		$fName = trim($POST['Fname']);
	}
	
	if(empty($_POST['Lname'])){
		$data_missing[]='Last Name';
	}else{
		$lName = trim($POST['Lname']);
	}
	
	if(empty($_POST['PhoneNumber'])){
		$data_missing[]='Phone Number';
	}else{
		$phone = trim($POST['PhoneNumber']);
	}
	
	if(empty($_POST['Email'])){
		$data_missing[]='Email';
	}else{
		$email = trim($POST['Email']);
	}

	if(empty($data_missing)){
		require_once('../mySQLConnect.php');
		$query = "INSERT INTO Account (accountNum, password,fName, lName,
		phone, email) VALUES (NULL,?,?,?,?,?)";
		
		$stmt = mysqli_prepare($dbc,$query);
		mysqli_stmt_bind_param($stmt,sssss,$password,$fName,$lName,$phone,$email);
		mysqli_stmt_execute($stmt);
		$affected_rows = mysqli_stmt_affected_rows($stmt);
		if($affect_rows == 1){
			echo "Account Succesfully Created";
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		} else{
			echo "Error Occured<br />";
			echo mysqli_error();
		}
		
	}else{
		echo "You need to enter the following data<br />";
		foreach($data_missing as $missing){
			echo "$missing<br />";
		}
	}
}
?>
</form>
</body>
</html>
