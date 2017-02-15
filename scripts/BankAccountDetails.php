<?php
echo '<link href = "../Styles/home.css" rel = "stylesheet">';
echo '<link href = "../Styles/BankAccount.css" rel = "stylesheet">';
echo "<html>";
echo "<head>";
	echo "<title>"."Welcome to Government"."</title>";
echo '<script>';
	echo 'history.pushState(null,null,document.title);';
	echo 'window.addEventListener("popstate",function(){';
	echo 'history.pushState(null,null,document.title);';
echo '});';
echo '</script>';
echo "</head>";
echo "<body style = 'height : 1200px'>";
echo '<div class = "MainBox" style = "height : 1150px">';
	echo '<div class = "TopBox">';
	echo '<div class = "LoginBox">';
		echo '<a href ="../index.html"> <img style ="margin-left : 350px" src = "../images/logout.png" height = "50px" width = "50px">Sign Out</a>';
	echo '</div>';

	echo '<div class = "Logo">';
		echo '<img src = "../images/emblem1.jpg" alt = "EMBLEM" height = "150" width = "100">';
	echo '</div>';			
	echo '<div class = "Title">';
	echo '<h1>'. 'GOVERNMENT'. '<br>'. 'OF INDIA'.'</h1>';
	echo '<iframe style="overflow:hidden;border:0;margin:0;padding:0;width:205px;height:25px;float:right" src="http://www.clocktag.com/html5/dt191a.html"></iframe>';
	echo '</div>';
	echo '<div id="topnav">';
	echo "<ul>";
	echo '<li><a href="../pages/home.html">Home</a></li>';
	echo '<li><a href="../pages/MetroTicketBooking.html">Metro Ticket Booking</a>';
	echo '</li>';
	echo '<li class ="active"><a href="../scripts/BankAccountDetails.php">Bank Account Details</a>';
	echo '</li>';
	echo '<li><a href="../pages/ContactUs.html">Contact Us</a>';
	echo '</li>';
	echo '<li><a href="../pages/feedback.html">Feedback</a>';
	echo '</li>';
	echo '<li><a href="../pages/AboutUs.html">About Us</a>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
	echo '</div>';
	echo '<div class = "Heading">';
		echo "<center> <h1> Details of Bank Accounts linked with your Aadhar number </h1 ></center>";
	echo '</div>';
	echo '<div class = "AccountDetails">';
$link = mysqli_connect("localhost","root","","project");

if($link == false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();
$sql = "SELECT * FROM Account_Details where Aadhar_number = '$_SESSION[myAadhar]'";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<center>";
		echo "<table border = 1 style = 'width : 800px';>";
		echo "<tr style = 'width : 200px; height : 30px'>";
			echo "<th> Bank Name </th>";
			echo "<th> Account Number </th>";
			echo "<th> Account Balance </th>";
		echo "</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr style = 'width : 200px; height : 30px'>";
				echo "<td>".$row['Bank_Name']."</td>";
				echo "<td style = 'color:blue'>".$row['Account_Number']."</td>";
				echo "<td>".$row['Account_Balance']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		echo "</center>";
		mysqli_free_result($result);
	}else{
		echo "<script> alert('You have not yet linked your bank account with your aadhar number!!!') </script>";
		echo "You have not yet linked your bank account with your aadhar number!!!";
	}
	mysqli_close($link);
}
echo '</div>';
echo '<div class = "endSection">';
echo '<div id = "quickLinks">';
	echo '<p style = "font-size : 30px">'.' Services'.' </p>';
	echo '<hr>';
	echo '<p>'.'<a href = "../pages/home.html">'.'Home'. '</a>'.'</p>';
	echo '<p>'.'<a href = "../pages/MetroTicketBooking.html">'.'Chennai Metro'.'</a>'.'<br>'.'</p>';
	echo'<p>'.'<a href = "../pages/DelhiMetro.html">'.'Delhi Metro'.' </a>'.'<br>'.'</p>';
	echo '<p><a href = "../pages/KolkataMetro.html">Kolkata Metro</a><br></p>';
	echo'<p><a href = "../pages/feedback.html">Feedback</a><br></p>';
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
echo '</div>';
echo "</body>";
echo "</html>";
?>