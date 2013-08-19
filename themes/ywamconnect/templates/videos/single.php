<?php $current_user = wp_get_current_user();
$video = loadObject('video',$post->ID);

 ?>

<div class="container">
  <h3 ><?= $post->post_title;?></h3>
  <?php $fb ='<iframe src="//www.facebook.com/plugins/like.php?href='.urlencode(get_bloginfo('siteurl').'/video/'.$video['post_name']).'&amp;width=450&amp;height=65&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=true&amp;appId=490359931029564" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:65px;" allowTransparency="true"></iframe>';
   echo $fb; ?>
  <hr class="nomargin" />
  <div class="divider"> </div>
  <div id="videoframe">
    <?php

    echo oEmbedYC($video['video_link'],570)['url'];
    ?>
  </div>
  <input type="hidden" id="videourl"> 
  <p class="profilep" id="base"> Ywam Base: <a href="<?= get_bloginfo('siteurl');?>/base/<?= $video['basename'];?>"><?= $video['base'];?></a> </p>
  <p class="profilep" id="from">  From: <a href="<?= $video['video_link'];?>"><?= $video['video_link'];?> </a></p>
        <p class="profilep"> <span class="profilelabel"> Posted By: </span> <span id="postedby"><a href="<?= get_bloginfo('siteurl');?>/profile/?yid=<?= $video['owner'];?>"> <?=  $video['username'];?> </a> </span></p>
  <p class="profilep" id="description">  Description: <? the_content();?> </p>
</div>
   