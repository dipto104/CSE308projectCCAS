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
		if(empty($_POST['USERID'])){
				echo'<div class="wronguser"><p>please enter your Username again</p></div>';
				$okay=FALSE;
			}
			if(empty($_POST['password'])){
				echo'<div class="wrongpass"><p>please enter your password again</p></div>';
				$okay=FALSE;
			}
			if($okay==FALSE){
				echo'<a href="Login.html" class="button">Back</a>';
			}
			
			$post=nl2br(htmlentities($_POST['USERID']));
			$log="logged in as ".$post;
			if($okay){
				//print"<h1>Logged in as $post </h1>";
				echo '<h3 id="succ">'.$log.'</h3>';
				echo'<img src="profile.jpg" class="propic"/>';
				echo'<a href="sendcom.html" class="button2">Send Complaint</a>';
				echo'<a href="Login.html" class="button3">Logout</a>';
				echo'<a href="viewcom.php" class="button4">View Complaint</a>';

			}
		?>
</body>
</html>