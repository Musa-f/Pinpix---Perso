CREATE TABLE roles (
    id_role INT PRIMARY KEY,
    name_role VARCHAR(100) NOT NULL
);

INSERT INTO roles(id_role, name_role) 
VALUES 
(1, "admin"), 
(10, "user");


CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name_user VARCHAR(100) NOT NULL,
    email_user VARCHAR(100) NOT NULL,
    pswd_user VARCHAR(100) NOT NULL,
    bio_user TEXT NULL,
    registration_user TIMESTAMP DEFAULT current_timestamp(),
    id_role INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles(id_role)
);

CREATE TABLE images (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    name_image VARCHAR(100) NULL,
    url_image VARCHAR(100) NOT NULL,
    date_image TIMESTAMP DEFAULT current_timestamp(),
    description_image TEXT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE likes (
    id_user INT NOT NULL,
    id_image INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_image) REFERENCES images(id_image),
    PRIMARY KEY(id_user, id_image)
);

CREATE TABLE follows (
    id_user INT NOT NULL,
    id_followed_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_followed_user) REFERENCES users(id_user),
    PRIMARY KEY(id_user, id_followed_user)
);

CREATE TABLE tags (
    id_tag INT AUTO_INCREMENT PRIMARY KEY,
    name_tag VARCHAR(100) NOT NULL
);

CREATE TABLE image_tag (
    id_image INT NOT NULL,
    id_tag INT NOT NULL,
    FOREIGN KEY (id_image) REFERENCES images(id_image),
    FOREIGN KEY (id_tag) REFERENCES tags(id_tag),
    PRIMARY KEY(id_image, id_tag)
);

