<?php

$material = new material();
$material->m_cat_name = htmlspecialchars(trim($_POST["material-categorie"]), ENT_QUOTES);
$material->m_name = htmlspecialchars(trim($_POST["material-name"]), ENT_QUOTES);
$material->m_thickness = htmlspecialchars(trim($_POST["material-thickness"]), ENT_QUOTES);

$material->deleteMaterial($mysqli_link);

?>