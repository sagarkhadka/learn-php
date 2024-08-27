CREATE TABLE clients (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR (100) NOT NULL,
  email VARCHAR (20) NOT NULL UNIQUE,
  phone VARCHAR (13) NULL UNIQUE,
  address VARCHAR (100) NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO clients (name, email, phone, address)
VALUES  ('Bill Gates', 'bill@email.com', '+123457890', 'USA'),
        ('Elon Musk', 'elon@email.com', '+123457890', 'USA'),
        ('Will Smith', 'will@email.com', '+123457890', 'USA'),
        ('Bob Marley', 'bob@email.com', '+123457890', 'USA');

-- ALTER TABLE `clients` ADD UNIQUE(`phone`);
-- ALTER TABLE clients MODIFY COLUMN phone VARCHAR(13) NOT NULL;