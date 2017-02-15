function isValidDate()
{
    var dateString = document.Ticket.date.value;
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    var parts = dateString.split("/");
    var day = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[2], 10);

    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    return day > 0 && day <= monthLength[month - 1];
};

function validate()
{
var start = document.Ticket.stationStart.value;
var end = document.Ticket.stationEnd.value;
var n = document.Ticket.noOfTickets.value;
if(start == end){
	alert("Starting point and ending point has to be different!!!");
	document.Ticket.stationEnd.focus();
	return false;
}
if(document.Ticket.noOfTickets.value == ""){
	alert("Please provide the number of tickets!!!");
	document.Ticket.noOfTickets.focus();
	return false;
}
if(document.Ticket.date.value == ""){
	alert("Please provide a valid date!!!");
	document.Ticket.date.focus();
	return false;
}
var regex=/^[0-9]+$/;
if(!n.match(regex)){
	alert('Please provide a valid number for number of tickets!!!');
	document.Ticket.noOfTickets.focus();
	return false;
}
if(n < 1){
	alert('The number of tickets has to be greater than zero!!!');
	document.Ticket.noOfTickets.focus();
	return false;
}
if(isValidDate() == false){
	alert("Please provide a valid date of format (DD/MM/YYYY) !!!");
	document.Ticket.date.focus();
	return false;
}
return (true);
};