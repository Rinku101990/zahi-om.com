<html>
<head>
  <title>Login with Facebook</title>
</head>
<body>
    
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>

<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
    
<?php if (isset($fb['id']) && !empty($fb['id'])) { ?>
   
        <a href="<?php echo base_url('facebook_login/logout') ?>">Logout from facebook</a>
    
        <?php } else { ?>
    
        <a href="<?php echo $LogonUrl ?>"><img src="<?php echo base_url('assets_signi/flogin.png') ?>"></a>
    

        <?php } ?>

        <?php
        // print_r($fb); 
        if (isset($fb['id']) && !empty($fb['id'])) {
            ?>
   
                <table class="table">
                    <tr>
                        <td>Id: </td>
                        <td><?php echo $fb['id'] ?></td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td><?php echo $fb['first_name'] . ' ' . $fb['last_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Profile Pic</td>
                        <td><img src="<?php echo $fb['picture']['data']['url']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?php echo $fb['email'] ?></td>
                    </tr>
                </table>
           
<?php } ?>
</body>
</html>