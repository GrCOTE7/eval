<?php

/**
 * (ɔ) Online FORMAPRO - GC7 - 2022.
 */

require_once 'config_db.php';

try {
	$connection = new PDO(
		'mysql:host=' . CONFIG_DB['host'] . ';dbname=' . CONFIG_DB['dbname'] . ';charset=utf8',
		CONFIG_DB['user'],
		CONFIG_DB['pw']
	);
} catch (\Exception $e) {
	exit('Erreur : ' . $e->getMessage());
}