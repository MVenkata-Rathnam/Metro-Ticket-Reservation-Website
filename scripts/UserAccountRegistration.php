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
echo "<body style = 'height : 1270px'>";
echo '<div class = "MainBox" style = "height : 1265px">';
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
	echo '<li> <a href="../scripts/UserLoginRegistration.php">Login Portal</a></li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
	echo '<div class = "Heading">';
		echo "<center> <h1> New User Registration </h1 ></center>";
	echo '</div>';

	echo '<div class = "AccountDetails" style = "height : 500px">';
	echo "
		<ul>
			<li style = 'color : red'> Please register here to access this website. Note that all fields are mandatory. <br> </li>
			<li style = 'color : red'> Please note that password must contain 6 to 10 characters. <br> </li> 
			<li style = 'color : red'> Password is case-sensitive and spaces are not permitted.</li>
			<li style = 'color : red'> Aadhar Number must be a 16 digit number <br></li>
		</ul>";
		echo '<form name = "UserRegistration" action = "" method ="post">';
			echo '<center> <img src = "../images/sign-up-icon.png" height = "130px" width = "100px"> ';
			echo '<table border = 0>';
				echo '<tr>';
				echo '<tr>';
					echo '<td> Aadhar Number </td>';
					echo '<td> <input type ="text" name ="aadhar" placeholder ="16-digit number"></td>';
				echo '</tr>';
				
				echo '<tr style ="height : 20px">';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td>Username </td>';
					echo '<td> <input type = "text" name = "username" placeholder = "username"> </td>';
				echo '</tr>';
				echo '<tr style = "height : 20px">';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td> Email Id </td>';
					echo '<td> <input type = "text" name = "mail" placeholder = "mailId"> </td>';
				echo '</tr>';
				
				echo '<tr style = "height : 20px">';
				echo '</tr>';
				echo '<tr>';
				
				echo '</tr>';
				echo '<tr>';
				echo '<td> Password </td>';
				echo '<td> <input type = "password" name = "pwd" placeholder = "........"> </td>';
				echo '</tr>';
				
				echo '<tr style = "height : 20px">';
				echo '</tr>';
				echo '<tr>';
					echo '<td> Confirm Password</td>';
					echo '<td> <input type = "password" name = "cpwd" placeholder = "........"> </td>';
				echo '</tr>';
				
				echo '<tr style = "height : 20px">';
				echo "</tr>";
				
			echo '</table>';
			
			echo '<input type = "submit" name = "Register" value = "Register"> &emsp;&emsp;';
			echo '<input type = "reset" name = "reset" value = "Reset">';
			
			echo '</center>';
	$link = mysqli_connect("localhost","root","","project");

	if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	if (isset($_POST['Register'])) {
		$user = $_POST['username'];
		$pass = $_POST['pwd'];
		$confirmpass = $_POST['cpwd'];
		$email = $_POST['mail'];
		$aadhar = $_POST['aadhar'];
		$length = strlen($pass);
		$length2 = strlen($aadhar);
		settype($length,"integer");
		settype($aadhar,"integer");
		session_start();
		$_SESSION['myUser'] = $user;
		$_SESSION['myAadhar'] = $aadhar;
		$_SESSION['tranP'] = $pass;
		if($aadhar === "" || $user === "" || $pass === "" || $confirmpass === "" || $email === ""){
			echo '<script type = "text/javascript">';
				echo 'alert("All the fields mandatory!!!")';
			echo '</script>';
		}
		else if(gettype($aadhar) != 'integer'){
			echo '<script> alert("Aadhar number must contain only numbers!!!") </script>';
		}
		else if($length2 < 16 || $length2 > 16){
			echo '<script> alert("Aadhar number must be length 16") </script>';
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$user)){
			echo '<script> alert("Not a valid name") </script>';
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo '<script> alert("Not a valid email address"); </script>';
		}
		else if($pass != $confirmpass){
			echo '<script> alert("Password and confirm password are not matching") </script>';
		}
		else if($length<=6 || $length>=10){
			echo '<script> alert("Passwords length should be minimum 6 and maximum 10 characters") </script>';
		}
		else if(preg_match('/\s/',$user) ){
			echo '<script> alert("Password should not have any whitespace") </script>';
		}
		else {
			$sql = "insert into Login values('$user','$pass','$aadhar')";
			if(mysqli_query($link,$sql)){
				echo '<script type="text/javascript">';
					echo "window.location.href = 'http://Localhost/GovernmentWebsite/pages/home.html'";
				echo '</script>';
			}
			else{
				echo "<script type ='text/javascript'> alert('ERROR : Connecting to database!!') </script>";
			}
		}
	}
	mysqli_close($link);
		
echo '</div>';
echo '<div class = "endSection" style = "margin-top : 20px">';
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