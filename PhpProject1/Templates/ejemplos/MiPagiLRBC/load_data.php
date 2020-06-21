<?php 
if($_POST['page']) 	{ 
	$page = $_POST['page']; 
	$cur_page = $page; 
	$page -= 1; 
	$per_page = 15; // Per page records 
	$previous_btn = true; 
	$next_btn = true; 
	$first_btn = true; 
	$last_btn = true; 
	$start = $page * $per_page; 
	include"db.php"; 
	$query_pag_data = "SELECT msg_id,message from messages LIMIT $start, $per_page"; 
	$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error()); 
	$msg = ""; 
	
	
	
	
	while ($row = mysql_fetch_array($result_pag_data))  
	{ 
	$htmlmsg=htmlentities($row['message']); //HTML entries filter 
	$msg .= "<li><b>" . $row['msg_id'] . "</b> " . $htmlmsg . "</li>"; 
	} 
	
	
	
	$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data 
	/* -----Total count--- */ 
	$query_pag_num = "SELECT COUNT(*) AS count FROM messages"; // Total records 
	$result_pag_num = mysql_query($query_pag_num); 
	$row = mysql_fetch_array($result_pag_num); 
	$count = $row['count']; 
	$no_of_paginations = ceil($count / $per_page); 
	/* -----Calculating the starting and endign values for the loop----- */ 
	
	//Some Code. Available in download script  

} 
?> 