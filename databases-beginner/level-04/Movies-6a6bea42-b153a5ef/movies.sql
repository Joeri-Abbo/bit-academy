CREATE TABLE films
(
    id                 INT AUTO_INCREMENT PRIMARY KEY,
    titel              VARCHAR(255) NOT NULL,
    duur               TIME         NOT NULL,
    datum_van_uitkomst DATE,
    land_van_uitkomst  VARCHAR(255),
    omschrijving       TEXT         NOT NULL,
    youtube_trailer_id VARCHAR(255) NOT NULL
);

INSERT INTO films (titel, duur, datum_van_uitkomst, land_van_uitkomst, omschrijving, youtube_trailer_id)
VALUES ('Iron Man', '02:06:00', '2008-05-02', 'Verenigde Staten',
        'Billionaire Tony Stark creates a powerful suit of armor to save himself and the world.', 'abcd123'),
       ('The Incredible Hulk', '01:52:00', '2008-06-13', 'Verenigde Staten',
        'Bruce Banner must confront his inner demons while evading the pursuit of General Thunderbolt Ross.',
        'efgh456'),
       ('Iron Man 2', '02:04:00', '2010-05-07', 'Verenigde Staten',
        'Tony Stark faces new challenges as he fights against powerful enemies and deals with his own personal issues.',
        'ijkl789'),
       ('Thor', '01:55:00', '2011-05-06', 'Verenigde Staten',
        'The powerful Norse god Thor is banished to Earth and must learn humility to reclaim his powers and save his realm.',
        'mnop123'),
       ('Captain America: The First Avenger', '02:04:00', '2011-07-22', 'Verenigde Staten',
        'Steve Rogers volunteers for a secret experiment that transforms him into the super-soldier Captain America.',
        'qrst456');
