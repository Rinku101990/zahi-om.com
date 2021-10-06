<html>
    <head>
        <meta name="google-signin-client_id" content="976170906910-h4itraeqrq38eg5jfta8s9qlb79223eh.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    </head>
    <body>
            <div class="g-signin2" data-onsuccess="gmailLogIn"></div>
            <input type="hidden" id="current_url" name="current_url" value="<?php  echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>">
        <script>
            
            function logout(){
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut();  
                jQuery.ajax({
                    url:'logout.php',
                    success:function(result){
                            window.location.href="<?php echo base_url('/'); ?>";
                    }
                });
            }
            
            function onLoad(){
               gapi.load('auth2',function (){
                    gapi.auth2.init();
               }); 
            }
            
            function gmailLogIn(userInfo){
                var userProfile=userInfo.getBasicProfile();
                var currentUrl = $("#current_url").val();
                jQuery.ajax({
                    url:currentUrl+'/saveUserData',
                    type:'post',
                    data:'googleIdTocken='+userProfile.getId()+'&name='+userProfile.getName()+'&image='+userProfile.getImageUrl()+'&email='+userProfile.getEmail(),
                    success:function(result){
                        alert(result);
                            //window.location.href="<?php echo base_url('/'); ?>";
                    }
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>

