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
echo "<body style = 'height : 900px; background-size : 100%'>";
echo '<div class = "MainBox" style = "height : 800px">';
	echo '<div class = "TopBox" style = "height : 160px">';
	echo '<div class = "Logo">';
		echo '<img src = "../images/emblem1.jpg" alt = "EMBLEM" height = "150" width = "100">';
	echo '</div>';			
	echo '<div class = "Title">';
	echo '<h1>'. 'GOVERNMENT'. '<br>'. 'OF INDIA'.'</h1>';
	echo '<iframe style="overflow:hidden;border:0;margin:0;padding:0;width:205px;height:25px;float:right" src="http://www.clocktag.com/html5/dt191a.html"></iframe>';
	echo '</div>';
	echo '</div>';
	echo '<div class = "Heading">';
		echo "<center> <h1> Bank Account Details</h1 ></center>";
	echo '</div>';
	echo '<div class = "AccountDetails">';	
	
	
$link = mysqli_connect("localhost","root","","project");

if($link == false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();

$_SESSION['start'] = $_POST['stationStart'];
$_SESSION['end'] = $_POST['stationEnd'];
$_SESSION['noTickets'] = $_POST['noOfTickets'];
$_SESSION['date'] = $_POST['date'];

//echo $_SESSION['start'];

$sql = " SELECT*FROM Account_Details where Aadhar_number ='$_SESSION[myAadhar]'";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<center>";
		echo "<table border = 1 style = 'width : 800px';>";
		echo "<tr style = 'width : 200px; height : 30px'>";
			echo "<th> Bank Name </th>";
			echo "<th> Account Number </th>";
			echo "<th> Account Balance </th>";
			echo "<th> Payment </th>";
		echo "<tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr style = 'width : 200px; height : 30px'>";
				echo "<td>".$row['Bank_Name']."</td>";
				echo "<td style = 'color:blue'>".$row['Account_Number']."</td>";
				echo "<td>".$row['Account_Balance']."</td>";
				echo '<td> <center> <form name = "Payment" action= "test.php"> <input type = "submit" name ="Pay"  value = "Pay Now"> &emsp; </form> </center> </td>';
			echo "</tr>";
		}
		echo "</table>";
		echo "<br><br>";
		echo '<form name ="Cancel" action ="../pages/MetroTicketBooking.html"> <input type = "submit" name = "Cancel" value = "Cancel"> </form>';
		
		echo "</center>";
		mysqli_free_result($result);
	}else{
		echo "<script> alert('You have not yet linked your bank account with your aadhar number!!!') </script>";
		echo '<script type="text/javascript">';
			echo "window.location.href = 'http://Localhost/GovernmentWebsite/pages/home.html'";
		echo '</script>';
		
	}
	mysqli_close($link);
}
echo '</div>';
echo "</body>";
echo "</html>";
?>