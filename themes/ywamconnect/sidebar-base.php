<?php 

  wp_enqueue_script('basejs', get_bloginfo('template_url').'/js/controllers/base.js', 'jquery', '1.1', true);
  wp_enqueue_script('eventjs', get_bloginfo('template_url').'/js/controllers/event.js', 'jquery', '1.1', true);
  wp_enqueue_script('videojs', get_bloginfo('template_url').'/js/controllers/video.js', 'jquery', '1.1', true);


 if(isset($_GET['bid'])) { 
  $bid = $_GET['bid'];
  $base = get_post($bid);
}
else { 

  $base = $_GET['base'];
  $bid = $base->ID;
}

if(is_tax('event_category'))
  $collapsed = 1;
else if(is_tax('video_category'))
 $collapsed =2;
else if(is_page('followers'))
  $collapsed = 3;
else $collapsed = 0;

$basepods = pods('base',$bid);
$email = $basepods->display('email');
$phone = $basepods->display('phone');
$website = $basepods->display('website');
$facebook = $basepods->display('facebook');
$location = $basepods->display('latlong');
$country =  $basepods->field('country');

$_GET['location'] = $location;
$locationdesc = '<div class=\'popupmap\'> <h4><a class=\'popuptitle\' href=\''.get_bloginfo('siteurl').'/base/'.$base->post_name.'\'>';
$locationdesc.= $base->post_title.'</a></h4>';
$locationdesc.='<p class=\'profilep\'> <span class=\'profilelabel\'> Email: </span> '.$email.'</p><p class=\'profilep\'> <span class=\'profilelabel\'> Web: </span> '.$website.' </p><p class=\'profilep\'> <span class=\'profilelabel\'> Phone: </span> '.$phone.' </p>';
$locationdesc.='</div>';
 $_GET['locationdesc']  = $locationdesc;

 $current_user = wp_get_current_user();

?>
<input type="hidden" id="masterbase" value="<?= $bid; ?>">
<? if($country): ?> <div id="countryFlag"> <img src="<?php bloginfo('template_url');?>/images/flags/flat/48/<?= $country;?>.png"/> </div> <?php endif; ?>
<?=  $_SESSION['collapsed'];?>
<h4 class="basetitle"><a href="<?php bloginfo('siteurl');?>/base/<?= $base->post_name;?>"><?=$base->post_title; ?></a> </h4>
<?php if(!is_following('bases',$current_user->ID,$bid)): ?>
<a href="#" class="followbtn btn btn-info btn-mini" data-follow='1' data-id="<?= $bid;?>"><i class="icon-heart"> </i><span> Follow Base </span></a>
<?php else: ?>
<a href="#" class="followbtn btn btn-default btn-mini" data-follow='0' data-id="<?= $bid;?>"><i class="icon-heart-empty"> </i> <span>Unfollow Base</span> </a>
<?php endif; ?>
<div style="height: 10px; width: 100%;"> </div>
<?=  apply_filters('the_content', $base->post_content); ?>
<p>
<? if($email): ?> Email: <a href="mailto:<?= $email; ?>"> <?= $email; ?> </a> <br/> <?php endif;?> 
<? if($website): ?> Web: <a href="<?= $website;?>"> <?= $website; ?> </a> <br/> <?php endif;?> 
<? if($phone): ?> Phone:  <?= $phone; ?>  <br/> <?php endif;?> 
</p>
<? if($facebook == '') $facebook = urlencode(get_bloginfo('siteurl').'/base/'.$basepods->field('post_name'));
else $facebook = urlencode($facebook);
 //$facebook):
   $fb ='<iframe src="//www.facebook.com/plugins/like.php?href='.$facebook.'&amp;width=170&amp;height=90&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=true&amp;appId=490359931029564" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:170px; height:90px;" allowTransparency="true"></iframe>';
//  $fb = '<iframe src="//www.facebook.com/plugins/follow.php?href='.urlencode(get_bloginfo('siteurl').'/base/'.$basepods->field('post_name')).'&amp;height=80&amp;colorscheme=light&amp;layout=standard&amp;show_faces=true&amp;appId=490359931029564" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:80px;" allowTransparency="true"></iframe>';
 ?>
<p style="font-size:75%; margin-bottom:5px; font-weight:bold;"> Like <?= $basepods->display('post_title'); ?> on Facebook: </p>
<?= $fb; ?>

<hr/>


<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle <?php if($collapsed!=0) echo 'collapsed';?>" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        <i class="icon-chevron-sign-right"> </i> Courses
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse <?php if($collapsed==0) echo 'in';?>">
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
      <a class="accordion-toggle <?php if($collapsed!=1) echo 'collapsed';?>" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        <i class="icon-chevron-sign-right"> </i> Events
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse  <?php if($collapsed==1) echo 'in';?>">
      <div class="accordion-inner">
          <ul class="sidebarbase_list">
           <?php 
           $categories = get_event_categories_for_base($base->ID);
           if(sizeof($categories) == 0): ?>
            <li> <a href="#addeventmodal" data-toggle="modal">Add Event</a></li>
          <?php 
           endif;  
           foreach($categories as $category): ?>
              <li><a href="<?php bloginfo('siteurl');?>/event-category/<?= $category->slug;?>/?bid=<?= $base->ID; ?>"><?= $category->name;?> (<?= $category->total;?>)</a></li>
           <?php endforeach; ?>
         </ul>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle <?php if($collapsed!=2) echo 'collapsed';?>" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
       <i class="icon-chevron-sign-right"> </i> Videos
      </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse  <?php if($collapsed==2) echo 'in';?>">
      <div class="accordion-inner">
        <ul class="sidebarbase_list">
        <?php 
           $categories = get_video_categories_for_base($base->ID);
           if(sizeof($categories) == 0): ?>
            <li> <a href="#addvideomodal" data-toggle="modal">Add Video</a></li>
          <?php 
           endif;  
           foreach($categories as $category): ?>
              <li><a href="<?php bloginfo('siteurl');?>/video-category/<?= $category->slug;?>/?bid=<?= $base->ID; ?>"><?= $category->name;?> (<?= $category->total;?>)</a></li>
           <?php endforeach; ?>
           </ul>
      </div>
    </div>
  </div>
   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle <?php if($collapsed!=3) echo 'collapsed';?>" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
        <i class="icon-chevron-sign-right"> </i> People
      </a>
    </div>
    <div id="collapseFour" class="accordion-body collapse  <?php if($collapsed==3) echo 'in';?>">
      <div class="accordion-inner">
        <ul class="sidebarbase_list">
          <li><a class="accordion-toggle collapsed " href="<?php bloginfo('siteurl');?>/followers/?bid=<?= $base->ID; ?>"> Followers</a> </li>
          <li> In the Area [dev]</li>
         </ul>
      </div>
    </div>
  </div>
   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle collapsed " href="<?php bloginfo('siteurl');?>/ministries/?bid=<?= $base->ID; ?>">
        <i class="icon-chevron-sign-right"> </i> Ministries
      </a>
    </div>
  </div>
</div>
