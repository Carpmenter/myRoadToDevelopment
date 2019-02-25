<html>
<head>
<?php 
if (!session_id()) session_start();
if (!$_SESSION['logon']){ 
    header("Location:login.php");
    die();
}

?>
<title>CCAST USERS</title>
<meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1"/><link rel="icon" href="https://static.ndsu.edu/favicon.ico" type="image/x-icon" /><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/><link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://static.ndsu.edu/templates/css/ndsu-2011.css" />
<style type="text/css">

.contentwrap {
    width: 80%;
    margin: 0 auto;
}

#cas { /* .body */ background-color: #000; color: #fff; }
#notices h2 { font-size: 1em; }
#notices p { font-size: 1em; }
footer, #copyright { padding: 0; }
@media screen and (min-width: 800px) {
	.sidebar-content p {
		clear: both;
		padding: 10px 10px 10px 50px;
		border: 1px solid #eee;
		background: #fbfbfb url('https://static.ndsu.edu/templates/images/icon.help_yellow.png') 5px 5px no-repeat;
	}
	#univservices { padding-top: 35px; height: 97px; }
}

/* Make the fixed-width template fit on mobile devices */
@media screen and (max-width: 800px) {
	#top_bar_container { background-position: -90px 0; }
	#univservices { height: initial; }
	#univservices h2 { width: 100%; position: initial; }
	#sitenav #homelink { text-decoration: none; }
	#sitenav { width: 100%; float: none; clear: both; }
	#mainnoborder { width: 100%; float: none; }
	#typo3content { font-size: initial; }
	
	body {
		min-width: 0 !important;
		width: auto !important;
		padding-left: 0 !important;
		margin-left: 0 !important;
		margin-right: 0 !important;
		float: none !important;
	}
	body {
		padding-left: 3px !important;
	}
}


table, tr, th {
    border: 1px solid black;
}
th, td {
    padding: 5px;
    text-align: center;    
}
table tr:nth-child(even) {
    background-color: lightgray;
}
table tr:nth-child(odd) {
    background-color: lightgoldenrodyellow;
}
table th {
    color: white;
    background-color: #00634A;
}
input[type=text] {
    box-sizing: border-box;
    border: 2px solid #969796;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
}
input[type=submit] {
    background-color: #00634A;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}
select {
    color: white;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    background-color: #00634A;
    text-align: center;
}

</style>
</head>

<body id="cas" class ="login">
<div id="header">
    <div id="top_bar_container">
      <div id="top_bar">
        <h1><a href="http://www.ndsu.edu/" title="North Dakota State University"><span class="mask">North Dakota State University</span><img src="https://static.ndsu.edu/templates/images/ndsu-print.png" alt=" " title="" height="33" width="309" /></a></h1>
        <br class="clear" /></div><!--/top_bar-->
    </div><!--top_bar_container-->
  </div><!--/header-->

 <div id="container">
    <div id="univservices">
      <div class="contentwrapper">
        <h2 id="bannerwords"><span><a href="users.php">CCAST USERS</a></span></h2>
        </div><!--/contentwrapper-->
    <br class="clear" /></div> <!-- univservices -->


<div id="typo3content">
<div class="contentwrap">
<div id="breadcrumbs"><span class="mask">Location: </span>&nbsp;<a href="http://www.ccast.ndsu.edu/" title="CCAST">CCAST</a>&nbsp;/&nbsp;<span>USERS&nbsp</span>/
    <span align="right"><a href="logout.php" align="right">LOGOUT</a></span>
</div><!--/breadcrumbs-->
<p align="center"><span> Select Option To Search By</span></p>
<?php

?>

<form action="users.php" method="post" align="center">
<select name="searchOption">
  <option value="uidVal">UID</option>
  <option value="lnameVal">Last Name</option>
  <option value="dpartVal">Department</option>
  <option value="ndstatusVal">NDSU Status</option>
  <option value="lockedVal">Locked Accounts</option>
  <option value="sponsorID">Sponsor ID</option>
</select>
<input type="text" name="sbox" placeholder="Search..">
<input type="submit" name"option" />
</form>

<br>

<?php $searchOption = $_POST['searchOption']; ?>

<?php 

    $column = ""; // uid, last_name, department, account_locked, ndsu_status
    $query = "";
    $searchField = $_POST['sbox'];

    if ($searchOption == "uidVal"){
        $column = "UID";
        $query = "SELECT * FROM USERS WHERE uid = '".$searchField."'";
    } else if ($searchOption == "lnameVal") {
        $column = "Last Name";
        $query = "SELECT * FROM USERS WHERE last_name = '".$searchField."'";
    } else if ($searchOption == "dpartVal") { // some departments are very long -> possibly add feature to search by keyword or another dropdown menu
        $column = "Department";
        $query = "SELECT * FROM USERS WHERE department = '".$searchField."'";
    } else if ($searchOption == "ndstatusVal") { // Either expired or Valid -> add input handling in future
        $column = "NDSU Status";
        $query = "SELECT * FROM USERS WHERE ndsu_status = '".$searchField."'";
    }  else if ($searchOption == "sponsorID") {
        $column = "Sponsor ID";
        $query = "SELECT * FROM USERS WHERE sponsor_id = '".$searchField."'";
    } else if ($searchOption == "lockedVal") { // just display all locked accounts
        echo "<p align=\"center\"> Locked Accounts: </p>";
        $column = "Account Locked";
        $query = "SELECT * FROM USERS WHERE account_locked = 'Locked'";
    }
    


$servername = "localhost";
$username = "remote";
$password = "password";
$dbname = "CCAST_USERS";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
} else {
    //echo "Connected successfully";
}

if ($column != "Account Locked" && $_POST["sbox"] == "")
{
    $query = "SELECT * FROM USERS";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table style=\"width:100%\" align=\"center\"><tr align=\"center\"><th>UID</th><th>Last Login</th><th>First Name</th><th>Last Name</th><th>Sponsor ID</th><th>Email</th><th>department</th>
            <th>User Class</th><th>User Status</th><th>Export Control</th><th>Last Reval</th><th>Account Locked</th><th>Account Closed</th><th>Date Added</th><th>NDSU Status</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr align=\"center\"><td>".$row["uid"]."</td><td>".$row["last_login"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["sponsor_id"]."</td>
            <td>".$row["email"]."</td><td>".$row["department"]."</td><td>".$row["user_classification"]."</td><td>".$row["user_status"]."</td><td>".$row["export_control_access"]."</td>
            <td>".$row["last_revalidation"]."</td><td>".$row["account_locked"]."</td><td>".$row["account_closed"]."</td><td>".$row["date_added"]."</td><td>".$row["ndsu_status"]."</td></tr>";
        }

        echo "</table>";
    } else {
        echo "no results";
    }
} else {
    //$searchField = $_POST["sbox"];
    //$query = "SELECT * FROM USERS WHERE uid = '".$searchField."'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table style=\"width:100%\", align=\"center\"><tr align=\"center\"><th>UID</th><th>Last Login</th><th>First Name</th><th>Last Name</th><th>Sponsor ID</th><th>Email</th><th>department</th>
            <th>User Class</th><th>User Status</th><th>Export Control</th><th>Last Reval</th><th>Account Locked</th><th>Account Closed</th><th>Date Added</th><th>NDSU Status</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr align=\"center\"><td>".$row["uid"]."</td><td>".$row["last_login"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["sponsor_id"]."</td>
            <td>".$row["email"]."</td><td>".$row["department"]."</td><td>".$row["user_classification"]."</td><td>".$row["user_status"]."</td><td>".$row["export_control_access"]."</td>
            <td>".$row["last_revalidation"]."</td><td>".$row["account_locked"]."</td><td>".$row["account_closed"]."</td><td>".$row["date_added"]."</td><td>".$row["ndsu_status"]."</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p align=\"center\"> ".$column." Value (". $searchField. ") Not Found In Database!</p>";
    }
}

?>


<br class="clear" /></div><!--/contentwrapper-->
</div> <!-- /typo3content -->

<div id="sflgru"><p>Student Focused. Land Grant. Research University.</p></div>
  <div id="typo3footers" style="background-color: black;">
    <div id="contact">
	<address><p><a href="http://www.ccast.ndsu.edu/" title="Center for Computationally Assisted Science and Technology">Center for Computationally Assisted Science and Technology</a><br/>
	Report a problem: CCAST Support 701.123.4567 / online <a href="support@ccast.ndsu.edu" title="NDSU CCAST SUPPORT">support@ccast.ndsu.edu</a>
	</p></address>
        <p><a href="https://www.ndsu.edu/privacy/">Privacy Statement</a></p>
        <footer>

        </footer>
    </div><!--/contact-->
</div><!--/typo3footers-->

</body>
</html>