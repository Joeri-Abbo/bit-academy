SELECT COUNT(*)
FROM Customers;

SELECT COUNT(*) as "Aantal klanten"
FROM Customers;

SELECT COUNT(*) as "Aantal klanten met fax"
FROM Customers
WHERE Fax IS NOT NULL;

SELECT COUNT(Fax) AS "Aantal klanten met fax"
FROM Customers;

SELECT SUM(UnitPrice * Quantity) AS "Totaal Orderbedrag", AVG(UnitPrice * Quantity) AS "Gemiddeld Orderbedrag"
FROM "Order Details";

SELECT ROUND(SUM(UnitPrice * Quantity), 2) AS "Totaal Orderbedrag",
       ROUND(AVG(UnitPrice * Quantity), 2) AS "Gemiddeld Orderbedrag"
FROM "Order Details";
