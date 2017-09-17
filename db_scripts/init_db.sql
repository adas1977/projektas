CREATE TABLE products (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL
);

INSERT INTO `products` (`id`, `title`, `price`)
VALUES (NULL, 'Nokia 5610', '600'),
(NULL, 'Nokia 7610', '700');


CREATE TABLE orders (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_email VARCHAR(30) NOT NULL,
product_id INT NOT NULL,
FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO `orders` (`id`, `customer_email`, `product_id`)
VALUES (NULL, 'pip.pop@gmail.com', '1'),
(NULL, 'tip.top@gmail.com', '2'),