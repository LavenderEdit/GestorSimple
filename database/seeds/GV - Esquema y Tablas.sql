CREATE SCHEMA IF NOT EXISTS G3_GESTOR_VENTAS;
USE G3_GESTOR_VENTAS;

-- Tabla de tipos de usuario
CREATE TABLE TIPOUSUARIO (
    id_tipo_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(100),
    descripcion TEXT
);

-- Tabla de avatares de usuario
CREATE TABLE AVATARUSUARIO (
	id_avatar_usuario INT AUTO_INCREMENT PRIMARY KEY,
    avatar_usuario LONGBLOB,
    nombre_avatar VARCHAR(100),
    tipo_avatar VARCHAR(10),
    peso_avatar VARCHAR(50),
    dimension_x_avatar VARCHAR(10),
    dimension_y_avatar VARCHAR(10)
);

-- Tabla de usuarios
CREATE TABLE USUARIOS (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(60),
    correo VARCHAR(80) UNIQUE,
    contrasenia VARCHAR(255),
    tipo_id_usuario INT,
    avatar_id_usuario INT,
    FOREIGN KEY (tipo_id_usuario) REFERENCES TIPOUSUARIO(id_tipo_usuario) ON DELETE CASCADE,
    FOREIGN KEY (avatar_id_usuario) REFERENCES AVATARUSUARIO(id_avatar_usuario) ON DELETE CASCADE
);

-- Tabla de tipos de clientes
CREATE TABLE TIPOCLIENTE (
	id_tipo_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre_tipo VARCHAR(80),
    descripcion TEXT
);

-- Tabla de clientes
CREATE TABLE CLIENTES (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    num_identificacion VARCHAR(20),
    nombre VARCHAR(100),
    direccion VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(80),
    id_tipo_cliente INT,
	FOREIGN KEY (id_tipo_cliente) REFERENCES TIPOCLIENTE(id_tipo_cliente) ON DELETE CASCADE
);

-- Tabla de categorías
CREATE TABLE CATEGORIAS (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(70),
    descripcion TEXT
);

-- Tabla de proveedores
CREATE TABLE PROVEEDORES (
    id_proveedor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80),
    email VARCHAR(80),
    telefono VARCHAR(15),
    direccion VARCHAR(100)
);

-- Tabla de productos
CREATE TABLE PRODUCTOS (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    descripcion TEXT,
    precio DECIMAL(10,2),
    stock INT DEFAULT 0,
    ganancia DECIMAL(10,2),
    id_categoria INT,
    id_proveedor INT,
    FOREIGN KEY (id_categoria) REFERENCES CATEGORIAS(id_categoria) ON DELETE CASCADE,
    FOREIGN KEY (id_proveedor) REFERENCES PROVEEDORES(id_proveedor) ON DELETE CASCADE
);


-- Tabla de ventas
CREATE TABLE VENTAS (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATETIME,
    total DECIMAL(10,2),
    id_cliente INT,
    id_usuario INT,
    FOREIGN KEY (id_cliente) REFERENCES CLIENTES(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES USUARIOS(id_usuario) ON DELETE CASCADE
);

-- Tabla de detalle de ventas
CREATE TABLE DETALLE_VENTAS (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    cantidad INT,
    precio_unitario DECIMAL(10,2),
    subtotal DECIMAL(10,2),
    id_venta INT,
    id_producto INT,
    FOREIGN KEY (id_venta) REFERENCES VENTAS(id_venta) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id_producto) ON DELETE CASCADE
);

-- Tabla de métodos de pago
CREATE TABLE METODO_PAGO (
    id_metodo_pago INT AUTO_INCREMENT PRIMARY KEY,
    nombre_metodo VARCHAR(50),
    descripcion TEXT
);

-- Tabla de pagos
CREATE TABLE PAGOS (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    fecha_pago DATETIME,
    monto DECIMAL(10,2),
    id_venta INT,
    id_metodo_pago INT,
    FOREIGN KEY (id_venta) REFERENCES VENTAS(id_venta) ON DELETE CASCADE,
    FOREIGN KEY (id_metodo_pago) REFERENCES METODO_PAGO(id_metodo_pago) ON DELETE CASCADE
);
