SELECT FirstName, LastName, Country, HireDate FROM Employees
WHERE Country = 'USA' AND strftime('%Y', HireDate) < '2013';

SELECT * FROM Orders
WHERE strftime('%Y-%m', OrderDate) = '2018-02' OR strftime('%Y-%m', OrderDate) = '2018-04';

SELECT * FROM Products
WHERE CategoryID IN (1, 3, 4);