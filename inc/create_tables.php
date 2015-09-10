<?php
$new_table_material_categories = "CREATE TABLE IF NOT EXISTS " . TABLE_MATERIAL_CATEGORIES . " (
		m_categorie_name VARCHAR(255) NOT NULL,
		m_categorie_description TEXT NOT NULL,
		reg_date TIMESTAMP,
		PRIMARY KEY (m_categorie_name)
	)";

$new_table_materials = "CREATE TABLE IF NOT EXISTS " . TABLE_MATERIALS . " (
		m_categorie_name VARCHAR(255) NOT NULL,
		m_id INT(11) UNSIGNED AUTO_INCREMENT NULL,
		m_name VARCHAR(200) NOT NULL,
		m_thickness DECIMAL(9,2) UNSIGNED NOT NULL,
		cut_speed_normal SMALLINT(5) UNSIGNED NULL,
		cut_power_normal TINYINT(3) UNSIGNED NULL,
		cut_speed_fine SMALLINT(5) UNSIGNED NULL,
		cut_power_fine TINYINT(3) UNSIGNED NULL,
		cut_speed_fast SMALLINT(5) UNSIGNED NULL,
		cut_power_fast TINYINT(3) UNSIGNED NULL,
		engrave_speed_low SMALLINT(5) UNSIGNED NULL,
		engrave_power_low TINYINT(3) UNSIGNED NULL,
		engrave_speed_medium SMALLINT(5) UNSIGNED NULL,
		engrave_power_medium TINYINT(3) UNSIGNED NULL,
		engrave_speed_strong SMALLINT(5) UNSIGNED NULL,
		engrave_power_strong TINYINT(3) UNSIGNED NULL,
		m_price DECIMAL(9,2) UNSIGNED NULL,
		m_comment VARCHAR(255) NOT NULL,
		reg_date TIMESTAMP,
		PRIMARY KEY (m_id),
		FOREIGN KEY (m_categorie_name) REFERENCES " . TABLE_MATERIAL_CATEGORIES . "(m_categorie_name)
	)";
	

if($db_info_output == true) {
	
	if ($mysqli_link->query($new_table_material_categories)) {
		$db_info[] = "\nTabelle ( <b>" . TABLE_MATERIAL_CATEGORIES . "</b> ) wurde erfolgreich erstellt.<br>";
	} else {
		$db_info[] = "\nFehler beim erstellen der Tabelle ( <b>" . TABLE_MATERIAL_CATEGORIES . "</b> ): <b>" . $mysqli_link->error . "</b><br>";
	}
	
	if ($mysqli_link->query($new_table_materials)) {
		$db_info[] = "\nTabelle ( <b>" . TABLE_MATERIALS . "</b> ) wurde erfolgreich erstellt.<br>";
	} else {
		$db_info[] = "\nFehler beim erstellen der Tabelle ( <b>" . TABLE_MATERIALS . "</b> ): <b>" . $mysqli_link->error . "</b><br>";
	}
	
} else {

	$mysqli_link->query($new_table_material_categories);
	$mysqli_link->query($new_table_materials);
	
}

?>