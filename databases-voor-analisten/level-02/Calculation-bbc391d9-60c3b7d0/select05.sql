-- Voor de eerste query: bereken de voorraad voor elk product door van het aantal items op voorraad het aantal bestelde items af te trekken
SELECT
  Products.ProductID,
  Products.ProductName,
  Products.UnitsInStock - (SELECT SUM("Order Details".Quantity) FROM "Order Details" WHERE "Order Details".ProductID = Products.ProductID) AS Inventory
FROM
  Products;

-- Voor de tweede query: gebruik de velden prijs, hoeveelheid en korting uit de tabel "Order Details" om de verkoopprijs per orderregel te berekenen en te tonen.
SELECT *, UnitPrice * Quantity * (1.00-Discount) AS Verkoopprijs FROM "Order Details";
