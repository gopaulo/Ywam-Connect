<?php $current_user = wp_get_current_user(); ?>

  <!-- Add Event Modal -->
  <div class="modal fade" id="addeventmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Event</h4>
        </div>
        <div class="modal-body">
           <form id="addeventform" enctype="multipart/form-data">
     <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
            <label for="headingevent">Heading:</label>
            <input type="text" class="form-control"  data-original="Add Event" name="heading" id="headingevent" placeholder="Heading">
         </div>
          <div class="form-group">
            <label for="cost">Cost:</label>
            <input type="text" class="form-control"  name="cost"  id="cost" placeholder="This event is for free">
         </div>
          <div class="form-group">
            <label for="website">Link to website / more info:</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="">
         </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <label style="display:block" >Starting Date</label>
            <div class="col-lg-4">
             <div class="form-group">
           <select class="form-control" name="start_month">
           <?php
            $curmonth = date('n');
               for ($i = $curmonth; $i <= 12; $i++) : 
               $mon = date("F", mktime(0, 0, 0, $i+1, 0, 0, 0));
               ?>
              <option value="<?=$i;?>"><?= $mon;?></option>
            <?php endfor; ?>
            </select>
            </div>
          </div>
          <div class="col-lg-4">
            <select class="form-control" name="start_day">
            <?php for ($i = 1; $i <= 31; $i++) : ?>
              <option value="<?= $i;?>"><?= $i;?></option>
            <?php endfor; ?>
            </select>
          </div>
          <div class="col-lg-4">
            <select class="form-control" name="start_year">
              <?php
              $year = date("Y"); 
              for($i=0;$i<3;$i++): ?>
              <option value="<?=$year + $i;?>"><?= $year + $i;?></option>
            <?php endfor; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <label style="display:block" >Time</label>
            <div class="col-lg-4">
             <div class="form-group">
            <select class="form-control" name="time">
            <?php
              $start = 12; 
              for($i=1;$i<=10;$i++): ?>
              <option value="<?=$start + $i;?>00"><?= $i;?> pm</option>
            <?php endfor; ?>
            </select>
            </div>
          </div>
          <div class="col-lg-4">
         
          </div>
          <div class="col-lg-4">
           
          </div>
        </div>
        <div class="row">
          <label style="display:block" >Ending Date</label>
            <div class="col-lg-4">
             <div class="form-group">
            <select class="form-control" name="ending_month">
              <?php for ($i = 1; $i <= 12; $i++) : 
               $mon = date("F", mktime(0, 0, 0, $i+1, 0, 0, 0));
               ?>
              <option value="<?=$i;?>"><?= $mon;?></option>
            <?php endfor; ?>
            </select>
            </div>
          </div>
          <div class="col-lg-4">
            <select class="form-control" name="ending_day">
             <?php for ($i = 1; $i <= 31; $i++) : ?>
                <option value="<?= $i;?>"><?= $i;?></option>
            <?php endfor; ?>
            </select>
          </div>
          <div class="col-lg-4">
            <select class="form-control" name="ending_year">
              <?php
              $year = date("Y"); 
              for($i=0;$i<3;$i++): ?>
              <option value="<?=$year + $i;?>"><?= $year + $i;?></option>
            <?php endfor; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
         <img class="previewevent" src="<?php bloginfo('template_url');?>/images/default_event.jpg" style="margin-bottom:10px;">
        <label >Category</label>
             <div class="form-group">
            <select class="form-control" name="category">
            <?php 
             $terms = get_terms('event_category',array('hide_empty'=>false));
             foreach ($terms as $term): 
            ?>
              <option value="<?=$term->term_id;?>" data-slug="<?=$term->slug;?>"><?=$term->name;?></option>
            <?php endforeach; ?>
            </select>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <label for="description">Description:</label>
          <textarea class="form-control" rows="4" id="description" name="description" style="margin-bottom:10px;"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
          <label for="description">Image/Banner:</label>
                <div class="input-group">
                  <input type="text" class="form-control triggerfile" name="image"  data-trigger="bannerevent">
                  <input type="file" name="file" style="display:none" id="bannerevent">
                  <span class="input-group-btn">
                    <button class="btn btn-default triggerfile" type="button"  data-trigger="bannerevent"><i class="icon-camera"></i></button>
                  </span>
                </div><!-- /input-group -->
           </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
              <label for="videolink">Video Link:</label>
              <input type="text" class="form-control" name="videolink" id="videolink" >
           </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
           <label for="postedby">Posted by:</label>
               <input type="hidden" name="uid" value="<?= $current_user->ID;?>">
               <input type="hidden" name="bid" value="<?= $_GET['bid'];?>">
              <input type="text" class="form-control" name="postedby" id="postedby" value="<?=$current_user->display_name;?>" disabled>
           </div>
        </div>
      </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="addeventbtn">Add Event </button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

   <!-- View Event Modal -->
  <div class="modal fade" id="vieweventmodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">@Event Name</h4>
        </div>
        <div class="modal-body">
            <div class="col-lg-8">
                <div id="imageevent"> </div>
                  <p class="profilep"> <span class="profilelabel"> Time & Date: </span><span id="date">  </span></p>  
                  <p class="profilep"> <span class="profilelabel"> Location: </span> <span id="location">  </span> </p>
                  <p class="profilep"> <span class="profilelabel"> Cost: </span> <span id="cost">  </span> </p>
                  <p class="profilep"> <span class="profilelabel"> Posted By: </span> <span id="postedby">  </span> </p>
                  <p class="profilep"> <span class="profilelabel"> More Info: </span> <span id="website">  </span> </p>
                  <p class="profilep" id="description"> </p>
               </div>
               <div class="col-lg-4">
                <h4> People Attending this event <small> (<span id="number">100</span>)</small></h4>
                <ul id="peopleAttending">

                </ul>
                <p> Will you attend this event ? 
                <span id="attendbtn">
                  <a href="#" class="btn btn-small btn-success attend" data-action="attendEvent" data-id="0"> Yes </a>
                  <a href="#" class="btn btn-small btn-danger attend" data-action="unAttendEvent" data-id="0"> No </a>
                </span>  
                </p>
                <h4> Promo Video </h4>
                <div id="promovideo">
                </div>
               </div>
        </div>
        <div class="modal-footer">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

