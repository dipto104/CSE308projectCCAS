<!DOCTYPE html>
<html>
<head>
	<title>post handling</title>	
	<link href="login.css" rel="stylesheet" type="text/css" />	
</head>
<body>
	<h1 id="para">Central Criminal Administration System</h1>
	<?php
		
			$okay=TRUE;
			echo'<h2 id="para1">Complain List</h2>';
			$a='root';
			$b='';
		//$dbc = mysql_connect('localhost',$a,$b,testdb)or die("bad");
			if ($dbc = mysql_connect('localhost',$a,$b)) {
			//print 'Successfully connected to MySQL!';
			//mysql_close($dbc); // Close theconnection.
			} 
			else {
				//print 'Could not connect to MySQL';
			 }
		 	if (@mysql_select_db('testdb',$dbc)) {
				//print '<p>The database has been selected!</p>';
			} 	
			else {
				print '<p>Could not select the database because:<br />' .mysql_error($dbc). '.</p>';
			}
			if ($dbc) {
				
				$query = 'SELECT * FROM suspect ORDER BY suspect_id ASC';
				if ($result=mysql_query($query, $dbc)) {
					//print '<p>retrived!</p>';
					$count=1;
					while ($row = mysql_fetch_array($result)) {
					echo '<div class="view">';
					echo"<h3>Complain No # $count</h3>";
					 print "<p>suspect_name: {$row['suspect_name']}</p>";
					 echo"<p>Area_name: {$row['Area_name']}<br/>";
					 echo"<p>Type of Incident: {$row['Typeof_incident']}</p>";
					  echo "<tr>";
					  	echo"<td>Suspect Image :---></td>";
					  	echo"<td> </td>";
					  	echo"<td> </td>";
					    echo "<td><img src='uploads/$row[4].jpg' height='180px' width='200px'></td>";
					    echo "</tr>";
						echo'</div>';
					
					 $count++;
					
 					}
				} 
				else {
				 print '<p>Could not read from table:<br />' .mysql_error($dbc).'</p>';
				}
				 mysql_close($dbc); // Close the connection.
		 	}
		 	else{
		 		echo'database erorr occured';
		 	}
		 	echo'<a href="Login.html" class="comlog">Logout</a>';
			echo'<a href="pro.html" class="comhom">Home</a>';
		?>
</body>
</html>