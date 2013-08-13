<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
                         elseif ( is_front_page()) {
		         wp_title(''); echo ' Home - '; }
                         
                        
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.esc_html($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
 
    <meta name="author" content="">


	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
          <?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
            

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
    <!-- Atoms & Pingback
    ================================================== -->

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Theme Hook -->
        
     <?php wp_head(); ?>
     
</head>
<body <?php body_class(); ?>>
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

<header>
<div class="navbar navbar-fixed-top navbar-inverse">
  <a class="navbar-brand" href="<?php bloginfo('siteurl');?>" style="padding:0px;margin:0px;"><img id="logo" src="<?php bloginfo('template_url');?>/images/ywamconnect_logo.png"/></a>
  <?php   
  $params = array( 
  	'container'=>false,
  	'items_wrap'=> '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>', 
  	'theme_location' => 'header-menu' );
   wp_nav_menu($params); ?>
  <ul class="nav navbar-nav pull-right">
  			<?php if(!is_user_logged_in()): ?>
              <li><a href="<?php bloginfo('siteurl');?>/login">Login</a></li>
               <li><a href="<?php bloginfo('siteurl');?>/register">Register</a></li>
           <?php else: ?>
           	<li style="padding:0px;margin:0px;">
           	 <a href="<?php bloginfo('siteurl');?>/locations" style="padding:0px;margin:0px;"><img id="world" src="<?php bloginfo('template_url'); ?>/images/world.png"/></a>
           	</li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php bloginfo('siteurl');?>/your-profile">My Profile</a></li>
                  <li><a href="<?php bloginfo('siteurl');?>/lostpassword">Change Password</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= wp_logout_url(); ?>">Logout</a></li>
                </ul>
              </li>
              <li>
             	 <div class="input-group search-header">
					  <input type="text" class="searchbox-header" placeholder="Search">
					  <span class="input-group-addon"><i class="icon-search"></i></span>
					</div>

              </li>
          <?php endif; ?>
            </ul>
            
</div>
</header>