<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles/compiled/menu.css"/>
    <link rel="stylesheet" href="styles/compiled/pokemon.css"/>

    <title>PokéBuilder</title>
</head>
<body>
<?php
    require "menu.php";
    $pokemon = json_decode(file_get_contents("http://localhost/pokebuild/getPokemon.php?name=" . $_GET['name']));

    if ($pokemon == null) {
        header("Location: index.php");
        exit();
    }
?>

<div id="pokemon-card">
    <div id="main-frame">
        <div class="pokemon-name">
            <h2>
                <a href="http://localhost/pokebuild/pokemon.php?name=<?= $pokemon->name ?>">
                    <?= $pokemon->name ?>
                </a>
                #<?= $pokemon->id ?>
            </h2>
        </div>

        <img src="<?= $pokemon->imageUrl ?>"/>

        <div class="pokemon-types">
            <?php foreach ($pokemon->types as $type) : ?>
                <div class="type">
                    <img src="<?= $type->imageUrl ?>"/>
                    <p><?= $type->typeName ?></p>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <div id="stats">
        <ul>
            <?php $statArray = (array)$pokemon->stat; ?>

            <li>
                <span class="stat-name">HP</span>
                <span class="stat-value"><?= $statArray['HP'] ?></span>
            </li>
            <li>
                <span class="stat-name">Attack</span>
                <span class="stat-value"><?= $statArray['Attack'] ?></span>

            </li>
            <li>
                <span class="stat-name">Defense</span>
                <span class="stat-value"><?= $statArray['Defense'] ?></span>
            </li>
            <li>
                <span class="stat-name">Spe. Att</span>
                <span class="stat-value"><?= $statArray['Spe. Attack'] ?></span>

            </li>
            <li>
                <span class="stat-name">Spe. Def</span>
                <span class="stat-value"><?= $statArray['Spe. Defense'] ?></span>
            </li>
            <li>
                <span class="stat-name">Speed</span>
                <span class="stat-value"><?= $statArray['Speed'] ?></span>

            </li>
        </ul>
    </div>
</div>

<div id="related-pokemons">
    <?php if (gettype($pokemon->preEvolution) != "string") : ?>
        <div class="related">
            <?php
            $preEvolution = json_decode(file_get_contents("http://localhost/pokebuild/getPokemon.php?name=" . $pokemon->preEvolution->name));
            ?>

            <img src="<?= $preEvolution->spriteUrl ?>"/>

            <h3 class="related-pokemon-id">
                #<?= $preEvolution->pokedexId ?>
            </h3>

            <h3 class="related-pokemon-name">
                <a href="http://localhost/pokebuild/pokemon.php?name=<?= $preEvolution->name ?>">
                    <?= $preEvolution->name ?>
                </a>
            </h3>
        </div>
    <?php endif; ?>
    <?php foreach ($pokemon->evolutions as $evolution) : ?>
        <div class="related">
            <?php
            $evolution = json_decode(file_get_contents("http://localhost/pokebuild/getPokemon.php?name=" . $evolution->name));
            ?>

            <img src="<?= $evolution->spriteUrl ?>"/>

            <h3 class="related-pokemon-id">
                #<?= $evolution->pokedexId ?>
            </h3>

            <h3 class="related-pokemon-name">
                <a href="http://localhost/pokebuild/pokemon.php?name=<?= $evolution->name ?>">
                    <?= $evolution->name ?>
                </a>
            </h3>
        </div>
    <?php endforeach; ?>
</div>

<?php if ($pokemon->ability != "none") : ?>
    <div id="ability">
        Talent modificateur de résistances : <?= $pokemon->ability ?>
    </div>
<?php endif; ?>

<div id="type-affinities-table">
    <div id="types">
        <?php foreach ($pokemon->typeAffinities as $affinity) : ?>
            <div>
                <?= $affinity->typeName ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="affinities">
        <?php foreach ($pokemon->typeAffinities as $affinity) : ?>
            <div>
                <?= $affinity->damageMultiplier ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
