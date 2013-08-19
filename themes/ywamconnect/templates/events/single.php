<?php 
  wp_enqueue_script('eventjs', get_bloginfo('template_url').'/js/controllers/event.js', 'jquery', '1.1', true);



$current_user = wp_get_current_user();
$event = loadObject('event',$post->ID);


 ?>

<div class="container">
  <h3 ><?= $post->post_title;?></h3>
  <?php $fb ='<iframe src="//www.facebook.com/plugins/like.php?href='.urlencode(get_bloginfo('siteurl').'/event/'.$event['post_name']).'&amp;width=450&amp;height=65&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=true&amp;appId=490359931029564" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:65px;" allowTransparency="true"></iframe>';
   echo $fb; ?>
  <hr class="nomargin" />
  <div class="divider"> </div>
           <div class="col-lg-8">
                <div id="imageevent"><img src="<?= $event['image'];?>" style="width: 100%; ?>"/> </div>
                 <div class="divider"> </div>
                  <p class="profilep"> <span class="profilelabel"> Time & Date: </span><span id="date"><?= $event['date']; ?>  </span></p>  
                  <p class="profilep"> <span class="profilelabel"> Location: </span> <span id="location"> <?= $event['date']; ?> </span> </p>
                  <p class="profilep"> <span class="profilelabel"> Cost: </span> <span id="cost"><?= $event['cost']; ?>  </span> </p>
                  <p class="profilep"> <span class="profilelabel"> Posted By: </span> <span id="postedby"><?= $event['date']; ?>  </span> </p>
                  <p class="profilep"> <span class="profilelabel"> More Info: </span> <span id="website"><a href="<?= $event['website']; ?>"> <?= $event['website']; ?></a> </span> </p>
                <div class="divider"> </div>
                 <p class="profilep" id="description"> 
                    <?= $event['post_content']; ?>

                 </p>
               </div>
               <div class="col-lg-4">
                <h4> People Attending this event <small> (<span id="number"><?= $event['total']; ?></span>)</small></h4>
                <ul id="peopleAttending">
                  <?= $event['attending']; ?>
                </ul>
                <p> Will you attend this event ? 
                <span id="attendbtn">
                <?php if(is_attending($current_user->ID,$post->ID)){ ?>
                       <a href="#" class="btn btn-small btn-danger attend" data-action="unAttendEvent" data-id="0"> No </a>
                <?php }else { ?> 
                      <a href="#" class="btn btn-small btn-success attend" data-action="attendEvent" data-id="0"> Yes </a>

                <?php } ?>
                </span>  
                </p>
                <h4> Promo Video </h4>
                <div id="promovideo">
                   <?= $event['video_link']['url']; ?>
                </div>
             </div>
</div>
   