<!DOCTYPE html>

<html>
	<head>
		<title>First php scripts</title>
	</head>

	<body>
		<?php 
		$a='root';
		$b='';
		//$dbc = mysql_connect('localhost',$a,$b,testdb)or die("bad");
		if ($dbc = mysql_connect('localhost',$a,$b)) {
			print 'Successfully connected to MySQL!';
			//mysql_close($dbc); // Close theconnection.
		} else {
			print 'Could not connect to MySQL';
		 }
		 
		 if (@mysql_query('CREATE DATABASE testdb', $dbc)) {
				print '<p>The database has been created!</p>';
		} else { // Could not create it.
			print '<p >Could not create the database because</p>';
		}
		 if (@mysql_select_db('testdb',$dbc)) {
	print '<p>The database has been selected!</p>';
	} else {
	print '<p>Could not select the database because:<br />' .mysql_error($dbc). '.</p>';
}
	if ($dbc) {
		$query = 'CREATE TABLE suspect ( suspect_id INT UNSIGNED NOT NULL
			AUTO_INCREMENT PRIMARY KEY,
			 suspect_name VARCHAR(100) NOT NULL,
			 Area_name VARCHAR(100) NOT NULL,
			 Typeof_incident VARCHAR(100) NOT NULL,
			 Image VARCHAR(100) NOT NULL
			)';
		if (@mysql_query($query, $dbc)) {
			print '<p>The table has been created!</p>';
		} else {
		 print '<p>Could not create the table because:<br />' .mysql_error($dbc).'</p>';//<p>The query being run was: ' .$query. '</p>';}
		}
		 mysql_close($dbc); // Close the connection.
		 }
		?>
	</body>
</html>
