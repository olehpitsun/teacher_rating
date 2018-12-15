?php
include("conf.php");

if(isset($_GET['num'])){
	$num = $_GET['num'];
	$discussion_id = $_GET['discussion_id'];
	$result = mysql_query("SELECT * FROM `discussion_comm` WHERE discussion_id=$discussion_id LIMIT $num, 10",$dbh); 
	
	if(mysql_num_rows($result) > 0){	
		$comment = mysql_fetch_array($result);	
		
		do{
			$num++;
			printf("<blockquote><div class='comment'><div class='name'>".$comment['name']."</div><div class='date'>".$comment['dt']."</div><p>".$comment['body']."</p></div></blockquote>");		
		}while($comment = mysql_fetch_array($result));
		
		sleep(1); 
	}else{
		echo 0; 
	}
	
}

?>