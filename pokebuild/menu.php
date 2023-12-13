<div id="menu">
    <div>
        <a href="http://localhost/phpsql1/pokebuild/">
            <h1>PokéBuilder</h1>
        </a>
    </div>

    <div>
        <form method="GET" action="http://localhost/phpsql1/pokebuild/getPokemon.php">
            <input type="text" id="searchInput" name="name-or-id" placeholder="Nom ou ID du Pokémon..."/>

            <button type="submit">
                <img src="assets/search.png"/>
            </button>
        </form>
    </div>

    <div>
        <div id="gen-filter">
            <?php
            $gens = json_decode(file_get_contents("http://localhost/phpsql1/pokebuild/getGens.php"))
            ?>

            <?php foreach ($gens as $gen) : ?>
                <a href="http://localhost/phpsql1/pokebuild/index.php?gen=<?= $gen?>">
                    Gen <?= $gen ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
