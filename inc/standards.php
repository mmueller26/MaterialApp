<?php

class materialCat {
	
	const TABLE_MATERIAL_CATEGORIES = "material_categories"; // Name der Materialkategorie-Tabelle.
	
	public $m_cat_name;
	public $m_cat_description;

	public $material_status;
		
	public function addMaterialCat($mysqli_link) {
	
		$add_material_categorie = "INSERT INTO " . self::TABLE_MATERIAL_CATEGORIES . " (
			m_categorie_name,
			m_categorie_description
		) VALUES (
			'" . $this->m_cat_name . "',
			'" . $this->m_cat_description . "'
		)";
		
		$mysqli_link->query($add_material_categorie);
		
	}
	
	public function deleteMaterialCat($mysqli_link) {
	
		$this->material_status = "Material wurde gelöscht!";
	
		$delete_material = "DELETE FROM " . self::TABLE_MATERIAL_CATEGORIES . "
		WHERE
			" . self::TABLE_MATERIAL_CATEGORIES . ".m_categorie_name='" . $this->m_cat_name . "'
		LIMIT 1";
	
		$mysqli_link->query($delete_material);
	
	}
	
}

class material {
	
	const TABLE_MATERIALS = "materials"; // Name der Material-Tabelle.
	
	public $m_cat_name;
	public $m_name;
	public $m_thickness;
	public $cut_speed_normal;
	public $cut_power_normal;
	public $cut_speed_fine;
	public $cut_power_fine;
	public $cut_speed_fast;
	public $cut_power_fast;
	public $engrave_speed_low;
	public $engrave_power_low;
	public $engrave_speed_medium;
	public $engrave_power_medium;
	public $engrave_speed_strong;
	public $engrave_power_strong;
	public $m_price;
	public $m_comment;
	
	public $material_status;

	public function addMaterial($mysqli_link) {
				
		$this->material_status = "Material wurde gespeichert!";
		
		$add_material = "INSERT INTO " . self::TABLE_MATERIALS . " (
			m_categorie_name,
			m_id,
			m_name,
			m_thickness,
			cut_speed_normal,
			cut_power_normal,
			cut_speed_fine,
			cut_power_fine,
			cut_speed_fast,
			cut_power_fast,
			engrave_speed_low,
			engrave_power_low,
			engrave_speed_medium,
			engrave_power_medium,
			engrave_speed_strong,
			engrave_power_strong,
			m_price,
			m_comment
		) VALUES (
			'" . $this->m_cat_name . "',
			NULL,
			'" . $this->m_name . "',
			" . $this->m_thickness . ",
			" . $this->cut_speed_normal . ",
			" . $this->cut_power_normal . ",
			" . $this->cut_speed_fine . ",
			" . $this->cut_power_fine . ",
			" . $this->cut_speed_fast . ",
			" . $this->cut_power_fast . ",
			" . $this->engrave_speed_low . ",
			" . $this->engrave_power_low . ",
			" . $this->engrave_speed_medium . ",
			" . $this->engrave_power_medium . ",
			" . $this->engrave_speed_strong . ",
			" . $this->engrave_power_strong . ",
			" . $this->m_price . ",
			'" . $this->m_comment . "'
		)";		

		$mysqli_link->query($add_material);
		
	}
	
	public function updateMaterial($mysqli_link) {
		
		$this->material_status = "Material wurde aktualisiert!";
		
		$update_material = "UPDATE " . self::TABLE_MATERIALS . " SET
			cut_speed_normal=" . $this->cut_speed_normal . ",
			cut_power_normal=" . $this->cut_power_normal . ",
			cut_speed_fine=" . $this->cut_speed_fine . ",
			cut_power_fine=" . $this->cut_power_fine . ",
			cut_speed_fast=" . $this->cut_speed_fast . ",
			cut_power_fast=" . $this->cut_power_fast . ",
			engrave_speed_low=" . $this->engrave_speed_low . ",
			engrave_power_low=" . $this->engrave_power_low . ",
			engrave_speed_medium=" . $this->engrave_speed_medium . ",
			engrave_power_medium=" . $this->engrave_power_medium . ",
			engrave_speed_strong=" . $this->engrave_speed_strong . ",
			engrave_power_strong=" . $this->engrave_power_strong . ",
			m_price=" . $this->m_price . ",
			m_comment='" . $this->m_comment . "'
		WHERE
			" . self::TABLE_MATERIALS . ".m_categorie_name='" . $this->m_cat_name . "' AND
			" . self::TABLE_MATERIALS . ".m_name='" . $this->m_name . "' AND
			" . self::TABLE_MATERIALS . ".m_thickness=" . $this->m_thickness . "
		LIMIT 1";
		
		$mysqli_link->query($update_material);
		
	}

	public function deleteMaterial($mysqli_link) {

		$this->material_status = "Material wurde gelöscht!";
		
		$delete_material = "DELETE FROM " . self::TABLE_MATERIALS . "
		WHERE
			" . self::TABLE_MATERIALS . ".m_categorie_name='" . $this->m_cat_name . "' AND
			" . self::TABLE_MATERIALS . ".m_name='" . $this->m_name . "' AND
			" . self::TABLE_MATERIALS . ".m_thickness=" . $this->m_thickness . "
		LIMIT 1";
		
		$mysqli_link->query($delete_material);
		
	}

	public function deleteMaterialCat($mysqli_link) {
	
		$this->material_status = "Material zur Materialkategorie wurde gelöscht!";
	
		$delete_material = "DELETE FROM " . self::TABLE_MATERIALS . "
		WHERE " . self::TABLE_MATERIALS . ".m_categorie_name='" . $this->m_cat_name . "'";
	
		$mysqli_link->query($delete_material);
	
	}
	
}

function inputRequired($input, $type = false) {
	
	if(!isset($_POST["material-delete"])) {
	
		if(isset($_POST[$input])) {
			
			if($type == true) {
				
				$isNumeric = str_replace(",", ".", trim($_POST[$input]));
				
				if(strlen(trim($_POST[$input])) == 0 || !is_numeric($isNumeric)) {
				
					echo " cc-input-required";
				
				}
				
			} else {
				
				if(strlen(trim($_POST[$input])) == 0) {
				
					echo " cc-input-required";
				
				}
				
			}
			
		}
		
	}
	
}


















?>