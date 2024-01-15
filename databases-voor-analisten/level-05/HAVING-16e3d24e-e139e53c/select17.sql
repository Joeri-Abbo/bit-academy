SELECT Region, count(*) AS aantal
FROM Customers
GROUP BY Region
HAVING Region IS NOT NULL
ORDER BY count(*) DESC;
SELECT CategoryName AS "Product Categorie", round(avg(UnitPrice), 2) AS "Gemiddelde prijs"
FROM "Alphabetical list of Products"
GROUP BY CategoryName
HAVING avg(UnitPrice) > 25
ORDER BY avg(UnitPrice) DESC;
SELECT CategoryName AS "Product Categorie", round(avg(UnitPrice), 2) AS "Gemiddelde prijs"
FROM "Alphabetical list of Products"
GROUP BY CategoryName
HAVING avg(UnitPrice) > (SELECT avg(UnitPrice) FROM "Alphabetical list of Products")
ORDER BY avg(UnitPrice) DESC;