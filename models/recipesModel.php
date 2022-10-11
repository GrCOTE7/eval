<?php

/**
 * (ɔ) Online FORMAPRO - GC7 - Éval. 10/2022.
 */

function getNbRecipes()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT COUNT(*) FROM recipes')->fetchColumn();
}

function getNbIngredients()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT COUNT(*) FROM ingredients')->fetchColumn();
}

function getNbLikes()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT SUM(`like`) AS likes FROM recipes')->fetchColumn();
}

function getRecipes()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT * FROM recipes LIMIT ' . ($_GET['ttt'] ?? 3) . ', 3')
		->fetchAll();
}

function getUsernameById(int $id): string
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT username FROM persons WHERE id = ' . $id)->fetchColumn();
}