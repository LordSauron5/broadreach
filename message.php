<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'broadreach';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$sql = "SELECT message.messageContent, message.date, message.time
FROM message 
JOIN patient on message.patientID = patient.patientID
WHERE message.patientID = '" . $_SESSION['name'] . "' ORDER BY message.date DESC";
$query=mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>MomConnect</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>MomConnect</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="message.php"><i class="fas fa-envelope-square"></i>Messages</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Messages:</h2>
            <p>Here are your messsages, <?=$_SESSION['fullName']?>!</p>
            
            <?php
            $output = '<table id = "content" class="table" bordered="1">
            <tr>
                <th>Message</th>
                <th>date</th>
                <th>time</th>
            </tr>';
            echo $output;
            while ($row = $query->fetch_assoc()){
                echo '<tr>';
                foreach($row as $value) echo "<td>$value</td>";
                echo '</tr>';
                }
            echo'</table>';
        ?>
		</div>
	</body>
</html>