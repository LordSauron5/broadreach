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
$exID = mysqli_real_escape_string($link, $_REQUEST['examiner_ID']);
$pID = mysqli_real_escape_string($link, $_REQUEST['patient_ID']);
$cmnt = mysqli_real_escape_string($link, $_REQUEST['comment']);
$date = date('y-m-d');
$time = date("h:i:s");
 
// Attempt insert query execution
$sql = "INSERT INTO examination (examID, examinerID, patientID, comments, date, time) VALUES (NULL,'$exID', '$pID', '$cmnt', '$date', '$time')";
if(mysqli_query($link, $sql)){
    echo "<script>
        alert('Records added successfully.');
        window.location.href='newExam.php';
        </script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);