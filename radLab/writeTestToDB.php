<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'broadreach';
// Try and connect using the info above.
$link = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$testType = mysqli_real_escape_string($link, $_REQUEST['testType']);
$testConductor = mysqli_real_escape_string($link, $_REQUEST['conductor']);
$patient = mysqli_real_escape_string($link, $_REQUEST['patientID']);
$roomNo = mysqli_real_escape_string($link, $_REQUEST['room']);
$comments = mysqli_real_escape_string($link, $_REQUEST['comment']);
$date = date('y-m-d');
$time = date("h:i:s");
 
// Attempt insert query execution
$sql = "INSERT INTO diagnostictest (testID, testType, testConductor, roomNo, patientID, comments, date, time) VALUES 
(NULL,'$testType', '$testConductor', '$roomNo', '$patient', '$comments', '$date', '$time')";
if(mysqli_query($link, $sql)){
    echo "<script>
        alert('Records added successfully.');
        window.location.href='createTest.php';
        </script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);