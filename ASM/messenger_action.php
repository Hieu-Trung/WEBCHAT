<?php
	error_reporting(0);
	include('messenger_connect.php');
	session_start();

    if($_FILES['file']['name'] != ''){

        $userId = $_SESSION['user_id'];

        $target_dir = "profile_image/";

        $name = $_FILES['file']['name'];

        $target_file_name = $target_dir . basename($name);

        $image_url = "http://localhost/ASM/profile_image/".$name;

        move_uploaded_file($_FILES['file']['tmp_name'], $target_file_name);

        $sql = "UPDATE `user` SET `user_image`='$image_url' WHERE `user_id`='$userId'";

        $result = mysqli_query($conn, $sql);

        if($result){

            $query = "SELECT * FROM `user` WHERE `user_id`='$userId'";

            $query_result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($query_result)){

                $userImage = $row['user_image'];

                if($userImage == null){

                    $user_image = "<img src='image/user.png'>";

                }else{

                    $user_image = "<img src='$userImage'>";

                }

                echo $user_image;
            }
        }
    }




    


    //fetch users

    if(isset($_POST['action_users'])){

        $userId = $_SESSION['user_id'];

        $query = "SELECT * FROM `user` WHERE `user_id` != '$userId'";

        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){

            $userImage = $row['user_image'];

            $userName = $row['user_name'];

            $userId = $row['user_id'];


            if($userImage == null){

                $user_image = "<img src='image/user.png'>";

            }else{

                $user_image = "<img src='$userImage'>";

            }

            echo "
            <div class='user-main-details' data-user_id='".$userId."'>
                <div class='user-main-container-inside'>
                    <div class='user-main-inside photo'>
                        <div class='user-main-image'>
                            $user_image
                        </div>
                    </div>
                    <div class='user-main-inside text'>
                        <div class='user-main-name'>
                            <p>$userName</p>
                        </div>
                        <div class='user-main-messenger'>
                            <div class='user-last-messenger messenger'>
                                <p>Last seen messenger</p>
                            </div>
                            <div class='user-last-messenger date'>
                                <p>Date</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }

    if(isset($_POST['action_users_nav'])){

        $userId = $_POST['user_id'];

        $query = "SELECT * FROM `user` WHERE `user_id` = '$userId'";

        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){

            $userImage = $row['user_image'];

            $userName = $row['user_name'];

            if($userImage == null){

                $user_image = "<img src='image/user.png'>";

            }else{

                $user_image = "<img src='$userImage'>";

            }

            echo "
                <div class='main-navbar-inside photo'>
                    <div class='navbar-image'>
                        $user_image
                    </div>
                </div>
                <div class='main-navbar-inside name'>
                    <div class='navbar-name'>
                        <p><b>$userName</b></p>
                    </div>
                    <div class='navbar-time'>
                        <p>Time</p>
                    </div>
                </div>
                <div class='main-navbar-inside icon'>
                    <div class='navbar-icon'>
                        <img src='image/call.png'>
                    </div>
                </div>
                <div class='main-navbar-inside icon'>
                    <div class='navbar-icon'>
                        <img src='image/videocall.png'>
                    </div>
                </div>
                <div class='main-navbar-inside icon'>
                    <div class='navbar-icon'>
                        <img src='image/information.png'>
                    </div>
                </div>";

        }
    }



    if(isset($_POST['action_users_profile'])){

        $userId = $_POST['user_id'];

        $query = "SELECT * FROM `user` WHERE `user_id` = '$userId'";

        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){

            $userImage = $row['user_image'];

            $userName = $row['user_name'];

            if($userImage == null){

                $user_image = "<img src='image/user.png'>";

            }else{

                $user_image = "<img src='$userImage'>";

            }

            echo "
                <div class='user-profilr-image'>
                    $user_image
				</div>
				<div class='user-profilr-name'>
					<p><b>$userName</b></p>
				</div>
				<div class='user-profilr-time'>
					<p>Time</p>
				</div>";
        }
    }
?>