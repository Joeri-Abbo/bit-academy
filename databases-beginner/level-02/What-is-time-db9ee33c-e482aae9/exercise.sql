TRUNCATE TABLE planeten;

ALTER TABLE planeten
    ADD COLUMN Diameter FLOAT NOT NULL,
    ADD COLUMN Afstand FLOAT NOT NULL,
    ADD COLUMN Massa  FLOAT NOT NULL;

ALTER TABLE planeten
    ADD COLUMN bezoek_datum DATE;

INSERT INTO planeten (Name, Diameter, Afstand, Massa, bezoek_datum)
VALUES ('Zon', 1392000, 0, 332946, NULL),
       ('Mercurius', 4880, 57910000, 0.1, NULL),
       ('Venus', 12104, 108208930, 0.9, NULL),
       ('Aarde', 12756, 149597870, 1, NULL),
       ('Mars', 6794, 227936640, 0.1, NULL),
       ('Jupiter', 142984, 778412010, 318, NULL),
       ('Saturnus', 120536, 1426725400, 95, NULL),
       ('Uranus', 51118, 2870972200, 15, NULL),
       ('Neptunus', 49572, 4498252900, 17, NULL),
       ('Maan', 3476, 4498252900, 0.01, 1969);
