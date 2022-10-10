<?php

/**
 * (ɔ) Online FORMAPRO - GC7 - Éval. 10/2022.
 */

require_once './vendor/autoload.php';
require_once './tools/helpers.php';
require_once './config/settings.php';

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig   = new \Twig\Environment($loader, [
	'cache' => APP['twigCache'],
	'debug' => APP['twigDebug'],
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$page = 'index';

require_once controllers($page);
$template = $twig->load('pages/' . $page . 'View.twig');

echo $template->render(
    [
        'title' => $title ?? null,
        'data'  => $data ?? null,
    ]
);