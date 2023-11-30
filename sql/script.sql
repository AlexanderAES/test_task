CREATE TABLE messages
(
    id            INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title         VARCHAR(100),
    author        VARCHAR(255),
    short_content TEXT,
    full_content  TEXT

);

CREATE TABLE comments
(
    id         INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    message_id INT,
    author     VARCHAR(255),
    text       TEXT,
    created_at TIMESTAMP,
    FOREIGN KEY (message_id) REFERENCES messages (id)
);


INSERT INTO messages (title, author, short_content, full_content)
VALUES ('Lorem ipsum 1', 'Автор 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'Nullam lobortis, augue id varius convallis, turpis orci sodales neque.'),
       ('Ut enim ad 2', 'Автор 2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
       ('Excepteur sint 3', 'Автор 3',
        'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
       ('Cras dapibus 4', 'Автор 1', 'Maecenas tincidunt, ligula vitae interdum tempor, massa leo fermentum massa.',
        'Cras dapibus luctus tellus vitae posuere.'),
       ('Pellentesque habitant 5', 'Автор 2',
        'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
        'Phasellus vehicula dui in metus dapibus.'),
       ('Curabitur sit 6', 'Автор 3', 'Fusce egestas dolor nec justo hendrerit, sed euismod lacus efficitur.',
        'Curabitur sit amet fermentum arcu, sit amet vestibulum ante.'),
       ('Orci varius 7', 'Автор 1', 'Vivamus ac vestibulum magna. Nullam nec rutrum orci.',
        'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
       ('Proin tincidunt 8', 'Автор 2', 'Suspendisse potenti. Donec lacinia suscipit lorem, id fermentum risus.',
        'Proin tincidunt, lacus vel fermentum auctor, dolor nisi finibus felis.'),
       ('Ut sollicitudin 9', 'Автор 3', 'Vestibulum posuere mi ut convallis eleifend.',
        'Ut sollicitudin, orci a tincidunt volutpat, erat metus luctus felis.'),
       ('Vestibulum congue 10', 'Автор 1', 'Sed facilisis risus nec neque aliquet, at placerat turpis mattis.',
        'Vestibulum congue orci efficitur, convallis odio.'),
       ('Pellentesque habitant 11', 'Автор 2', 'Maecenas tincidunt dolor at nisi commodo, at laoreet tellus tristique.',
        'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.'),
       ('Morbi vita 12', 'Автор 3', 'Vivamus tincidunt lectus in lectus porta, vel luctus nunc posuere.',
        'Morbi vitae feugiat purus, sed tincidunt felis.');

INSERT INTO comments (message_id, author, text, created_at)
VALUES (1, 'User 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2023-11-10 08:30:00'),
       (1, 'User 2', 'Sed do eiusmod tempor incididunt.', '2023-11-12 10:45:00'),
       (2, 'User 3',
        'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', '2023-11-15 12:20:00'),
       (2, 'User 3',
        'Cillum dolore eu fugiat nulla pariatur.', '2023-11-15 12:21:00'),
       (3, 'User 1', 'Maecenas tincidunt, ligula vitae interdum tempor, massa leo fermentum.', '2023-11-20 15:10:00'),
       (4, 'User 2',
        'Pellentesque habitant morbi tristique senectus et.', '2023-11-22 16:30:00'),
       (5, 'User 3', 'Fusce egestas dolor nec justo hendrerit.', '2023-11-25 18:40:00');