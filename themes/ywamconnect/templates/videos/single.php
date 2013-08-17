<?php $current_user = wp_get_current_user();
$video = pods('video',$post->ID);
 ?>

<div class="container">
  <h3 ><?= $post->post_title;?></h3>
  <hr class="nomargin" />
  <div class="divider"> </div>
  <div id="videoframe">
    <?php
      echo oEmbedYC($video->display('video_link'),590)['url'];
    ?>
  </div>
  <input type="hidden" id="videourl"> 
  <p class="profilep" id="base"> Ywam Base: <a href="<?= get_bloginfo('siteurl');?>/base/<?= $video->field('base.post_name');?>"><?= $video->display('base');?></a> </p>
  <p class="profilep" id="from">  From: <a href="<?= $video->display('video_link');?>"><?= $video->display('video_link');?> </a></p>
  <p class="profilep" id="description">  Description: <? the_content();?> </p>
</div>
   