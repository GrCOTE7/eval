<?php

/**
 * (ɔ) Online FORMAPRO - GC7 - Éval. 10/2022.
 */

include_once './models/recettesModel.php';

$data['nbRecettes']    = getNbRecettes();
$data['nbIngredients'] = getNbIngredients();
$data['nbLikes']       = getNbLikes();


$data['recettes']       = getRecettes();
$data['username']=getUsernameById(1);


// aff($data);