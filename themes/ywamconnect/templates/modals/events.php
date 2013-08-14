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
           <form id="addeventform">
     <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
            <label for="heading">Heading:</label>
            <input type="text" class="form-control" name="heading" id="heading" placeholder="Heading">
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
           <select class="form-control">
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
            <select class="form-control">
            <?php for ($i = 1; $i <= 31; $i++) : ?>
              <option value="<?= $i;?>"><?= $i;?></option>
            <?php endfor; ?>
            </select>
          </div>
          <div class="col-lg-4">
            <select class="form-control">
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
            <select class="form-control">
            <?php
              $year = date("Y"); 
              for($i=0;$i<3;$i++): ?>
              <option value="<?=$year + $i;?>"><?= $year + $i;?></option>
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
            <select class="form-control">
              <?php for ($i = 1; $i <= 12; $i++) : 
               $mon = date("F", mktime(0, 0, 0, $i+1, 0, 0, 0));
               ?>
              <option value="<?=$i;?>"><?= $mon;?></option>
            <?php endfor; ?>
            </select>
            </div>
          </div>
          <div class="col-lg-4">
            <select class="form-control">
             <?php for ($i = 1; $i <= 31; $i++) : ?>
                <option value="<?= $i;?>"><?= $i;?></option>
            <?php endfor; ?>
            </select>
          </div>
          <div class="col-lg-4">
            <select class="form-control">
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
            <select class="form-control">
            <?php 
             $terms = get_terms('event_category');
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
                  <input type="text" class="form-control" name="image">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="icon-camera"></i></button>
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
              <input type="text" class="form-control" name="postedby" id="postedby" value="<?=$current_user->display_name;?>" disabled>
           </div>
        </div>
      </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info">Add Event </button>
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
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

