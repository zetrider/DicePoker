<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'vendor/autoload.php';

// Demo

use ZetRider\DicePoker\DemoDesk;
use ZetRider\DicePoker\Players\Player;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo DicePoker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-5 m-auto">
                    <?php
                    $name = !empty($_REQUEST['name']) ? htmlspecialchars($_REQUEST['name']) : null;

                    if ($name) :
                        $player = new Player();
                        $player->setName($name);

                        $desk = new DemoDesk($player);
                        $result = $desk->roll()->result();
                    ?>
                        <h1 class="display-4"><?= $name; ?></h1>
                        <p class="lead">
                            одним броском выпали комбинации:
                        </p>
                        <ul class="list-unstyled">
                            <?php foreach ($result->combinations() as $combination) : ?>
                                <li><?= $combination ?></li>
                            <?php endforeach; ?>
                        </ul>
                        Лучшая комбинация: <?= $result->combination() ?>
                        <hr>
                        <a href="?name=<?= $name ?>&rnd=<?= time() ?>">Бросить еще</a>
                    <?php else : ?>
                        <form>
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Enter</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</body>

</html>