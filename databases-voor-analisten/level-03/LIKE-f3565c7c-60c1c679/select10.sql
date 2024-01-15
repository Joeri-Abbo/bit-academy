SELECT EmployeeID, FirstName, LastName FROM Employees
WHERE FirstName LIKE "A%";

SELECT ProductID, ProductName FROM Products
WHERE ProductName LIKE "%U";

SELECT ProductID, ProductName FROM Products
WHERE ProductName LIKE "%HOT%";

SELECT CustomerID, ContactName
FROM Customers
WHERE ContactName NOT LIKE '_a%';
	
SELECT CompanyName, City, Country
FROM Customers
WHERE  CompanyName LIKE "B%"
AND (Country = "Canada" OR City = "Madrid");
