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
	<center><h2>Group Projects</h2></center><br />
	<?php
	$query = "SELECT `projectid` FROM `g_" . strtolower($_GET['gid']) . "`;";
	$result = mysql_query($query);
	echo "<table border =\"1\">";
	echo "<tr> <th align=\"left\"\" width = 20%\"><font size=\"+1\">Project Name</font></th> <th align=\"left\"\" width = 75%\"><font size=\"+1\">Description</font></th> <th align=\"left\"\" width = 5%\"><font size=\"+1\">Bugs</font></th></tr>";
	while($row = mysql_fetch_array($result)) {
		if($row['projectid'] != '0'){
		$pquery = "SELECT `projectname`,`description` FROM `projects` WHERE projectid = '" . strtolower($row['projectid']) . "';";
		$presult = mysql_query($pquery);
		$next = mysql_fetch_array($presult);
		$str = $next['projectname'];
	echo "<tr><td>"; 
	echo "<a href=\"memberprojectresults.php?id=$str\">" . $str . "</a>";
	echo "</td><td>";
	echo $next['description'];
	echo "</td><td>";
		$count = "SELECT COUNT(*) as 'count' FROM `p_" . strtolower($str) . "` WHERE `bugtype` = 'User';";
		$countresult = mysql_query($count);
		$numanswer = mysql_fetch_array($countresult);
		 echo $numanswer['count'];
	echo"</td></tr>";
		}
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