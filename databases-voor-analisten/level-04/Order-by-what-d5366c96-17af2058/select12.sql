SELECT EmployeeID, FirstName, LastName,HireDate FROM Employees
ORDER BY HireDate;

SELECT CompanyName, Region, Country, City
FROM Customers
ORDER BY Region, Country, City;

SELECT ProductID, ProductName, UnitsOnOrder, UnitsInStock
FROM Products
WHERE UnitsOnOrder > 20
ORDER BY UnitsOnOrder DESC, UnitsInStock DESC;