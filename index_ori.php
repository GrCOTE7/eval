<?php
require 'connection.php';


?>
<!DOCTYPE html>
<html lang=fr>

<head>

  <title>Mes recettes</title>
</head>

<body>
  <link href=https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css rel=stylesheet>
  <link href=file.css rel=stylesheet>
  <div class=hero>
    <div class=hero-body>
      <div class=title>Les recettes à Jojo</div>
      <div class=subtitle>Pour devenir aussi fort que Le Jo'</div>
    </div>
  </div> <?php
if(!($_GET['azerty'] ?? null)) {
    ?> <div class="level mt-4">
    <div class="has-text-centered level-item">
      <div>
        <div class=heading>Recettes</div>
        <div class=title> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
                    $p = $o->query("SELECT COUNT(*) FROM recettes")->fetchColumn();
                    echo $p; ?> </div>
      </div>
    </div>
    <div class="has-text-centered level-item">
      <div>
        <div class=heading>Ingrédients</div>
        <div class=title> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
                    $p = $o->query("SELECT COUNT(*) FROM ingredient")->fetchColumn();
                    echo $p; ?> </div>
      </div>
    </div>
    <div class="has-text-centered level-item">
      <div>
        <div class=heading>J'aime</div>
        <div class=title> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
                    $p = $o->query("SELECT SUM(`like`) AS les_likes FROM recettes")->fetch();
                    echo $p['les_likes']; ?> </div>
      </div>
    </div>
  </div>
  <div class=p-4> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
        $p = $o->query("SELECT * FROM recettes LIMIT ".($_GET['ttt'] ?? 3).", 3")->fetchAll(); ?> <div class=columns> <?php foreach ($p as $pr) {
                ?> <div class="is-4 column">
        <div class=card>
          <div class=card-image>
            <div class="image is-4by3"><img src="/<?= $pr['picture'] ?>.jpeg"></div>
          </div>
          <div class=card-content>
            <div class=media>
              <div class=media-content> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
                                    $pp = $o->query("SELECT * FROM personnes WHERE id = ".$pr['user_id'])->fetch(); ?>
                <div class="title is-4"><?= $pp['username'] ?></div>
              </div>
            </div>
            <div class=content> <?= substr($pr['content'], 0, 20).'...' ?> <br><a href="/?azerty=<?= $pr['id']?>">Voir
                la recette</a><br><time datetime="<?= $pr['date'] ?>"><?= $pr['date'] ?></time></div>
          </div>
        </div>
      </div> <?php
            }
            ?> </div> <?php

        ?> <div class=pagination><a
        href="?ttt=<?= (($_GET["ttt"] ?? 0) ? (($_GET["ttt"] > 3) ? $_GET["ttt"] - 3 : 1) : 1) ?>"
        class=pagination-previous>Précédent</a> <a href="?ttt=<?= (($_GET["ttt"] ?? 0) ? $_GET["ttt"] + 3 : 1) ?>"
        class=pagination-next>Suivant</a></div>
  </div> <?php
} else {
    $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
    $pp = $o->query("SELECT * FROM recettes WHERE id = " . $_GET['azerty'])->fetchAll();
    ?> <div class=card>
    <div class=card-image>
      <figure class="image is-4by3"><img src="/<?= $pp[0]['picture'] ?>.jpeg"></figure>
    </div>
    <div class=card-content>
      <div class=media>
        <div class=media-content> <?php $o = new PDO('mysql:host=127.0.0.1;dbname=recette', 'root', '');
                    $ppp = $o->query("SELECT * FROM personnes WHERE id = ".$pp[0]['user_id'])->fetch(); ?> <div
            class="title is-4"><?= $ppp['username'] ?></div>
        </div>
      </div>
      <div class=content> <?= $pp[0]['content'] ?> </div>
      <div class=has-text-right><time datetime="<?= $pp[0]['date'] ?>"
          class="is-family-monospace is-size-6"><?= $pp[0]['date'] ?></time></div>
    </div>
    <div><a href=/ class="button m-4">Retour aux recettes</a></div>
  </div> <?php
}
?>