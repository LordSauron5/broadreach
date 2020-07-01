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
JOIN staff on message.chwID = staff.staffID
WHERE message.chwID = '" . $_SESSION['name'] . "' ORDER BY message.date DESC";
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
          <li><a href="registerPatient.php">Register Patient</a></li>
          <li><a href="patientList.php">Patient List</a></li>
          <li><a href="videos.php">Videos</a></li>
          <li><a href="intervention.php">Intervention</a></li>
          <li class="selected"><a href="messages.php">Messages</a></li>
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
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="landing.php">Home</a> | <a href="registerPatient.php">Register Patient</a> | <a href="patientList.php">Patient List</a> | <a href="videos.php">Videos</a> | <a href="intervention.php">Intervention</a> | <a href="messages.php">Messages</a> | <a href="../logout.php">Logout</a></p>
      
      <p>Copyright &copy; Broadreach | <a href="#">Tyron Aricum 2020</a> </p>
    </div>
  </div>
  <script>
        function searchTable() {
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("content");
            tr = table.getElementsByTagName("tr");
          
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {

                td = tr[i].getElementsByTagName("td");
            
                if(td.length > 0){ // to avoid th
            
                   if (td[0].innerHTML.toUpperCase().indexOf(filter) > -1 || td[1].innerHTML.toUpperCase().indexOf(filter) > -1 || td[2].innerHTML.toUpperCase().indexOf(filter) > -1
                   || td[3].innerHTML.toUpperCase().indexOf(filter) > -1 || td[4].innerHTML.toUpperCase().indexOf(filter) > -1){
                     tr[i].style.display = "";
                   } else {
                     tr[i].style.display = "none";
                   }
            
                }
             }
        }
        </script>
</body>
</html>
