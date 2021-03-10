<?php
	error_reporting(0);
	include('messenger_connect.php');
	session_start();

	if(!isset($_SESSION['user_id'])){

		header('location:messenger_signin.php');

	}else{

		$userId = $_SESSION['user_id'];

        $query = "SELECT * FROM `user` WHERE `user_id`='$userId'";

        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){

            $userImage = $row['user_image'];

            if($userImage == null){

                $user_image = "<img src='image/user.png'>";

            }else{

                $user_image = "<img src='$userImage'>";

            }
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Webchat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!---- add coin link ---->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >

	<!---- add coin link ---->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="messenger.css">
	<script src="messenger.js"></script>
</head>
<body>
	<div class="container">
		<div class="main-container users">
			<div class="profile-container">
				<div class="profile-user photo">
					<div class="profile-user-image" style="overflow: hidden; border-radius: 50%;">
						<?php
							echo $user_image;

						?>
						<span>
							<input type="file" name="file" id="profile_image">
						</span>
					</div>
				</div>
				<div class="profile-user heading">
					<p><b>Chats</b></p>
				</div>
				<div class="profile-user setting">
					<div class="profile-user-setting">
						<div class="profile-setting-image">
							<img src="image/setting.png" id="setting">
						</div>
					</div>
				</div>
				<div class="profile-user edit">
					<div class="profile-user-edit">
						<div class="profile-edit-image">
							<img src="image/edit.png">
						</div>
					</div>
				</div>
				<div class="setting-model">
					<div class="setting-model-setting">
						<a><p>Setting</p></a>
					</div>
					<div class="setting-model-active">
						<a><p>Active Contacts</p></a>
						<a><p>Massage Requests</p></a>
						<a><p>Archived Chats</p></a>
						<a><p>Unread Chats</p></a>
					</div>
					<div class="setting-model-about">
						<a><p>Apout</p></a>
						<a><p>Terms</p></a>
						<a><p>Privacy policy</p></a>
						<a><p>Cookie policy</p></a>
					</div>
					<div class="setting-model-help">
						<a><p>Help</p></a>
						<a><p>Report a problem</p></a>
					</div>
					<div class="setting-model-logout">
						<a href="messenger_lognout.php"; style="text-decoration: none; color: black;"><p>Log Out</p></a>
					</div>
				</div>
			</div>

			<div class="user-container">
				<div class="search-container">
					<div class="search-container-inside">
						<div class="search-user button">
							<button><i class="fas fa-search"></i></button>
						</div>
						<div class="search-user text">
							<input type="text" name="users" placeholder="search messenger">
						</div>
					</div>
				</div>
				<div class="user-main-container">
					
				</div>
			</div>
		</div>
		<div class="main-container chat">
			<div class="main-navbar">
				
			</div>
			<div class="users-chat-container">
				<div class="users-chat-main-container chat">
					<div class="chat-chat-container">
						<div class="chat-right">
							<div class="chat-right-page image">
								<div class="chat-display-image">
									<img src="image/check.png">
								</div>
							</div>
							<div class="chat-right-page name">
								<div class="chat-display-name">
									<p>Hello</p>
								</div>
							</div>
						</div>
						<div class="chat-left">
							<div class="chat-left-page image">
								<div class="chat-left-display-image">
									<img src="image/user.png">
								</div>
							</div>
							<div class="chat-left-page name">
								<div class="chat-left-display-name">
									<p>Hi</p>
								</div>
							</div>		
						</div>
					</div>
					<div class="chat-bottom">
						<div class="chat-bottom-icon icon">
							<div class="chat-bottom-image">
								<img src="image/add.png">
							</div>
						</div>
						<div class="chat-bottom-icon icon">
							<div class="chat-bottom-image">
								<img src="image/gif.png">
							</div>
						</div>
						<div class="chat-bottom-icon icon">
							<div class="chat-bottom-image">
								<img src="image/sticker.png">
							</div>
						</div>
						<div class="chat-bottom-icon icon">
							<div class="chat-bottom-image">
								<img src="image/file.png">
							</div>
						</div>
						<div class="chat-bottom-icon send">
							<div class="chat-bottom-send">
								<div class="chat-bottom-input text">
									<input type="text" name="send" placeholder="Type a messange.." id="type_message">
								</div>
								<div class="chat-bottom-input smile">
									<div class="chat-bottom-image">
										<img src="image/smile.png">
									</div>
								</div>
							</div>
						</div>
						<div class="chat-bottom-icon icon">
							<div class="chat-bottom-image">
								<img src="image/like.png">
							</div>
						</div>
					</div>
				</div>
				<div class="users-chat-main-container profile">
					<div class="user-profilr-detail">
						
					</div>
					<div class="option-container">
						<div class="option-heading">
							<div class="option-name name">
								<p>OPTIONS</p>
							</div>
							<div class="option-name icon">
								<div class="option-heading-image">
									<img src="image/arrowdown.png">
								</div>
							</div>
						</div>
						<div class="option-search">
							<div class="option-search-name name">
								<p>Search in Conversation</p>
							</div>
							<div class="option-search-name icon">
								<div class="option-search-image">
									<img src="image/search.png">
								</div>
							</div>
						</div>
						<div class="option-edit">
							<div class="option-edit-name name">
								<p>Edit Nicknames</p>
							</div>
							<div class="option-edit-name icon">
								<div class="option-edit-image">
									<img src="image/editname.png">
								</div>
							</div>
						</div>
						<div class="option-color">
							<div class="option-color-name name">
								<p>Change Color</p>
							</div>
							<div class="option-color-name icon">
								<div class="option-color-image">
									<img src="image/color.png">
								</div>
							</div>
						</div>
						<div class="option-emoji">
							<div class="option-emoji-name name">
								<p>Change emoji</p>
							</div>
							<div class="option-emoji-name icon">
								<div class="option-emoji-image">
									<img src="image/like.png">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>