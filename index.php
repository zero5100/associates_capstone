<?php
	require 'includes/connection.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	@import "stylesheet.css";
</style>
<title>Bug Tracker Main Page</title>
</head>
<body>
<div id="wrapper">

 <img src="includes/images/header_blank.jpg" alt="header">
		
			<p class="item_login">User Login</p>
			<form action='login.php' method='POST'>
				<input type="text" name="Username" value="Username" style="width: 105px;" />
				<input type="password" name="Password" value="Password" style="width: 105px;" />
				<input type="submit" value="Log In" />
			</form>
		</div>
		
	<div id="content_container">

	<div class="content">
	<center><h2>Projects</h2></center><br />
	<?php
	//query the database to grab required fields and puts them into a mysql query.
	$query = "SELECT `projectname`,`description` FROM `projects` LIMIT 0, 30;";
	$result = mysql_query($query);
	echo "<table border =\"1\">";
	echo "<tr> <th align=\"left\"\" width = 20%\"><font size=\"+1\">Project Name</font></th> <th align=\"left\"\" width = 75%\"><font size=\"+1\">Description</font></th> <th align=\"left\"\" width = 5%\"><font size=\"+1\">Bugs</font></th></tr>";
	//pulls results from the database and loops results while there are results to display.
	while($row = mysql_fetch_array($result)) {
		$str = $row[projectname];
		echo "<tr><td>"; 
		echo "<a href=\"results.php?id=$str\">" . $str . "</a>";
		echo "</td><td>";
		echo $row['description'];
		echo "</td><td>";
	//counts number of bugs per project and displays that number as an integer.
	$count = "SELECT COUNT(*) as 'count' FROM `p_" . strtolower($str) . "` WHERE `bugtype` = 'User';";
		$countresult = mysql_query($count);
		$numanswer = mysql_fetch_array($countresult);
		echo $numanswer['count'];
	echo"</td></tr>"; 
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