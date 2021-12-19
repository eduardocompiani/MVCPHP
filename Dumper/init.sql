--Every command here will be executed when the container is created

CREATE TABLE IF NOT EXISTS mytable (
    MYID SERIAL PRIMARY KEY,
    DESCRIPTION VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS mytable2 (
    MYID SERIAL PRIMARY KEY,
    DESCRIPTION VARCHAR(50)
);

INSERT INTO mytable (DESCRIPTION) VALUES ('TESTE');