<?php

	$connect = new PDO('mysql:host=localhost;dbname=db_tama', 'root', '');
	$error = '';
	$chat_name = $_COOKIE['user'];
	$chat_content = '';

	if(empty($_POST["chat_content"]))
	{
		$error .= '<label class="text-danger"><br>Chat Is Required<br></label>';
	}
	else
	{
		$chat_content = $_POST["chat_content"];
	}

	if($error == '')
	{
		$query = " INSERT INTO chat (parent_chat_id, chat, chat_sender_name) VALUES (:parent_chat_id, :chat, :chat_sender_name)";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':parent_chat_id' 	=> $_POST["chat_id"],
				':chat'   			=> $chat_content,
				':chat_sender_name' => $chat_name
			)
		);
		$error = '<label class="text-success"><br>Terkirim<br></label>';
	}

	$data = array(
		'error'  => $error
	);

	echo json_encode($data);

?>