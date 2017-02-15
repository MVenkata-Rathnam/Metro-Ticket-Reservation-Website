<?php
echo '<link href = "../Styles/home.css" rel = "stylesheet">';
echo '<link href = "../Styles/BankAccount.css" rel = "stylesheet">';
echo "<html>";
echo "<head>";
	echo "<style>";
		echo "table td {";
			echo "width : 200px;";
		echo "}";
		
		echo "input[type=text]{";
			echo "border : 2px solid grey;";
			echo "border-radius : 0px;";
			echo "height : 25px;";
			echo "width : 175px;";
		echo "}";
		
		echo "input[type=password]{";
			echo "border:2px solid grey;";
			echo "border-radius : 0px;";
			echo "height : 25px;";
			echo "width : 175px;";
		echo "}";
	echo "</style>";
echo '<script>';
	echo 'history.pushState(null,null,document.title);';
	echo 'window.addEventListener("popstate",function(){';
	echo 'history.pushState(null,null,document.title);';
echo '});';
echo '</script>';

	echo "<title>"."Welcome to Government"."</title>";
echo "</head>";
echo "<body style = 'height : 1200px'>";
echo '<div class = "MainBox" style = "height : 1150px">';
	echo '<div class = "TopBox">';
	echo '<div class = "Logo">';
		echo '<img src = "../images/emblem1.jpg" alt = "EMBLEM" height = "150" width = "100">';
	echo '</div>';			
	echo '<div class = "Title">';
	echo '<h1>'. 'GOVERNMENT'. '<br>'. 'OF INDIA'.'</h1>';
	echo '<iframe style="overflow:hidden;border:0;margin:0;padding:0;width:205px;height:25px;float:right" src="http://www.clocktag.com/html5/dt191a.html"></iframe>';
	echo '</div>';
	echo '<div id="topnav">';
	echo "<ul>";
	echo '<li class="active"><a href="../index.html">Home</a></li>';
	echo '<li> <a href="../scripts/UserAccountRegistration.php">Registration Portal</a></li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
	echo '<div class = "Heading">';
		echo "<center> <h1> USER LOGIN </h1 ></center>";
	echo '</div>';

	echo '<div class = "AccountDetails">';
		echo '<form name = "User Login" action = "" method ="post">';
			echo '<center> <img src = "../images/secrecy-icon.png" height : "75px" width : "75px"> ';
			echo '<table border = 0>';
				echo '<tr>';
					echo '<td> Username </td>';
					echo '<td> <input type = "text" name = "username" placeholder = "username"> </td>';
				echo '</tr>';
				echo '<tr style = "height : 20px">';
				echo '</tr>';
				echo '<tr>';
					echo '<td> Password </td>';
					echo '<td> <input type = "password" name = "pwd" placeholder = "......."> </td>';
				echo '</tr>';
				
				echo '<tr style = "height : 20px">';
				echo "</tr>";
				
			echo '</table>';
			
			echo '<input type = "submit" name = "Login" value = "Login"> &emsp;&emsp;';
			echo '<input type = "reset" name = "reset" value = "Reset">';
			
			echo '</center>';
	$link = mysqli_connect("localhost","root","","project");

	if($link == false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	if (isset($_POST['Login'])) {
		$user = $_POST['username'];
		$pass = $_POST['pwd'];
	$sql = "SELECT * FROM Login where username ='".$user."'";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			$p = $row['password'];
			if($p === $pass){
				session_start();
				$_SESSION['myAadhar'] = $row['aadhar_number'];
				$_SESSION['myUser'] = $row['username'];
				$_SESSION['tranP'] = $p;
				echo '<script type="text/javascript">';
					echo "window.location.href = 'http://Localhost/GovernmentWebsite/pages/home.html'";
				echo '</script>';
			}
			else{
				echo "<script> alert('Invalid username or password!!!!') </script>";
			}
		}
		else{
			echo "<script> alert('Enter a valid username and password') </script>";
		}
	}else{
		echo "ERROR: Could not able to execute".mysqli_error($link);
	}
	}
	mysqli_close($link);
	
echo '</div>';
echo '<div class = "endSection">';
echo '<div id = "quickLinks">';
	echo '<p style = "font-size : 30px">'.' Services'.' </p>';
	echo '<hr>';
	echo '<p>'.'<a href = "../index.html">'.'Home'. '</a>'.'</p>';
echo'</div>';
echo'<div id ="AboutUs">';
echo '<p style = "font-size : 30px"> About this site </p>';
echo'<hr>';
echo'<p style = "text-align : justify">
	This site is developed in order to provide an easy and stable governance to general people.  This site makes it easy for the people to book tickets for transport by means of rail and also do bank to bank transactions securely.
			</p>';
			
echo '</div>';
echo '<div id = "StayInTouch">';
echo '<p style = "font-size : 30px">'.' Stay in Touch'.' </p>';
echo '<hr>';
echo '<a href = "www.facebook.com"> <img style = "height : 40px; width : 40px" src = "../images/facebook.gif"> </a>';
echo '<a href = "www.youtube.com"> <img style = "margin-left : 20px; height : 40px; width : 40px" src = "../images/youtube.gif"> </a>';
echo'<a href = "www.twitter.com"> <img style = "margin-left : 20px; height : 40px; width : 40px" src = "../images/twitter.gif"> </a>';
echo'<a href = "www.rss.com"> <img style = "margin-left : 20px; height : 40px; width : 40px" src = "../images/rss.gif"> </a>';
echo'<a href = "www.flickr.com" > <img style = "margin-left : 20px; height : 40px; width : 40px" src = "../images/flickr.gif"> </a>';
echo '<br><br>';
echo'<input style = "width : 260px; height : 40px" type="text" name="search" placeholder="Search.."> <img style = "float : right" src = "../images/radiosearch.png" height = "40px" width = "30px">';
echo '</div>';
echo '</div>';
echo '<footer>';
echo '<center> <p style ="font-size : 15px"> <b> Copyright &copy; From Venkata Rathnam Muralidharan @ 2017 </b> </p> </center>';
echo '</footer>';
echo '</div>';
echo "</body>";
echo "</html>";
?>