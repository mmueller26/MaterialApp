<?php

$material = new material();
$material->m_cat_name = htmlspecialchars(trim($_POST["material-categorie"]), ENT_QUOTES);

$material->deleteMaterialCat($mysqli_link);

$materialCat = new materialCat();
$materialCat->m_cat_name = htmlspecialchars(trim($_POST["material-categorie"]), ENT_QUOTES);

$materialCat->deleteMaterialCat($mysqli_link);

?>