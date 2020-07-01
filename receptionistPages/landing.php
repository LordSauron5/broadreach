<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
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
          <li class="selected"><a href="landing.php">Home</a></li>
          <li><a href="viewPatients.php">View Patients</a></li>
          <li><a href="viewStaff.php">View Staff</a></li>
          <li><a href="registerPatient.php">Register Patient</a></li>
          <li><a href="viewAppointments.php">View Appointments</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
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
        <h1>Welcome back, <?=$_SESSION['fullName']?>!</h1>
        <p>BroadReach is a health solutions company focused on improving the health and well-being of underserved populations across the world. We are consultants and health systems management experts who see more than numbers. </p>
        <p>Using almost two decades of experience and foremost Vantage technology, we design and deliver effective solutions to healthcare problems in emerging markets, empowering stakeholders to make the right decisions and implement the right actions that improve health outcomes and change lives. </p>
        <p>Our experienced has led us to develop two distinct, yet interlinked businesses units namely BroadReach Healthcare, to deliver direct <a>Health Systems Strengthening services</a> and <a>BroadReach Consulting</a>- where we share our lessons learned, expertise and processes with clients to help them boost their results. The impact of our human capital is amplified, disseminated and enabled through our technology partner, Vantage so it can be delivered consistently and at scale.</p>
        <p>BroadReach is a proud Implementing Partner of Vantage Technologies.</p>
        <p>Founded in 2003 by Dr. Ernest Darkoh and Dr. John Sargent, BroadReach is at the forefront of supporting African governments, donors and Ministries of Health in the implementation of Health Systems Strengthening programs. We have worked in over 20 countries on all major continents to support existing service delivery. BroadReach has been recognized internationally as leaders in global healthcare, most recently winning the 2017 Frost & Sullivan Data Analytics Innovation Leadership Award and the 2016 African Leadership Network Award for Entrepreneurship. In 2015, the BroadReach founders were recognized for their social entrepreneurship by the World Economic Forum/Schwab Foundation. </p>
        <p><a>BroadReach:</a> empowering action, changing lives.</p>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="landing.php">Home</a> | <a href="viewPatients.php">View Patients</a> | <a href="viewStaff.php">View Staff</a> | <a href="registerPatient.php">Register Patient</a> | <a href="viewAppointments.php">View Appointments</a> | <a href="../logout.php">Logout</a></li>
      </p>     
       <p>Copyright &copy; Broadreach | <a href="#">Tyron Aricum 2020</a> </p>
    </div>
  </div>
</body>
</html>
