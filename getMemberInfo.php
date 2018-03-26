<?php
require_once('../mySQLConnect.php');
$query = "SELECT accountNum, password, fName, lName, phone, email, 
creditCard, cardExpiry FROM Account";

$response = @mysqli_query($dbc, $query);
if($response){
	echo '<table align="left" cellspacing="5" cellpadding="8">
	
	<tr><td align="left"><b>Account Number</b></td>
	<td align="left"><b>Password</b></td>
	<td align="left"><b>First Name</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>Phone Number</b></td>
	<td align="left"><b>Email</b></td>
	<td align="left"><b>Credit Card</b></td>
	<td align="left"><b>Card Expiry Date</b></td>';
	
	while($row = mysqli_fetch_array($response)){
		echo'<tr><td align="left">' .
		$row['accountNum'] . '</td><td align="left">' .
		$row['password'] . '</td><td align="left">'  .
		$row['fName'] . '</td><td align="left">'  .
		$row['lName'] . '</td><td align="left">'  .
		$row['phone'] . '</td><td align="left">'  .
		$row['email'] . '</td><td align="left">'  .
		$row['creditCard'] . '</td><td align="left">'  .
		$row['cardExpiry'] . '</td><td align="left">';
		echo '</tr>';	
	}
	echo '</table>';
} else {
	echo "Couldn't issue database query<br />";
	echo mysqli_error($dbc);
}
mysqli_close($dbc)

?>