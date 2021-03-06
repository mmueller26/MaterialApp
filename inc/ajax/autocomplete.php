<?php

	require_once '../config.php'; // Beinhaltet die Daten zur Datenbank.

	/* prevent direct access to this page */
	$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
	
	if(!$isAjax) {
		$user_error = 'Access denied - direct call is not allowed...';
		trigger_error($user_error, E_USER_ERROR);
	}
	
	ini_set('display_errors',1);
	
	/* if the 'term' variable is not sent with the request, exit */
	if ( !isset($_REQUEST['term']) ) {
		exit;
	}	
	
	$mysqli_link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // Stellt die Verbindung zur Datenbank her.
	
	/* retrieve the search term that autocomplete sends */
	$term = trim(strip_tags($_GET['term']));
	$parentName = trim(strip_tags($_GET['parentName']));
	$parentValue = trim(strip_tags($_GET['parentValue']));
	
	$isParent = false;
	$isParent = trim(strip_tags($_GET['parentValue']));
	
	$a_json = array();
	$a_json_row = array();
	
	if ($parentName == "") {
		if ($data = $mysqli_link->query("SELECT DISTINCT * FROM " . TABLE_MATERIAL_CATEGORIES . " WHERE m_categorie_name LIKE '%" . $term . "%' ORDER BY m_categorie_name")) {
			while($row = mysqli_fetch_array($data)) {
				$m_categorie_name = htmlentities(stripslashes($row['m_categorie_name']));
				
				$a_json_row["value"] = $m_categorie_name;
				
				array_push($a_json, $a_json_row);
			}
		}
	}
	
	if ($parentName == 'material-categorie' && strlen($parentValue) != 0) {
		if ($data = $mysqli_link->query("SELECT DISTINCT * FROM " . TABLE_MATERIALS . " WHERE m_name LIKE '%" . $term . "%' AND m_categorie_name LIKE '%" . $parentValue . "%' GROUP BY m_name ORDER BY m_categorie_name , m_name")) {
			while($row = mysqli_fetch_array($data)) {
				$m_name = htmlentities(stripslashes($row['m_name']));
				
				$a_json_row["value"] = $m_name;
				
				array_push($a_json, $a_json_row);
			}
		}
	} 
	
	if ($parentName == 'material-name' && strlen($parentValue) != 0) {
		if ($data = $mysqli_link->query("SELECT DISTINCT * FROM " . TABLE_MATERIALS . " WHERE m_thickness LIKE '%" . $term . "%' AND m_name LIKE '%" . $parentValue . "%' GROUP BY m_thickness ORDER BY m_name , m_thickness")) {
			while($row = mysqli_fetch_array($data)) {
				
				$m_thickness = htmlentities(stripslashes($row['m_thickness']));
				$m_price = htmlentities(stripslashes($row['m_price']));
				$m_comment = htmlentities(stripslashes($row['m_comment']));
				
				$cut_speed_normal = htmlentities(stripslashes($row['cut_speed_normal']));
				$cut_power_normal = htmlentities(stripslashes($row['cut_power_normal']));
				$cut_speed_fine = htmlentities(stripslashes($row['cut_speed_fine']));
				$cut_power_fine = htmlentities(stripslashes($row['cut_power_fine']));
				$cut_speed_fast = htmlentities(stripslashes($row['cut_speed_fast']));
				$cut_power_fast = htmlentities(stripslashes($row['cut_power_fast']));
				$engrave_speed_low = htmlentities(stripslashes($row['engrave_speed_low']));
				$engrave_power_low = htmlentities(stripslashes($row['engrave_power_low']));
				$engrave_speed_medium = htmlentities(stripslashes($row['engrave_speed_medium']));
				$engrave_power_medium = htmlentities(stripslashes($row['engrave_power_medium']));
				$engrave_speed_strong = htmlentities(stripslashes($row['engrave_speed_strong']));
				$engrave_power_strong = htmlentities(stripslashes($row['engrave_power_strong']));
				
				$a_json_row["value"] = $m_thickness;
				$a_json_row["materialPrice"] = $m_price;
				$a_json_row["materialComment"] = $m_comment;
				
				$a_json_row["cutSpeedNormal"] = $cut_speed_normal;
				$a_json_row["cutPowerNormal"] = $cut_power_normal;
				$a_json_row["cutSpeedFine"] = $cut_speed_fine;
				$a_json_row["cutPowerFine"] = $cut_power_fine;
				$a_json_row["cutSpeedFast"] = $cut_speed_fast;
				$a_json_row["cutPowerFast"] = $cut_power_fast;
				$a_json_row["engraveSpeedLow"] = $engrave_speed_low;
				$a_json_row["engravePowerLow"] = $engrave_power_low;
				$a_json_row["engraveSpeedMedium"] = $engrave_speed_medium;
				$a_json_row["engravePowerMedium"] = $engrave_power_medium;
				$a_json_row["engraveSpeedStrong"] = $engrave_speed_strong;
				$a_json_row["engravePowerStrong"] = $engrave_power_strong;
				
				array_push($a_json, $a_json_row);
			}
		}
	} 
	
	// jQuery wants JSON data
	echo json_encode($a_json);
	flush();
	
	$mysqli_link->close();

?>