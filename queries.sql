INSERT INTO category(id, name, symbol_code) VALUES 
    (1, 'Доски и лыжи', 'boards'), (2, 'Крепления', 'attachment'),
    (3, 'Ботинки', 'boots'), (4, 'Одежда', 'clothing'),
    (5, 'Инструменты', 'tools'), (6, 'Разное', 'other');
    
INSERT INTO user(id, registration_date, email, name, passwd, contact_info) VALUES 
    (1, '2021-01-01', 'blablabla@mail.ru', 'Иван Иванов', '123456', '+7-495-666-66-66'),
    (2, '2020-12-20', 'hhhhhh@mail.ru', 'Сергей Сергеев', 'abcdef', '+7-495-777-77-77'),
    (3, '2020-11-15', 'uraaaaa@mail.ru', 'Андрей Андреев', 'gehlmnp', '+7-495-888-88-88');
    
INSERT INTO lot(id, date_creation, name, description, 
    img_src, starter_price, expiration_date,
    bet_offset, author_id, winner_id, category_id) VALUES 
    (1, '2021-02-10 14:25:10', '2014 Rossignol District Snowboard', 
    'Сноуборд', 'img/lot-1.jpg', 10999, '2021-2-28', 100, 
    (SELECT id FROM user WHERE name = 'Андрей Андреев'), NULL,
    (SELECT id FROM category WHERE name = 'Доски и лыжи')),
    
    (2, '2021-02-10 14:25:10', 'DC Ply Mens 2016/2017 Snowboard',
    'Сноуборд', 'img/lot-2.jpg', 159999, '2021-3-1', 100,
    (SELECT id FROM user WHERE name = 'Андрей Андреев'), NULL,
    (SELECT id FROM category WHERE name = 'Доски и лыжи')),
    
    (3, '2021-02-11 15:25:10', 'Крепления Union Contact Pro 2015 года размер L/XL',
    'Крепления', 'img/lot-3.jpg', 8000, '2021-3-2', 200,
    (SELECT id FROM user WHERE name = 'Сергей Сергеев'), NULL,
    (SELECT id FROM category WHERE name = 'Крепления')),
    
    (4, '2021-02-11 16:25:10', 'Ботинки для сноуборда DC Mutiny Charocal',
    'Ботинки', 'img/lot-4.jpg', 10999, '2021-3-3', 200,
    (SELECT id FROM user WHERE name = 'Сергей Сергеев'), NULL,
    (SELECT id FROM category WHERE name = 'Ботинки')),
    
    (5, '2021-02-12 17:25:10', 'Куртка для сноуборда DC Mutiny Charocal',
    'Куртка', 'img/lot-5.jpg', 7500, '2021-3-4', 300,
    (SELECT id FROM user WHERE name = 'Иван Иванов'), NULL,
    (SELECT id FROM category WHERE name = 'Одежда')),
    
    (6, '2021-02-13 11:25:10', 'Маска Oakley Canopy',
    'Маска', 'img/lot-6.jpg', 5400, '2021-3-4', 300,
    (SELECT id FROM user WHERE name = 'Иван Иванов'), NULL,
    (SELECT id FROM category WHERE name = 'Разное'));
    
INSERT INTO bet(id, date_creation, price, user_id, lot_id) VALUES 
    (1, '2021-02-13 12:25:10', 5700, 
    (SELECT id FROM user WHERE name = 'Сергей Сергеев'),
    (SELECT id FROM lot WHERE name = 'Маска Oakley Canopy')),
    (2, '2021-02-13 12:30:10', 160099, 
    (SELECT id FROM user WHERE name = 'Сергей Сергеев'),
    (SELECT id FROM lot WHERE name = 'DC Ply Mens 2016/2017 Snowboard'));
    
/* получить все категории */

SELECT * FROM category;

/* получить самые новые, открытые лоты. 
Каждый лот должен включать название, стартовую цену, 
ссылку на изображение, текущую цену, название категории;
*/

SELECT lot.name, lot.starter_price, lot.img_src, bet.price as current_price, category.name 
	FROM lot
	    LEFT OUTER JOIN bet
        ON bet.lot_id = lot.id
    JOIN category
        ON lot.category_id = category.id
        WHERE lot.winner_id is NULL AND lot.date_creation > '2021-02-11';
        
/* показать лот по его id. Получите также название категории, к которой принадлежит лот */

SELECT
	lot.*,
	category.name
FROM
	lot
JOIN category ON
	lot.category_id = category.id
WHERE
	lot.id = 3
        
/* обновить название лота по его идентификатору; */
UPDATE lot
    SET name = 'New name'
    WHERE id = 1;

/* получить список ставок для лота по его идентификатору с сортировкой по дате. */
SELECT * FROM bet 
    WHERE lot_id = 6 
    ORDER BY date_creation DESC;
