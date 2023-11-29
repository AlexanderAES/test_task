
CREATE TABLE messages (
                         id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
                         title VARCHAR(100),
                         author VARCHAR(255),
                         short_content TEXT,
                         full_content TEXT

);

CREATE TABLE comments (
                         id INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
                         message_id INT,
                         author VARCHAR(255),
                         text TEXT,
                         created_at TIMESTAMP,
                         FOREIGN KEY (message_id) REFERENCES messages(id)
);