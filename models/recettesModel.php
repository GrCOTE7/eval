<?php

/**
 * (ɔ) Online FORMAPRO - GC7 - Éval. 10/2022.
 */

function getNbRecettes()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT COUNT(*) FROM recettes')->fetchColumn();
}

function getNbIngredients()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT COUNT(*) FROM ingredient')->fetchColumn();
}

function getNbLikes()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT SUM(`like`) AS likes FROM recettes')->fetchColumn();
}

function getRecettes()
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT * FROM recettes LIMIT ' . ($_GET['ttt'] ?? 3) . ', 3')
		->fetchAll();
}

function getUsernameById(int $id): string
{
	include './tools/database/connection_db.php';

	return $connection->query('SELECT username FROM personnes WHERE id = ' . $id)->fetchColumn();
}