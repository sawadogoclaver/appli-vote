CREATE TABLE IF NOT EXISTS votes (
    id SERIAL PRIMARY KEY,
    vote_option VARCHAR(50) NOT NULL
);