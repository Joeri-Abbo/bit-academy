SELECT ProductName, UnitsOnOrder
FROM Products
ORDER BY UnitsOnOrder DESC
LIMIT 10;


SELECT ProductName, UnitPrice
FROM (
  SELECT ProductName, UnitPrice,
         ROW_NUMBER() OVER (ORDER BY UnitPrice ASC) AS row_num
  FROM Products
  WHERE UnitPrice > (SELECT AVG(UnitPrice) FROM Products)
) AS subquery
ORDER BY row_num
LIMIT 7 OFFSET 3;
