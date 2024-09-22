USE web_security_study;
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    is_private tinyint DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into messages values (1, 'test1', 0, now());
insert into messages values (2, 'test2', 0, now());
insert into messages values (3, 'test3', 1, now());
insert into messages values (4, 'test4', 0, now());
