TRUNCATE TABLE planeten;

ALTER TABLE planeten
    ADD COLUMN Diameter FLOAT,
    ADD COLUMN Afstand FLOAT,
    ADD COLUMN Massa FLOAT;

INSERT INTO planeten (Name, Diameter, Afstand, Massa)
VALUES ('Zon', 1392000, NULL, 332946),
       ('Mercurius', 4880, 57910000, 0.1),
       ('Venus', 12104, 108208930, 0.9),
       ('Aarde', 12756, 149597870, 1),
       ('Mars', 6794, 227936640, 0.1),
       ('Jupiter', 142984, 778412010, 318),
       ('Saturnus', 120536, 1426725400, 95),
       ('Uranus', 51118, 2870972200, 15),
       ('Neptunus', 49572, 4498252900, 17);
