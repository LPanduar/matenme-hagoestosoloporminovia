drop database tinnyM;
create database  tinnyM;
use tinnyM;

CREATE TABLE usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  edad INT
);

CREATE TABLE categorias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255)
);

CREATE TABLE encuestas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(255),
  descripcion TEXT,
  categoria_id INT,
  usuario_id INT,
  fecha_creacion DATE,
  FOREIGN KEY (categoria_id) REFERENCES categorias(id),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE opciones (
  id INT PRIMARY KEY AUTO_INCREMENT,
  encuesta_id INT,
  texto VARCHAR(255),
  FOREIGN KEY (encuesta_id) REFERENCES encuestas(id)
);

CREATE TABLE respuestas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  encuesta_id INT,
  opcion_id INT,
  usuario_id INT,
  FOREIGN KEY (encuesta_id) REFERENCES encuestas(id),
  FOREIGN KEY (opcion_id) REFERENCES opciones(id),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE preferencias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT,
  categoria_id INT,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

INSERT INTO categorias (nombre) VALUES
('Tecnología'),
('Salud'),
('Deportes'),
('Entretenimiento'),
('Educación'),
('Viajes');
