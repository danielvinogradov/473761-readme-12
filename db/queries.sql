# Используем базу проекта
USE readme;

# Добавляем данные для типов постов
INSERT INTO content_type (name, class_name)
VALUES ('Текст', 'text'),
       ('Картинка', 'photo'),
       ('Видео', 'video'),
       ('Цитата', 'quote'),
       ('Ссылка', 'link');

# Добавляем тестовых пользователей
INSERT INTO users (name, login, email, password, avatar_uri)
VALUES ('Лариса', 'test1', 'test1@mail.com', '12345', 'userpic-larisa-small.jpg'),
       ('Федор', 'test2', 'test2@mail.com', 'qwerty', 'userpic.jpg');

# Добавляем посты из моков
INSERT INTO posts (title, body, cite_author, image_uri, video_url, link, author_id, content_type_id)
VALUES ('Цитата', 'Мы в жизни любим только раз, а после ищем лишь похожих', 'Test cite author', NULL, NULL, NULL, 1, 4),
       ('Игра престолов', 'Не могу дождаться начала финального сезона своего любимого сериала!', NULL, NULL, NULL, NULL,
        2, 1),
       ('Наконец, обработал фотки!', NULL, NULL, 'rock-medium.jpg', NULL, NULL, 2, 2),
       ('Моя мечта', NULL, NULL, 'coast-medium.jpg', NULL, NULL, 1, 2),
       ('Лучшие курсы', NULL, NULL, NULL, NULL, 'www.htmlacademy.ru', 1, 5);

# Добавляем комментарии
INSERT INTO comments (body, author_id, post_id)
VALUES ('Тестовый комментарий 1 к посту #3', 1, 3),
       ('Тестовый комментарий 2 к посту #5', 2, 5);

# Получить список постов с сортировкой по популярности и вместе с именами авторов и типом контента
SELECT p.*, ct.name, ct.class_name, u.name
FROM posts p
         INNER JOIN users u on p.author_id = u.id
         INNER JOIN content_type ct on p.content_type_id = ct.id
ORDER BY p.views_count;

# Получить список постов для конкретного пользователя
SELECT *
FROM posts
WHERE author_id = 1;

# Получить список комментариев для одного поста, в комментариях должен быть логин пользователя
SELECT c.*, u.login
FROM comments c
         INNER JOIN users u on c.author_id = u.id
WHERE c.post_id = 3;

# Добавить лайк к посту
INSERT INTO likes (author_id, post_id)
VALUES (1, 1);

# Подписаться на пользователя
INSERT INTO subscriptions (subscriber_id, author_id)
VALUES (1, 2);
