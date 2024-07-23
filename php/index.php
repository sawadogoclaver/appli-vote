<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Application</title>
</head>
<body>
    <h1>Votez pour votre préférence</h1>
    <form action="vote.php" method="post">
        <label>
            <input type="radio" name="vote" value="monogamie" required> Monogamie
        </label><br>
        <label>
            <input type="radio" name="vote" value="polygamie" required> Polygamie
        </label><br><br>
        <button type="submit">Voter</button>
    </form>
</body>
</html>
