<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section id="registered-pokemon">
    <?php $pokemons = json_decode(file_get_contents("http://localhost/phpsql1/pokebuild/entrypoint.php?name=Tortipouss")); ?>

    <div id="pokemons-grid">
            <div class="pokemon-card">
                <img src="<?= $pokemons->imageUrl ?>" alt=<?php echo $pokemons->name . "image" ?> />

                <?= $pokemons->name . " #" . $pokemons->id?>

                <div class="pokemon-family">

                    <?php if(gettype($pokemons->preEvolution) != "string") :?>
                        <?= $pokemons->preEvolution->name . " #" . $pokemons->preEvolution->id?>
                    <?php endif ?>

                    <?= $pokemons->evolutions[0]->name?>
                </div>
            </div>
    </div>
</section>
</body>
</html>

