SELECT DISTINCT Region
FROM Customers;

SELECT Region, COUNT(Region) as Aantal
FROM Customers
GROUP BY Region
ORDER BY COUNT(Region) DESC;

SELECT CategoryName AS "Product Categorie", ROUND(AVG(UnitPrice), 2) AS "Gemiddelde prijs"
FROM Products
         JOIN Categories ON Products.CategoryID = Categories.CategoryID
GROUP BY CategoryName
ORDER BY CategoryName ASC;

