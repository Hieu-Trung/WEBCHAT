$(document).ready(function(){

    $(document).on('keyup','#type_message', function(){

        var TypeMessage = $('#type_message').val();

        alert(type_message);

    });

    $(document).on('click','#setting', function(){

        $('.setting-model').show();

    });

    $('body').on('click', function(){

        $('.setting-model').hide();
        
    });

    $(document).on('change', '#profile_image', function(){

        var formData = new FormData();

        var inputFile = document.getElementById('profile_image').files[0];

            formData.append("file", inputFile);

            $.ajax({

                url:"messenger_action.php",
    
                method:"post",
    
                data: formData,
    
                contentType: false,
    
                cache: false,
    
                processData: false,
    
                success:function(data){
    
                    $('.profile-user-image').html(data);
                    
                }
            });

    });

    






    fetch_users();

    function fetch_users(){

        var action = "fetch_users";

        $.ajax({

            url:"messenger_action.php",

            method:"post",

            data: {action_users:action},

            success:function(data){

                $('.user-main-container').html(data);
                
            }

        });

    }


    $(document).on('click','.user-main-details', function(){

        var userId = $(this).data('user_id');

        fetch_users_top_nav(userId);

        fetch_users_profile(userId);

    });



    fetch_users_top_nav(userId);

    function fetch_users_top_nav(userId){

        var action = "fetch_users_top_nav";

        $.ajax({

            url:"messenger_action.php",

            method:"post",

            data: {action_users_nav:action, user_id:userId},

            success:function(data){

               $('.main-navbar').html(data);
            
            }

        });

    }

    fetch_users_profile(userId);

    function fetch_users_profile(userId){

        var action = "fetch_users_profile";

        $.ajax({

            url:"messenger_action.php",

            method:"post",

            data: {action_users_profile:action, user_id:userId},

            success:function(data){

               $('.user-profilr-detail').html(data);
            
            }

        });

    }

});