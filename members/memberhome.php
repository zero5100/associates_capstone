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
<title>Bug Tracker Member Home</title>
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
	<center><h2>Projects</h2></center><br />
	<?php

	$idquery = "SELECT `projectid` FROM `u_" . strtolower($_SESSION['username']) . "`;";
	$userquery = mysql_query($idquery);
	echo "<table border =\"1\">";
	echo "<tr> <th align=\"left\"\" width = 20%\"><font size=\"+1\">Project Name</font></th> <th align=\"left\"\" width = 75%\"><font size=\"+1\">Description</font></th> <th align=\"left\"\" width = 5%\"><font size=\"+1\">Bugs</font</th></tr>";
		while($userid = mysql_fetch_array($userquery)){
			if($userid['projectid'] != '0'){
			$query = "SELECT `projectname`,`description` FROM `projects` WHERE projectid = '" . strtolower($userid['projectid']) . "';";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			$str = $row['projectname'];
	echo "<tr><td>"; 
	echo "<a href=\"memberprojectresults.php?id=$str\">" . $str . "</a>";
	echo "</td><td>";
	echo $row['description'];
	echo "</td><td>";
	$count = "SELECT COUNT(*) as 'count' FROM `p_" . strtolower($str) . "` WHERE `bugtype` = 'User';";
		$countresult = mysql_query($count);
		$numanswer = mysql_fetch_array($countresult);
		echo $numanswer['count'];
	echo"</td></tr>"; 
		}
		}
		echo "</table>";
		
	echo "<center><h2>Groups</h2></center><br />";
		
	$userquery = "SELECT `groupid` FROM `u_" . strtolower($_SESSION['username']) . "`;";
	$queryuser = mysql_query($userquery);
	echo "<table border =\"1\">";
	echo "<tr> <th align=\"left\"\" width = 155px\"><font size=\"+1\">Group Name</font</th> <th align=\"left\"\" width = 635px\"><font size=\"+1\">Description</font></th>";
	while($getgroupid = mysql_fetch_array($queryuser)) {	
		if($getgroupid['groupid'] != '0'){
		$groupquery = "SELECT `groupname`,`groupid`,`description` FROM `groups` WHERE groupid = '" . strtolower($getgroupid['groupid']) . "';";
		$groupresult = mysql_query($groupquery);
		$next = mysql_fetch_array($groupresult);	
	$gstr = $next['groupname'];
	echo "<tr><td>"; 
	echo "<a href=\"membergroupprojects.php?gid=$gstr\">" . $gstr . "</a>";
	echo "</td><td>";
	echo $next['description'];
	echo"</td></tr>";
	}
	}
	echo"</table>";
	?>
	
	</div>
	<div class="content_bottom">
	
		</div>
	<br />

		</div>

</body>
</html>