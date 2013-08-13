<?php

function test() {
	 return 'hi';
}
function get_category_for_base($base,$category) {

	$query = "select ter.name, ter.slug, count(p.ID) as total from wp_posts as p
			inner join  wp_postmeta as pm on pm.post_id = p.ID
			inner join  wp_term_relationships as tr on tr.object_id = p.ID
			inner join wp_term_taxonomy as tt on tt.term_id = tr.term_taxonomy_id 
			inner join wp_terms as ter on ter.term_id = tt.term_id
			where pm.meta_key ='base' and pm.meta_value =".$base." 
			and tt.taxonomy = '".$category."' group by ter.term_id";
	return execute($query);
}

function get_list_for_base($base,$type,$category,$categoryvalue) {
  $query = "select p.ID, p.post_title, p.post_name, u.display_name as author, p.post_date from wp_posts as p
			inner join  wp_postmeta as pm on pm.post_id = p.ID
			inner join  wp_term_relationships as tr on tr.object_id = p.ID
			inner join wp_term_taxonomy as tt on tt.term_id = tr.term_taxonomy_id 
			inner join wp_terms as ter on ter.term_id = tr.term_taxonomy_id
			inner join wp_users as u on u.ID = p.post_author
			where pm.meta_key ='base' and pm.meta_value =".$base." 
			and tt.taxonomy = '".$category."' 
			and tt.term_id = ".$categoryvalue."
			and p.post_type='".$type."'";
		
			return execute($query);
}

function get_event_categories_for_base($base){
	return get_category_for_base($base,'event_category');
}
function get_video_categories_for_base($base){
	return get_category_for_base($base,'video_category');
}

function execute($query) {
	global $wpdb;
	$output =  $wpdb->get_results($query);
	return $output;
}
?>