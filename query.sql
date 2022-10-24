--Получение значения свойств товара если известен его id--
SELECT * FROM `property_value` WHERE `product_id` IS NOT NULL;
--Получение списка названий уникальных свойств товара по названию категории--
SELECT
	property.name
FROM
	property,
	property_value,
	product,
	category
WHERE
	property_value.product_id = product.id
	AND property.id = property_value.property_id
	AND product.category_id = category.id
	AND category.name = 'Категория 1'
GROUP BY
	property.name;