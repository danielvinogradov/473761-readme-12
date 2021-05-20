# Создаем базу данных и устанавливаем кодировку.
CREATE DATABASE readme
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

# Используем созданную БД.
USE readme;

/*
    5.0 Пользователь: Представляет зарегистрированного пользователя.

    Поля:
        логин;
        email;
        пароль: хэшированный пароль пользователя;
        дата регистрации: дата и время, когда этот пользователь завёл аккаунт;
        аватар: ссылка на загруженный аватар пользователя;
 */
CREATE TABLE users
(
    id                INT                 NOT NULL AUTO_INCREMENT,
    login             VARCHAR(128) UNIQUE NOT NULL,
    email             VARCHAR(128) UNIQUE NOT NULL,
    password          CHAR(64)            NOT NULL,
    registration_date TIMESTAMP           NOT NULL,
    avatar_uri        VARCHAR(255),

    PRIMARY KEY (id)
);

/*
    5.7 Тип контента: Один из пяти предопределенных типов контента.

    Поля:
        название (Текст, Цитата, Картинка, Видео, Ссылка);
        имя класса для иконки (photo, video, text, quote, link);
 */
CREATE TABLE content_type
(
    id         INT AUTO_INCREMENT                                      NOT NULL,
    name       VARCHAR(128) NOT NULL,
    class_name VARCHAR(128)        NOT NULL,

    PRIMARY KEY (id)
);

/*
    5.1 Пост: Состоит из заголовка и содержимого. Набор полей, которые будут заполнены, зависит от выбранного типа.

    Поля:
        дата создания: дата и время, когда этот пост был создан пользователем;
        заголовок: задаётся пользователем;
        текстовое содержимое: задаётся пользователем;
        автор цитаты: задаётся пользователем;
        изображение: ссылка на сохранённый файл изображения;
        видео: ссылка на видео с youtube;
        ссылка: ссылка на сайт, задаётся пользователем;
        число просмотров.

    Связи:
        автор: пользователь, создавший пост;
        тип контента: тип контента, к которому относится пост;
        хештеги: связь вида «многие-ко-многим» с сущностью «хештег».
 */
CREATE TABLE posts
(
    id              INT       NOT NULL AUTO_INCREMENT,
    date_created    TIMESTAMP NOT NULL,
    body            TEXT,
    cite_author     VARCHAR(255),
    image_uri       VARCHAR(255),
    video_url       VARCHAR(2048),
    link            VARCHAR(2048),
    views_count     INT       NOT NULL,

    author_id       INT       NOT NULL,
    content_type_id INT       NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (content_type_id) REFERENCES content_type (id) ON DELETE CASCADE
);


/*
    5.6 Хештег: Один из используемых хештегов на сайте. Сущность состоит только из названия хештега.
 */
CREATE TABLE hashtags
(
    id   INT AUTO_INCREMENT  NOT NULL,
    name VARCHAR(128) UNIQUE NOT NULL,

    PRIMARY KEY (id)
);

/*
    Это связи между постами (posts) и хэштегами (hashtags).
 */
CREATE TABLE posts_hashtags
(
    post_id    INT NOT NULL,
    hashtag_id INT NOT NULL,

    PRIMARY KEY (post_id, hashtag_id),
    FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE,
    FOREIGN KEY (hashtag_id) REFERENCES hashtags (id) ON DELETE CASCADE
);

/*
    5.2 Комментарий: Текстовый комментарий, оставленный к одному из постов.

    Поля:
        дата создания: дата и время создания комментария;
        содержимое: задается пользователем.

    Связи:
        автор: пользователь, создавший пост;
        пост: пост, к которому добавлен комментарий.
 */
CREATE TABLE comments
(
    id        INT AUTO_INCREMENT NOT NULL,
    date      TIMESTAMP          NOT NULL,
    body      TEXT               NOT NULL,

    author_id INT                NOT NULL,
    post_id   INT                NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE
);

/*
    5.3 Лайк: Эта сущность состоит только из связей и не имеет собственных полей.

    Связи:
        пользователь: кто оставил этот лайк;
        пост: какой пост лайкнули.
 */

CREATE TABLE likes
(
    id        INT AUTO_INCREMENT NOT NULL,

    author_id INT                NOT NULL,
    post_id   INT                NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE
);

/*
    5.4 Подписка: Эта сущность состоит только из связей и не имеет собственных полей. Сущность создается, когда пользователь подписывается на другого пользователя.

    Связи:
        автор: пользователь, который подписался;
        подписка: пользователь, на которого подписались.
 */
CREATE TABLE subscriptions
(
    subscriber_id INT NOT NULL,
    author_id     INT NOT NULL,

    PRIMARY KEY (subscriber_id, author_id),
    FOREIGN KEY (subscriber_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (author_id) REFERENCES users (id) ON DELETE CASCADE
);

/*
    5.5 Сообщение: Одно сообщение из внутренней переписки пользователей на сайте

    Поля:
        дата создания: дата и время, когда это сообщение написали;
        содержимое: задаётся пользователем.

    Связи:
        отправитель: пользователь, отправивший сообщение;
        получатель: пользователь, которому отправили сообщение.
 */
CREATE TABLE messages
(
    id           INT AUTO_INCREMENT NOT NULL,
    date         TIMESTAMP          NOT NULL,
    body         TEXT               NOT NULL,

    author_id    INT                NOT NULL,
    recipient_id INT                NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES users (id) ON DELETE CASCADE,
    FOREIGN KEY (recipient_id) REFERENCES users (id) ON DELETE CASCADE
);
