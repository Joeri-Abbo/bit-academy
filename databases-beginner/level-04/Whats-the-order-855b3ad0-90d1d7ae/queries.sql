-- Welke series, gesorteerd van hoogste cijfer naar laagste cijfer, hebben een cijfer boven de 2.5?
SELECT * FROM series
WHERE rating > 2.5
ORDER BY rating DESC;
-- Welke series hebben minder dan 5 seizoenen, gesorteerd van minste aantal seizoenen naar meeste aantal seizoenen?
SELECT * FROM series
WHERE seasons < 5
ORDER BY seasons ASC;
-- Welke series hebben minder dan 3 seizoenen of meer dan 20, gesorteerd op aantal seizoenen en land van herkomst?
SELECT * FROM series
WHERE seasons < 3 OR seasons > 20
ORDER BY seasons ASC, country ASC;
