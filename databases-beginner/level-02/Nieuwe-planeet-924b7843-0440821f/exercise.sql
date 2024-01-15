
UPDATE planeten
SET Name = 'Teenalp'
WHERE id = (SELECT MAX(id) FROM planeten WHERE Name = 'Mars');