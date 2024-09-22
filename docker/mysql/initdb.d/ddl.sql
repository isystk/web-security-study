USE web_security_study;
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    is_private tinyint DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into messages values (1, '公開データ1', 0, now());
insert into messages values (2, '公開データ2', 0, now());
insert into messages values (3, '秘密データ3', 1, now());
insert into messages values (4, '公開データ4', 0, now());

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
insert into users values (1, 'user1', '$2y$10$8ksx9wOkBjISOBkyWnsYQeo6wr.fC9irIruI/FM5NCvyK4THY1uAm'); -- password: password
insert into users values (2, 'user2', '$2y$10$8ksx9wOkBjISOBkyWnsYQeo6wr.fC9irIruI/FM5NCvyK4THY1uAm'); -- password: password

