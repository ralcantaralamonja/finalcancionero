create database cancionero;
use cancionero; 

CREATE TABLE Genero (
    gen_id INT AUTO_INCREMENT PRIMARY KEY,
    gen_descipcion VARCHAR(100) NOT NULL
);

CREATE TABLE Cancion (
    can_id INT AUTO_INCREMENT PRIMARY KEY,
    can_gen_id INT NOT NULL,
    can_nombre varchar(150) NOT NULL,
    can_ruta varchar(255) NOT NULL ,
    can_duracion TIME NOT NULL
);

ALTER TABLE Cancion
ADD CONSTRAINT FK_Cancion_Genero
FOREIGN KEY (can_gen_id) REFERENCES Genero(gen_id);


--insert

INSERT INTO Genero (gen_descipcion) VALUES ('Rock');
INSERT INTO Genero (gen_descipcion) VALUES ('Pop');
INSERT INTO Genero (gen_descipcion) VALUES ('Jazz');
INSERT INTO Genero (gen_descipcion) VALUES ('Classical');
INSERT INTO Genero (gen_descipcion) VALUES ('Hip-Hop');
INSERT INTO Genero (gen_descipcion) VALUES ('Country');
INSERT INTO Genero (gen_descipcion) VALUES ('Reggae');
INSERT INTO Genero (gen_descipcion) VALUES ('Blues');
INSERT INTO Genero (gen_descipcion) VALUES ('Electronic');
INSERT INTO Genero (gen_descipcion) VALUES ('Folk');


INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (1, 'Bohemian Rhapsody', '/music/bohemian_rhapsody.mp3', '00:05:55');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (2, 'Billie Jean', '/music/billie_jean.mp3', '00:04:54');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (3, 'Take Five', '/music/take_five.mp3', '00:05:24');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (4, 'Fur Elise', '/music/fur_elise.mp3', '00:02:53');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (5, 'Lose Yourself', '/music/lose_yourself.mp3', '00:05:26');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (6, 'Jolene', '/music/jolene.mp3', '00:02:42');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (7, 'One Love', '/music/one_love.mp3', '00:02:53');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (8, 'The Thrill is Gone', '/music/the_thrill_is_gone.mp3', '00:05:27');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (9, 'Strobe', '/music/strobe.mp3', '00:10:37');
INSERT INTO Cancion (can_gen_id, can_nombre, can_ruta, can_duracion) VALUES (10, 'Blowin\' in the Wind', '/music/blowin_in_the_wind.mp3', '00:02:49');
