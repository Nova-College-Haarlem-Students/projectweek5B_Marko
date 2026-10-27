-- Tabellen die de PHP-code in www/ gebruikt.
-- Vergelijk met je eigen ERD: heb je andere namen, pas dan de code of je tabellen aan.
-- (autos staat al in database.sql)

CREATE TABLE IF NOT EXISTS roles (
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  role_id INT NOT NULL,
  naam VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  wachtwoord VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE IF NOT EXISTS diensten (
  dienst_id INT AUTO_INCREMENT PRIMARY KEY,
  naam VARCHAR(100) NOT NULL,
  omschrijving TEXT NULL,
  duur_minuten INT NOT NULL,
  prijs DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS afspraken (
  afspraak_id INT AUTO_INCREMENT PRIMARY KEY,
  auto_id INT NOT NULL,
  dienst_id INT NOT NULL,
  monteur_id INT NULL,              -- nog niet bekend bij het maken
  datum DATE NOT NULL,
  tijd TIME NOT NULL,
  prijs DECIMAL(10,2) NOT NULL,     -- prijs op moment van boeken
  kilometerstand INT NULL,          -- pas na afloop bekend
  opmerking TEXT NULL,              -- pas na afloop bekend
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (auto_id) REFERENCES autos(auto_id),
  FOREIGN KEY (dienst_id) REFERENCES diensten(dienst_id),
  FOREIGN KEY (monteur_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS logboek (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  actie VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Voorbeelddata
INSERT INTO roles (name) VALUES ('klant'), ('medewerker'), ('admin');

INSERT INTO diensten (naam, omschrijving, duur_minuten, prijs) VALUES
('APK-keuring', 'Wettelijke periodieke keuring van je auto.', 45, 39.95),
('Kleine beurt', 'Olie en filter vervangen, vloeistoffen en banden checken.', 60, 129.00),
('Grote beurt', 'Uitgebreid onderhoud volgens fabrieksvoorschrift.', 120, 279.00),
('Banden wisselen', 'Zomer- of winterbanden omzetten.', 30, 49.50);
