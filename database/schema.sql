CREATE DATABASE IF NOT EXISTS queens_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE queens_db;

-- 1) roles
CREATE TABLE IF NOT EXISTS roles (
  id TINYINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL UNIQUE
);

-- 2) users
CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(120) NULL,
  role_id TINYINT NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- 3) categories (línea, tipo)
CREATE TABLE IF NOT EXISTS categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(255) NULL
);

-- 4) products
CREATE TABLE IF NOT EXISTS products (
  id INT PRIMARY KEY AUTO_INCREMENT,
  sku VARCHAR(50) NOT NULL UNIQUE,
  name VARCHAR(120) NOT NULL,
  category_id INT NULL,
  unit VARCHAR(20) NOT NULL DEFAULT 'par',
  cost DECIMAL(10,2) NOT NULL DEFAULT 0,
  price DECIMAL(10,2) NOT NULL DEFAULT 0,
  color VARCHAR(40) NULL,
  size VARCHAR(40) NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- 5) inventory (stock actual por producto)
CREATE TABLE IF NOT EXISTS inventory (
  product_id INT PRIMARY KEY,
  stock INT NOT NULL DEFAULT 0,
  min_stock INT NOT NULL DEFAULT 0,
  max_stock INT NULL,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- 6) inventory_movements (Kardex)
CREATE TABLE IF NOT EXISTS inventory_movements (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  product_id INT NOT NULL,
  movement_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  type ENUM('IN','OUT') NOT NULL,
  quantity INT NOT NULL,
  unit_cost DECIMAL(10,2) NOT NULL,
  note VARCHAR(255) NULL,
  ref_table VARCHAR(30) NULL,
  ref_id BIGINT NULL,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- 7) sales (venta encabezado)
CREATE TABLE IF NOT EXISTS sales (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  sale_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  customer_name VARCHAR(120) NULL,
  customer_document VARCHAR(40) NULL,
  user_id INT NOT NULL,
  subtotal DECIMAL(10,2) NOT NULL DEFAULT 0,
  discount DECIMAL(10,2) NOT NULL DEFAULT 0,
  total DECIMAL(10,2) NOT NULL DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 8) sale_items (detalle)
CREATE TABLE IF NOT EXISTS sale_items (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  sale_id BIGINT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (sale_id) REFERENCES sales(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

-- 9) suppliers (opcional para compras)
CREATE TABLE IF NOT EXISTS suppliers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  contact VARCHAR(120) NULL,
  phone VARCHAR(40) NULL
);

-- 10) purchase_orders (opcional)
CREATE TABLE IF NOT EXISTS purchase_orders (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  supplier_id INT NOT NULL,
  order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10,2) NOT NULL DEFAULT 0,
  FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

-- Seed roles
INSERT IGNORE INTO roles(id,name) VALUES (1,'ADMIN'),(2,'VENDEDOR');

-- Crear admin (cambia el hash después desde PHP si prefieres)
-- password: Admin@123 (solo para desarrollo; cámbialo en producción)
INSERT IGNORE INTO users (id, username, password_hash, full_name, email, role_id)
VALUES (1, 'admin', '$2y$10$7b3PYC3csBoGJ8nGfnq8x.Ad56muBOngQk2Dm.tlxNBYALNTV3K.O', 'Administrador', 'admin@queens.local', 1);

-- Categorías y productos de ejemplo
INSERT IGNORE INTO categories (id,name) VALUES (1,'Medias'),(2,'Accesorios');
INSERT IGNORE INTO products (id,sku,name,category_id,unit,cost,price,color,size) VALUES
 (1,'MSCL-100','Media Señora Clásica 100',1,'par',5.00,15.00,'negro','100'),
 (2,'MSLY-100','Media Lycra 100',1,'par',6.50,18.00,'negro','100');
INSERT IGNORE INTO inventory (product_id,stock,min_stock) VALUES (1,50,10),(2,30,10);
