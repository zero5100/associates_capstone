<?php
	require 'includes/connection.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	@import "stylesheet.css";
</style>
<title>Bug Tracker</title>
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
	<center><h2>Project Bug Results</h2></center><br />
	<?php
	//queries the database to select required fields for displaying. id variable is from the index page, and holds a string of whatever project name the user clicked on.
	$query = "SELECT `bugid`,`bugtype`,`date`,`time`,`description`,`username` FROM `p_" . strtolower($_GET['id']) . "` WHERE bugtype = 'user';";
	$tablename = $_GET['id'];
	$result = mysql_query($query);
	echo "<table border=\"1\">";
	echo "<tr> <th align=\"left\"\" width = 10%\"><font size=\"+1\">BugID</font></th> <th align=\"left\"\" width = 14%\"><font size=\"+1\">Date</font></th> <th align=\"left\"\" width = 11%\"><font size=\"+1\">Time</font></th> <th align=\"left\"\" width = 53%\"><font size=\"+1\">Description</font></th> <th align=\"left\"\" width = 12%><font size=\"+1\">User Name</font></th> </tr>";
	//Loops results from the query while there are results to display.
	while($next = mysql_fetch_array($result)) {
		$bugid = $next['bugid'];
		echo "<tr><td>"; 
		echo "<a href=\"bugresult.php?id=$tablename&idbug=$bugid\">" . $bugid . "</a>";
		echo "</td><td>";
		echo $next['date'];
		echo "</td><td>";
		echo $next['time'];
		echo "</td><td>";
		echo $next['description'];
		echo "</td><td>";
		echo $next['username'];
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