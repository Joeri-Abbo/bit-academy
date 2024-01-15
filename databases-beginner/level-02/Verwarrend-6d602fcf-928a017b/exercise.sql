
UPDATE planeten
SET naam = 'Teenalp'
WHERE id = (SELECT MAX(id) FROM planeten WHERE naam = 'Mars');