
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>css/bootstrap.min.css" type="text/css">
      <!-- Icons -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>css/font-awesome.min.css" type="text/css">
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>css/line-awesome.min.css" type="text/css">
      <link type="text/css" href="<?php echo site_url('assets/');?>css/bootstrap-tagsinput.css" rel="stylesheet">
      <link type="text/css" href="<?php echo site_url('assets/');?>css/jodit.min.css" rel="stylesheet">
      <link type="text/css" href="<?php echo site_url('assets/');?>css/sweetalert2.min.css" rel="stylesheet">
      <link type="text/css" href="<?php echo site_url('assets/');?>css/slick.css" rel="stylesheet">
      <link type="text/css" href="<?php echo site_url('assets/');?>css/xzoom.css" rel="stylesheet">
      <link type="text/css" href="<?php echo site_url('assets/');?>css/jquery.share.css" rel="stylesheet">
      <!-- Global style (main) -->
      <link type="text/css" href="<?php echo site_url('assets/');?>css/active-shop.css" rel="stylesheet" media="screen">
      <!--Spectrum Stylesheet [ REQUIRED ]-->
      <link href="<?php echo site_url('assets/');?>css/spectrum.css" rel="stylesheet">
      <!-- Custom style -->
      <link type="text/css" href="<?php echo site_url('assets/');?>css/custom-style.css" rel="stylesheet">
      <!-- Facebook Chat style -->
      <link href="<?php echo site_url('assets/');?>css/fb-style.css" rel="stylesheet">
      <!-- color theme -->
      <link href="<?php echo site_url('assets/');?>css/colors/default.css" rel="stylesheet">
      <!-- jQuery -->
      <script src="<?php echo site_url('assets/');?>js/vendor/jquery.min.js"></script>
      <script src="<?php echo site_url('assets/');?>js/custom_query.js"></script>
      <script src="<?php echo site_url('assets/');?>js/checkout.js"></script>
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
         var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
         (function(){
         var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
         s1.async=true;
         s1.src='https://embed.tawk.to/5fbf54f9a1d54c18d8ed896c/default';
         s1.charset='UTF-8';
         s1.setAttribute('crossorigin','*');
         s0.parentNode.insertBefore(s1,s0);
         })();
      </script>
      <!--End of Tawk.to Script-->
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PT13S3RXWK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PT13S3RXWK');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-190899158-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-190899158-1');
</script>

      <style type="text/css">
         a.dropdown-item.dropdown2 {
         width: 24%;
         display: inline-block;
         position: relative;
         }
         .dropdown-menu.megamenu .overflow-auto {   
         height: auto;
         overflow-y: scroll;
         max-height: 380px;
         }
         .dropdown-menu.megamenu .overflow-auto::-webkit-scrollbar {   
         width: 12px;   
         }
         .dropdown-menu.megamenu .overflow-auto::-webkit-scrollbar-track {   
         background: #c4c4c4;
         }
         .dropdown-menu.megamenu .overflow-auto::-webkit-scrollbar-thumb {   
         background-color: #c19450;    /* color of the scroll thumb */
         border-radius: 20px;       /* roundness of the scroll thumb */
         }
        
      </style>
    <script>
	  window.fbAsyncInit = function() {
    		FB.init({
    		  appId      : '428663121706762',
    		  cookie     : true,
    		  xfbml      : true,
    		  version    : 'v9.0'
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
    	   
    	   function fbLogin(){
    			FB.login(function(response){
    				if(response.authResponse){
    					fbAfterLogin();
    				}else {
                        document.getElementById('SignupResponse').innerHTML = '<div class="alert alert-danger" role="alert"> <span class="alert-inner--text"> User cancelled login or did not fully authorize.</span> </div>';
                    }
    			}, {scope: 'email'});
    	   }
    	   
    	   function fbAfterLogin(){
    		FB.getLoginStatus(function(response) {
    			if (response.status === 'connected') {   // Lo
    				FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture,cover'},
    				function(response) {
    				  jQuery.ajax({
    					url:'<?php echo base_url('account/saveUserData'); ?>',
    					type:'post',
    					data:'id='+response.id+'&first_name='+response.first_name+'&last_name='+response.last_name+'&oauth_provider=facebook'+'&email='+response.email,
    					success:function(result){
    						window.location.reload();
    					}
    				  });
    				});
    			}
    		});
    	   }
    </script>
    <script>
        function renderButton() {
          gapi.signin2.render('my-signin2', {
            'scope': 'profile email',
            'width': 260,
            'height': 35,
            'longtitle': true,
            'theme': 'light',
            'onsuccess': gmailLogIn,
            'onfailure': onFailure
          });
          
        }
        function gmailLogIn(userInfo){
            var userProfile=userInfo.getBasicProfile();
            var currentUrl = $("#current_url").val();
            jQuery.ajax({
                url:'<?php echo base_url('account/saveGoogleUserData'); ?>',
                type:'post',
                data:'googleIdTocken='+userProfile.getId()+'&name='+userProfile.getName()+'&image='+userProfile.getImageUrl()+'&email='+userProfile.getEmail(),
                success:function(response){
                    //alert(response);
                    //window.location.href='<?php echo base_url('/'); ?>';
                }
            });
        }
        function onFailure(error) {
            console.log(error);
        }
        // function logout(){
        //     var auth2 = gapi.auth2.getAuthInstance();
        //     var currentUrl = $("#current_url").val();
        //     auth2.signOut();  
        //     jQuery.ajax({
        //         url:'<?php echo base_url('account/logout'); ?>',
        //         success:function(response){
        //             window.location.href='<?php echo base_url('/'); ?>';
        //         }
        //     });
        // }
    </script>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
   </head>