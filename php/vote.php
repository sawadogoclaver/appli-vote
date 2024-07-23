<?php

$vote = $_POST['vote'] ?? null;

if ($vote) {
    $manager = new MongoDB\Driver\Manager("mongodb://mongo:27017");
    $bulk = new MongoDB\Driver\BulkWrite;

    $bulk->insert(['vote' => $vote]);

    $manager->executeBulkWrite('voteapp.votes', $bulk);

    echo "<p>Merci d'avoir voté pour : $vote</p>";
    echo "<a href='index.php'>Retourner au formulaire de vote</a>";
} else {
    echo "<p>Aucun vote sélectionné. Veuillez voter.</p>";
    echo "<a href='index.php'>Retourner au formulaire de vote</a>";
}
?>
