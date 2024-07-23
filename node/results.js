const express = require("express");
const MongoClient = require("mongodb").MongoClient;

const app = express();
const port = 3000;
const mongoUrl = process.env.MONGO_URL;

MongoClient.connect(mongoUrl, {
  useNewUrlParser: true,
  useUnifiedTopology: true,
})
  .then((client) => {
    console.log("Connected to Database");
    const db = client.db("voteapp");
    const collection = db.collection("votes");

    app.get("/", (req, res) => {
      collection
        .aggregate([{ $group: { _id: "$vote", count: { $sum: 1 } } }])
        .toArray()
        .then((results) => {
          let response = "<h1>Résultats du vote</h1>";
          results.forEach((result) => {
            response += `<p>${result._id}: ${result.count} vote(s)</p>`;
          });
          res.send(response);
        })
        .catch((error) => console.error(error));
    });

    app.listen(port, () => {
      console.log(`Résultats app listening on port ${port}`);
    });
  })
  .catch((error) => console.error(error));
