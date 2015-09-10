<?php

	require_once 'inc/config.php'; // Beinhaltet die Daten zur Datenbank.
	require_once 'inc/standards.php'; // Beinhaltet alle Classen.
	$mysqli_link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // Stellt die Verbindung zur Datenbank her.
	
	$db_info_output = false; // true = Meldungen anzeigen
	$db_info = array();
	
	//Gibt den Status, der Verbindung zur Datenbank auf der Seite aus.
	if ($mysqli_link->connect_error) {
		$db_connection = array("Keine Verbindung", "cc-info-button-red");
	} else {
		$db_connection = array("Verbunden", "cc-info-button-green");
	};

	//Wird nur benötigt wenn noch keine Tabellen erstellt wurden.
	include_once 'inc/create_tables.php'; // Erstellt die Datenbank-Tabellen.

	$cc_output_area_height = 150 . "px";

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	
	<title>Material Datenbank | Cutcraft</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="http://www.cutcraft.de/wp-content/uploads/2014/12/favicon_32x32px.png" type="image/png">
	<link rel="icon" href="http://www.cutcraft.de/wp-content/uploads/2014/12/favicon_32x32px.png" type="image/png">
	
	
	<link rel="stylesheet" href="scss/reset.min.css" type="text/css" media="all"><!-- reset.css -->
	<link rel="stylesheet" href="scss/style.min.css" type="text/css" media="all"><!-- style.css -->
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="js/common.min.js"></script>
	
	<!-- Autocomplete -->
	<link rel="stylesheet" href="js/jquery/jquery-ui.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="js/jquery/jquery-ui.structure.min.css" type="text/css" media="all">	
	
	<script type="text/javascript" src="js/autocomplete.js"></script>
	<script type="text/javascript" src="js/autoload.js"></script>
	
	<!-- FontAwesome -->
	<link rel="stylesheet" href="scss/font-awesome/css/font-awesome.min.css">
	
</head>
<body>

	<div id="main-wrapper">
	
		<span class="material-app-version"><?php echo "<b>Version:</b> " . MATERIAL_APP_VERSION;?></span>
	
		<div id="item-list-container">
			
			<div style="position: absolute;	top: 15px; right: 15px;" class="cc-info-button <?php echo $db_connection[1]; ?>"><?php echo $db_connection[0]; ?></div>
			
			<h2>Materialien</h2>
		
			<!-- ROW 1 -->
			<div class="cc-one-third">
			
				<span class="label">Materialkategorie:</span>
				<div style="height: <?php echo $cc_output_area_height; ?>;" class="cc-material-info-output" id="material-categorie-output">
					<ul data-parent-name="">
						<?php 
						
						$material_categorie_output = "SELECT m_categorie_name FROM " . TABLE_MATERIAL_CATEGORIES . " ORDER BY m_categorie_name";
						$result = $mysqli_link->query($material_categorie_output);
							
						while($row = $result->fetch_array(MYSQLI_ASSOC)) {
							
							echo "<li class=''>" . $row['m_categorie_name'] . "</li>";
							
						}
						
						$result->free(); 	
						
						?>
					</ul>
				</div>
				
			</div>
			<div class="cc-one-third">
			
				<span class="label">Materialname:</span>
				<div style="height: <?php echo $cc_output_area_height; ?>;" class="cc-material-info-output" id="material-name-output">
					<ul data-parent-name="material-categorie">
					</ul>
				</div>
	
				</div>
			<div class="cc-one-third cc-last-column">
			
				<span class="label">Materialstärke:</span>
				<div style="height: <?php echo $cc_output_area_height; ?>;" class="cc-material-info-output" id="material-thickness-output">
					<ul data-parent-name="material-name">
					</ul>
				</div>
			
			</div>
			<div class="clear"></div>
			<!-- ROW 1 END -->
				
			<div id="cc-info-output-section">
			
				<div class="cc-h-line"></div>
				
				<h3 id="material-headline-output" style="margin-bottom: 2%;">Material: <span id="material-headline-categorie-output"></span><span id="material-headline-name-output"></span><span id="material-headline-thickness-output"></span></h3>
				
				<!-- ROW 2 -->
				<div class="cc-one-third">
				
					<h4>Laserschneiden <span>normal</span></h4>
					
					<div class="lasertag-cut-normal">
						<label for="lasertag-cut-normal">LaserTag:</label>
						<input type="text" name="lasertag-cut-normal" value="" class="cc-lasertag-input" id="lasertag-cut-normal" placeholder="" readonly>
						<div class="cc-lasertag-color" id="lasertag-cut-normal-color"></div>
					</div>
					
				</div>
				<div class="cc-one-third">
				
					<h4>Laserschneiden <span>fein</span></h4>
				
					<div>
						<label for="lasertag-cut-fine">LaserTag:</label>
						<input type="text" name="lasertag-cut-fine" value="" class="cc-lasertag-input" id="lasertag-cut-fine" placeholder="" readonly>
						<div class="cc-lasertag-color" id="lasertag-cut-fine-color"></div>
					</div>
				
				</div>
				<div class="cc-one-third cc-last-column">
				
					<h4>Laserschneiden <span>schnell</span></h4>
				
					<div>
						<label for="lasertag-cut-fast">LaserTag:</label>
						<input type="text" name="lasertag-cut-fast" value="" class="cc-lasertag-input" id="lasertag-cut-fast" placeholder="" readonly>
						<div class="cc-lasertag-color" id="lasertag-cut-fast-color"></div>
					</div>
				
				</div>
				<div class="clear"></div>		
				<!-- ROW 2 END -->
		
				
				<!-- ROW 3 -->
				<div class="cc-one-third">
				
					<h4>Lasergravieren <span>leicht</span></h4>
					
					<div>
						<label for="lasertag-engrave-low">LaserTag:</label>
						<input type="text" name="lasertag-engrave-low" value="" class="cc-lasertag-input" id="lasertag-engrave-low" placeholder="" readonly>
						<div class="cc-lasertag-color" id="lasertag-engrave-low-color"></div>
					</div>
				
				</div>
				<div class="cc-one-third">
				
					<h4>Lasergravieren <span>mittel</span></h4>
					
					<div>
						<label for="lasertag-engrave-medium">LaserTag:</label>
						<input type="text" name="lasertag-engrave-medium" value="" class="cc-lasertag-input" id="lasertag-engrave-medium" placeholder="" readonly>
						<div class="cc-lasertag-color" id="lasertag-engrave-medium-color"></div>
					</div>
					
				</div>
				<div class="cc-one-third cc-last-column">
				
					<h4>Lasergravieren <span>stark</span></h4>
					
					<div>
						<label for="lasertag-engrave-strong">LaserTag:</label>
						<input type="text" name="lasertag-engrave-strong" value="" class="cc-lasertag-input" id="lasertag-engrave-strong" placeholder="" readonly>
						<div class="cc-lasertag-color" id="lasertag-engrave-strong-color"></div>
					</div>
					
				</div>
				<div class="clear"></div>
				<!-- ROW 3 END -->
				
				<div class="cc-h-line"></div>
				
				<!-- ROW 4 -->
				<div class="cc-one-half cc-last-row">
				
					<div>
						<label for="material-filename-output">Dateiname:</label>
						<input type="text" name="material-filename-output" value="" id="material-filename-output" placeholder="" readonly>
					</div>
				
				</div>
				<div class="cc-one-half cc-last-row cc-last-column">
				
					<div>
						<label for="material-comment-output">Kommentar:</label>
						<input type="text" name="material-comment-output" value="" id="material-comment-output" placeholder="" readonly>
					</div>
				
				</div>
				<div class="clear"></div>
				<!-- ROW 4 END -->
				
			</div>
				
		</div>
		
		<?php 
			
			if (isset($_POST["material-submit"])) {
				
				if (isset($_POST["material-categorie"]) && strlen(trim($_POST["material-categorie"])) != 0 &&
					isset($_POST["material-name"]) && strlen(trim($_POST["material-name"])) != 0 &&
					isset($_POST["material-thickness"]) && strlen(trim($_POST["material-thickness"])) != 0) {
	
					$result = $mysqli_link->query("SELECT m_name, m_thickness FROM " . TABLE_MATERIALS ." 
						WHERE 
							m_categorie_name='" . htmlspecialchars(trim($_POST["material-categorie"]), ENT_QUOTES) . "' AND 
							m_name='" . htmlspecialchars(trim($_POST["material-name"]), ENT_QUOTES) . "' AND 
							m_thickness='" . str_replace(",", ".", htmlspecialchars(trim($_POST["material-thickness"]), ENT_QUOTES)) . "' 
						LIMIT 1");
	
					if (isset($_POST["material-delete"]) && $_POST["material-delete"] === "material-delete") {
						
						$material_status = "Material wurde gelöscht!";
						include 'inc/delete_material.php';
						
					} elseif ($result->num_rows > 0) {
						
						$material_status = "Material wurde aktualisiert und gespeichert!";
						include 'inc/update_material.php';
						
					} else {
						
						$material_status = "Material wurde erstellt und gespeichert!";						
						include 'inc/add_material.php';
						
					}
				
				} elseif (isset($_POST["material-delete"]) && $_POST["material-delete"] === "material-delete" && 
						  isset($_POST["material-categorie"]) && strlen(trim($_POST["material-name"])) == 0 && strlen(trim($_POST["material-thickness"])) == 0) {
						
					$material_status = "Materialkategorie (" . htmlspecialchars(trim($_POST["material-categorie"]), ENT_QUOTES) . ") und alle zugehörigen Materialen wurden gelöscht!";
					include 'inc/delete_material_cat.php';
					
				} else {
					
					$material_status = "Fehler bei der Eingabe!";
					
				}
				
			}
			
		?>
		
		<div id="new-item-container">
		
			<h2 id="button-toggle-new-item" class="toggle-close"><i class="fa fa-plus"></i>Neues Material hinzufügen</h2>
			
			<div id="container-toggle-new-itme">
			<form id="new-item-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			
				<!-- ROW 1 -->
				<div class="cc-one-third">
				
					<div>
						<label for="material-categorie">Materialkategorie:</label>
						<input type="text" name="material-categorie" data-parent-name="" value="" maxlength="200" id="material-categorie" class="cc-input-field <?php inputRequired('material-categorie'); ?>" placeholder="" autocomplete="off">
					</div>
					
				</div>
				<div class="cc-one-third">
				
					<div>
						<label for="material-name">Materialname:</label>
						<input type="text" name="material-name" data-parent-name="material-categorie" value="" maxlength="200" id="material-name" class="cc-input-field <?php inputRequired('material-name'); ?>" placeholder="" autocomplete="off">
					</div>
				
				</div>
				<div class="cc-one-third cc-last-column">
				
					<div>
						<label for="material-thickness">Materialstärke:</label>
						<input type="text" name="material-thickness" data-parent-name="material-name" value="" maxlength="10" id="material-thickness" class="cc-input-field <?php inputRequired('material-thickness', true); ?>" placeholder="mm" autocomplete="off">
					</div>
				
				</div>
				<div class="clear"></div>
				<!-- ROW 1 END -->
				
				<div class="cc-h-line"></div>
				
				<!-- ROW 2 -->
				<div class="cc-one-third">
				
					<h4>Laserschneiden <span>normal</span></h4>
					
					<div class="cc-one-half cc-last-row">
				
						<div>
							<label for="cut-speed-normal">Vorschub:</label>
							<input type="text" name="cut-speed-normal" value="" maxlength="4" id="cut-speed-normal" class="cc-input-field" placeholder="mm/min" autocomplete="off">
						</div>
						
					</div>
					<div class="cc-one-half cc-last-column cc-last-row">
					
						<div>
							<label for="cut-power-normal">Leistung:</label>
							<input type="text" name="cut-power-normal" value="" maxlength="3" id="cut-power-normal" class="cc-input-field" placeholder="%" autocomplete="off">
						</div>
						
					</div>
					<div class="clear"></div>
					
				</div>
				<div class="cc-one-third">
				
					<h4>Laserschneiden <span>fein</span></h4>
					
					<div class="cc-one-half cc-last-row">
				
						<div>
							<label for="cut-speed-fine">Vorschub:</label>
							<input type="text" name="cut-speed-fine" value="" maxlength="4" id="cut-speed-fine" class="cc-input-field" placeholder="mm/min" autocomplete="off">
						</div>
					
					</div>
					<div class="cc-one-half cc-last-column cc-last-row">
					
						<div>
							<label for="cut-power-fine">Leistung:</label>
							<input type="text" name="cut-power-fine" value="" maxlength="3" id="cut-power-fine" class="cc-input-field" placeholder="%" autocomplete="off">
						</div>
					
					</div>
					<div class="clear"></div>				
				
				</div>
				<div class="cc-one-third cc-last-column">
				
					<h4>Laserschneiden <span>schnell</span></h4>
					
					<div class="cc-one-half cc-last-row">
				
						<div>
							<label for="cut-speed-fast">Vorschub:</label>
							<input type="text" name="cut-speed-fast" value="" maxlength="4" id="cut-speed-fast" class="cc-input-field" placeholder="mm/min" autocomplete="off">
						</div>
						
					</div>
					<div class="cc-one-half cc-last-column cc-last-row">
					
						<div>
							<label for="cut-power-fast">Leistung:</label>
							<input type="text" name="cut-power-fast" value="" maxlength="3" id="cut-power-fast" class="cc-input-field" placeholder="%" autocomplete="off">
						</div>
						
					</div>
					<div class="clear"></div>
					
				</div>	
				<div class="clear"></div>		
				<!-- ROW 2 END -->
	
				
				<!-- ROW 3 -->
				<div class="cc-one-third">
				
					<h4>Lasergravieren <span>leicht</span></h4>
					
					<div class="cc-one-half cc-last-row">
				
						<div>
							<label for="engrave-speed-low">Vorschub:</label>
							<input type="text" name="engrave-speed-low" value="" maxlength="4" id="engrave-speed-low" class="cc-input-field" placeholder="mm/min" autocomplete="off">
						</div>
					
					</div>
					
					<div class="cc-one-half cc-last-column cc-last-row">
					
						<div>
							<label for="engrave-power-low">Leistung:</label>
							<input type="text" name="engrave-power-low" value="" maxlength="3" id="engrave-power-low" class="cc-input-field" placeholder="%" autocomplete="off">
						</div>
					
					</div>			
					<div class="clear"></div>	
				
				</div>
				<div class="cc-one-third">
				
					<h4>Lasergravieren <span>mittel</span></h4>
					
					<div class="cc-one-half cc-last-row">
				
						<div>
							<label for="engrave-speed-medium">Vorschub:</label>
							<input type="text" name="engrave-speed-medium" value="" maxlength="4" id="engrave-speed-medium" class="cc-input-field" placeholder="mm/min" autocomplete="off">
						</div>
					
					</div>
					
					<div class="cc-one-half cc-last-column cc-last-row">
					
						<div>
							<label for="engrave-power-medium">Leistung:</label>
							<input type="text" name="engrave-power-medium" value="" maxlength="3" id="engrave-power-medium" class="cc-input-field" placeholder="%" autocomplete="off">
						</div>
					
					</div>			
					<div class="clear"></div>	
				
				</div>
				<div class="cc-one-third cc-last-column">
				
					<h4>Lasergravieren <span>stark</span></h4>
					
					<div class="cc-one-half cc-last-row">
				
						<div>
							<label for="engrave-speed-strong">Vorschub:</label>
							<input type="text" name="engrave-speed-strong" value="" maxlength="4" id="engrave-speed-strong" class="cc-input-field" placeholder="mm/min" autocomplete="off">
						</div>
					
					</div>
					
					<div class="cc-one-half cc-last-column cc-last-row">
					
						<div>
							<label for="engrave-power-strong">Leistung:</label>
							<input type="text" name="engrave-power-strong" value="" maxlength="3" id="engrave-power-strong" class="cc-input-field" placeholder="%" autocomplete="off">
						</div>
					
					</div>			
					<div class="clear"></div>	
				
				</div>
				<div class="clear"></div>
				<!-- ROW 3 END -->
				
				<div class="cc-h-line"></div>
				
				<!-- ROW 4 -->
				<div class="cc-one-third">
				
					<div>
						<label for="material-price">Materialpreis:</label>
						<input type="text" name="material-price" value="" maxlength="10" id="material-price" class="cc-input-field" placeholder="" autocomplete="off">
					</div>
					
				</div>
				<div class="cc-two-thirds cc-last-column">
				
					<div>
						<label for="material-comment">Kommentar:</label>
						<input type="text" name="material-comment" value="" maxlength="255" id="material-comment" class="cc-input-field" placeholder="max. 255 Zeichen" autocomplete="off">
					</div>
				
				</div>
				<div class="clear"></div>
				<!-- ROW 4 END -->
				
				
				<!-- ROW 5 -->
				<div class="cc-two-thirds cc-last-row">
				
					<div>
						<input type="submit" name="material-submit" value="Material speichern" class="verticalAlignTop" id="material-submit">
						<div style="display: inline-block; height: 32px; line-height: 32px;"><?php if (isset($_POST["material-submit"])) { echo "<b>Status:</b> " . $material_status; } ?></div>
					</div>
							
				</div>
				<div class="cc-one-third cc-last-column cc-last-row">
				
					<div>
						<span class="cc-button-checkbox floatRight">
							<label for="material-delete">Material löschen</label>
							<input type="checkbox" name="material-delete" value="material-delete" id="material-delete">
						</span>
						<div class="clear"></div>
					</div>	

				</div>
				<div class="clear"></div>
				<!-- ROW 5 END -->
				
			</form>
			</div>
			
		</div>
		
		<?php
		
			if (isset($_POST["material-submit"]) && $db_info_output == true) {
				
				echo "<div>\n";
				echo "<h2>Meldungen</h2>";
					
				foreach ($db_info as $db_meldung) { echo $db_meldung; }
				
				/*
				if (isset($_POST["material-categorie"]) && strlen(trim($_POST["material-categorie"])) != 0 &&
						isset($_POST["material-name"]) && strlen(trim($_POST["material-name"])) != 0 &&
						isset($_POST["material-thickness"]) && strlen(trim($_POST["material-thickness"])) != 0 && trim(is_numeric($_POST["material-thickness"]))) {
								
							echo "<br>";
							echo "<pre>";
							print_r($newMaterial);
							echo "</pre>";
				
				}
				*/
				
				echo "</div>\n";
			
			}
			
		?>
			
		
	</div>

</body>
</html>