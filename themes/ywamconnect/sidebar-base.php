<?php
$base = $_GET['base'];
$basepods = pods('base',$base->ID);
$email = $basepods->display('email');
$phone = $basepods->display('phone');
$website = $basepods->display('website');
$facebook = $basepods->display('facebook');
$location = $basepods->display('latlong');
$country =  $basepods->field('country');

$_GET['location'] = $location;
$_GET['locationdesc'] = '<h4><a href=\''.get_bloginfo('siteurl').'/base/'.$base->post_name.'\'>'.$base->post_title.'</a></h4>'.apply_filters('the_content', $base->post_content);
 
?>
<? if($country): ?> <div id="countryFlag"> <img src="<?php bloginfo('template_url');?>/images/flags/flat/48/<?= $country;?>.png"/> </div> <?php endif; ?>

<h4 class="basetitle"> <?=$base->post_title; ?> </h4>
<?=  apply_filters('the_content', $base->post_content); ?>
<p>
<? if($email): ?> Email: <a href="mailto:<?= $email; ?>"> <?= $email; ?> </a> <br/> <?php endif;?> 
<? if($website): ?> Web: <a href="<?= $website;?>"> <?= $website; ?> </a> <br/> <?php endif;?> 
<? if($phone): ?> Phone:  <?= $phone; ?>  <br/> <?php endif;?> 
</p>
<? if($facebook): ?>
<p> Follow us on Facebook: <br/>
<div class="fb-follow" data-href="<?=$facebook;?>" data-width="250" data-show-faces="true"></div> </p>
<?php endif;?> 
<hr/>


<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        <i class="icon-chevron-sign-right"> </i> Courses
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
         <ul class="sidebarbase_list">
          <li> DTS </li>
          <li> Schools </li>
         </ul>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        <i class="icon-chevron-sign-right"> </i> Events
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        ...
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
       <i class="icon-chevron-sign-right"> </i> Videos
      </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse">
      <div class="accordion-inner">
        ...
      </div>
    </div>
  </div>
   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle collapsed " data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
        <i class="icon-chevron-sign-right"> </i> People
      </a>
    </div>
    <div id="collapseFour" class="accordion-body collapse">
      <div class="accordion-inner">
        <ul class="sidebarbase_list">
          <li> Followers </li>
          <li> In the Area </li>
         </ul>
      </div>
    </div>
  </div>
   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle collapsed " href="#collapseTwo">
        <i class="icon-chevron-sign-right"> </i> Ministries
      </a>
    </div>
  </div>
</div>
