-- Welke series hebben een award gewonnen?
SELECT * FROM series WHERE has_won_awards = TRUE;
-- Welke series hebben een cijfer boven de 2.5?
SELECT * FROM series WHERE rating >= 2.5;
-- Welke series zijn in Nederland gemaakt én zijn Nederlands gesproken?
SELECT * FROM series WHERE country = "NL" AND language = "NL" ;
-- Welke series hebben minder dan 5 seizoenen?
SELECT * FROM series WHERE seasons > 5;
-- Wat is het hoogste cijfer dat een serie heeft gekregen?
SELECT MAX(rating) FROM series;
-- Welke series hebben minder dan 3 seizoenen of meer dan 20?
SELECT * FROM series WHERE seasons < 3 OR seasons > 20;
-- Welke series hebben de lettercombinatie 'Th' in hun title?
SELECT * FROM series WHERE title LIKE "%th%";
-- Welke series hebben niet precies 3 seizoenen?
SELECT * FROM series WHERE seasons <> 3;