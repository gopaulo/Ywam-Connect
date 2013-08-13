<footer>
<div class="navbar navbar-fixed-bottom">
<?php 
 $params = array( 
  	'container'=>false,
  	'items_wrap'=> '<ul id="%1$s" class="nav navbar-nav pull-right %2$s">%3$s</ul>', 
  	'theme_location' => 'footer-menu' );
   wp_nav_menu($params); ?>
</div>
</footer>

<?php get_template_part('templates/modals/all');?>
<?php wp_footer(); ?> 

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '490359931029564',                        // App ID from the app dashboard
    //  channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


</body>
</html>