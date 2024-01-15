
-- Schrijf een query die het getal 1234.5678 eerst in zijn geheel toont en daarna afgerond op 2 decimalen achter de punt en 1 decimaal achter de punt.
SELECT 1234.5678           AS "Original",
       ROUND(1234.5678, 2) AS "2 decimalen",
       ROUND(1234.5678, 1) AS "1 decimaal";

-- Schrijf een query die het getal 1234.5678 omzet naar een integer
SELECT 1234.5678 AS "float", CAST(1234.5678 AS INT) AS "interger";

-- Schrijf een query die de string '1234' omzet naar een integer en er 5 bij optelt
SELECT 1234.5678 AS "float", CAST('1234' AS INT) AS "integer", '1234' AS string, CAST('1234' AS INT) + 5 AS "integer";

-- Schrijf een query die de string 'I Love SQLite' omzet naar de resultaten zoals je die ziet in de verwachte uitkomst
SELECT LENGTH('I Love SQLite')        AS "aantal karakters",
       SUBSTR('I Love SQLite', 8, 12) AS "database",
       LOWER('I Love SQLite')         AS "de kleine lettertjes",
       SUBSTR('I Love SQLite', 0, 11) AS language;

-- Schrijf een query die de huidige datum en tijd laat zien.
SELECT CURRENT_DATE AS "datum", CURRENT_TIME AS "tijd";

-- Schrijf een query die uit de huidige datum, de dag, de maand en het jaar laat zien
SELECT CURRENT_DATE as "date",
	strftime('%d', 'now') AS "dag",
	strftime('%m', 'now') AS "maand",
	strftime('%Y', 'now') AS "jaar",
	strftime('%d-%m-%Y', 'now') AS "datum";