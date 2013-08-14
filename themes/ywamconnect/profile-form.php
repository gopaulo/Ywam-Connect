
<div class="profile" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'profile' ); ?>
	<?php $template->the_errors(); ?>
	<form id="your-profile" action="<?php $template->the_action_url( 'profile' ); ?>" method="post">
		<?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
		
			<input type="hidden" name="from" value="profile" />
			<input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
		
		<div class="row">
		  <div class="col-lg-12">
			 <h4> About me </h4>
			 <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla libero. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
		</div>
		<div class="col-lg-5">
			<h4> Andrew is Following </h4>
			 <ul class="profilelist">
				 <li> <a href="#"> Ywam Kona</a></li>
				 <li> <a href="#"> Ywam Perth</a></li>
				 <li> <a href="#"> Ywam Brasilia</a></li>
				 <li> <a href="#"> Ywam Norway</a></li> 
				  <li> <a href="#"> <strong> See all </strong></a></li> 
			 </ul>
			<h4> Andrew is attending these upcoming events </h4>
			<ul class="profilelist">
				 <li> <a href="#"> 50th Ywam Celebrations</a></li>
				 <li> <a href="#"> Kona Summer Surge 2013</a></li>
			
			 </ul>
			<h4> Andrew and Ministries </h4>
			<ul class="profilelist">
				 <li> <a href="#"> Ywam Ships</a></li>
				 <li> <a href="#"> Graphic Design for God</a></li>
				 <li> <a href="#"> 4k World Maps</a></li>
				  <li> <a href="#"> <strong> See all </strong></a></li> 
			 </ul>
			<h4> Friends</h4>	
			<div style="width:90%">
		 		<?php  get_template_part('templates/users/friends','list'); ?>
			</div>
			
		</div>
		<div class="col-lg-7">
		 	<h4> Photos </h4>
		 	<?php  get_template_part('templates/users/photo','list'); ?>
		</div>
		</div>
	</form>
</div>
