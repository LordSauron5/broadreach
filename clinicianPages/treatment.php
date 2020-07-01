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
$sql = "SELECT appointment.appointmentID, appointment.appointmentType, 
appointment.date, appointment.time, patient.patientID, 
patient.fname, staff.staffID, staff.lname 
FROM appointment 
JOIN patient ON appointment.patientID = patient.patientID 
JOIN staff on appointment.chwID = staff.staffID ";
$query=mysqli_query($con,$sql);
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Broadreach</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="landing.php">Broadreach<span class="logo_colour">Hospital</span></a></h1>
          <h2>Empowering Action. Changing Lives.</h2>
        </div>
      </div>
      <div id="menubar">
      <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="landing.php">Home</a></li>
          <li><a href="viewPatients.php">View Patients</a></li>
          <li><a href="newExam.php">New Exam</a></li>
          <li><a href="viewDiagnosticTest.php">View Diagnosis</a></li>
          <li class="selected"><a href="treatment.php">Treatment</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>Latest News</h3>
            <h4>New Website Launched</h4>
            <h5>February 1st, 2014</h5>
            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="#">link 1</a></li>
              <li><a href="#">link 2</a></li>
              <li><a href="#">link 3</a></li>
              <li><a href="#">link 4</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Search</h3>
            <form method="post" action="#" id="search_form">
              <p>
                <input class="search" type="text" name="search_field" value="Enter keywords....." />
                <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
              </p>
            </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>New Prescription</h1>
        <div class="form_settings">
            <form action="treatmentProcess.php" method="post">
            <p><span>patientID</span><input class="contact" type="text" name="patient_ID" value="" required/></p>
            <p><span>treatmentType</span><select class="contact" id="treatmentType" name="treatmentType"></p>
                <option value="Clinical Trial">Clinical Trial</option>
                <option value="Chemo Therapy">Chemo Therapy</option>
                <option value="Radiation Therapy">Radiation Therapy</option>
                <option value="Immunotherapy">Immunotherapy</option>
            </select>
            <p><span>Medication</span><input class="contact" type="text" name="med" value="" required/></p>
            <p><span>Dosage</span><input class="contact" type="text" name="dos" value="" required/></p>
            <p><span>Frequency</span><input class="contact" type="text" name="frq" value="" required/></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
            </form>
          </div>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>
      <a href="newExam.php">New Exam</a> | <a href="viewDiagnosticTest.php">View Diagnosis</a> | <a href="treatment.php">Treatment</a> | <a href="../logout.php">Logout</a></p>
      <p>Copyright &copy; Broadreach | <a href="#">Tyron Aricum 2020</a> </p>
    </div>
  </div>
</body>
</html>
