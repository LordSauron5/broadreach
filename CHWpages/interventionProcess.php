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
$pID = mysqli_real_escape_string($link, $_REQUEST['patID']);
$drug = mysqli_real_escape_string($link, $_REQUEST['drug']);
$comment = mysqli_real_escape_string($link, $_REQUEST['cmt']);
 
// Attempt insert query execution
$sql = "INSERT INTO intervention (interventionID, patientID, drugAdministered, comments) VALUES (NULL,'$pID', '$drug', '$comment')";
if(mysqli_query($link, $sql)){
    echo "<script>
        alert('Records added successfully.');
        window.location.href='intervention.php';
        </script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);