-- Table `type`
CREATE TABLE IF NOT EXISTS `type` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `label` VARCHAR(255) NOT NULL,
    `image_path` VARCHAR(255),
    `is_active` BOOLEAN DEFAULT TRUE
);

-- Insertion des données dans `type`
INSERT INTO
    `type` (label, image_path, is_active)
VALUES (
        'Maison',
        'path/to/image_maison.jpg',
        TRUE
    ),
    (
        'Appartement',
        'path/to/image_appartement.jpg',
        TRUE
    );

-- Table `address`
CREATE TABLE IF NOT EXISTS `address` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `address` VARCHAR(255) NOT NULL,
    `zip_code` VARCHAR(20) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `country` VARCHAR(100) NOT NULL
);

-- Insertion des données dans `address`
INSERT INTO
    `address` (
        address,
        zip_code,
        city,
        country
    )
VALUES (
        '123 Admin St',
        '12345',
        'Admin City',
        'Admin Country'
    ),
    (
        '456 User Rd',
        '67890',
        'User City',
        'User Country'
    );

-- Table `user`
CREATE TABLE IF NOT EXISTS `user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `firstname` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20),
    `address_id` INT(11),
    `is_active` BOOLEAN NOT NULL DEFAULT 1,
    FOREIGN KEY (`address_id`) REFERENCES `address` (`id`)
);

-- Insertion des données dans `user`
INSERT INTO
    `user` (
        email,
        password,
        lastname,
        firstname,
        phone,
        address_id,
        is_active
    )
VALUES (
        'admin@example.com',
        'adminpasswordhash',
        'Admin',
        'Super',
        '1234567890',
        1,
        TRUE
    ),
    (
        'user1@example.com',
        'user1passwordhash',
        'Doe',
        'John',
        '0987654321',
        2,
        TRUE
    );

-- Table `logements`
CREATE TABLE IF NOT EXISTS `logements` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `price_per_night` DECIMAL(10, 2) NOT NULL,
    `nb_room` INT NOT NULL,
    `nb_bed` INT NOT NULL,
    `nb_bath` INT NOT NULL,
    `nb_traveler` INT NOT NULL,
    `is_active` BOOLEAN DEFAULT TRUE,
    `type` VARCHAR(255),
    `type_id` INT(11),
    `address_id` INT(11),
    `user_id` INT(11),
    FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
    FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);

-- Insertion des données dans `logements`
INSERT INTO
    `logements` (
        title,
        description,
        price_per_night,
        nb_room,
        nb_bed,
        nb_bath,
        nb_traveler,
        is_active,
        type,
        type_id,
        address_id,
        user_id
    )
VALUES (
        'Belle Maison près de la mer',
        'Une maison spacieuse avec vue sur la mer...',
        150.00,
        3,
        4,
        2,
        6,
        TRUE,
        'Maison',
        1,
        1,
        1
    ),
    (
        'Appartement de luxe en centre-ville',
        'Appartement moderne avec toutes les commodités...',
        200.00,
        2,
        2,
        1,
        4,
        TRUE,
        'Appartement',
        2,
        2,
        2
    );

-- Table `equipements`
CREATE TABLE IF NOT EXISTS `equipements` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `label` VARCHAR(255) NOT NULL,
    `image_path` VARCHAR(255)
);

-- Table `logements_equipements`
CREATE TABLE IF NOT EXISTS `logements_equipements` (
    `logement_id` INT(11) NOT NULL,
    `equipement_id` INT(11) NOT NULL,
    FOREIGN KEY (`logement_id`) REFERENCES `logements` (`id`),
    FOREIGN KEY (`equipement_id`) REFERENCES `equipements` (`id`)
);

-- Table `media`
CREATE TABLE IF NOT EXISTS `media` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `image_path` VARCHAR(255) NOT NULL,
    `logement_id` INT(11) NOT NULL,
    FOREIGN KEY (`logement_id`) REFERENCES `logements` (`id`)
);

-- Insertion des données dans `media`
INSERT INTO
    `media` (image_path, logement_id)
VALUES ('path/to/image1.jpg', 1),
    ('path/to/image2.jpg', 2);

-- Table `reservation`
CREATE TABLE IF NOT EXISTS `reservation` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `date_start` DATE NOT NULL,
    `date_end` DATE NOT NULL,
    `nb_adult` INT NOT NULL,
    `nb_child` INT NOT NULL,
    `price_total` DECIMAL(10, 2) NOT NULL,
    `logement_id` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    FOREIGN KEY (`logement_id`) REFERENCES `logements` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
);

-- Insertion des données dans `reservation`
INSERT INTO
    `reservation` (
        date_start,
        date_end,
        nb_adult,
        nb_child,
        price_total,
        logement_id,
        user_id
    )
VALUES (
        '2024-06-15',
        '2024-06-20',
        2,
        1,
        500.00,
        1,
        1
    ),
    (
        '2024-07-01',
        '2024-07-10',
        3,
        2,
        800.00,
        2,
        2
    );