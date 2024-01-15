SELECT ProductName, UnitPrice
FROM Products
WHERE UnitPrice > (
    SELECT AVG(UnitPrice)
    FROM Products
)
ORDER BY UnitPrice DESC;

SELECT ProductName, UnitPrice
FROM Products
WHERE UnitPrice IN (
    SELECT MIN(UnitPrice)
    FROM Products
    UNION
    SELECT MAX(UnitPrice)
    FROM Products
);
