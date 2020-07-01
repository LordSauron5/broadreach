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
$med = mysqli_real_escape_string($link, $_REQUEST['med']);
$pID = mysqli_real_escape_string($link, $_REQUEST['patient_ID']);
$treatType = mysqli_real_escape_string($link, $_REQUEST['treatmentType']);
$dosage = mysqli_real_escape_string($link, $_REQUEST['dos']);
$freq = mysqli_real_escape_string($link, $_REQUEST['frq']);
$date = date('y-m-d');
 
// Attempt insert query execution
$sql = "INSERT INTO treatment (treatmentID, patientID, treatmentType) VALUES (NULL,'$pID', '$treatType')";
$sql2 = "INSERT INTO prescription (prescriptionID, patientID, medication, dosage, frequency, dateOfPrescription) VALUES (NULL, '$pID','$med','$dosage','$freq', '$date')";
if(mysqli_query($link, $sql)){
    if (mysqli_query($link, $sql2)) {
        echo "<script>
        alert('Records added successfully.');
        window.location.href='treatment.php';
        </script>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);