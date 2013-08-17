<h4> Search Library </h4>
<form id="searchlibraryform">
	<div class="input-group search-courses">
	 <input type="text" class="coursesearch" placeholder="Search Library">
		<span class="input-group-addon"><i class="icon-search"></i></span>
	</div>

	<div class="divider"> </div>

	<h4> Search Filters </h4>

	<h6 class="search-filters"> Topic </h6>
	<hr class="nomargin"/>
	<ul id="course-search-filters">
	  <li> <span class="searchtag green"></span><span class="checkbox-filter"><input type="checkbox" name="dts" id="check-dts" class="filtercheck" data-tag="dts" /> </span><label for="check-dts" class="filtertag-name"> DTS & Outreach</label></li>
	  <li> <span class="searchtag red"></span><span class="checkbox-filter"><input type="checkbox" name="schools" id="check-schools" class="filtercheck" data-tag="schools" /> </span><label  for="check-schools" class="filtertag-name"> Schools</label></li>
	  <li> <span class="searchtag orange"></span><span class="checkbox-filter"><input type="checkbox" name="events" id="check-events" class="filtercheck" data-tag="events" /> </span><label  for="check-events" class="filtertag-name"> Events</label></li>
	  <li> <span class="searchtag yellow"></span><span class="checkbox-filter"><input type="checkbox" name="meetings" id="check-meetings" class="filtercheck" data-tag="meetings" /> </span><label  for="check-meetings" class="filtertag-name"> Meetings</label></li>
	  <li> <span class="searchtag petroleum"></span><span class="checkbox-filter"><input type="checkbox" name="interviews" id="check-interviews" class="filtercheck" data-tag="interviews" /> </span><label  for="check-interviews" class="filtertag-name"> Interviews</label></li>
	  <li> <span class="searchtag purple"></span><span class="checkbox-filter"><input type="checkbox" name="conferences" id="check-conferences" class="filtercheck" data-tag="conferences" /> </span><label  for="check-conferences" class="filtertag-name"> Conferences</label></li>
	  <li> <span class="searchtag gray"></span><span class="checkbox-filter"><input type="checkbox" name="events" id="check-events" class="filtercheck" data-tag="events" /> </span><label  for="check-events" class="filtertag-name"> Events</label></li>

	</ul>
	<input type="hidden" name="year" value="2013">
	<h6 class="search-filters"> Authors <small class="libraryHead-filter"> <a href="#" class="chosenType" data-type="first_name"> First</a> / <a href="#" data-type="last_name"> Last</a> name</small> </h6>
	<hr class="nomargin"/>
	<ul id="course-search-filters-authors">
	 <?php foreach(range('A','Z') as $letter): ?>
	 	<li><a href="#" class="authorFilter" data-value="<?= $letter;?>"> <?=$letter;?> </a> </li>
	 <?php endforeach; ?>
	</ul>
 	<ul id="author-list">
 	<li class="single-author">
 	<div class="row">
 	<div class="col-lg-3"><img src="<?= get_bloginfo('template_url');?>/images/default_author.jpg" class="speakerpic" /></div>
 	<div class="col-lg-9"> <p class="speaker_name nomargin"> Loren Cunningham </p> <a href="#" class="speaker-website"> http://loren.com </a> </div>
 	</div>
 	</li>
 	</ul>
</form>