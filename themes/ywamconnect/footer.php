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
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php get_template_part('templates/modals/all');?>
<?php wp_footer(); ?> 
</body>
</html>