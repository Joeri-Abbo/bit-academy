SELECT *
FROM Products
WHERE CategoryID IN (1, 3, 4);

SELECT CustomerID, ContactName, City, Country
FROM Customers
WHERE Country NOT IN ("Germany", "France", "Belgium");

SELECT OrderID, OrderDate
FROM Orders
WHERE strftime('%Y', OrderDate) IN ('2016', '2018');
