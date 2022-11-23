<?php
class WaterStepsModel {

public $id;     // (int)
public $icon;  // класс иконки из fontawesome (tinytext)
public $title; // заголовок (tinytext)
public $text;    // текст (text)



/**
 * Run
 */
public function __construct(){

}



public function get($id){
	global $wpdb;

	$query = "SELECT * FROM `" . WATER_STEPS_DB_TABLE_NAME . "` WHERE id = '" . $id . "' LIMIT 1";
	$row = $wpdb->get_row($query, 'OBJECT');

	$this->id 		= $id;
	$this->icon 	= is_null($row->icon)   ? '' : $row->icon;
	$this->title  = is_null($row->title) ? '' : $row->title;
	$this->text 	= is_null($row->text)   ? '' : $row->text;

	return $this;
}

public function get_list(){
	global $wpdb;

	$query = "SELECT * FROM `" . WATER_STEPS_DB_TABLE_NAME . "`";
	$list = $wpdb->get_results($query, 'OBJECT_K');

	if ( $list )
		return $list;
	else
		return [];
}

public function save(){
	global $wpdb;

	if (is_null($this->id))
		$this->add();
	else
		$this->edit();

	return $this;
}

public function delete($id){
	global $wpdb;

	return  $wpdb->delete(
				WATER_STEPS_DB_TABLE_NAME,
				[
					'id' => $id
				]
			);
}

public function add(){
	global $wpdb;

	$rows_affected = $wpdb->insert(
				WATER_STEPS_DB_TABLE_NAME,
				[
					'icon' 	=> $this->icon,
					'title'   => $this->title,
					'text' 		=> $this->text					
				]
			);
	return $rows_affected;
}

public function edit(){
	global $wpdb;

	return 	$wpdb->update(
				WATER_STEPS_DB_TABLE_NAME,
				[
					'icon' 	=> $this->icon,
					'title'   => $this->title,
					'text' 		=> $this->text
				],
				[
					'id' => $this->id
				]
			);
}

}
