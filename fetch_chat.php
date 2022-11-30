<?php

	$connect = new PDO('mysql:host=localhost;dbname=db_tama', 'root', '');
	$query = "SELECT * FROM chat WHERE parent_chat_id = '0' ORDER BY chat_id DESC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';

	foreach($result as $row)
	{
		$output .= '
			<div class="card card-default mb-4">
				<div class="card-header">By <b>'.$row["chat_sender_name"].'</b> on '.$row["date"].'</div>
				<div class="card-body">'.$row["chat"].'</div>
				<div class="card-footer" align="right">
					<button type="button" style="background-color: #592C75; color: white;" class="btn reply" id="'.$row["chat_id"].'">Reply</button>
				</div>
			</div>
		';
		$output .= get_reply_chat($connect, $row["chat_id"]);
	}

	echo $output;

	function get_reply_chat($connect, $parent_id = 0, $marginleft = 0)
	{
		$query = "SELECT * FROM chat WHERE parent_chat_id = '".$parent_id."'";
		$output = '';
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$count = $statement->rowCount();
		
		if($parent_id == 0)
		{
			$marginleft = 0;
		}
		else
		{
			$marginleft = $marginleft + 48;
		}
		if($count > 0)
		{
			foreach($result as $row)
			{
				$output .= '
					<div class="card card-default mb-2" style="margin-left:'.$marginleft.'px">
						<div class="card-header">By <b>'.$row["chat_sender_name"].'</b> on '.$row["date"].'</div>
						<div class="card-body">'.$row["chat"].'</div>
						<div class="card-footer" align="right">
							<button type="button" style="background-color: #592C75; color: white;" class="btn reply" id="'.$row["chat_id"].'">Reply</button>
						</div>
					</div>
				';
				$output .= get_reply_chat($connect, $row["chat_id"], $marginleft);
			}
		}
		return $output;
	}

?>