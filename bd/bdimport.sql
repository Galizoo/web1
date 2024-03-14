create database bd_upc;
use bd_upc;
CREATE TABLE tb_alumnos (
Cod_alumno CHAR(5) PRIMARY KEY NOT NULL,
Nombres VARCHAR(20),
Apellidos VARCHAR(30),
Fecha_nacimiento DATE,
Dni VARCHAR(8) NOT NULL,
Alumno_cod_carrera CHAR(5),
Alumno_cod_sede CHAR(5) NOT NULL);

CREATE TABLE tb_carreras (
Cod_carrera CHAR(5) PRIMARY KEY NOT NULL,
Carrera VARCHAR(50));

CREATE TABLE tb_cursos (
Cod_curso CHAR(5) PRIMARY KEY NOT NULL,
Curso VARCHAR(50),
Duración INT(10),
Costo FLOAT(15) NOT NULL,
Creditos CHAR(1),
Curso_cod_carrera CHAR(5),
Curso_cod_profesor CHAR(5) NOT NULL);

CREATE TABLE tb_profesores (
Cod_profesor CHAR(5) PRIMARY KEY NOT NULL,
Nombre_completo VARCHAR(40) NOT NULL);

CREATE TABLE tb_sedes (
Cod_sede CHAR(5) PRIMARY KEY NOT NULL,
Nombre_sede VARCHAR(60) NOT NULL);

ALTER TABLE tb_alumnos ADD CONSTRAINT tb_alumnos_Alumno_cod_carrera_tb_carreras_Cod_carrera FOREIGN KEY (Alumno_cod_carrera) REFERENCES tb_carreras(Cod_carrera);
ALTER TABLE tb_alumnos ADD CONSTRAINT tb_alumnos_Alumno_cod_sede_tb_sedes_Cod_sede FOREIGN KEY (Alumno_cod_sede) REFERENCES tb_sedes(Cod_sede);
ALTER TABLE tb_cursos ADD CONSTRAINT tb_cursos_Curso_cod_carrera_tb_carreras_Cod_carrera FOREIGN KEY (Curso_cod_carrera) REFERENCES tb_carreras(Cod_carrera);
ALTER TABLE tb_cursos ADD CONSTRAINT tb_cursos_Curso_cod_profesor_tb_profesores_Cod_profesor FOREIGN KEY (Curso_cod_profesor) REFERENCES tb_profesores(Cod_profesor);
-- Inserción de carreras
insert into tb_carreras values
('C0001', 'Administración y negocios internacionales'),
('C0002', 'Ingeniería de software'),
('C0003', 'Ciencias de la computación'),
('C0004', 'Ingeniería civil'),
('C0005', 'Derecho');

-- Insercion de profesores
insert into tb_profesores VALUES
  ('PR001', 'Juan Pérez'),
  ('PR002', 'María González'),
  ('PR003', 'Luis Rodríguez'),
  ('PR004', 'Ana López'),
  ('PR005', 'Carlos Martínez'),
  ('PR006', 'Laura Fernández'),
  ('PR007', 'Pedro Sánchez'),
  ('PR008', 'Patricia Ramírez'),
  ('PR009', 'Javier Torres'),
  ('PR010', 'Susana Ruiz'),
  ('PR011', 'Diego García'),
  ('PR012', 'Carmen Silva'),
  ('PR013', 'Sergio Pérez'),
  ('PR014', 'Andrea González'),
  ('PR015', 'Rafael López'),
  ('PR016', 'Cristina González'),
  ('PR017', 'Alejandro Martínez'),
  ('PR018', 'Sofía Rodríguez'),
  ('PR019', 'Gabriel Pérez'),
  ('PR020', 'Lorena López'),
  ('PR021', 'Miguel Sánchez'),
  ('PR022', 'Natalia Ramírez'),
  ('PR023', 'Héctor Torres'),
  ('PR024', 'Valeria Ruiz'),
  ('PR025', 'Gustavo García');
  
  -- INSERCION DE SEDES
  insert into tb_sedes values
  ('SD001', 'UPC - Campus San Miguel'),
  ('SD002', 'UPC Campus Villa'),
  ('SD003', 'UPC - Campus San Isidro'),
  ('SD004', 'Universidad Peruana de Ciencias Aplicadas');
  

insert into tb_cursos values
('CU001', 'Introduction to International Business I', 8, 950.00, '3', 'C0001', 'PR001'),
('CU002', 'Inteligencia Comercial Internacional', 9, 800.00, '3', 'C0001', 'PR002'),
('CU003', 'Introducción a la Contabilidad Financiera', 7, 720.00, '3', 'C0001', 'PR003'),
('CU004', 'Gestión del Capital Humano Global', 6, 890.00, '3', 'C0001', 'PR004'),
('CU005', 'Operaciones Financieras programas-internacionales', 8, 1050.00, '4', 'C0001', 'PR005'),
('CU006', 'Introducción a los Algoritmos', 9, 820.00, '3', 'C0002', 'PR006'),
('CU007', 'Algoritmos y Estructura de Datos', 7, 950.00, '4', 'C0002', 'PR007'),
('CU008', 'Arquitectura de Computadoras', 8, 720.00, '3', 'C0002', 'PR008'),
('CU009', 'Fundamentos de Arquitectura de Software', 9, 890.00, '3', 'C0002', 'PR009'),
('CU010', 'Arquitecturas de Software Emergentes', 7, 920.00, '3', 'C0002', 'PR010'),
('CU011', 'Comprensión y Producción de Lenguaje', 8, 780.00, '3', 'C0003', 'PR011'),
('CU012', 'Organización y Dirección de Empresas', 6, 860.00, '3', 'C0003', 'PR012'),
('CU013', 'Algoritmos y Estructuras de Datos', 9, 980.00, '4', 'C0003', 'PR013'),
('CU014', 'Inteligencia Artificial', 7, 900.00, '3', 'C0003', 'PR014'),
('CU015', 'Gerencia de Proyectos en Computación', 8, 940.00, '3', 'C0003', 'PR015'),
('CU016', 'Introducción a la Ingeniería Civil', 6, 720.00, '3', 'C0004', 'PR016'),
('CU017', 'Cálculo I', 9, 800.00, '3', 'C0004', 'PR017'),
('CU018', 'Análisis Estructural', 7, 920.00, '3', 'C0004', 'PR018'),
('CU019', 'Análisis Numérico para Ingenieros Civiles', 8, 890.00, '3', 'C0004', 'PR019'),
('CU020', 'Gerencia De Proyectos De Construcción', 6, 780.00, '3', 'C0004', 'PR020'),
('CU021', 'Instituciones del Derecho', 9, 980.00, '4', 'C0005', 'PR021'),
('CU022', 'Razonamiento e Investigación Jurídica', 8, 940.00, '3', 'C0005', 'PR022'),
('CU023', 'Teoría Constitucional y Política', 7, 900.00, '3', 'C0005', 'PR023'),
('CU024', 'Fundamentos de la Contratación II', 6, 860.00, '3', 'C0005', 'PR024'),
('CU025', 'Ley Penal y Teoría del Delito', 8, 780.00, '3', 'C0005', 'PR025');






-- Inserción de alumnos


insert into tb_alumnos values
    ('A0001', 'Libardo', 'Munera Gomez', '2023-06-24', '98595826', 'C0001', 'SD001'),
    ('A0002', 'Lina Marcela', 'Jaramillo Jaramillo', '1997-08-12', '30232233', 'C0002', 'SD002'),
    ('A0003', 'Nohemí', 'Sierra Ramírez', '2001-03-17', '52291364', 'C0003', 'SD003'),
    ('A0004', 'Liliana Del Rosario', 'Ballesteros Muñoz', '1995-11-30', '52620775', 'C0004', 'SD004'),
    ('A0005', 'Esmeralda', 'Sisa Luz', '2000-09-05', '63336191', 'C0005', 'SD001'),
    ('A0006', 'Luz Angela', 'Gonzalez Gomez', '1980-04-02', '20455899', 'C0001', 'SD002'),
    ('A0007', 'Aura Janneth', 'Hernandez Uribe', '1997-12-18', '63475000', 'C0002', 'SD003'),
    ('A0008', 'Luis Fernando', 'Rubio Jaramillo', '1996-07-15', '98623818', 'C0003', 'SD004'),
    ('A0009', 'Carmen Luz', 'Trujillo Becerra', '1976-08-07', '38144307', 'C0004', 'SD001'),
    ('A0010', 'Gloria Stella', 'Balbin Diaz', '1990-10-24', '22464618', 'C0005', 'SD002'),
    ('A0011', 'Audrey Fabiana', 'Sanchez Lujan', '1995-02-18', '60256601', 'C0001', 'SD003'),
    ('A0012', 'Luis Alberto', 'Perez Galvis', '2003-11-25', '72206646', 'C0002', 'SD004'),
    ('A0013', 'Ingrid Yulieth', 'Molina Londoño', '1992-04-15', '50930839', 'C0003', 'SD001'),
    ('A0014', 'Nuvia Silvana', 'Tutistar Jojoa', '1994-03-07', '59827178', 'C0004', 'SD002'),
    ('A0015', 'Cristina', 'Baron', '2003-01-16', '52347754', 'C0005', 'SD003'),
    ('A0016', 'Martha Angélica', 'Salazar Hurtado', '1990-12-06', '31991865', 'C0001', 'SD004'),
    ('A0017', 'Edgar Fernando', 'Riascos Vallejo', '1987-09-13', '79582494', 'C0002', 'SD001'),
    ('A0018', 'Teresa', 'Hurtado Osorio', '1992-05-03', '25163718', 'C0003', 'SD002'),
    ('A0019', 'Mirian Rosa', 'Herazo Rivera', '2000-02-21', '64742776', 'C0004', 'SD003'),
    ('A0020', 'Delcy Carolina', 'Parra Diettes', '1998-07-09', '63539176', 'C0005', 'SD004'),
    ('A0021', 'Edwin Fernney', 'Lopera Piedrahita', '2001-09-28', '98561447', 'C0001', 'SD001'),
    ('A0022', 'Francely', 'Caicedo Vera', '1999-06-15', '63488632', 'C0002', 'SD002'),
    ('A0023', 'Helga Julia', 'Salazar Berdugo', '1987-01-25', '32724047', 'C0003', 'SD003'),
    ('A0024', 'Hector Yesid', 'Abril Molina', '1993-03-14', '80246477', 'C0004', 'SD004'),
    ('A0025', 'Magda Liliana', 'Martinez Orjuela', '2000-12-03', '65766151', 'C0005', 'SD001'),
    ('A0026', 'Janneth Clemencia', 'Becerra Romero', '1993-10-18', '52009251', 'C0001', 'SD002'),
    ('A0027', 'Esmith', 'Centeno Moncada', '1993-12-10', '52116040', 'C0002', 'SD003'),
    ('A0028', 'Juan Carlos', 'Gutierrez Duarte', '1987-11-05', '79494802', 'C0003', 'SD004'),
    ('A0029', 'Alexander', 'Jaramillo Blandón', '1992-08-20', '71749266', 'C0004', 'SD001'),
    ('A0030', 'Sixta María', 'Montes Contreras', '1990-04-12', '64567254', 'C0005', 'SD002'),
    ('A0031', 'Claudia Patricia', 'Mosquera Gaviria', '1986-06-30', '67000579', 'C0001', 'SD003'),
    ('A0032', 'Adriana', 'Velandia Aparicio', '1991-05-04', '52106014', 'C0002', 'SD004'),
    ('A0033', 'Job Gabriel', 'Yepes Espitia', '1988-09-03', '88158266', 'C0003', 'SD001'),
    ('A0034', 'Katia', 'Contreras', '1995-04-08', '64575137', 'C0004', 'SD002'),
    ('A0035', 'Gloria Patricia', 'Rincón Montoya', '1987-03-15', '29533602', 'C0005', 'SD003'),
    ('A0036', 'Carlos Antonio', 'Barragán Torres', '1997-02-21', '79503475', 'C0001', 'SD004'),
    ('A0037', 'Daniel Efren', 'Daza Timaná', '1974-09-17', '10547830', 'C0002', 'SD001'),
    ('A0038', 'Luis', 'López Bayardo', '1975-12-08', '11519403', 'C0003', 'SD002'),
    ('A0039', 'Judith', 'Cardona Gallego', '2002-07-13', '52005153', 'C0004', 'SD003'),
    ('A0040', 'Mirely', 'Parra Cuervo', '1998-05-26', '52356950', 'C0005', 'SD004');




-- comando para mostrar un alumno en especifico
SELECT
    a.Cod_alumno,
    a.Nombres AS Nombre_alumno,
    a.Apellidos AS Apellido_alumno,
    c.Carrera AS Carrera_alumno,
    cu.Cod_curso,
    cu.Curso AS Curso_ofrecido
FROM
    tb_alumnos a
INNER JOIN
    tb_carreras c ON a.Cod_carrera = c.Cod_carrera
INNER JOIN
    tb_cursos cu ON a.Cod_carrera = cu.Cod_carrera
WHERE
    a.Cod_alumno = 'A0001';


-- comando para mostrar las 3 tablas conectadas
SELECT
    a.Cod_alumno,
    a.Nombres AS Nombre_alumno,
    a.Apellidos AS Apellido_alumno,
    a.Fecha_nacimiento,
    a.Dni,
    c.Carrera AS Carrera_alumno,
    c.Cod_carrera AS Cod_carrera_alumno,
    cu.Curso AS Curso_inscrito,
    cu.Duración AS Duración_curso,
    cu.Costo AS Costo_curso,
    cu.Creditos AS Creditos_curso
FROM
    tb_alumnos a
INNER JOIN
    tb_carreras c ON a.Cod_carrera = c.Cod_carrera
INNER JOIN
    tb_cursos cu ON a.Cod_carrera = cu.Cod_carrera;
-- query para mostrar alumnos ,carreras y sedes
SELECT
    a.Cod_alumno,
    a.Nombres AS Nombre_alumno,
    a.Apellidos AS Apellido_alumno,
    c.Carrera AS Carrera_alumno,
    s.Nombre_sede AS Nombre_sede_alumno
FROM
    tb_alumnos a
INNER JOIN
    tb_carreras c ON a.Alumno_cod_carrera = c.Cod_carrera
INNER JOIN
    tb_sedes s ON a.Alumno_cod_sede = s.Cod_sede;

