<?php

$material = new material();
$material->m_cat_name = htmlspecialchars(trim($_POST["material-categorie"]), ENT_QUOTES);
$material->m_name = htmlspecialchars(trim($_POST["material-name"]), ENT_QUOTES);
$material->m_thickness = str_replace(",", ".", htmlspecialchars(trim($_POST["material-thickness"]), ENT_QUOTES));

$materialInputNames = array(
		"cut-speed-normal" => "cut_speed_normal",
		"cut-power-normal" => "cut_power_normal",
		"cut-speed-fine" => "cut_speed_fine",
		"cut-power-fine" => "cut_power_fine",
		"cut-speed-fast" => "cut_speed_fast",
		"cut-power-fast" => "cut_power_fast",
		"engrave-speed-low" => "engrave_speed_low",
		"engrave-power-low" => "engrave_power_low",
		"engrave-speed-medium" => "engrave_speed_medium",
		"engrave-power-medium" => "engrave_power_medium",
		"engrave-speed-strong" => "engrave_speed_strong",
		"engrave-power-strong" => "engrave_power_strong"
);

foreach ($materialInputNames as $materialInputName => $tableFieldName) {

	if (isset($_POST[$materialInputName]) && strlen(trim($_POST[$materialInputName])) != 0 && trim(is_numeric($_POST[$materialInputName]))) {
		
		$material->$tableFieldName = htmlspecialchars(trim($_POST[$materialInputName]), ENT_QUOTES);
		
	} else {

		$material->$tableFieldName = "NULL";

	}

}

if (isset($_POST["material-price"]) && strlen(trim($_POST["material-price"])) != 0) {
	
	$material->m_price = str_replace(",", ".", htmlspecialchars(trim($_POST["material-price"]), ENT_QUOTES));
	
} else {
	
	$material->m_price = "NULL";
	
}

if (isset($_POST["material-comment"]) && strlen(trim($_POST["material-comment"])) != 0) {
	
	$material->m_comment = htmlspecialchars(trim($_POST["material-comment"]), ENT_QUOTES);
	
} else {
	
	$material->m_comment = htmlspecialchars("Kein Kommentar vorhanden!", ENT_QUOTES);
	
}

$material->updateMaterial($mysqli_link);
				
?>