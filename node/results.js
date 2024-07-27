const express = require('express');
const { Pool } = require('pg');

const app = express();
const port = 3001;

const pool = new Pool({
  host: process.env.POSTGRES_HOST,
  database: process.env.POSTGRES_DB,
  user: process.env.POSTGRES_USER,
  password: process.env.POSTGRES_PASSWORD,
});

app.get('/', async (req, res) => {
  try {
    const result = await pool.query('SELECT vote_option, COUNT(*) as count FROM votes GROUP BY vote_option');
    let response = "<h1>Résultats du vote</h1>";

    result.rows.forEach(row => {
      response += `<p>${row.vote_option}: ${row.count} vote(s)</p>`;
    });

    res.send(response);
  } catch (err) {
    console.error(err);
    res.status(500).send("Erreur du serveur");
  }
});

app.listen(port, () => {
  console.log(`Résultats app listening on port ${port}`);
});
