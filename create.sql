CREATE TABLE Experiencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cargo VARCHAR(100),
    empresa VARCHAR(100),
    ubicacion VARCHAR(150),
    year_ini VARCHAR(4),
    year_fin VARCHAR(4)
);

CREATE TABLE Formacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    institucion VARCHAR(100),
    titulo VARCHAR(100),
    ubicacion VARCHAR(150),
    year_ini VARCHAR(4),
    year_fin VARCHAR(4)
);

CREATE TABLE Idiomas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idioma VARCHAR(100),
    nivel ENUM('A1', 'A2', 'B1', 'B2', 'C1', 'C2')
);

CREATE TABLE Aptitudes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aptitud VARCHAR(100)
)

CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_apellidos VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    ocupacion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    nacionalidad VARCHAR(100) NOT NULL,
    perfil TEXT NOT NULL
)

