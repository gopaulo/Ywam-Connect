<?php $current_user = wp_get_current_user();
$ministry = loadObject('ministry',$post->ID);

  wp_enqueue_script('ministryjs', get_bloginfo('template_url').'/js/controllers/ministry.js', 'jquery', '1.1', true);

 ?>

<div class="container">
  <h3 ><?= $post->post_title;?></h3>
  <?php $fb ='<iframe src="//www.facebook.com/plugins/like.php?href='.urlencode(get_bloginfo('siteurl').'/ministry/'.$ministry['post_name']).'&amp;width=450&amp;height=65&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=true&amp;appId=490359931029564" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:65px;" allowTransparency="true"></iframe>';
   echo $fb; ?> 
  <hr class="nomargin" />
  <div class="divider"> </div>
  <div class="col-lg-12">
        <div id="imageministry" style="text-align:center;"> <img src="<?=  $ministry['image']; ?>" style=" max-height: 270px;" /></div>
         <div class="divider"> </div>
  
  </div>
    <div class="col-lg-6">
        <p class="profilep"> <span class="profilelabel"> Started: </span><span id="date"> <?= $ministry['date']; ?> </span></p>  
        <p class="profilep"> <span class="profilelabel"> Email: </span> <span id="email"><?=  $ministry['email']; ?>  </span> </p>
        <p class="profilep"> <span class="profilelabel"> Website: </span> <span id="website"> <?=  $ministry['website']; ?> </span> </p>
        <p class="profilep"> <span class="profilelabel"> Phone: </span> <span id="phone"><?= $ministry['phone']; ?>  </span> </p>
        <p class="profilep"> <span class="profilelabel"> Posted By: </span> <span id="postedby"><a href="<?= get_bloginfo('siteurl');?>/profile/?yid=<?= $ministry['owner'];?>"> <?=  $ministry['username'];?> </a> </span></p>
           <h4 id="videotitle"> Ministry Video </h4>
        <div id="ministryVideo">
                <?=  $ministry['video_link']['url']; ?>
       </div>
  </div>
        <div class="col-lg-6">
 
         <h4> People Following this ministry <small> (<span id="number_page"><?= $ministry['total']; ?></span>)</small></h4>
        <ul id="peopleFollowing" style="height: 225px">
          <?=  $ministry['following']; ?>
        </ul>
           <?php if(!is_following('ministries',$current_user->ID,$post->ID)): ?>
        <a href="#" class="followministry btn btn-info btn-mini" data-follow='1' data-name="<?= $post->post_title;?>" data-id="<?= $post->ID;?>"><i class="icon-heart"> </i><span> Follow <?= $post->post_title; ?> </span></a>
        <?php else: ?>
        <a href="#" class="followministry btn btn-default btn-mini" data-follow='0' data-name="<?= $post->post_title;?>" data-id="<?= $post->ID;?>"><i class="icon-heart-empty"> </i> <span>Unfollow  <?= $post->post_title; ?></span> </a>
        <?php endif; ?> 
       </div>
  <div class="col-lg-12">
     <h4> About  </h4>
          <p class="profilep" id="description"><?=  apply_filters('the_content', $ministry['post_content']); ?> </p>
  </div>
</div>
   