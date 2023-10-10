    <?php
    require "src/Fighter.php";

    $héraclès = new Fighter("Héraclès 🧔", 20, 6);
    $lionDeNemee = new Fighter("Lion de Némée 🦁", 11, 13);

    //COMBAT A MORT BOUCLE :
    $round = 0;

    while ($héraclès->isAlive() && $lionDeNemee->isAlive()) {
        // Affichage des tours:
        $round = $round + 1;
        echo "Round 🕛 n° " . $round . PHP_EOL;

        // Tour de Héraclés:
        $héraclès->Fight($lionDeNemee);

        // Vérification si Lion de Némée est encore en vie sinon affichage vainceur/perdant
        if (!$lionDeNemee->isAlive()) {
            echo $héraclès->getName() . " gagne le combat et " . $lionDeNemee->getName() . " perd." . PHP_EOL;
            break;
        }

        // Tour de Lion de Némée:
        $lionDeNemee->Fight($héraclès);

        // Vérification si Héraclès est encore en vie sinon affichage vainceur/perdant
        if (!$héraclès->isAlive()) {
            echo $lionDeNemee->getName() . " gagne le combat et " . $héraclès->getName() . " perd." . PHP_EOL;
            break;
        }
    }
