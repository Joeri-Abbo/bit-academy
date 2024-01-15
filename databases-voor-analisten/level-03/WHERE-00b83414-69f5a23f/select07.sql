SELECT CompanyName, Country
FROM Customers
WHERE Country = "France";

SELECT OrderID, OrderDate
FROM Orders
WHERE OrderDate >= '2018-03-01';

SELECT OrderID, UnitPrice * Quantity AS Orderbedrag
FROM "Order details"
WHERE UnitPrice * Quantity > 1000;