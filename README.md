An REST API endpoint that gives a list of products, applies some discounts to them and can be filtered.


Single Endpoint: /api/v1/products
Search parameters:
1. By category: api/v1/products?category=insurance
2. By Price: /api/v1/products?price=99000

Run Migration to install.


CONDITIONS
The prices are integers for example, 100.00€ would be 10000.

 You can store the products as you see fit (json file, in memory, rdbms of choice)
 Products in the "insurance" category have a 30% discount.
 The product with sku = 000003 has a 15% discount.
 Provide a single endpoint. GET /products.
 Can be filtered by category as a query string parameter.
 (optional) Can be filtered by price as a query string parameter, this filter applies before discounts are applied.
 Returns a list of Products with the given discounts applied when necessary Product model.
 price.currency is always EUR.
 When a product does not have a discount, price.final and price.original should be the same number and discount_percentage should be null.
 When a product has a discount, price.original is the original price, price.final is the amount with the discount applied and discount_percentage represents the applied discount with the % sign.
 
 
TEST DATASET
{ "products": [ { "sku": "000001", "name": "Full coverage insurance", "category": "insurance", "price": 89000 }, { "sku": "000002", "name": "Compact Car X3", "category": "vehicle", "price": 99000 }, { "sku": "000003", "name": "SUV Vehicle, high end", "category": "vehicle", "price": 150000 }, { "sku": "000004", "name": "Basic coverage", "category": "insurance", "price": 20000 }, { "sku": "000005", "name": "Convertible X2, Electric", "category": "vehicle", "price": 250000 } ] }
