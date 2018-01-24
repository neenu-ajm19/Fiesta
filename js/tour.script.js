function tour(id)
{
	var newid=id+1;
	if(newid==8)
	{
		document.cookie = "tour=1;";
		alert('Tour Finished, You will be redirected to the Dashboard');
		window.location="user_dash.php";
	}
		
	else
	{
		document.cookie = "tour="+newid+";";
		window.location="tour_vendor_list.php";
	}
		
}

function starttour()
{
	document.cookie = "tour=1;";
	alert('Starting Tour');
	window.location="tour_vendor_list.php";
}