<?php

	session_start();

	if( !isset($_SESSION["login"]))
	{
		header("Location: login.php");
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- Link CSS -->
	<link rel="stylesheet" href="css/forum.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/578ea8ad42.js" crossorigin="anonymous"></script>	

</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">
				<iconify-icon inline icon="fluent-emoji:robot" class="fs-2"></iconify-icon>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-5">
					<li class="nav-item">
						<a class="nav-link" href="index.php#about">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php#feature">Our Feature</a>
					</li>
					<?php if (!isset($_SESSION["login"])) { ?>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Login</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">
								<iconify-icon inline icon="clarity:logout-line" style="color: #592c75;"></iconify-icon> Logout
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- CLOSE NAVBAR -->

	<br><br><br><br>
	<h2 align="center" style="color: white;">
		<b>Online Chat</b>	
	</h2>
	<br>
	<div class="container-fluid">
		<div class="row">
		<div class="col-lg-2 col-sm-12"></div>
			<div class="col-lg-8 col-sm-12">
				<form method="POST" id="chat_form">
					<!-- <div class="form-group">
						<input type="text" name="chat_name" id="chat_name" class="form-control" placeholder="Enter Name" value="<?php echo $_COOKIE['user']; ?>" disabled/>
					</div> -->
					<div class="form-group">
						<textarea name="chat_content" id="chat_content" class="form-control" placeholder="Enter chat" rows="5"></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" name="chat_id" id="chat_id" value="0" />
						<br>
						<input type="submit" name="submit" id="submit" class="flex btn" style="background-color: #592C75; color:white;" value="submit" />
					</div>
				</form>
				<span id="chat_message"></span>
				<br />
				<div id="display_chat"></div>
			</div>
			<div class="col-lg-2 col-sm-12"></div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function()
		{
			$('#chat_form').on('submit', function(event)
			{
				event.preventDefault();
				var form_data = $(this).serialize();
				$.ajax
				({
					url:"add_chat.php",
					method:"POST",
					data:form_data,
					dataType:"JSON",
					success:function(data)
					{
						if(data.error != '')
						{
							$('#chat_form')[0].reset();
							$('#chat_message').html(data.error);
							$('#chat_id').val('0');
							load_chat();
						}
					}
				})
			});

			load_chat();

			function load_chat()
			{
				$.ajax
				({
					url:"fetch_chat.php",
					method:"POST",
					success:function(data)
					{
						$('#display_chat').html(data);
					}
				})
			}

			$(document).on('click', '.reply', function()
			{
				var chat_id = $(this).attr("id");
				$('#chat_id').val(chat_id);
				$('#chat_content').focus();
			});
			
		});
	</script>
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
	<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</body>
</html>
