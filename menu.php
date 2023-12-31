<div id="menu">
    <div>
        <a href="http://localhost/pokebuild/">
            <h1>PokéBuilder</h1>
        </a>
    </div>

    <div>
        <form method="GET" action="http://localhost/pokebuild/pokemon.php">
            <input type="text" id="searchInput" name="name" placeholder="Nom ou ID du Pokémon..."/>

            <button type="submit">
                <img src="assets/search.png"/>
            </button>
        </form>
    </div>

    <div>
        <div id="gen-filter">
            <?php
            $gens = json_decode(file_get_contents("http://localhost/pokebuild/getGens.php"))
            ?>

            <?php foreach ($gens as $gen) : ?>
                <a href="http://localhost/pokebuild/index.php?gen=<?= $gen?>">
                    G<?= $gen ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
