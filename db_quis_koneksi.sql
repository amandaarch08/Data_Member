CREATE DATABASE IF NOT EXISTS db_quis_koneksi;
USE db_quis_koneksi;

-- Tabel kategori

CREATE TABLE kategori (
  id_kategori INT(11) NOT NULL AUTO_INCREMENT,
  nama_kategori VARCHAR(50) NOT NULL,
  biaya_registrasi DECIMAL(15,2) NOT NULL,
  PRIMARY KEY (id_kategori)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO kategori (id_kategori, nama_kategori, biaya_registrasi) VALUES
(1, 'Silver', 500000),
(2, 'Gold', 1000000),
(3, 'Platinum', 1500000);


-- Tabel member

CREATE TABLE member (
  id_member INT(11) NOT NULL AUTO_INCREMENT,
  nama_member VARCHAR(100) NOT NULL,
  alamat VARCHAR(150) NOT NULL,
  no_hp VARCHAR(20) NOT NULL,
  id_kategori INT(11) NOT NULL,
  PRIMARY KEY (id_member),
  KEY id_kategori (id_kategori),
  CONSTRAINT fk_member_kategori FOREIGN KEY (id_kategori)
    REFERENCES kategori (id_kategori)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO member (id_member, nama_member, alamat, no_hp, id_kategori) VALUES
(1, 'Andi', 'Jakarta Barat', '08634556', 1),
(2, 'Budi', 'Tangerang', '083353', 2),
(3, 'Citra', 'Jakarta Barat', '08323', 3);
