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
		if(empty($_POST['susname']) || empty($_POST['area']) || empty($_POST['inci'])){
				echo'<div class="wronguser"><p>Please Fill Up The Form Correctly!</p></div>';
				$okay=FALSE;
			}
			if($okay==FALSE){
				echo'<a href="sendcom.html" class="button">Back</a>';
			}
			
			//$post=nl2br(htmlentities($_POST['USERID']));
			$a='root';
			$b='';
		//$dbc = mysql_connect('localhost',$a,$b,testdb)or die("bad");
			if ($dbc = mysql_connect('localhost',$a,$b)) {
			//print 'Successfully connected to MySQL!';
			//mysql_close($dbc); // Close theconnection.
			} 
			else {
				print 'Could not connect to MySQL';
			 }
		 	if (@mysql_select_db('testdb',$dbc)) {
				//print '<p>The database has been selected!</p>';
			} 	
			else {
				print '<p>Could not select the database because:<br />' .mysql_error($dbc). '.</p>';
			}
			if ($dbc && $okay) {
				$title = mysql_real_escape_string(trim(strip_tags ($_POST['susname'])),$dbc);
				$entry = mysql_real_escape_string(trim(strip_tags ($_POST['area'])),$dbc);
				$type=  mysql_real_escape_string(trim(strip_tags ($_POST['inci'])),$dbc);


				$target_dir = "uploads/";
    			$target_file = $target_dir . basename($_FILES["imageUpload1"]["name"]);
    			$uploadOk = 1;
    			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			    if (move_uploaded_file($_FILES["imageUpload1"]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["imageUpload1"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }

			    $image=basename( $_FILES["imageUpload1"]["name"],".jpg");
				//echo"$type thia";
				$query = "INSERT INTO suspect (suspect_id, suspect_name, Area_name, Typeof_incident,Image) VALUES (0, '$title', '$entry', '$type','$image')";
				if (@mysql_query($query, $dbc)) {
					//print '<p>entry added!</p>';
				} 
				else {
				 print '<p>Could not add to the table because:<br />' .mysql_error($dbc).'</p>';
				}
				 mysql_close($dbc); // Close the connection.
		 	}
		 	else{
		 		//echo'database erorr occured';
		 	}
			$log="Your complain has been recorded.";
			if($okay){
				
				echo '<h3 id="succ2">'.$log.'</h3>';
				echo'<img src="profile.jpg" class="propic"/>';
				echo'<a href="pro.html" class="button2">Home</a>';
				echo'<a href="Login.html" class="button3">Logout</a>';

			}
		?>
</body>
</html>