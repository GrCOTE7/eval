<?php

/**
 * (ɔ) Online FORMAPRO - GC7 - Éval. 10/2022.
 */

include_once './models/recipesModel.php';

$title = 'Liste';

$data['nbRecipes']    = getNbRecipes();
$data['nbIngredients'] = getNbIngredients();
$data['nbLikes']       = getNbLikes();


$data['recipes']       = getRecipes();
$data['username']=getUsernameById(1);


// aff($data);