<?php 

header('Content-Type: application/json');

$responce = array();
$result = true;

$fname = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$tour_package = htmlspecialchars($_POST['tour_package']);
$email = htmlspecialchars($_POST['email']);
$msg = htmlspecialchars($_POST['message']);
?>

<?php
// multiple recipients
$to  = 'vtsl@vishvatourssrilanka.com'; // note the comma


// subject
$subject = $tour_package;

// message
$message = '<table border="0" width="500">
	<tr>
		<td>Tour Package</td>
		<td>: '.$tour_package.'</td>
	</tr>
	<tr>
		<td>Full Name</td>
		<td>: '.$fname.'</td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>: '.$phone.'</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: '.$email.'</td>
	</tr>
	<tr>
		<td>Message</td>
		<td>: '.$msg.'</td>
	</tr>
	
</table>
';

// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers

$headers .= 'From: www.vishvatourssrilanka.com <inquiry@vishvatourssrilanka.com>' . "\r\n";


// Mail it
if(!(mail($to, $subject, $message, $headers))){
    $result = false;
}
// echo "<script type='text/javascript' >window.location ='../index.html';</script>";

$responce['result'] = $result;

echo (json_encode($responce));

?>