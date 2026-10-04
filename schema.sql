CREATE DATABASE IF NOT EXISTS inventaris_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE inventaris_db;

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS suppliers;

CREATE TABLE categories (
  id   INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_categories_name (name)
) ENGINE=InnoDB;

CREATE TABLE suppliers (
  id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name  VARCHAR(150) NOT NULL,
  phone VARCHAR(20)  NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE products (
  id          INT UNSIGNED  NOT NULL AUTO_INCREMENT,
  name        VARCHAR(150)  NOT NULL,
  category_id INT UNSIGNED  NOT NULL,
  supplier_id INT UNSIGNED  NOT NULL,
  price       DECIMAL(12,2) NOT NULL DEFAULT 0,
  stock       INT UNSIGNED  NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_products_category
    FOREIGN KEY (category_id) REFERENCES categories (id)
    ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT fk_products_supplier
    FOREIGN KEY (supplier_id) REFERENCES suppliers (id)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- SEED
INSERT INTO categories (name) VALUES
  ('Elektronik'),
  ('Alat Tulis'),
  ('Perabot'),
  ('Makanan & Minuman'),
  ('Pakaian');

INSERT INTO suppliers (name, phone) VALUES
  ('PT Maju Jaya',        '081234567890'),
  ('CV Sumber Rezeki',    '082198765432'),
  ('UD Berkah Abadi',     '085611223344'),
  ('PT Nusantara Supply', '087755667788'),
  ('CV Cahaya Baru',      '089900112233');

INSERT INTO products (name, category_id, supplier_id, price, stock) VALUES
  ('Mouse Wireless',    1, 1,  95000.00,  40),
  ('Keyboard Mekanik',  1, 4, 450000.00,  15),
  ('Pulpen Gel 0.5mm',  2, 2,   4500.00, 300),
  ('Buku Tulis A5',     2, 2,   8000.00, 200),
  ('Kursi Kantor',      3, 3, 750000.00,  10),
  ('Kopi Instan 1kg',   4, 5,  85000.00,  60);
