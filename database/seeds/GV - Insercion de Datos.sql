CREATE SCHEMA IF NOT EXISTS G3_GESTOR_VENTAS;
USE G3_GESTOR_VENTAS;

-- 1. TIPOUSUARIO
INSERT INTO TIPOUSUARIO (nombre_tipo, descripcion) VALUES 
  ('Administrador', 'Usuario con permisos de administración'),
  ('Vendedor', 'Usuario que realiza ventas'),
  ('Supervisor', 'Usuario encargado de supervisar operaciones'),
  ('Cajero', 'Usuario que maneja la caja'),
  ('Soporte', 'Usuario de soporte técnico');

-- 2 AVATARUSUARIO
INSERT INTO AVATARUSUARIO (avatar_usuario, nombre_avatar, tipo_avatar, peso_avatar, dimension_x_avatar, dimension_y_avatar) VALUES
	(null, 'default-avatar', '.webp', '120kb', '125', '125');

-- 3. USUARIOS
INSERT INTO USUARIOS (nombre, correo, contrasenia, tipo_id_usuario, avatar_id_usuario) VALUES
('David Ojeda', 'david.ojeda@gestor.master.com', 'SuperAdminPass123', 1, 1), -- Admin 1
('Carla Mendoza', 'carla.ventas@gestor.com', 'VentasPass_456', 2, 1),      -- Vendedor 1
('Roberto Solano', 'roberto.ventas@gestor.com', 'VentasPass_789', 2, 1),     -- Vendedor 2
('Lucía Fernández', 'lucia.supervision@gestor.com', 'SupervisorPass_101', 3, 1), -- Supervisor 1
('Miguel Torres', 'miguel.caja@gestor.com', 'CajaPass_202', 4, 1),        -- Cajero 1
('Ana Paredes', 'ana.ventas@gestor.com', 'VentasPass_303', 2, 1),        -- Vendedor 3
('Javier Ríos', 'javier.ventas@gestor.com', 'VentasPass_404', 2, 1),        -- Vendedor 4
('Sandra Peña', 'sandra.soporte@gestor.tech', 'SoportePass_505', 5, 1),     -- Soporte 1
('Bruno Díaz', 'bruno.ventas@gestor.com', 'VentasPass_606', 2, 1),        -- Vendedor 5
('Laura Campos', 'laura.campos@gestor.admin.com', 'AdminPass_707', 1, 1);    -- Admin 2

-- 4. TIPOCLIENTE
INSERT INTO TIPOCLIENTE (nombre_tipo, descripcion) VALUES
  ('PÚBLICO EN GENERAL', 'Cliente sin identificación formal'),
  ('DNI', 'Cliente identificado con DNI (8 dígitos)'),
  ('CARNET DE EXTRANJERIA', 'Cliente con carnet de extranjería (12 dígitos)'),
  ('RUC', 'Cliente con RUC (11 dígitos)'),
  ('PASAPORTE', 'Cliente identificado con pasaporte (9 dígitos)');

-- 5. CLIENTES
INSERT INTO CLIENTES (num_identificacion, nombre, direccion, telefono, email, id_tipo_cliente) VALUES
('', 'Cliente General Ocasional', 'Sin Dirección', '900000000', 'general@example.com', 1),
('40123456', 'Juan Pérez Gonzales', 'Av. Arequipa 123', '987654321', 'juan.perez@example.com', 2),
('10456789', 'María López Mendoza', 'Calle Los Pinos 456', '912345678', 'maria.lopez@example.com', 2),
('20123456789', 'Constructora El Sol SAC', 'Av. Javier Prado 789', '998877665', 'contacto@elsol.com', 4),
('123456789012', 'Ana Gómez (Extranjería)', 'Jr. de la Unión 101', '976543210', 'ana.gomez@example.com', 3),
('AB1234567', 'Michael Smith', 'Av. Larco 321', '965432109', 'michael.smith@example.com', 5),
('41234567', 'Carlos Rodríguez Salas', 'Calle Schell 555', '954321098', 'carlos.rodriguez@example.com', 2),
('20501234567', 'Distribuidora del Norte EIRL', 'Panamericana Norte Km 25', '943210987', 'ventas@distrinorte.com', 4),
('42345678', 'Sofía Torres Vargas', 'Av. Benavides 987', '932109876', 'sofia.torres@example.com', 2),
('43456789', 'Luis Martínez Ferreyra', 'Calle Las Begonias 234', '921098765', 'luis.martinez@example.com', 2),
('', 'Público General Mañana', 'Tienda', '900000001', 'general2@example.com', 1),
('44567890', 'Laura Díaz Huamán', 'Av. Grau 678', '910987654', 'laura.diaz@example.com', 2),
('CD9876543', 'Emily White', 'Calle Berlín 110', '909876543', 'emily.white@example.com', 5),
('20601234567', 'Inversiones Globales SAC', 'Av. El Ejército 700', '998765432', 'info@global.com', 4),
('45678901', 'Diego Flores Castro', 'Jr. Ayacucho 305', '987654321', 'diego.flores@example.com', 2),
('46789012', 'Carmen Vargas Ríos', 'Calle Santa Cruz 812', '976543210', 'carmen.vargas@example.com', 2),
('10478901234', 'Pedro Ramirez (RUC Pers.)', 'Av. Angamos 1500', '965432109', 'pedro.ramirez@example.com', 4),
('47890123', 'Lucía Morales Peña', 'Calle Montebello 123', '954321098', 'lucia.morales@example.com', 2),
('123456789013', 'Kenji Tanaka', 'Av. Aviación 2100', '943210987', 'kenji.tanaka@example.com', 3),
('48901234', 'Javier Alonso Ruiz', 'Calle Los Robles 444', '932109876', 'javier.alonso@example.com', 2),
('20555666777', 'Comercializadora Andina SAC', 'Av. Argentina 500', '921098765', 'comercial@andina.com', 4),
('49012345', 'Elena Quispe Lima', 'Av. Tacna 130', '910987654', 'elena.quispe@example.com', 2),
('10401234567', 'Ricardo Palma (RUC Pers.)', 'Calle Ricardo Palma 100', '909876543', 'ricardo.palma@example.com', 4),
('50123456', 'Miguel Grau Seminario', 'Av. Miguel Grau 111', '998765432', 'miguel.grau@example.com', 2),
('EF4567890', 'François Dubois', 'Calle Cantuarias 230', '987654321', 'francois.dubois@example.com', 5),
('51234567', 'Rosa Fuentes Olivos', 'Av. Los Olivos 300', '976543210', 'rosa.fuentes@example.com', 2),
('20401234567', 'Agroindustrias del Sur SA', 'Carretera Central Km 15', '965432109', 'agro@sur.com', 4),
('52345678', 'Andrés Mendoza Roca', 'Jr. Gamarra 880', '954321098', 'andres.mendoza@example.com', 2),
('53456789', 'Patricia Solano Vega', 'Calle Las Acacias 190', '943210987', 'patricia.solano@example.com', 2),
('10545678901', 'Fernanda Silva (RUC Pers.)', 'Av. Primavera 1200', '932109876', 'fernanda.silva@example.com', 4),
('54567890', 'Jorge Chávez Paredes', 'Calle Los Alamos 720', '921098765', 'jorge.chavez@example.com', 2),
('55678901', 'Verónica Castillo Moya', 'Av. Guardia Civil 345', '910987654', 'veronica.castillo@example.com', 2),
('123456789014', 'Mario Luna (Extranjería)', 'Jr. Huiracocha 500', '909876543', 'mario.luna@example.com', 3),
('GH6543210', 'Hans Müller', 'Calle San Martín 650', '998765432', 'hans.muller@example.com', 5),
('56789012', 'Daniela Herrera Soto', 'Av. El Golf 1050', '987654321', 'daniela.herrera@example.com', 2),
('20609876543', 'Servicios Generales Lima SAC', 'Av. Canadá 1150', '976543210', 'servicios@lima.com', 4),
('57890123', 'Roberto Jiménez Díaz', 'Calle Los Tulipanes 330', '965432109', 'roberto.jimenez@example.com', 2),
('58901234', 'Gabriela Ponce de León', 'Av. República de Panamá 3010', '954321098', 'gabriela.ponce@example.com', 2),
('10589012345', 'Teresa Mendoza (RUC Pers.)', 'Jr. Lampa 420', '943210987', 'teresa.mendoza@example.com', 4),
('59012345', 'Raúl Contreras Flores', 'Calle Los Laureles 510', '932109876', 'raul.contreras@example.com', 2),
('', 'Público General Tarde', 'Tienda', '900000002', 'general3@example.com', 1),
('60123456', 'Mónica Sánchez Paredes', 'Av. Salaverry 1300', '921098765', 'monica.sanchez@example.com', 2),
('IJ7890123', 'Alessia Russo', 'Calle Diagonal 220', '910987654', 'alessia.russo@example.com', 5),
('20521234567', 'Importaciones Tech SAC', 'Av. Wilson 950', '909876543', 'import@tech.com', 4),
('61234567', 'Óscar Guerrero Campos', 'Jr. Paruro 600', '998765432', 'oscar.guerrero@example.com', 2),
('62345678', 'Beatriz Castro Mendoza', 'Av. La Marina 2200', '987654321', 'beatriz.castro@example.com', 2),
('10623456789', 'David Reyes (RUC Pers.)', 'Calle Porta 180', '976543210', 'david.reyes@example.com', 4),
('63456789', 'Natalia Rojas Ortiz', 'Av. Pardo 560', '965432109', 'natalia.rojas@example.com', 2),
('123456789015', 'Lee Wang (Extranjería)', 'Calle Capón 750', '954321098', 'lee.wang@example.com', 3),
('64567890', 'Víctor Morales Costa', 'Av. Petit Thouars 1600', '943210987', 'victor.morales@example.com', 2);

-- 6. CATEGORIAS
INSERT INTO CATEGORIAS (nombre, descripcion) VALUES
  ('Electrónica', 'Productos electrónicos y gadgets'),
  ('Ropa', 'Vestimenta para hombre, mujer y niños'),
  ('Alimentos', 'Productos alimenticios y comestibles'),
  ('Hogar', 'Artículos para el hogar y decoración'),
  ('Juguetes', 'Juguetes y artículos para niños'),
  ('Deportes', 'Artículos y ropa deportiva'),
  ('Libros', 'Literatura, académicos y entretenimiento'),
  ('Muebles', 'Muebles para el hogar y oficina'),
  ('Jardinería', 'Herramientas y accesorios para jardín'),
  ('Automotriz', 'Accesorios y repuestos para vehículos');


-- 7. PROVEEDORES
INSERT INTO PROVEEDORES (nombre, email, telefono, direccion) VALUES
('TecnoGlobal Perú SAC', 'ventas@tecnoglobal.com', '911111111', 'Av. Wilson 123, Lima'),
('Textiles La Victoria SA', 'contacto@textileslavictoria.com', '922222222', 'Jr. Gamarra 456, La Victoria'),
('Distribuidora Alimentos Andinos', 'pedidos@alandinos.com', '933333333', 'Av. Argentina 789, Callao'),
('MundoHogar Importaciones', 'info@mundohogar.com', '944444444', 'Av. Canadá 101, La Victoria'),
('Juguetes Creativos EIRL', 'jcreativos@gmail.com', '955555555', 'Calle Los Robles 202, San Isidro'),
('Deportes Total SAC', 'ventas@deportestotal.com', '966666666', 'Av. Angamos 303, Surquillo'),
('Editorial El Saber', 'editorial@elsaber.pe', '977777777', 'Jr. de la Unión 404, Lima'),
('Muebles Confort SAC', 'muebles@confort.com', '988888888', 'Parque Industrial, Villa El Salvador'),
('Jardín Ideal Herramientas', 'jardin@ideal.com', '999999999', 'Av. La Molina 505, La Molina'),
('AutoPartes Express SAC', 'repuestos@autopartes.com', '910101010', 'Av. Iquitos 606, La Victoria'),
('Comercializadora del Pacífico', 'cpacifico@gmail.com', '912121212', 'Av. Grau 707, Barranco'),
('Agroindustrias Sol Verde', 'solverde@agro.com', '913131313', 'Panamericana Sur Km 40, Lurín'),
('Ropa Urbana S.A.C.', 'urbana@gmail.com', '914141414', 'Av. Abancay 808, Lima'),
('Importaciones Electrónicas Masivas', 'import@electronica.com', '915151515', 'Calle Paruro 909, Lima'),
('Decoraciones y Estilos', 'decor@estilos.com', '916161616', 'Av. Primavera 1010, Surco'),
('Libros Infantiles Fantasía', 'fantasia@libros.com', '917171717', 'Calle Esperanza 111, Miraflores'),
('Equipos de Gimnasio PRO', 'gym@pro.com', '918181818', 'Av. Aviación 1212, San Borja'),
('Maderas y Diseños SAC', 'maderas@disenos.com', '919191919', 'Av. Pachacutec 1313, Villa María'),
('Semillas del Valle', 'semillas@valle.com', '920202020', 'Carretera Central Km 10, Ate'),
('Lubricantes y Filtros S.A.', 'lubricantes@filtros.com', '921212121', 'Av. Nicolás Arriola 1414, La Victoria'),
('Gadgets & Más EIRL', 'gadgets@mas.com', '922222223', 'Av. Arequipa 1515, Lince'),
('Moda Infantil Kids', 'moda@kids.com', '923232324', 'Jr. Gamarra 1616, La Victoria'),
('Conservas del Mar SAC', 'conservas@mar.com', '924242425', 'Av. Néstor Gambetta 1717, Callao'),
('Plásticos Nacionales', 'plasticos@nacional.com', '925252526', 'Av. Separadora Industrial 1818, Ate'),
('Didácticos ABC', 'didacticos@abc.com', '926262627', 'Av. Benavides 1919, Miraflores'),
('Aventura Extrema Outdoor', 'aventura@extrema.com', '927272728', 'Calle Los Eucaliptos 2020, Cieneguilla'),
('Papelería y Oficina Central', 'central@papeleria.com', '928282829', 'Jr. Azángaro 2121, Lima'),
('Oficinas Modernas SAC', 'oficinas@modernas.com', '929292920', 'Av. República de Panamá 2222, San Isidro'),
('Vivero Las Flores', 'vivero@lasflores.com', '930303031', 'Av. El Sol 2323, Chorrillos'),
('Repuestos Asiáticos Import', 'repuestos@asiaticos.com', '931313132', 'Av. Ayacucho 2424, Surquillo'),
('Sonido Profesional Perú', 'sonido@pro.pe', '932323233', 'Jr. Leticia 2525, Lima'),
('Algodón Peruano Export', 'algodon@export.com', '933333334', 'Av. Santa Cruz 2626, Miraflores'),
('Embutidos La Preferida', 'pedidos@lapreferida.com', '934343435', 'Av. Industrial 2727, Independencia'),
('Menaje y Cocina SAC', 'menaje@cocina.com', '935353536', 'Av. Tomás Marsano 2828, Surquillo'),
('Juegos de Mesa Lúdicos', 'juegos@ludicos.com', '936363637', 'Av. Comandante Espinar 2929, Miraflores'),
('Calzado Deportivo Runner', 'calzado@runner.com', '937373738', 'Calle Las Camelias 3030, San Isidro'),
('Textos Escolares Futuro', 'textos@futuro.com', '938383839', 'Av. Alfonso Ugarte 3131, Breña'),
('Colchones y Muebles Descanso', 'descanso@colchones.com', '939393930', 'Av. Angamos Este 3232, San Borja'),
('Maquinaria de Jardín Tools', 'maquinaria@tools.com', '940404041', 'Av. Próceres 3333, Surco'),
('Neumáticos y Aros Racing', 'neumaticos@racing.com', '941414142', 'Av. México 3434, La Victoria'),
('Laptops y Accesorios Lima', 'laptops@lima.com', '942424243', 'Av. Garcilaso de la Vega 1313, Lima'),
('Ropa de Baño Verano', 'verano@playa.com', '943434344', 'Calle Gamarra 111, La Victoria'),
('Frutos Secos El Nogal', 'elnogal@frutos.com', '944444445', 'Mercado de Surquillo Puesto 50, Surquillo'),
('Iluminación LED Hogar', 'iluminacion@led.com', '945454546', 'Jr. Paruro 300, Lima'),
('Juguetes Importados Mundo', 'import@juguetes.com', '946464647', 'Av. Larco 600, Miraflores'),
('Balones y Redes Sport', 'balones@sport.com', '947474748', 'Av. Aviación 1500, San Borja'),
('Novelas y BestSellers SAC', 'novelas@bestsellers.com', '948484849', 'Av. Pardo 200, Miraflores'),
('Sillas de Oficina Ergo', 'sillas@ergo.com', '949494940', 'Av. Javier Prado Este 2500, San Borja'),
('Fertilizantes Orgánicos Terra', 'terra@organicos.com', '950505051', 'Av. Cieneguilla Km 5, Cieneguilla'),
('Accesorios 4x4 OffRoad', 'accesorios@4x4.com', '951515152', 'Av. Tomás Valle 800, Los Olivos');


-- 8. PRODUCTOS
INSERT INTO PRODUCTOS (nombre, descripcion, precio, stock, id_categoria, id_proveedor, ganancia) VALUES
-- Electrónica (Cat 1)
('Laptop Pro X15', 'Laptop 15.6" Core i7, 16GB RAM, 512GB SSD', 3500.00, 50, 1, 1, 0.15),
('Smartphone Z5', 'Celular 6.5" 128GB, 8GB RAM, Cámara 108MP', 1800.00, 120, 1, 14, 0.10),
('Auriculares Bluetooth TWS', 'Auriculares Inalámbricos con cancelación de ruido', 250.00, 200, 1, 1, 0.20),
('Smartwatch Fit Pro', 'Reloj inteligente, monitor de ritmo cardíaco, GPS', 450.00, 150, 1, 21, 0.15),
('Teclado Mecánico RGB', 'Teclado gamer con switches red', 320.00, 80, 1, 41, 0.20),
('Mouse Inalámbrico Ergo', 'Mouse ergonómico 2400 DPI, 6 botones', 120.00, 300, 1, 1, 0.15),
('Monitor Curvo 27" 144Hz', 'Monitor gamer QHD 1ms respuesta', 1100.00, 40, 1, 14, 0.10),
('Cargador Rápido USB-C 65W', 'Cargador de pared GaN para laptops y celulares', 180.00, 250, 1, 21, 0.20),
('Power Bank 20000mAh', 'Batería externa con 2 puertos USB y USB-C PD', 220.00, 180, 1, 41, 0.15),
('Altavoz Inteligente Mini', 'Asistente de voz, control de hogar', 150.00, 130, 1, 31, 0.10),
('Tablet 10" FHD', 'Tablet 64GB, 4GB RAM, Android 13', 750.00, 90, 1, 1, 0.15),
-- Ropa (Cat 2)
('Camisa de Lino Manga Larga', 'Camisa casual de lino, color blanco', 130.00, 150, 2, 2, 0.25),
('Pantalón Jean Slim Fit', 'Jean azul oscuro, tela stretch', 180.00, 200, 2, 13, 0.20),
('Vestido de Verano Floral', 'Vestido corto de algodón estampado', 110.00, 120, 2, 2, 0.25),
('Zapatillas Deportivas Runner', 'Zapatillas para correr, suela de goma', 280.00, 180, 2, 36, 0.20),
('Casaca de Cuero PU', 'Casaca estilo motociclista, color negro', 350.00, 70, 2, 32, 0.15),
('Medias (Pack 3)', 'Medias de algodón deportivas', 35.00, 500, 2, 2, 0.30),
('Polo Básico Algodón Pima', 'Polo cuello redondo, diversos colores', 65.00, 400, 2, 32, 0.25),
('Corbata de Seda Italiana', 'Corbata slim color azul noche', 90.00, 100, 2, 13, 0.20),
('Ropa de Baño (Bikini)', 'Bikini dos piezas, estampado tropical', 120.00, 90, 2, 42, 0.25),
('Pijama de Franela Cuadros', 'Pijama de dos piezas, suave', 140.00, 110, 2, 2, 0.20),
('Chompa de Hilo', 'Chompa ligera cuello V', 160.00, 130, 2, 32, 0.20),
-- Alimentos (Cat 3)
('Arroz Extra (Saco 5kg)', 'Arroz grano largo, tipo extra', 22.00, 500, 3, 3, 0.10),
('Aceite de Oliva Extra Virgen 1L', 'Aceite de oliva prensado en frío', 45.00, 300, 3, 3, 0.15),
('Atún en Conserva (Pack 6)', 'Filete de atún en aceite vegetal', 32.00, 400, 3, 23, 0.10),
('Fideos (Pack 500g)', 'Pasta larga, spaguetti', 4.50, 800, 3, 3, 0.15),
('Leche Evaporada (Pack 6)', 'Leche entera evaporada, lata 400g', 21.00, 600, 3, 3, 0.10),
('Café Orgánico 250g', 'Café molido de Chanchamayo', 30.00, 250, 3, 12, 0.20),
('Galletas de Soda (Paquete 6)', 'Galletas de agua, bajas en sal', 7.00, 700, 3, 3, 0.10),
('Mermelada de Fresa 500g', 'Mermelada artesanal', 18.00, 200, 3, 12, 0.15),
('Yogurt Griego Natural 1kg', 'Yogurt sin azúcar', 15.00, 150, 3, 33, 0.10),
('Cereal de Maíz Azucarado 500g', 'Hojuelas de maíz', 16.00, 300, 3, 3, 0.10),
('Vino Tinto Malbec', 'Vino argentino 750ml', 55.00, 100, 3, 11, 0.15),
-- Hogar (Cat 4)
('Juego de Sábanas Queen', 'Sábanas 100% algodón 300 hilos', 190.00, 100, 4, 4, 0.20),
('Toallas de Baño (Set 2)', 'Toallas de 70x140cm, algodón', 80.00, 200, 4, 4, 0.25),
('Olla Arrocera 1.8L', 'Olla con función para mantener caliente', 130.00, 120, 4, 15, 0.15),
('Licuadora 5 Vel.', 'Licuadora con vaso de vidrio 1.5L', 160.00, 110, 4, 34, 0.15),
('Vajilla 16 piezas', 'Vajilla de loza para 4 personas', 220.00, 80, 4, 4, 0.20),
('Set de Cuchillos (6 piezas)', 'Cuchillos de acero inoxidable con base', 110.00, 140, 4, 34, 0.20),
('Lámpara de Escritorio LED', 'Lámpara con brazo flexible, 3 tonos', 75.00, 180, 4, 44, 0.15),
('Espejo de Pared Redondo 60cm', 'Espejo con marco de metal negro', 150.00, 90, 4, 15, 0.20),
('Tacho de Basura Inox 12L', 'Tacho con pedal', 95.00, 130, 4, 24, 0.15),
('Plancha a Vapor', 'Plancha con suela de cerámica', 100.00, 160, 4, 4, 0.15),
('Set de Ollas (5 piezas)', 'Ollas de acero inoxidable, fondo triple', 350.00, 70, 4, 34, 0.20),
-- Juguetes (Cat 5)
('Auto a Control Remoto', 'Auto de carreras 4x4, batería recargable', 180.00, 90, 5, 5, 0.20),
('Muñeca Habladora 40cm', 'Muñeca con accesorios, dice 20 frases', 130.00, 110, 5, 25, 0.25),
('Bloques de Construcción (100 pz)', 'Set de bloques de plástico de colores', 70.00, 300, 5, 5, 0.20),
('Pelota de Fútbol N° 5', 'Pelota de cuero sintético', 60.00, 250, 5, 45, 0.15),
('Rompecabezas 1000 piezas', 'Paisaje', 55.00, 180, 5, 35, 0.20),
('Juego de Té Infantil', 'Set de té de porcelana de juguete', 85.00, 130, 5, 5, 0.25),
('Dinosaurio T-Rex Goma', 'Figura de T-Rex 30cm', 45.00, 220, 5, 25, 0.15),
('Pista de Carreras Flexible', 'Pista de 150 piezas con auto', 160.00, 100, 5, 45, 0.20),
('Cocina de Juguete', 'Cocina de plástico con luces y sonidos', 220.00, 70, 5, 5, 0.20),
('Set de Arte (50 piezas)', 'Incluye crayolas, plumones y colores', 65.00, 280, 5, 35, 0.20),
('Figuras de Acción (Pack 3)', 'Superhéroes articulados', 100.00, 140, 5, 25, 0.25),
-- Deportes (Cat 6)
('Bicicleta Montañera Aro 29', 'Bicicleta de aluminio, 21 cambios', 850.00, 30, 6, 6, 0.15),
('Pelota de Basket N° 7', 'Pelota de cuero compuesto, uso interior/exterior', 120.00, 150, 6, 17, 0.20),
('Guantes de Boxeo 12 Oz', 'Guantes de PU para entrenamiento', 90.00, 100, 6, 6, 0.20),
('Mat de Yoga 6mm', 'Mat antideslizante de TPE', 70.00, 300, 6, 26, 0.25),
('Mancuernas (Par 5kg)', 'Mancuernas hexagonales de caucho', 110.00, 120, 6, 17, 0.15),
('Cuerda para Saltar (Speed Rope)', 'Cuerda de PVC con mangos ligeros', 40.00, 400, 6, 6, 0.30),
('Gorra Deportiva Dry-Fit', 'Gorra con protección UV', 55.00, 250, 6, 36, 0.20),
('Raqueta de Tenis (Principiante)', 'Raqueta de aluminio', 140.00, 80, 6, 26, 0.15),
('Mochila Deportiva', 'Mochila con compartimento para zapatillas', 130.00, 110, 6, 6, 0.20),
('Bandas Elásticas (Set 5)', 'Set de bandas de resistencia', 60.00, 220, 6, 17, 0.25),
('Casco de Ciclismo Urbano', 'Casco con ventilación y ajuste', 160.00, 90, 6, 26, 0.20),
-- Libros (Cat 7)
('Cien Años de Soledad', 'G. García Márquez, Tapa Dura', 80.00, 100, 7, 7, 0.30),
('El Poder del Ahora', 'Eckhart Tolle, Tapa Blanda', 65.00, 150, 7, 16, 0.25),
('Sapiens: De animales a dioses', 'Yuval Noah Harari, Tapa Blanda', 90.00, 120, 7, 47, 0.25),
('Fundamentos de Marketing', 'Philip Kotler, 17a Edición', 230.00, 50, 7, 37, 0.15),
('El Principito', 'Antoine de Saint-Exupéry, Ilustrado', 45.00, 200, 7, 7, 0.30),
('Cocina Peruana (Recetario)', 'Gastón Acurio, Tapa Dura', 150.00, 80, 7, 16, 0.20),
('Hábitos Atómicos', 'James Clear, Tapa Blanda', 75.00, 300, 7, 47, 0.25),
('Harry Potter y la Piedra Filosofal', 'J.K. Rowling, Tapa Blanda', 70.00, 180, 7, 7, 0.30),
('Don Quijote de la Mancha', 'Miguel de Cervantes, Edición Escolar', 50.00, 160, 7, 37, 0.20),
('Introducción al Cálculo', 'James Stewart, Vol 1', 180.00, 60, 7, 37, 0.15),
('El Gato Negro (Cuentos)', 'Edgar Allan Poe, Tapa Blanda', 35.00, 250, 7, 16, 0.25),
-- Muebles (Cat 8)
('Silla de Oficina Ergonómica', 'Silla con soporte lumbar, malla', 450.00, 60, 8, 8, 0.20),
('Escritorio de Melamina 120cm', 'Escritorio color madera, 2 cajones', 280.00, 80, 8, 18, 0.15),
('Estante Biblioteca 5 niveles', 'Estante de 180x60x30 cm', 220.00, 100, 8, 28, 0.15),
('Sofá Cama 2 plazas', 'Sofá de tela, color gris', 750.00, 30, 8, 8, 0.20),
('Mesa de Centro de Vidrio', 'Mesa 100x50cm, base de metal', 310.00, 50, 8, 38, 0.20),
('Set de Comedor 4 sillas', 'Mesa de madera 120cm + 4 sillas', 950.00, 25, 8, 18, 0.15),
('Cama Queen (Base + Cabecera)', 'Estructura de cama tapizada', 1100.00, 40, 8, 38, 0.20),
('Armario Ropero 3 puertas', 'Ropero de melamina blanco, 180x120cm', 680.00, 45, 8, 8, 0.15),
('Silla Gamer Pro', 'Silla reclinable, cuero PU, rojo', 650.00, 55, 8, 48, 0.20),
('Velador (Mesa de Noche)', 'Velador con 2 cajones, blanco', 130.00, 150, 8, 18, 0.15),
('Zapatera de 3 Niveles', 'Organizador de zapatos, metal', 80.00, 200, 8, 28, 0.20),
-- Jardinería (Cat 9)
('Tijera de Podar Manual', 'Tijera de acero inoxidable', 45.00, 300, 9, 9, 0.25),
('Manguera 20m (Set)', 'Incluye pistola de riego 5 funciones', 90.00, 150, 9, 19, 0.20),
('Set de Herramientas (3 pz)', 'Pala, rastrillo, trasplantador (pequeños)', 35.00, 400, 9, 9, 0.30),
('Fertilizante Universal 1kg', 'Fertilizante NPK granulado', 25.00, 500, 9, 29, 0.15),
('Maceta de Cerámica 20cm', 'Maceta decorativa, color terracota', 50.00, 180, 9, 9, 0.20),
('Semillas de Césped (Bolsa 1kg)', 'Mezcla resistente al sol', 40.00, 220, 9, 19, 0.15),
('Regadera 5L', 'Regadera de plástico, color verde', 30.00, 250, 9, 49, 0.20),
('Guantes de Jardinería', 'Guantes con palmas de goma', 20.00, 600, 9, 9, 0.30),
('Tierra Preparada (Saco 5kg)', 'Sustrato con compost y musgo', 18.00, 700, 9, 29, 0.10),
('Bomba Fumigadora Manual 2L', 'Pulverizador de presión', 55.00, 160, 9, 39, 0.20),
('Malla Rachell 90% (Metro)', 'Malla para sombra, 4m de ancho', 12.00, 1000, 9, 49, 0.15),
-- Automotriz (Cat 10)
('Aceite de Motor 10W-40 (1 Gal)', 'Aceite sintético para 10,000 km', 120.00, 200, 10, 10, 0.15),
('Líquido de Frenos DOT 4 500ml', 'Líquido de frenos alta performance', 35.00, 300, 10, 20, 0.20),
('Filtro de Aire (Modelo Universal)', 'Filtro de aire para sedán promedio', 40.00, 400, 10, 30, 0.15),
('Plumillas Limpiaparabrisas (Par)', 'Plumillas de silicona 20" y 18"', 65.00, 250, 10, 10, 0.25),
('Cera Rápida 500ml', 'Cera en spray para brillo instantáneo', 50.00, 180, 10, 20, 0.20),
('Kit de Emergencia (Triángulo, Ext.)', 'Kit básico de seguridad', 100.00, 100, 10, 10, 0.15),
('Aspiradora de Auto 12V', 'Aspiradora portátil para auto', 70.00, 130, 10, 50, 0.20),
('Focos LED H4 (Par)', 'Luces blancas de alta intensidad', 150.00, 110, 10, 30, 0.20),
('Cargador de Celular 12V', 'Cargador USB doble para auto', 30.00, 500, 10, 50, 0.25),
('Gata Hidráulica 2 Ton', 'Gata tipo botella', 140.00, 80, 10, 10, 0.15),
('Ambientador (Pino)', 'Ambientador colgante', 10.00, 1000, 10, 20, 0.30);

-- 9. VENTAS
INSERT INTO VENTAS (fecha, total, id_cliente, id_usuario) VALUES
('2025-01-10 10:15:00', 460.00, 2, 1),
('2025-01-12 11:30:00', 84.00, 5, 2),
('2025-01-15 14:00:00', 850.00, 8, 3),
('2025-01-18 09:45:00', 260.00, 12, 4),
('2025-01-20 16:20:00', 200.00, 15, 5),
('2025-01-22 18:00:00', 198.00, 20, 6),
('2025-01-25 11:10:00', 1800.00, 4, 7),
('2025-01-28 12:30:00', 100.00, 30, 8),
('2025-02-01 15:00:00', 290.00, 35, 9),
('2025-02-03 10:00:00', 310.00, 40, 10),
('2025-02-05 11:45:00', 70.00, 1, 1),
('2025-02-08 17:15:00', 250.00, 3, 2),
('2025-02-10 12:00:00', 560.00, 7, 3),
('2025-02-12 13:30:00', 1100.00, 11, 4),
('2025-02-15 16:50:00', 25.00, 14, 5),
('2025-02-18 10:30:00', 230.00, 18, 6),
('2025-02-20 14:20:00', 44.00, 22, 7),
('2025-02-22 11:00:00', 150.00, 25, 8),
('2025-02-25 09:30:00', 650.00, 28, 9),
('2025-02-28 15:10:00', 110.00, 32, 10),
('2025-03-01 10:00:00', 140.00, 38, 1),
('2025-03-03 12:45:00', 270.00, 42, 2),
('2025-03-05 16:00:00', 440.00, 45, 3),
('2025-03-08 11:20:00', 160.00, 48, 4),
('2025-03-10 13:00:00', 240.00, 50, 5),
('2025-03-12 17:30:00', 300.00, 2, 6),
('2025-03-15 10:15:00', 180.00, 5, 7),
('2025-03-18 14:00:00', 65.00, 8, 8),
('2025-03-20 11:50:00', 130.00, 12, 9),
('2025-03-22 16:10:00', 250.00, 15, 10),
('2025-03-25 18:00:00', 7000.00, 4, 1),
('2025-03-28 10:40:00', 160.00, 20, 2),
('2025-04-01 12:00:00', 70.00, 30, 3),
('2025-04-03 15:30:00', 80.00, 35, 4),
('2025-04-05 09:50:00', 110.00, 40, 5),
('2025-04-08 11:15:00', 680.00, 1, 6),
('2025-04-10 14:45:00', 70.00, 3, 7),
('2025-04-12 16:00:00', 160.00, 7, 8),
('2025-04-15 10:00:00', 750.00, 11, 9),
('2025-04-18 12:20:00', 30.00, 14, 10),
('2025-04-20 17:00:00', 90.00, 18, 1),
('2025-04-22 13:10:00', 95.00, 22, 2),
('2025-04-25 11:30:00', 450.00, 25, 3),
('2025-04-28 10:10:00', 220.00, 28, 4),
('2025-05-01 14:50:00', 270.00, 32, 5),
('2025-05-03 16:30:00', 160.00, 38, 6),
('2025-05-05 18:10:00', 140.00, 42, 7),
('2025-05-08 11:00:00', 900.00, 45, 8),
('2025-05-10 12:40:00', 360.00, 48, 9),
('2025-05-12 15:00:00', 360.00, 50, 10),
('2025-05-15 10:20:00', 160.00, 2, 1),
('2025-05-18 13:00:00', 90.00, 5, 2),
('2025-05-20 14:30:00', 130.00, 8, 3),
('2025-05-22 11:10:00', 130.00, 12, 4),
('2025-05-25 16:40:00', 120.00, 15, 5),
('2025-05-28 09:30:00', 50.00, 20, 6),
('2025-06-01 10:50:00', 130.00, 4, 7),
('2025-06-03 15:00:00', 70.00, 30, 8),
('2025-06-05 12:10:00', 100.00, 35, 9),
('2025-06-08 14:00:00', 70.00, 40, 10),
('2025-06-10 11:30:00', 220.00, 1, 1),
('2025-06-12 16:20:00', 70.00, 3, 2),
('2025-06-15 10:00:00', 180.00, 7, 3),
('2025-06-18 13:40:00', 45.00, 11, 4),
('2025-06-20 17:00:00', 1800.00, 14, 5),
('2025-06-22 11:50:00', 300.00, 18, 6),
('2025-06-25 14:10:00', 100.00, 22, 7),
('2025-06-28 10:30:00', 75.00, 25, 8),
('2025-07-01 12:00:00', 110.00, 28, 9),
('2025-07-03 16:00:00', 350.00, 32, 10),
('2025-07-05 10:10:00', 120.00, 38, 1),
('2025-07-08 11:20:00', 60.00, 42, 2),
('2025-07-10 14:30:00', 130.00, 45, 3),
('2025-07-12 17:00:00', 560.00, 48, 4),
('2025-07-15 10:00:00', 30.00, 50, 5),
('2025-07-18 12:50:00', 45.00, 2, 6),
('2025-07-20 15:40:00', 750.00, 5, 7),
('2025-07-22 18:00:00', 140.00, 8, 8),
('2025-07-25 11:30:00', 45.00, 12, 9),
('2025-07-28 13:10:00', 60.00, 15, 10),
('2025-08-01 10:00:00', 3500.00, 4, 1),
('2025-08-04 14:20:00', 180.00, 20, 2),
('2025-08-07 16:00:00', 360.00, 30, 3),
('2025-08-10 11:10:00', 200.00, 35, 4),
('2025-08-13 12:30:00', 55.00, 40, 5),
('2025-08-16 15:00:00', 130.00, 1, 6),
('2025-08-19 10:45:00', 320.00, 3, 7),
('2025-08-22 13:00:00', 220.00, 7, 8),
('2025-08-25 17:10:00', 180.00, 11, 9),
('2025-08-28 11:00:00', 140.00, 14, 10),
('2025-09-01 10:20:00', 950.00, 18, 1),
('2025-09-04 14:00:00', 75.00, 22, 2),
('2025-09-07 15:30:00', 180.00, 25, 3),
('2025-09-10 10:00:00', 140.00, 28, 4),
('2025-09-13 12:40:00', 1100.00, 32, 5),
('2025-09-16 16:50:00', 55.00, 38, 6),
('2025-09-19 11:30:00', 36.00, 42, 7),
('2025-09-22 13:00:00', 24.00, 45, 8),
('2025-09-25 10:10:00', 50.00, 48, 9),
('2025-10-01 14:00:00', 240.00, 50, 10),
('2025-10-31 09:15:00', 3950.00, 5, 1),
('2025-10-31 10:30:00', 650.00, 10, 2),
('2025-10-31 11:45:00', 480.00, 15, 3),
('2025-10-31 14:00:00', 950.00, 20, 1),
('2025-11-01 09:00:00', 680.00, 25, 2),
('2025-11-01 10:10:00', 250.00, 30, 4),
('2025-11-01 11:20:00', 210.00, 35, 1),
('2025-11-02 09:30:00', 230.00, 40, 2),
('2025-11-02 10:40:00', 1960.00, 45, 5),
('2025-11-02 11:50:00', 70.00, 50, 6),
('2025-11-03 09:05:00', 200.00, 2, 1),
('2025-11-03 10:15:00', 80.00, 8, 2),
('2025-11-03 11:25:00', 180.00, 12, 7),
('2025-11-04 09:10:00', 440.00, 18, 1),
('2025-11-04 10:20:00', 50.00, 22, 2),
('2025-11-04 11:30:00', 130.00, 28, 8),
('2025-11-05 09:20:00', 120.00, 32, 1),
('2025-11-05 10:30:00', 190.00, 38, 2),
('2025-11-05 11:40:00', 180.00, 42, 9),
('2025-11-06 09:00:00', 220.00, 48, 10),
('2025-11-06 10:10:00', 200.00, 1, 1),
('2025-11-06 11:20:00', 150.00, 4, 2),
('2025-11-06 14:00:00', 40.00, 7, 3),
('2025-11-07 09:30:00', 210.00, 11, 1),
('2025-11-07 10:40:00', 240.00, 14, 2),
('2025-11-07 11:50:00', 750.00, 17, 4),
('2025-11-08 09:15:00', 850.00, 21, 1),
('2025-11-08 10:25:00', 130.00, 24, 2),
('2025-11-08 11:35:00', 350.00, 27, 5),
('2025-11-09 09:00:00', 140.00, 31, 6),
('2025-11-09 10:10:00', 110.00, 34, 1),
('2025-11-09 11:20:00', 70.00, 37, 2),
('2025-11-10 09:20:00', 65.00, 41, 7),
('2025-11-10 10:30:00', 30.00, 44, 1),
('2025-11-10 11:40:00', 75.00, 47, 2),
('2025-11-11 09:05:00', 440.00, 49, 8),
('2025-11-11 10:15:00', 560.00, 3, 1),
('2025-11-11 11:25:00', 90.00, 6, 2),
('2025-11-12 09:10:00', 60.00, 9, 9),
('2025-11-12 10:20:00', 120.00, 13, 10),
('2025-11-12 11:30:00', 270.00, 16, 1),
('2025-11-13 09:20:00', 260.00, 19, 2),
('2025-11-13 10:30:00', 360.00, 23, 3),
('2025-11-13 11:40:00', 180.00, 26, 1),
('2025-11-14 09:00:00', 7000.00, 29, 2),
('2025-11-14 10:10:00', 130.00, 33, 4),
('2025-11-14 11:20:00', 35.00, 36, 1),
('2025-11-15 09:30:00', 90.00, 39, 2),
('2025-11-15 10:40:00', 140.00, 43, 5),
('2025-11-15 11:50:00', 32.00, 46, 6),
('2025-11-16 09:15:00', 180.00, 48, 1),
('2025-11-16 10:25:00', 750.00, 50, 2),
('2025-11-16 11:35:00', 900.00, 5, 7),
('2025-11-17 09:00:00', 280.00, 10, 1),
('2025-11-17 10:10:00', 110.00, 15, 2),
('2025-11-17 11:20:00', 40.00, 20, 8),
('2025-11-18 09:20:00', 160.00, 25, 1),
('2025-11-18 10:30:00', 36.00, 30, 2),
('2025-11-18 11:40:00', 50.00, 35, 9),
('2025-11-19 09:05:00', 240.00, 40, 10),
('2025-11-19 10:15:00', 150.00, 45, 1),
('2025-11-19 11:25:00', 120.00, 2, 2),
('2025-11-20 09:10:00', 300.00, 8, 3),
('2025-11-20 10:20:00', 45.00, 12, 1),
('2025-11-20 11:30:00', 60.00, 18, 2),
('2025-11-21 09:20:00', 130.00, 22, 4),
('2025-11-21 10:30:00', 50.00, 28, 1),
('2025-11-21 11:40:00', 320.00, 32, 2),
('2025-11-22 09:00:00', 1100.00, 38, 5),
('2025-11-22 10:10:00', 70.00, 42, 6),
('2025-11-22 11:20:00', 30.00, 48, 1),
('2025-11-23 09:30:00', 130.00, 1, 2),
('2025-11-23 10:40:00', 80.00, 4, 7),
('2025-11-23 11:50:00', 150.00, 7, 1),
('2025-11-24 09:15:00', 680.00, 11, 2),
('2025-11-24 10:25:00', 160.00, 14, 8),
('2025-11-24 11:35:00', 180.00, 17, 1),
('2025-11-25 09:00:00', 32.00, 21, 2),
('2025-11-25 10:10:00', 95.00, 24, 9),
('2025-11-25 11:20:00', 250.00, 27, 10),
('2025-11-26 09:20:00', 3950.00, 31, 1),
('2025-11-26 10:30:00', 70.00, 34, 2),
('2025-11-26 11:40:00', 45.00, 37, 3),
('2025-11-27 09:05:00', 1100.00, 41, 1),
('2025-11-27 10:15:00', 110.00, 44, 2),
('2025-11-27 11:25:00', 220.00, 47, 4),
('2025-11-28 09:10:00', 160.00, 49, 1),
('2025-11-28 10:20:00', 160.00, 3, 2),
('2025-11-28 11:30:00', 44.00, 6, 5),
('2025-11-29 09:20:00', 650.00, 9, 1),
('2025-11-29 10:30:00', 560.00, 13, 2),
('2025-11-29 11:40:00', 85.00, 16, 6),
('2025-11-30 09:00:00', 40.00, 19, 1),
('2025-11-30 10:10:00', 55.00, 23, 2),
('2025-11-30 11:20:00', 24.00, 26, 7),
('2025-12-01 09:30:00', 30.00, 29, 1),
('2025-12-01 10:40:00', 310.00, 33, 2),
('2025-12-01 11:50:00', 180.00, 36, 8),
('2025-12-02 09:15:00', 120.00, 39, 1),
('2025-12-02 10:25:00', 130.00, 43, 2);

-- 10. DETALLE_VENTAS
INSERT INTO DETALLE_VENTAS (cantidad, precio_unitario, subtotal, id_venta, id_producto) VALUES
-- Venta 1 (Total: 460.00)
(1, 320.00, 320.00, 1, 5), -- Teclado Mecánico
(1, 140.00, 140.00, 1, 67), -- Raqueta Tenis
-- Venta 2 (Total: 84.00)
(2, 4.50, 9.00, 2, 26), -- Fideos
(3, 25.00, 75.00, 2, 95), -- Fertilizante
-- Venta 3 (Total: 850.00)
(1, 850.00, 850.00, 3, 57), -- Bicicleta
-- Venta 4 (Total: 260.00)
(2, 130.00, 260.00, 4, 88), -- Velador
-- Venta 5 (Total: 200.00)
(2, 100.00, 200.00, 5, 106), -- Kit Emergencia
-- Venta 6 (Total: 198.00)
(3, 65.00, 195.00, 6, 19), -- Polo Básico
(1, 3.00, 3.00, 6, 26), -- Fideos (precio oferta)
-- Venta 7 (Total: 1800.00)
(1, 1800.00, 1800.00, 7, 2), -- Smartphone Z5
-- Venta 8 (Total: 100.00)
(2, 50.00, 100.00, 8, 96), -- Maceta
-- Venta 9 (Total: 290.00)
(1, 110.00, 110.00, 9, 39), -- Set Cuchillos
(1, 180.00, 180.00, 9, 42), -- Auto Control Remoto
-- Venta 10 (Total: 310.00)
(1, 310.00, 310.00, 10, 83), -- Mesa Centro
-- Venta 11 (Total: 70.00)
(2, 35.00, 70.00, 11, 71), -- El Gato Negro
-- Venta 12 (Total: 250.00)
(1, 250.00, 250.00, 12, 3), -- Auriculares BT
-- Venta 13 (Total: 560.00)
(2, 280.00, 560.00, 13, 15), -- Zapatillas
-- Venta 14 (Total: 1100.00)
(1, 1100.00, 1100.00, 14, 7), -- Monitor Curvo
-- Venta 15 (Total: 25.00)
(1, 25.00, 25.00, 15, 95), -- Fertilizante
-- Venta 16 (Total: 230.00)
(1, 230.00, 230.00, 16, 74), -- Fund. Marketing
-- Venta 17 (Total: 44.00)
(2, 22.00, 44.00, 17, 23), -- Arroz
-- Venta 18 (Total: 150.00)
(1, 150.00, 150.00, 18, 76), -- Cocina Peruana
-- Venta 19 (Total: 650.00)
(1, 650.00, 650.00, 19, 87), -- Silla Gamer
-- Venta 20 (Total: 110.00)
(1, 110.00, 110.00, 20, 14), -- Vestido
-- Venta 21 (Total: 140.00)
(4, 35.00, 140.00, 21, 18), -- Medias
-- Venta 22 (Total: 270.00)
(3, 90.00, 270.00, 22, 20), -- Corbata
-- Venta 23 (Total: 440.00)
(2, 220.00, 440.00, 23, 22), -- Power Bank
-- Venta 24 (Total: 160.00)
(2, 80.00, 160.00, 24, 72), -- Cien Años
-- Venta 25 (Total: 240.00)
(2, 120.00, 240.00, 25, 102), -- Aceite Motor
-- Venta 26 (Total: 300.00)
(2, 150.00, 300.00, 26, 108), -- Focos LED
-- Venta 27 (Total: 180.00)
(1, 180.00, 180.00, 27, 42), -- Auto CR
-- Venta 28 (Total: 65.00)
(1, 65.00, 65.00, 28, 51), -- Set Arte
-- Venta 29 (Total: 130.00)
(1, 130.00, 130.00, 29, 36), -- Olla Arrocera
-- Venta 30 (Total: 250.00)
(2, 120.00, 240.00, 30, 58), -- Pelota Basket
(1, 10.00, 10.00, 30, 110), -- Ambientador
-- Venta 31 (Total: 7000.00)
(2, 3500.00, 7000.00, 31, 1), -- Laptop Pro
-- Venta 32 (Total: 160.00)
(1, 160.00, 160.00, 32, 37), -- Licuadora
-- Venta 33 (Total: 70.00)
(1, 70.00, 70.00, 33, 60), -- Mat Yoga
-- Venta 34 (Total: 80.00)
(2, 40.00, 80.00, 34, 104), -- Filtro Aire
-- Venta 35 (Total: 110.00)
(1, 110.00, 110.00, 35, 61), -- Mancuernas
-- Venta 36 (Total: 680.00)
(1, 680.00, 680.00, 36, 86), -- Armario
-- Venta 37 (Total: 70.00)
(2, 35.00, 70.00, 37, 103), -- Liq. Frenos
-- Venta 38 (Total: 160.00)
(2, 80.00, 160.00, 38, 89), -- Zapatera
-- Venta 39 (Total: 750.00)
(1, 750.00, 750.00, 39, 11), -- Tablet
-- Venta 40 (Total: 30.00)
(2, 15.00, 30.00, 40, 31), -- Yogurt
-- Venta 41 (Total: 90.00)
(2, 45.00, 90.00, 41, 75), -- Principito
-- Venta 42 (Total: 95.00)
(1, 95.00, 95.00, 42, 40), -- Tacho Basura
-- Venta 43 (Total: 450.00)
(1, 450.00, 450.00, 43, 4), -- Smartwatch
-- Venta 44 (Total: 220.00)
(1, 220.00, 220.00, 44, 38), -- Vajilla
-- Venta 45 (Total: 270.00)
(3, 90.00, 270.00, 45, 59), -- Guantes Box
-- Venta 46 (Total: 160.00)
(1, 160.00, 160.00, 46, 50), -- Pista Carreras
-- Venta 47 (Total: 140.00)
(2, 70.00, 140.00, 47, 49), -- Bloques
-- Venta 48 (Total: 900.00)
(2, 450.00, 900.00, 48, 80), -- Silla Oficina
-- Venta 49 (Total: 180.00)
(1, 180.00, 180.00, 49, 13), -- Jean
(1, 180.00, 180.00, 49, 8), -- Cargador 65W
-- Venta 50 (Total: 180.00)
(1, 180.00, 180.00, 50, 13), -- Jean
(1, 180.00, 180.00, 50, 8), -- Cargador 65W
-- Venta 51 (Total: 160.00)
(1, 160.00, 160.00, 51, 66), -- Casco Ciclismo
-- Venta 52 (Total: 90.00)
(1, 90.00, 90.00, 52, 73), -- Sapiens
-- Venta 53 (Total: 130.00)
(1, 130.00, 130.00, 53, 43), -- Muñeca
-- Venta 54 (Total: 130.00)
(1, 130.00, 130.00, 54, 13), -- Camisa Lino
-- Venta 55 (Total: 120.00)
(1, 120.00, 120.00, 55, 6), -- Mouse Ergo
-- Venta 56 (Total: 50.00)
(2, 25.00, 50.00, 56, 95), -- Fertilizante
-- Venta 57 (Total: 130.00)
(2, 65.00, 130.00, 57, 105), -- Plumillas
-- Venta 58 (Total: 70.00)
(2, 35.00, 70.00, 58, 94), -- Set Herr. Jardín
-- Venta 59 (Total: 100.00)
(2, 50.00, 100.00, 59, 79), -- Don Quijote
-- Venta 60 (Total: 70.00)
(1, 70.00, 70.00, 60, 107), -- Aspiradora Auto
-- Venta 61 (Total: 220.00)
(1, 220.00, 220.00, 61, 82), -- Estante
-- Venta 62 (Total: 70.00)
(2, 35.00, 70.00, 62, 18), -- Medias
-- Venta 63 (Total: 180.00)
(2, 90.00, 180.00, 63, 93), -- Manguera
-- Venta 64 (Total: 45.00)
(1, 45.00, 45.00, 64, 48), -- Dinosaurio
-- Venta 65 (Total: 1800.00)
(1, 1800.00, 1800.00, 65, 2), -- Smartphone Z5
-- Venta 66 (Total: 300.00)
(2, 150.00, 300.00, 66, 10), -- Altavoz Mini
-- Venta 67 (Total: 100.00)
(2, 50.00, 100.00, 67, 106), -- Kit Emergencia
-- Venta 68 (Total: 75.00)
(1, 75.00, 75.00, 68, 77), -- Hábitos Atómicos
-- Venta 69 (Total: 110.00)
(1, 110.00, 110.00, 69, 44), -- Set Ollas 5pz (precio oferta)
-- Venta 70 (Total: 350.00)
(1, 350.00, 350.00, 70, 17), -- Casaca Cuero
-- Venta 71 (Total: 120.00)
(1, 120.00, 120.00, 71, 21), -- Ropa de Baño
-- Venta 72 (Total: 60.00)
(1, 60.00, 60.00, 72, 46), -- Pelota Fútbol
-- Venta 73 (Total: 130.00)
(2, 65.00, 130.00, 73, 73), -- Poder del Ahora
-- Venta 74 (Total: 560.00)
(2, 280.00, 560.00, 74, 81), -- Escritorio
-- Venta 75 (Total: 30.00)
(2, 15.00, 30.00, 75, 31), -- Yogurt
-- Venta 76 (Total: 45.00)
(1, 45.00, 45.00, 76, 92), -- Tijera Podar
-- Venta 77 (Total: 750.00)
(1, 750.00, 750.00, 77, 83), -- Sofá Cama
-- Venta 78 (Total: 140.00)
(2, 70.00, 140.00, 78, 62), -- Cuerda Saltar
-- Venta 79 (Total: 45.00)
(1, 45.00, 45.00, 79, 24), -- Aceite Oliva
-- Venta 80 (Total: 60.00)
(2, 30.00, 60.00, 80, 109), -- Cargador Auto
-- Venta 81 (Total: 3500.00)
(1, 3500.00, 3500.00, 81, 1), -- Laptop Pro
-- Venta 82 (Total: 180.00)
(1, 180.00, 180.00, 82, 8), -- Cargador 65W
-- Venta 83 (Total: 180.00)
(1, 180.00, 180.00, 83, 13), -- Jean
(1, 180.00, 180.00, 83, 8), -- Cargador 65W
-- Venta 84 (Total: 200.00)
(2, 100.00, 200.00, 84, 56), -- Figuras Acción
-- Venta 85 (Total: 55.00)
(1, 55.00, 55.00, 85, 47), -- Rompecabezas
-- Venta 86 (Total: 130.00)
(1, 130.00, 130.00, 86, 68), -- Mochila
-- Venta 87 (Total: 320.00)
(1, 320.00, 320.00, 87, 5), -- Teclado
-- Venta 88 (Total: 220.00)
(1, 220.00, 220.00, 88, 50), -- Cocina Juguete
-- Venta 89 (Total: 180.00)
(1, 180.00, 180.00, 89, 80), -- Cálculo Stewart
-- Venta 90 (Total: 140.00)
(1, 140.00, 140.00, 90, 110), -- Gata Hidráulica
-- Venta 91 (Total: 950.00)
(1, 950.00, 950.00, 91, 84), -- Set Comedor
-- Venta 92 (Total: 75.00)
(1, 75.00, 75.00, 92, 40), -- Lámpara LED
-- Venta 93 (Total: 180.00)
(2, 90.00, 180.00, 93, 20), -- Corbata
-- Venta 94 (Total: 140.00)
(4, 35.00, 140.00, 94, 94), -- Set Herr. Jardín
-- Venta 95 (Total: 1100.00)
(1, 1100.00, 1100.00, 95, 85), -- Cama Queen
-- Venta 96 (Total: 55.00)
(1, 55.00, 55.00, 96, 63), -- Gorra
-- Venta 97 (Total: 36.00)
(2, 18.00, 36.00, 97, 100), -- Tierra Preparada
-- Venta 98 (Total: 24.00)
(2, 12.00, 24.00, 98, 101), -- Malla Rachell
-- Venta 99 (Total: 50.00)
(1, 50.00, 50.00, 99, 106), -- Cera Rápida
-- Venta 100 (Total: 120.00)
(1, 120.00, 120.00, 100, 21), -- Ropa de Baño
(1, 120.00, 120.00, 100, 21), -- Ropa de Baño
-- Venta 101 (Total: 3950.00)
(1, 3500.00, 3500.00, 101, 1), -- Laptop Pro X15
(1, 450.00, 450.00, 101, 80), -- Silla de Oficina
-- Venta 102 (Total: 650.00)
(10, 65.00, 650.00, 102, 19), -- Polo Básico
-- Venta 103 (Total: 480.00)
(3, 120.00, 360.00, 103, 102), -- Aceite Motor
(3, 40.00, 120.00, 103, 104), -- Filtro Aire
-- Venta 104 (Total: 950.00)
(1, 950.00, 950.00, 104, 84), -- Set Comedor
-- Venta 105 (Total: 680.00)
(2, 250.00, 500.00, 105, 3), -- Auriculares BT
(1, 180.00, 180.00, 105, 8), -- Cargador 65W
-- Venta 106 (Total: 250.00)
(1, 100.00, 100.00, 106, 106), -- Kit Emergencia
(1, 150.00, 150.00, 106, 10), -- Altavoz Mini
-- Venta 107 (Total: 210.00)
(3, 70.00, 210.00, 107, 60), -- Mat Yoga
-- Venta 108 (Total: 230.00)
(1, 230.00, 230.00, 108, 74), -- Fund. Marketing
-- Venta 109 (Total: 1960.00)
(1, 1800.00, 1800.00, 109, 2), -- Smartphone Z5
(1, 160.00, 160.00, 109, 38), -- Licuadora
-- Venta 110 (Total: 70.00)
(2, 35.00, 70.00, 110, 103), -- Liq. Frenos
-- Venta 111 (Total: 200.00)
(2, 100.00, 200.00, 111, 41), -- Plancha
-- Venta 112 (Total: 80.00)
(10, 4.50, 45.00, 112, 26), -- Fideos
(1, 35.00, 35.00, 112, 18), -- Medias
-- Venta 113 (Total: 180.00)
(1, 180.00, 180.00, 113, 14), -- Jean
-- Venta 114 (Total: 440.00)
(2, 220.00, 440.00, 114, 22), -- Power Bank
-- Venta 115 (Total: 50.00)
(2, 25.00, 50.00, 115, 95), -- Fertilizante
-- Venta 116 (Total: 130.00)
(1, 130.00, 130.00, 116, 13), -- Camisa Lino
-- Venta 117 (Total: 120.00)
(1, 120.00, 120.00, 117, 6), -- Mouse Ergo
-- Venta 118 (Total: 190.00)
(1, 190.00, 190.00, 118, 36), -- Sábanas
-- Venta 119 (Total: 180.00)
(2, 90.00, 180.00, 119, 59), -- Guantes Box
-- Venta 120 (Total: 220.00)
(1, 220.00, 220.00, 120, 82), -- Estante
-- Venta 121 (Total: 200.00)
(2, 100.00, 200.00, 121, 56), -- Figuras Acción
-- Venta 122 (Total: 150.00)
(2, 75.00, 150.00, 122, 77), -- Hábitos Atómicos
-- Venta 123 (Total: 40.00)
(1, 40.00, 40.00, 123, 104), -- Filtro Aire
-- Venta 124 (Total: 210.00)
(3, 70.00, 210.00, 124, 49), -- Bloques
-- Venta 125 (Total: 240.00)
(2, 120.00, 240.00, 125, 21), -- Ropa Baño
-- Venta 126 (Total: 750.00)
(1, 750.00, 750.00, 126, 83), -- Sofá Cama
-- Venta 127 (Total: 850.00)
(1, 850.00, 850.00, 127, 57), -- Bicicleta
-- Venta 128 (Total: 130.00)
(1, 130.00, 130.00, 128, 43), -- Muñeca
-- Venta 129 (Total: 350.00)
(1, 350.00, 350.00, 129, 17), -- Casaca Cuero
-- Venta 130 (Total: 140.00)
(2, 70.00, 140.00, 130, 78), -- Harry Potter
-- Venta 131 (Total: 110.00)
(2, 55.00, 110.00, 131, 47), -- Rompecabezas
-- Venta 132 (Total: 70.00)
(2, 35.00, 70.00, 132, 94), -- Set Herr. Jardín
-- Venta 133 (Total: 65.00)
(1, 65.00, 65.00, 133, 105), -- Plumillas
-- Venta 134 (Total: 30.00)
(2, 15.00, 30.00, 134, 31), -- Yogurt
-- Venta 135 (Total: 75.00)
(1, 75.00, 75.00, 135, 40), -- Lámpara LED
-- Venta 136 (Total: 440.00)
(2, 220.00, 440.00, 136, 50), -- Cocina Juguete
-- Venta 137 (Total: 560.00)
(2, 280.00, 560.00, 137, 81), -- Escritorio
-- Venta 138 (Total: 90.00)
(1, 90.00, 90.00, 138, 93), -- Manguera
-- Venta 139 (Total: 60.00)
(1, 60.00, 60.00, 139, 46), -- Pelota Fútbol
-- Venta 140 (Total: 120.00)
(1, 120.00, 120.00, 140, 58), -- Pelota Basket
-- Venta 141 (Total: 270.00)
(3, 90.00, 270.00, 141, 20), -- Corbata
-- Venta 142 (Total: 260.00)
(2, 130.00, 260.00, 142, 37), -- Olla Arrocera
-- Venta 143 (Total: 360.00)
(2, 180.00, 360.00, 143, 8), -- Cargador 65W
-- Venta 144 (Total: 180.00)
(1, 180.00, 180.00, 144, 42), -- Auto CR
-- Venta 145 (Total: 7000.00)
(2, 3500.00, 7000.00, 145, 1), -- Laptop Pro
-- Venta 146 (Total: 130.00)
(2, 65.00, 130.00, 146, 73), -- Poder del Ahora
-- Venta 147 (Total: 35.00)
(1, 35.00, 35.00, 147, 71), -- El Gato Negro
-- Venta 148 (Total: 90.00)
(2, 45.00, 90.00, 148, 75), -- Principito
-- Venta 149 (Total: 140.00)
(1, 140.00, 140.00, 149, 110), -- Gata Hidráulica
-- Venta 150 (Total: 32.00)
(1, 32.00, 32.00, 150, 25), -- Atún
-- Venta 151 (Total: 180.00)
(2, 90.00, 180.00, 151, 73), -- Sapiens
-- Venta 152 (Total: 750.00)
(1, 750.00, 750.00, 152, 11), -- Tablet
-- Venta 153 (Total: 900.00)
(2, 450.00, 900.00, 153, 4), -- Smartwatch
-- Venta 154 (Total: 280.00)
(2, 140.00, 280.00, 154, 22), -- Pijama
-- Venta 155 (Total: 110.00)
(1, 110.00, 110.00, 155, 15), -- Vestido
-- Venta 156 (Total: 40.00)
(1, 40.00, 40.00, 156, 62), -- Cuerda Saltar
-- Venta 157 (Total: 160.00)
(1, 160.00, 160.00, 157, 66), -- Casco Ciclismo
-- Venta 158 (Total: 36.00)
(2, 18.00, 36.00, 158, 100), -- Tierra Preparada
-- Venta 159 (Total: 50.00)
(2, 25.00, 50.00, 159, 95), -- Fertilizante
-- Venta 160 (Total: 240.00)
(2, 120.00, 240.00, 160, 102), -- Aceite Motor
-- Venta 161 (Total: 150.00)
(2, 75.00, 150.00, 161, 77), -- Hábitos Atómicos
-- Venta 162 (Total: 120.00)
(2, 60.00, 120.00, 162, 70), -- Bandas Elásticas
-- Venta 163 (Total: 300.00)
(2, 150.00, 300.00, 163, 108), -- Focos LED
-- Venta 164 (Total: 45.00)
(1, 45.00, 45.00, 164, 48), -- Dinosaurio
-- Venta 165 (Total: 60.00)
(2, 30.00, 60.00, 165, 109), -- Cargador Auto
-- Venta 166 (Total: 130.00)
(1, 130.00, 130.00, 166, 68), -- Mochila
-- Venta 167 (Total: 50.00)
(1, 50.00, 50.00, 167, 105), -- Cera Rápida
-- Venta 168 (Total: 320.00)
(1, 320.00, 320.00, 168, 5), -- Teclado
-- Venta 169 (Total: 1100.00)
(1, 1100.00, 1100.00, 169, 7), -- Monitor Curvo
-- Venta 170 (Total: 70.00)
(2, 35.00, 70.00, 170, 18), -- Medias
-- Venta 171 (Total: 30.00)
(2, 15.00, 30.00, 171, 31), -- Yogurt
-- Venta 172 (Total: 130.00)
(1, 130.00, 130.00, 172, 88), -- Velador
-- Venta 173 (Total: 80.00)
(1, 80.00, 80.00, 173, 89), -- Zapatera
-- Venta 174 (Total: 150.00)
(1, 150.00, 150.00, 174, 76), -- Cocina Peruana
-- Venta 175 (Total: 680.00)
(1, 680.00, 680.00, 175, 86), -- Armario
-- Venta 176 (Total: 160.00)
(1, 160.00, 160.00, 176, 38), -- Licuadora
-- Venta 177 (Total: 180.00)
(1, 180.00, 180.00, 177, 14), -- Jean
-- Venta 178 (Total: 32.00)
(1, 32.00, 32.00, 178, 25), -- Atún
-- Venta 179 (Total: 95.00)
(1, 95.00, 95.00, 179, 40), -- Tacho Basura
-- Venta 180 (Total: 250.00)
(1, 250.00, 250.00, 180, 3), -- Auriculares BT
-- Venta 181 (Total: 3950.00)
(1, 3500.00, 3500.00, 181, 1), -- Laptop Pro
(1, 450.00, 450.00, 181, 80), -- Silla Oficina
-- Venta 182 (Total: 70.00)
(1, 70.00, 70.00, 182, 107), -- Aspiradora
-- Venta 183 (Total: 45.00)
(1, 45.00, 45.00, 183, 92), -- Tijera Podar
-- Venta 184 (Total: 1100.00)
(1, 1100.00, 1100.00, 184, 85), -- Cama Queen
-- Venta 185 (Total: 110.00)
(1, 110.00, 110.00, 185, 39), -- Set Cuchillos
-- Venta 186 (Total: 220.00)
(1, 220.00, 220.00, 186, 38), -- Vajilla
-- Venta 187 (Total: 160.00)
(1, 160.00, 160.00, 187, 50), -- Pista Carreras
-- Venta 188 (Total: 160.00)
(2, 80.00, 160.00, 188, 72), -- Cien Años
-- Venta 189 (Total: 44.00)
(2, 22.00, 44.00, 189, 23), -- Arroz
-- Venta 190 (Total: 650.00)
(1, 650.00, 650.00, 190, 87), -- Silla Gamer
-- Venta 191 (Total: 560.00)
(2, 280.00, 560.00, 191, 16), -- Zapatillas
-- Venta 192 (Total: 85.00)
(1, 85.00, 85.00, 192, 52), -- Juego Té
-- Venta 193 (Total: 40.00)
(2, 20.00, 40.00, 193, 99), -- Guantes Jardín
-- Venta 194 (Total: 55.00)
(1, 55.00, 55.00, 194, 63), -- Gorra
-- Venta 195 (Total: 24.00)
(2, 12.00, 24.00, 195, 101), -- Malla Rachell
-- Venta 196 (Total: 30.00)
(3, 10.00, 30.00, 196, 110), -- Ambientador
-- Venta 197 (Total: 310.00)
(1, 310.00, 310.00, 197, 83), -- Mesa Centro
-- Venta 198 (Total: 180.00)
(1, 180.00, 180.00, 198, 80), -- Cálculo Stewart
-- Venta 199 (Total: 120.00)
(1, 120.00, 120.00, 199, 6), -- Mouse Ergo
-- Venta 200 (Total: 130.00)
(2, 65.00, 130.00, 200, 19); -- Polo Básico

-- 11. METODO_PAGO
INSERT INTO METODO_PAGO (nombre_metodo, descripcion) VALUES
  ('Efectivo', 'Pago en efectivo'),
  ('Tarjeta de Crédito', 'Pago con tarjeta de crédito'),
  ('Tarjeta de Débito', 'Pago con tarjeta de débito'),
  ('Transferencia Bancaria', 'Pago mediante transferencia bancaria'),
  ('Cheque', 'Pago con cheque'),
  ('Pago Móvil', 'Pago a través de aplicaciones móviles');
  
 -- 12. PAGOS
INSERT INTO PAGOS (fecha_pago, monto, id_venta, id_metodo_pago) VALUES
('2025-01-10 10:15:00', 460.00, 1, 1),
('2025-01-12 11:30:00', 84.00, 2, 2),
('2025-01-15 14:00:00', 850.00, 3, 3),
('2025-01-18 09:45:00', 260.00, 4, 4),
('2025-01-20 16:20:00', 200.00, 5, 5),
('2025-01-22 18:00:00', 198.00, 6, 6),
('2025-01-25 11:10:00', 1800.00, 7, 2),
('2025-01-28 12:30:00', 100.00, 8, 1),
('2025-02-01 15:00:00', 290.00, 9, 3),
('2025-02-03 10:00:00', 310.00, 10, 1),
('2025-02-05 11:45:00', 70.00, 11, 6),
('2025-02-08 17:15:00', 250.00, 12, 2),
('2025-02-10 12:00:00', 560.00, 13, 3),
('2025-02-12 13:30:00', 1100.00, 14, 4),
('2025-02-15 16:50:00', 25.00, 15, 1),
('2025-02-18 10:30:00', 230.00, 16, 2),
('2025-02-20 14:20:00', 44.00, 17, 1),
('2025-02-22 11:00:00', 150.00, 18, 3),
('2025-02-25 09:30:00', 650.00, 19, 2),
('2025-02-28 15:10:00', 110.00, 20, 6),
('2025-03-01 10:00:00', 140.00, 21, 1),
('2025-03-03 12:45:00', 270.00, 22, 1),
('2025-03-05 16:00:00', 440.00, 23, 2),
('2025-03-08 11:20:00', 160.00, 24, 3),
('2025-03-10 13:00:00', 240.00, 25, 4),
('2025-03-12 17:30:00', 300.00, 26, 1),
('2025-03-15 10:15:00', 180.00, 27, 6),
('2025-03-18 14:00:00', 65.00, 28, 1),
('2025-03-20 11:50:00', 130.00, 29, 2),
('2025-03-22 16:10:00', 250.00, 30, 3),
('2025-03-25 18:00:00', 7000.00, 31, 4),
('2025-03-28 10:40:00', 160.00, 32, 1),
('2025-04-01 12:00:00', 70.00, 33, 2),
('2025-04-03 15:30:00', 80.00, 34, 1),
('2025-04-05 09:50:00', 110.00, 35, 3),
('2025-04-08 11:15:00', 680.00, 36, 6),
('2025-04-10 14:45:00', 70.00, 37, 1),
('2025-04-12 16:00:00', 160.00, 38, 2),
('2025-04-15 10:00:00', 750.00, 39, 2),
('2025-04-18 12:20:00', 30.00, 40, 1),
('2025-04-20 17:00:00', 90.00, 41, 3),
('2025-04-22 13:10:00', 95.00, 42, 1),
('2025-04-25 11:30:00', 450.00, 43, 2),
('2025-04-28 10:10:00', 220.00, 44, 4),
('2025-05-01 14:50:00', 270.00, 45, 1),
('2025-05-03 16:30:00', 160.00, 46, 6),
('2025-05-05 18:10:00', 140.00, 47, 1),
('2025-05-08 11:00:00', 900.00, 48, 2),
('2025-05-10 12:40:00', 360.00, 49, 3),
('2025-05-12 15:00:00', 360.00, 50, 2),
('2025-05-15 10:20:00', 160.00, 51, 1),
('2025-05-18 13:00:00', 90.00, 52, 1),
('2025-05-20 14:30:00', 130.00, 53, 6),
('2025-05-22 11:10:00', 130.00, 54, 2),
('2025-05-25 16:40:00', 120.00, 55, 3),
('2025-05-28 09:30:00', 50.00, 56, 1),
('2025-06-01 10:50:00', 130.00, 57, 4),
('2025-06-03 15:00:00', 70.00, 58, 1),
('2025-06-05 12:10:00', 100.00, 59, 1),
('2025-06-08 14:00:00', 70.00, 60, 2),
('2025-06-10 11:30:00', 220.00, 61, 3),
('2025-06-12 16:20:00', 70.00, 62, 1),
('2025-06-15 10:00:00', 180.00, 63, 6),
('2025-06-18 13:40:00', 45.00, 64, 1),
('2025-06-20 17:00:00', 1800.00, 65, 2),
('2025-06-22 11:50:00', 300.00, 66, 3),
('2025-06-25 14:10:00', 100.00, 67, 1),
('2025-06-28 10:30:00', 75.00, 68, 4),
('2025-07-01 12:00:00', 110.00, 69, 1),
('2025-07-03 16:00:00', 350.00, 70, 2),
('2025-07-05 10:10:00', 120.00, 71, 3),
('2025-07-08 11:20:00', 60.00, 72, 1),
('2025-07-10 14:30:00', 130.00, 73, 6),
('2025-07-12 17:00:00', 560.00, 74, 2),
('2025-07-15 10:00:00', 30.00, 75, 1),
('2025-07-18 12:50:00', 45.00, 76, 1),
('2025-07-20 15:40:00', 750.00, 77, 3),
('2025-07-22 18:00:00', 140.00, 78, 2),
('2025-07-25 11:30:00', 45.00, 79, 1),
('2025-07-28 13:10:00', 60.00, 80, 4),
('2025-08-01 10:00:00', 3500.00, 81, 2),
('2025-08-04 14:20:00', 180.00, 82, 1),
('2025-08-07 16:00:00', 360.00, 83, 6),
('2025-08-10 11:10:00', 200.00, 84, 1),
('2025-08-13 12:30:00', 55.00, 85, 2),
('2025-08-16 15:00:00', 130.00, 86, 3),
('2025-08-19 10:45:00', 320.00, 87, 1),
('2025-08-22 13:00:00', 220.00, 88, 2),
('2025-09-01 10:20:00', 950.00, 91, 4),
('2025-09-04 14:00:00', 75.00, 92, 1),
('2025-09-07 15:30:00', 180.00, 93, 6),
('2025-09-10 10:00:00', 140.00, 94, 1),
('2025-09-13 12:40:00', 1100.00, 95, 2),
('2025-09-16 16:50:00', 55.00, 96, 3),
('2025-09-19 11:30:00', 36.00, 97, 1),
('2025-09-25 10:10:00', 50.00, 99, 1),
('2025-10-31 09:16:00', 3950.00, 101, 2),
('2025-10-31 10:31:00', 650.00, 102, 1),
('2025-10-31 11:46:00', 480.00, 103, 3),
('2025-10-31 14:01:00', 950.00, 104, 4),
('2025-11-01 09:01:00', 680.00, 105, 2),
('2025-11-01 10:11:00', 250.00, 106, 1),
('2025-11-01 11:21:00', 210.00, 107, 6),
('2025-11-02 09:31:00', 230.00, 108, 3),
('2025-11-02 10:41:00', 1960.00, 109, 2),
('2025-11-02 11:51:00', 70.00, 110, 1),
('2025-11-03 09:06:00', 200.00, 111, 1),
('2025-11-03 10:16:00', 80.00, 112, 1),
('2025-11-03 11:26:00', 180.00, 113, 3),
('2025-11-04 09:11:00', 440.00, 114, 2),
('2025-11-04 10:21:00', 50.00, 115, 1),
('2025-11-04 11:31:00', 130.00, 116, 6),
('2025-11-05 09:21:00', 120.00, 117, 3),
('2025-11-05 10:31:00', 190.00, 118, 1),
('2025-11-05 11:41:00', 180.00, 119, 2),
('2025-11-06 09:01:00', 220.00, 120, 4),
('2025-11-06 10:11:00', 200.00, 121, 1),
('2025-11-06 11:21:00', 150.00, 122, 1),
('2025-11-06 14:01:00', 40.00, 123, 3),
('2025-11-07 09:31:00', 210.00, 124, 2),
('2025-11-07 10:41:00', 240.00, 125, 1),
('2025-11-07 11:51:00', 750.00, 126, 4),
('2025-11-08 09:16:00', 850.00, 127, 2),
('2025-11-08 10:26:00', 130.00, 128, 6),
('2025-11-08 11:36:00', 350.00, 129, 3),
('2025-11-09 09:01:00', 140.00, 130, 1),
('2025-11-09 10:11:00', 110.00, 131, 1),
('2025-11-09 11:21:00', 70.00, 132, 2),
('2025-11-10 09:21:00', 65.00, 133, 1),
('2025-11-10 10:31:00', 30.00, 134, 1),
('2025-11-10 11:41:00', 75.00, 135, 3),
('2025-11-11 09:06:00', 440.00, 136, 2),
('2025-11-11 10:16:00', 560.00, 137, 4),
('2025-11-11 11:26:00', 90.00, 138, 1),
('2025-11-12 09:11:00', 60.00, 139, 6),
('2025-11-12 10:21:00', 120.00, 140, 1),
('2025-11-12 11:31:00', 270.00, 141, 2),
('2025-11-13 09:21:00', 260.00, 142, 3),
('2025-11-13 10:31:00', 360.00, 143, 2),
('2025-11-13 11:41:00', 180.00, 144, 1),
('2025-11-14 09:01:00', 7000.00, 145, 4),
('2025-11-14 10:11:00', 130.00, 146, 1),
('2025-11-14 11:21:00', 35.00, 147, 6),
('2025-11-15 09:31:00', 90.00, 148, 1),
('2025-11-15 10:41:00', 140.00, 149, 2),
('2025-11-15 11:51:00', 32.00, 150, 3),
('2025-11-16 09:16:00', 180.00, 151, 1),
('2025-11-16 10:26:00', 750.00, 152, 2),
('2025-11-16 11:36:00', 900.00, 153, 2),
('2025-11-17 09:01:00', 280.00, 154, 3),
('2025-11-17 10:11:00', 110.00, 155, 1),
('2025-11-17 11:21:00', 40.00, 156, 1),
('2025-11-18 09:21:00', 160.00, 157, 6),
('2025-11-18 10:31:00', 36.00, 158, 1),
('2025-11-18 11:41:00', 50.00, 159, 2),
('2025-11-19 09:06:00', 240.00, 160, 4),
('2025-11-19 10:16:00', 150.00, 161, 1),
('2025-11-19 11:26:00', 120.00, 162, 3),
('2025-11-20 09:11:00', 300.00, 163, 2),
('2025-11-20 10:21:00', 45.00, 164, 1),
('2025-11-20 11:31:00', 60.00, 165, 1),
('2025-11-21 09:21:00', 130.00, 166, 6),
('2025-11-21 10:31:00', 50.00, 167, 1),
('2025-11-21 11:41:00', 320.00, 168, 2),
('2025-11-22 09:01:00', 1100.00, 169, 2),
('2025-11-22 10:11:00', 70.00, 170, 1),
('2025-11-22 11:21:00', 30.00, 171, 3),
('2025-11-23 09:31:00', 130.00, 172, 1),
('2025-11-23 10:41:00', 80.00, 173, 4),
('2025-11-23 11:51:00', 150.00, 174, 1),
('2025-11-24 09:16:00', 680.00, 175, 2),
('2025-11-24 10:26:00', 160.00, 176, 1),
('2025-11-24 11:36:00', 180.00, 177, 3),
('2025-11-25 09:01:00', 32.00, 178, 6),
('2025-11-25 10:11:00', 95.00, 179, 1),
('2025-11-25 11:21:00', 250.00, 180, 2),
('2025-11-26 09:21:00', 3950.00, 181, 2),
('2025-11-26 10:31:00', 70.00, 182, 1),
('2025-11-26 11:41:00', 45.00, 183, 3),
('2025-11-27 09:06:00', 1100.00, 184, 4),
('2025-11-27 10:16:00', 110.00, 185, 1),
('2025-11-27 11:26:00', 220.00, 186, 2),
('2025-11-28 09:11:00', 160.00, 187, 1),
('2025-11-28 10:21:00', 160.00, 188, 6),
('2025-11-28 11:31:00', 44.00, 189, 1),
('2025-11-29 09:21:00', 650.00, 190, 2),
('2025-11-29 10:31:00', 560.00, 191, 3),
('2025-11-29 11:41:00', 85.00, 192, 1),
('2025-11-30 09:01:00', 40.00, 193, 1),
('2025-11-30 10:11:00', 55.00, 194, 2),
('2025-11-30 11:21:00', 24.00, 195, 1),
('2025-12-01 09:31:00', 30.00, 196, 1),
('2025-12-01 10:41:00', 310.00, 197, 3),
('2025-12-01 11:51:00', 180.00, 198, 4),
('2025-12-02 09:16:00', 120.00, 199, 2),
('2025-12-02 10:26:00', 130.00, 200, 1);
