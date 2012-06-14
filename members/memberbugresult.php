<?php
	require '../includes/connection.php';
	session_start();
	if(!$_SESSION['username'])
	die("You must log in to view this page.");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	@import "../stylesheet.css";
</style>
<title>Bug Tracker</title>
</head>
<body>
<div id="wrapper">

 <img src="../includes/images/header_blank.jpg" alt="header">
		
			<p class="item_login">User: <?php echo $_SESSION['username'];?></p>
			<form action='../logout.php' method='POST'>
				<input type="submit" value="Log Out" />
			</form>
		</div>

	<div id="content_container">
    
	<div class="content">
	<center><h2>Bug Details</h2></center><br />
	<?php
	$query = "SELECT * FROM `p_" . strtolower($_GET['id']) . "` WHERE bugid = '" . $_GET['idbug'] . "'";
	$result = mysql_query($query);
	echo "<table border =\"1\">";
	echo "<tr> <th align=\"left\"\" width = 8%\"><font size=\"+1\">BugID</font></th> <th align=\"left\"\" width = 13%\"><font size=\"+1\">Date</font></th> <th align=\"left\"\" width = 11%\"><font size=\"+1\">Time</font></th> <th align=\"left\"><font size=\"+1\">Description</font></th> <th align=\"left\"\" width = 13%\"><font size=\"+1\">User Name</font></th> <th align=\"left\"\" width = 11%><font size=\"+1\">Status</font></th> <th align=\"left\"\" width = 13%\"><font size=\"+1\">User Comment</font></th> <th align=\"left\"\" width =  13%\"><font size=\"+1\">Dev Comment</font></th></tr>";
	while($next = mysql_fetch_array($result)) {
		echo "<tr><td>"; 
		echo $next['bugid'];
		echo "</td><td>";
		echo $next['date'];
		echo "</td><td>";
		echo $next['time'];
		echo "</td><td>";
		echo $next['description'];
		echo "</td><td>";
		echo $next['username'];
		echo "</td><td>";
		echo $next['status'];
		echo "</td><td>";
		echo $next['usercomment'];
		echo "</td><td>";
		echo $next['devcomment'];
		echo "</td></tr>"; 
		}
	echo "</table>";

	?>
	
	</div>
	<div class="content_bottom">
	
		</div>
	<br />

		</div>

</body>
</html>