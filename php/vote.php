<?php

$vote = $_POST['vote'] ?? null;

if ($vote) {
    $host = getenv('POSTGRES_HOST');
    $dbname = getenv('POSTGRES_DB');
    $user = getenv('POSTGRES_USER');
    $password = getenv('POSTGRES_PASSWORD');

    try {
        $dsn = "pgsql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $stmt = $pdo->prepare("INSERT INTO votes (vote_option) VALUES (:vote)");
        $stmt->execute(['vote' => $vote]);

        echo "<p>Merci d'avoir voté pour : $vote</p>";
        echo "<a href='index.php'>Retourner au formulaire de vote</a>";
    } catch (PDOException $e) {
        echo "<p>Erreur de connexion à la base de données : " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Aucun vote sélectionné. Veuillez voter.</p>";
    echo "<a href='index.php'>Retourner au formulaire de vote</a>";
}
?>
