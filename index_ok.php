<?php
require './tools/helpers.php';
require './tools/database/connection_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Recettes</title>
  <script>
  //<![CDATA[
  document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.27.10'><\/script>"
    .replace("HOST", location.hostname));
  //]]>
  </script>
  <link href=https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css rel=stylesheet>
  <link href='assets/css/style.css' rel='stylesheet'>
</head>

<body>
  <div class=hero>
    <div class=hero-body>
      <div class=title>Les recettes à Jojo</div>
      <div class=subtitle>Pour devenir aussi fort que Le Jo' </div>
    </div>
  </div> <?php
if (!($_GET['azerty'] ?? null)) {
	?> <div class="level mt-4">
    <div class="has-text-centered level-item">
      <div>
        <div class=heading>Recettes</div>
        <div class=title> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', CONFIG_DB['user'], CONFIG_DB['pw']);
	$p                                = $o->query('SELECT COUNT(*) FROM recettes')->fetchColumn();
	echo $p; ?> </div>
      </div>
    </div>
    <div class="has-text-centered level-item">
      <div>
        <div class=heading>Ingrédients</div>
        <div class=title> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', CONFIG_DB['user'], CONFIG_DB['pw']);
	$p                                = $o->query('SELECT COUNT(*) FROM ingredient')->fetchColumn();
	echo $p; ?> </div>
      </div>
    </div>
    <div class="has-text-centered level-item">
      <div>
        <div class=heading>J'aime</div>
        <div class=title> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', CONFIG_DB['user'], CONFIG_DB['pw']);
	$p                                = $o->query('SELECT SUM(`like`) AS les_likes FROM recettes')->fetch();
	echo $p['les_likes']; ?> </div>
      </div>
    </div>
  </div>
  <div class=p-4> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', CONFIG_DB['user'], CONFIG_DB['pw']);
	$p                        = $o->query('SELECT * FROM recettes LIMIT ' . ($_GET['ttt'] ?? 3) . ', 3')->fetchAll(); ?>
    <div class=columns> <?php foreach ($p as $pr) {
    	?> <div class="is-4 column">
        <div class=card>
          <div class=card-image>
            <?php
    		//  aff($pr['picture']);
    	?>
            <div class="image is-4by3"><img src="./assets/imgs/<?php echo $pr['picture']; ?>.jpeg" alt="photo 1">
            </div>
          </div>
          <div class=card-content>
            <div class=media>
              <div class=media-content>
                <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', CONFIG_DB['user'], CONFIG_DB['pw']);
    	$pp                 = $o->query('SELECT * FROM personnes WHERE id = ' . $pr['user_id'])->fetch(); ?>
                <div class="title is-4"><?php echo $pp['username']; ?></div>
              </div>
            </div>
            <div class=content> <?php echo substr($pr['content'], 0, 20) . '...'; ?> <br><a
                href="/?azerty=<?php echo $pr['id']; ?>">Voir
                la recette</a><br><time datetime="<?php echo $pr['date']; ?>"><?php echo $pr['date']; ?></time></div>
          </div>
        </div>
      </div> <?php
    }
	?>
    </div> <?php

	?> <div class=pagination><a
        href="?ttt=<?php echo ($_GET['ttt'] ?? 0) ? (($_GET['ttt'] > 3) ? $_GET['ttt'] - 3 : 1) : 1; ?>"
        class=pagination-previous>Précédent</a> <a href="?ttt=<?php echo ($_GET['ttt'] ?? 0) ? $_GET['ttt'] + 3 : 1; ?>"
        class=pagination-next>Suivant</a></div>
  </div> <?php
} else {
	$o  = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
	$pp = $o->query('SELECT * FROM recettes WHERE id = ' . $_GET['azerty'])->fetchAll();
	?> <div class=card>
    <div class=card-image>
      <figure class="image is-4by3"><img src="/<?php echo $pp[0]['picture']; ?>.jpeg"></figure>
    </div>
    <div class=card-content>
      <div class=media>
        <div class=media-content>
          <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
	$ppp              = $o->query('SELECT * FROM personnes WHERE id = ' . $pp[0]['user_id'])->fetch(); ?>
          <div class="title is-4">
            <?php echo $ppp['username']; ?></div>
        </div>
      </div>
      <div class=content> <?php echo $pp[0]['content']; ?> </div>
      <div class=has-text-right><time datetime="<?php echo $pp[0]['date']; ?>"
          class="is-family-monospace is-size-6"><?php echo $pp[0]['date']; ?></time></div>
    </div>
    <div><a href=/ class="button m-4">Retour aux recettes</a></div>
  </div> <?php
}
?>

</body>

</html>