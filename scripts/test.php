<?php
$min1 = 10;
$max1 = 40;
$total = 0;
$singleTicketCost = mt_rand(ceil($min1/10) , floor($max1/10))*10;

echo '<link href = "../Styles/home.css" rel = "stylesheet">';
echo '<link href = "../Styles/BankAccount.css" rel = "stylesheet">';
echo "<html>";
echo "<head>";
echo '<script>';
	echo 'history.pushState(null,null,document.title);';
	echo 'window.addEventListener("popstate",function(){';
	echo 'history.pushState(null,null,document.title);';
echo '});';
echo '</script>';
	echo "<title>"."Welcome to Government"."</title>";
	
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
		echo "<center> <h1> Payment Gateway </h1 ></center>";
	echo '</div>';
	echo '<div class = "AccountDetails">';	
		echo "
		<ul>
			<li style = 'color : red'> Don't close the website without completing payment<br></li>
			<li style = 'color : red'> Select a bank with sufficient balance.<br></li>
			<li style = 'color : red'> Check through all your details for confirmation. <br></li>
			<li style = 'color : red'> After successful transaction, Mark the reference number popped up on behalf of ticket which should be provided at the time of ticket checking. No need of ticket.<br> </li>
			<li style = 'color : red'>Password has to be same as the login password <br> </li>
		</ul>";
	
$link = mysqli_connect("localhost","root","","project");


if($link == false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();

echo "<center>";
echo "<p> <h2> Metro Rail Ticket Booking </h2> </p>";
echo "<hr style ='width : 500px'>";
echo  "<table border = 0px>";
	echo "<tr>";
		echo "<td style = 'width : 150px'> Aadhar Number </td>";
		echo "<td style = 'width : 150px'>".$_SESSION['myAadhar']. "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "</tr>";

	echo "<tr>";
		echo "<td style = 'width : 150px'> Starting Point </td>";
		echo "<td style = 'width : 150px'>".$_SESSION['start']." </td>"; 
	echo "</tr>";
	
	echo "<tr>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td style = 'width : 150px'> Ending Point </td>";
		echo "<td style = 'width : 150px'>".$_SESSION['end']." </td>"; 
	echo "</tr>";
	
	echo "<tr>";
	echo "</tr>";

	echo "<tr>";
		echo "<td style = 'width : 150px'> Unit Ticket Cost </td>";
		echo "<td style = 'width : 150px'>".$singleTicketCost." </td>"; 
	echo "</tr>";
	
	echo "<tr>";
	echo "</tr>";

	echo "<tr>";
		echo "<td style = 'width : 150px'> No of tickets </td>";
		echo "<td style = 'width : 150px'>".$_SESSION['noTickets']." </td>"; 
	echo "</tr>";
	
	echo "<tr>";
	echo "</tr>";
	
	$total = $_SESSION['noTickets']*$singleTicketCost;
	echo "<tr>";
		echo "<td style = 'width : 150px'> Total Ticket cost </td>";
		echo "<td style = 'width : 150px'>". $total ."</td>"; 
	echo "</tr>";
	
	echo "<tr>";
	echo "</tr>";

	
	echo "<tr>";
		echo "<td style = 'width : 150px'> Bank </td>";

$sql = " SELECT * FROM Account_Details where Aadhar_number ='$_SESSION[myAadhar]'";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<center>";
		echo '<form name ="FinalSubmission" method ="post" action = "">';
			echo '<td><select name="Bank" style = "width : 200px">';
			while($row=mysqli_fetch_array($result)){
				echo '<option value="' . htmlspecialchars($row['Bank_Name']) . '">' 
				. htmlspecialchars($row['Bank_Name']) 
			. '</option>';
			}
			echo '</select> </td>';
			echo '</tr>';
			
			echo "<tr>";
			echo "</tr>";
			
			echo "<tr>";
				echo "<td> Password </td>";
				echo "<td> <input style = 'width : 200px;border : 1px solid grey; border-radius : 0px' type = 'password' name = 'Transpass' placeholder = '........'> </td>";
			echo "</tr>";
			
			echo "<tr>";
				echo " <center> <td style = 'width : 150px'> <input type ='submit' name = 'PayNow' value ='pay now'> </td> </center>";
			echo "</tr>";
			echo "</form>";
			
			mysqli_free_result($result);
	}else{
		echo '<script> alert("You have no account linked with your aadhar number") </script>';
	}
	mysqli_close($link);
}

echo "</table>";

$conn = mysqli_connect("localhost","root","","project");

	if($conn == false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	if (isset($_POST['PayNow'])){
		
		if($_SESSION['tranP'] === $_POST['Transpass']){
	$sql1 = "UPDATE Account_Details SET Account_Balance = Account_Balance-$total where Aadhar_Number='$_SESSION[myAadhar]' and Bank_Name ='$_POST[Bank]'";
	if($result = mysqli_query($conn, $sql1)){
		echo '<script> alert("Your reference number : " + Math.floor(Math.random() * (99999999 - 11111111 + 1) + 11111111) );</script>';
		echo '<script type="text/javascript">';
			echo "window.location.href = 'http://Localhost/GovernmentWebsite/pages/home.html'";
		echo '</script>';
	}
	else{
			echo "<script> alert('Unable to Pay!!!!') </script>";
	}
	}
	else{
		echo '<script> alert("Invalid password!!!!") </script>';
	}
mysqli_close($conn);
	}
echo '</div>';
echo "</body>";
echo "</html>";
?>