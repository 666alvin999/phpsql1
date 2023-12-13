<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles/compiled/index.css">

    <title>PokéBuilder</title>
</head>
<body>
<section id="registered-pokemon">
    <?php
    $pokemons = json_decode(file_get_contents("http://localhost/phpsql1/pokebuild/entrypoint.php"));
    ?>

    <div id="pokemon-cards-grid">
        <?php foreach ($pokemons as $pokemon): ?>
            <div class="pokemon-card">
                <div class="main-pokemon">
                    <h2 class="pokemon-name">
                        <a href="http://localhost/phpsql1/pokebuild/entrypoint.php/?name=<?= $pokemon->name ?>">
                            <?= $pokemon->name ?>
                        </a>
                        #<?= $pokemon->id ?>
                    </h2>

                    <img src="<?= $pokemon->imageUrl ?>"/>

                    <div class="pokemon-types">
                        <?php foreach ($pokemon->types as $type) : ?>
                            <img src="<?= $type->imageUrl ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="related-pokemons">
                    <div class="pre-evolution">
                        <?php if (gettype($pokemon->preEvolution) == "object") : ?>
                            <h3 class="pre-evolution-name">
                                #<?= $pokemon->preEvolution->pokedexId ?><br/>
                                <a href="http://localhost/phpsql1/pokebuild/entrypoint.php/?name=<?= $pokemon->preEvolution->name ?>">
                                    <?= $pokemon->preEvolution->name ?>
                                </a>
                            </h3>

                        <?php else : ?>
                            <h3 class="pre-evolution-name">
                                Pas de pré-évolution
                            </h3>
                        <?php endif; ?>
                    </div>
                    <div class="evolution">
                        <?php if (count($pokemon->evolutions) != 0) : ?>
                            <?php foreach ($pokemon->evolutions as $evolution) : ?>
                                <h3 class="evolution-name">
                                    #<?= $evolution->pokedexId ?><br/>
                                    <a href="http://localhost/phpsql1/pokebuild/entrypoint.php/?name=<?= $evolution->name ?>">
                                        <?= $evolution->name ?>
                                    </a>
                                </h3>
                            <?php endforeach; ?>

                        <?php else : ?>
                            <h3 class="evolution-name">
                                Pas d'évolution
                            </h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>

