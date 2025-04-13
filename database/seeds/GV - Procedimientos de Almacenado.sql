CREATE SCHEMA IF NOT EXISTS G3_GESTOR_VENTAS;
USE G3_GESTOR_VENTAS;

-- TIPOUSUARIO
-- Procedimiento de almacenamiento que crea a un tipo usuario sin conexiones extra ni nada
-- Se puede usar aqui en el gestor para agregar un tipo nuevo de usuario
-- Crear un nuevo tipo de usuario
DELIMITER $$
CREATE PROCEDURE sp_crear_tipousuario(
    IN TIPO_NOMBRE VARCHAR(100),
    IN DESCRIPCION TEXT
)
BEGIN
    INSERT INTO TIPOUSUARIO (id_tipo_usuario, nombre_tipo, descripcion)
    VALUES (NULL, TIPO_NOMBRE, DESCRIPCION);

    SELECT LAST_INSERT_ID() AS id_tipo_usuario;
END $$
DELIMITER ;

-- Editar tipo de usuario por ID
DELIMITER $$
CREATE PROCEDURE sp_editar_tipousuario(
    IN p_id_tipo_usuario INT,
    IN p_nombre_tipo VARCHAR(100),
    IN p_descripcion TEXT
)
BEGIN
    UPDATE TIPOUSUARIO
    SET
        nombre_tipo = p_nombre_tipo,
        descripcion = p_descripcion
    WHERE id_tipo_usuario = p_id_tipo_usuario;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;

-- Eliminar tipo de usuario por ID
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_tipousuario(
    IN p_id_tipo_usuario INT
)
BEGIN
    DECLARE existe_tipo INT;

    SELECT COUNT(*) INTO existe_tipo
    FROM TIPOUSUARIO
    WHERE id_tipo_usuario = p_id_tipo_usuario;

    IF existe_tipo = 0 THEN
        SELECT 'ERROR: Tipo de usuario no existe.' AS mensaje;
    ELSE
        DELETE FROM TIPOUSUARIO WHERE id_tipo_usuario = p_id_tipo_usuario;
        SELECT 'Tipo de usuario eliminado correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;

-- Visualizar todos los tipos de usuario
DELIMITER $$
CREATE PROCEDURE sp_visualizar_tipousuario()
BEGIN
    SELECT * FROM TIPOUSUARIO;
END $$
DELIMITER ;

-- Visualizar tipo de usuario por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_tipousuario(
    IN p_id INT
)
BEGIN
    SELECT * FROM TIPOUSUARIO WHERE id_tipo_usuario = p_id;
END $$
DELIMITER ;


-- AVATARUSUARIO
-- Procedimiento de almacenamiento que crea un avatar de usuario
-- No se puede usar aqui en el gestor, se tiene que usar en una web aparte para subir imagenes a la db
-- La web está hecha y si se desea usarla puedes clonarla desde el siguiente link: [https://github.com/LavenderEdit/AppDbConnect.git]
DELIMITER $$
CREATE PROCEDURE sp_crear_avatarusuario
(
	IN DATA_AVATAR LONGBLOB,
    IN NOMBRE_AVATAR VARCHAR(100),
    IN TIPO_AVATAR VARCHAR(10),
    IN PESO_AVATAR VARCHAR(50),
    IN DIMENSION_X_AVATAR VARCHAR(10),
    IN DIMENSION_Y_AVATAR VARCHAR(10)
)
BEGIN
	INSERT INTO AVATARUSUARIO
    (
		id_avatar_usuario,
        avatar_usuario,
        nombre_avatar,
        tipo_avatar,
        peso_avatar,
        dimension_x_avatar,
        dimension_y_avatar
    )
    VALUES
    (
		null,
        DATA_AVATAR,
        NOMBRE_AVATAR,
        TIPO_AVATAR,
        PESO_AVATAR,
        DIMENSION_X_AVATAR,
        DIMENSION_Y_AVATAR
    );
END $$
DELIMITER ;

-- Visualizar todos los registros de AVATARUSUARIO
DELIMITER $$
CREATE PROCEDURE sp_visualizar_avatarusuario()
BEGIN
    SELECT * FROM AVATARUSUARIO;
END $$
DELIMITER ;

-- Visualizar un registro de AVATARUSUARIO por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_avatarusuario(
    IN p_id INT
)
BEGIN
    SELECT * FROM AVATARUSUARIO WHERE id_avatar_usuario = p_id;
END $$
DELIMITER ;

-- USUARIOS
-- Crea un nuevo usuario con datos basicos y elige la imagen de default subida a la default con id: 1
-- Se puede usar aqui en el gestor para agregar un usuario nuevo
DELIMITER $$
CREATE PROCEDURE sp_crear_usuario
(
	IN NOMBRE_USUARIO VARCHAR(60),
    IN CORREO VARCHAR(80),
    IN CONTRASENIA VARCHAR(255),
    IN ID_TIPOUSUARIO INT
)
BEGIN
	INSERT INTO USUARIOS
    (
		id_usuario,
        nombre,
        correo,
        contrasenia,
        tipo_id_usuario,
        avatar_id_usuario
    )
    VALUES
    (
		null,
        NOMBRE_USUARIO,
        CORREO,
        CONTRASENIA,
        ID_TIPOUSUARIO,
        1
    );
END $$
DELIMITER ;

-- Visualizar todos los registros de USUARIOS
DELIMITER $$
CREATE PROCEDURE sp_visualizar_usuario()
BEGIN
    SELECT * FROM USUARIOS;
END $$
DELIMITER ;

-- Visualizar un registro de USUARIOS por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_usuario(
    IN p_id INT
)
BEGIN
    SELECT * FROM USUARIOS WHERE id_usuario = p_id;
END $$
DELIMITER ;

-- Buscar a un usuario por correo para autenticarlos
DELIMITER $$
CREATE PROCEDURE sp_autenticar_usuario (
    IN p_correo VARCHAR(100)
)
BEGIN
    SELECT 
        id_usuario, 
        nombre, 
        correo, 
        contrasenia, 
        tipo_id_usuario, 
        avatar_id_usuario
    FROM Usuarios
    WHERE correo = p_correo
    LIMIT 1;
END $$
DELIMITER ;


-- TIPOCLIENTE
-- Crea un nuevo tipo de cliente
-- Se puede usar aqui en el gestor para agregar un tipo de cliente nuevo
DELIMITER $$
CREATE PROCEDURE sp_crear_tipocliente(
    IN TIPO_NOMBRE VARCHAR(80),
    IN DESCRIPCION TEXT
)
BEGIN
    INSERT INTO TIPOCLIENTE (id_tipo_cliente, nombre_tipo, descripcion)
    VALUES (NULL, TIPO_NOMBRE, DESCRIPCION);

    SELECT LAST_INSERT_ID() AS id_tipo_cliente;
END $$
DELIMITER ;

-- Editar tipo de cliente por ID
DELIMITER $$
CREATE PROCEDURE sp_editar_tipocliente(
    IN p_id_tipo_cliente INT,
    IN p_nombre_tipo VARCHAR(80),
    IN p_descripcion TEXT
)
BEGIN
    UPDATE TIPOCLIENTE
    SET
        nombre_tipo = p_nombre_tipo,
        descripcion = p_descripcion
    WHERE id_tipo_cliente = p_id_tipo_cliente;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;

-- Eliminar tipo de cliente por ID
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_tipocliente(
    IN p_id_tipo_cliente INT
)
BEGIN
    DECLARE existe_tipo INT;

    SELECT COUNT(*) INTO existe_tipo
    FROM TIPOCLIENTE
    WHERE id_tipo_cliente = p_id_tipo_cliente;

    IF existe_tipo = 0 THEN
        SELECT 'ERROR: Tipo de cliente no existe.' AS mensaje;
    ELSE
        DELETE FROM TIPOCLIENTE WHERE id_tipo_cliente = p_id_tipo_cliente;
        SELECT 'Tipo de cliente eliminado correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;

-- Visualizar todos los tipos de cliente
DELIMITER $$
CREATE PROCEDURE sp_visualizar_tipocliente()
BEGIN
    SELECT * FROM TIPOCLIENTE;
END $$
DELIMITER ;

-- Visualizar tipo de cliente por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_tipocliente(
    IN p_id INT
)
BEGIN
    SELECT * FROM TIPOCLIENTE WHERE id_tipo_cliente = p_id;
END $$
DELIMITER ;



-- CLIENTES
-- Crea un nuevo cliente
-- Se puede usar aqui en el gestor para agregar un cliente nuevo
DELIMITER $$
CREATE PROCEDURE sp_crear_clientes(
    IN NUM_ID VARCHAR(20),
    IN NOMBRE VARCHAR(100),
    IN DIRECCION VARCHAR(100),
    IN TELEFONO VARCHAR(15),
    IN EMAIL VARCHAR(80),
    IN ID_TIPOCLIENTE INT
)
BEGIN
    INSERT INTO CLIENTES
    (
        id_cliente,
        num_identificacion,
        nombre,
        direccion,
        telefono,
        email,
        id_tipo_cliente
    )
    VALUES
    (
        null,
        NUM_ID,
        NOMBRE,
        DIRECCION,
        TELEFONO,
        EMAIL,
        ID_TIPOCLIENTE
    );
    SELECT LAST_INSERT_ID() AS id_cliente;
END $$
DELIMITER ;


-- Editar un cliente por id
DELIMITER $$
CREATE PROCEDURE sp_editar_clientes(
    IN p_id_cliente INT,
    IN p_num_id VARCHAR(20),
    IN p_nombre VARCHAR(100),
    IN p_direccion VARCHAR(100),
    IN p_telefono VARCHAR(15),
    IN p_email VARCHAR(80),
    IN p_id_tipocliente INT
)
BEGIN
    UPDATE CLIENTES
    SET
        num_identificacion = p_num_id,
        nombre = p_nombre,
        direccion = p_direccion,
        telefono = p_telefono,
        email = p_email,
        id_tipo_cliente = p_id_tipocliente
    WHERE id_cliente = p_id_cliente;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;


-- Eliminar un cliente por id
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_clientes(
    IN p_id_cliente INT
)
BEGIN
    DECLARE existe_cliente INT;

    SELECT COUNT(*) INTO existe_cliente
    FROM CLIENTES
    WHERE id_cliente = p_id_cliente;

    IF existe_cliente = 0 THEN
        SELECT 'ERROR: Cliente no existe.' AS mensaje;
    ELSE
        DELETE FROM CLIENTES WHERE id_cliente = p_id_cliente;
        SELECT 'Cliente y toda su información relacionada han sido eliminados correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;



-- Visualizar todos los registros de CLIENTES
DELIMITER $$
CREATE PROCEDURE sp_visualizar_clientes()
BEGIN
    SELECT * FROM CLIENTES;
END $$
DELIMITER ;

-- Visualizar un registro de CLIENTES por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_clientes(
    IN p_id INT
)
BEGIN
    SELECT * FROM CLIENTES WHERE id_cliente = p_id;
END $$
DELIMITER ;


-- Visualizar un registro de CLIENTES por nombre
DELIMITER $$

CREATE PROCEDURE sp_visualizar_por_nombre_clientes(
    IN p_nombre VARCHAR(100)
)
BEGIN
    SELECT * FROM CLIENTES WHERE nombre LIKE CONCAT('%', p_nombre, '%');
END$$

DELIMITER ;


-- CATEGORIAS
-- Crea una nueva categoria
-- Se puede usar aqui en el gestor para agregar una nueva categoria
DELIMITER $$
CREATE PROCEDURE sp_crear_categoria
(
	CAT_NOMBRE VARCHAR(70),
    DESCRIPCION TEXT
)
BEGIN
	INSERT INTO CATEGORIAS
	(
		id_categoria,
        nombre,
        descripcion
    )
	VALUES
	(
		null,
        CAT_NOMBRE,
        DESCRIPCION
    );
    SELECT LAST_INSERT_ID() AS id_categoria;
END $$
DELIMITER ;


-- Editar una categoria por id
DELIMITER $$
CREATE PROCEDURE sp_editar_categoria(
    IN p_id_categoria INT,
    IN p_nombre VARCHAR(70),
    IN p_descripcion TEXT
)
BEGIN
    UPDATE CATEGORIAS
    SET
        nombre = p_nombre,
        descripcion = p_descripcion
    WHERE id_categoria = p_id_categoria;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;


-- Eliminar toda la información de una categoria
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_categoria(
    IN p_id_categoria INT
)
BEGIN
    DECLARE existe_categoria INT;

    SELECT COUNT(*) INTO existe_categoria
    FROM CATEGORIAS
    WHERE id_categoria = p_id_categoria;

    IF existe_categoria = 0 THEN
        SELECT 'ERROR: Categoria no existe.' AS mensaje;
    ELSE
        DELETE FROM CATEGORIAS WHERE id_categoria = p_id_categoria;
        SELECT 'Categoria y toda su información relacionada han sido eliminados correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;


-- Visualizar todos los registros de CATEGORIAS
DELIMITER $$
CREATE PROCEDURE sp_visualizar_categoria()
BEGIN
    SELECT * FROM CATEGORIAS;
END $$
DELIMITER ;

-- Visualizar un registro de CATEGORIAS por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_categoria(
    IN p_id INT
)
BEGIN
    SELECT * FROM CATEGORIAS WHERE id_categoria = p_id;
END $$
DELIMITER ;

-- PROVEEDORES
-- Crea un nuevo proveedor
-- Se puede usar aqui en el gestor para agregar un proveedor nuevo
DELIMITER $$
CREATE PROCEDURE sp_crear_proveedores
(
    NOMBRE VARCHAR(80),
    EMAIL VARCHAR(80),
	TELEFONO VARCHAR(15),
	DIRECCION VARCHAR(100)
)
BEGIN
	INSERT INTO PROVEEDORES
	(
		id_proveedor,
        nombre,
		email,
        telefono,
		direccion
    )
	VALUES
	(
		null,
        NOMBRE,
        EMAIL,
        TELEFONO,
        DIRECCION
    );
    SELECT LAST_INSERT_ID() AS id_proveedor;
END $$
DELIMITER ;


-- Editar un proveedor por id
DELIMITER $$
CREATE PROCEDURE sp_editar_proveedores(
    IN p_id_proveedor INT,
    IN p_nombre VARCHAR(100),
    IN p_direccion VARCHAR(100),
    IN p_telefono VARCHAR(15),
    IN p_email VARCHAR(80)
)
BEGIN
    UPDATE PROVEEDORES
    SET
        nombre = p_nombre,
        direccion = p_direccion,
        telefono = p_telefono,
        email = p_email
    WHERE id_proveedor = p_id_proveedor;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;


-- Eliminar un cliente por id
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_proveedores(
    IN p_id_proveedor INT
)
BEGIN
    DECLARE existe_proveedor INT;

    SELECT COUNT(*) INTO existe_proveedor
    FROM PROVEEDORES
    WHERE id_proveedor = p_id_proveedor;

    IF existe_proveedor = 0 THEN
        SELECT 'ERROR: Proveedor no existe.' AS mensaje;
    ELSE
        DELETE FROM PROVEEDORES WHERE id_proveedor = p_id_proveedor;
        SELECT 'Proveedor y toda su información relacionada han sido eliminados correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;


-- Visualizar todos los registros de PROVEEDORES
DELIMITER $$
CREATE PROCEDURE sp_visualizar_proveedores()
BEGIN
    SELECT * FROM PROVEEDORES;
END $$
DELIMITER ;

-- Visualizar un registro de PROVEEDORES por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_proveedores(
    IN p_id INT
)
BEGIN
    SELECT * FROM PROVEEDORES WHERE id_proveedor = p_id;
END $$
DELIMITER ;


-- Procedimientos para buscar un proveedor
DELIMITER $$
CREATE PROCEDURE sp_buscar_proveedores(
    IN p_id_proveedor INT,
    IN p_nombre VARCHAR(80)
)
BEGIN
    SELECT *
    FROM PROVEEDORES
    WHERE (p_id_proveedor IS NOT NULL AND id_proveedor = p_id_proveedor)
        OR (p_nombre IS NOT NULL AND nombre LIKE CONCAT('%', p_nombre, '%'));
END $$
DELIMITER ;


-- Procedimientos para obtener productos por un proveedor
DELIMITER $$
CREATE PROCEDURE sp_productos_por_proveedores(
    IN p_id_proveedor INT
)
BEGIN
    SELECT 
        P.id_producto,
        P.nombre AS producto,
        P.descripcion,
        P.precio,
        P.stock,
        P.ganancia,
        P.precio + (P.precio * P.ganancia) AS precio_final,
        C.id_categoria,
        C.nombre AS categoria,
        PR.id_proveedor,
        PR.nombre AS proveedor
    FROM PRODUCTOS AS P
    INNER JOIN CATEGORIAS AS C ON P.id_categoria = C.id_categoria
    INNER JOIN PROVEEDORES AS PR ON P.id_proveedor = PR.id_proveedor
    WHERE P.id_proveedor = p_id_proveedor;
END $$
DELIMITER ;


-- PRODUCTOS
-- Crea un nuevo producto junto con sus conexiones a categoria y proveedor
-- Se puede usar aqui en el gestor para agregar un producto nuevo con sus conexiones
-- Hasta ahora solo hay 10 proveedores y 10 categorias se recomienda usar las ids del 1 hasta maximo el 10 para agregar un nuevo producto
DELIMITER $$
CREATE PROCEDURE sp_crear_productos
(
    NOMBRE VARCHAR(50),
    DESCP TEXT,
	PRECIO DECIMAL(10,2),
	STOCK INT,
    ID_CAT INT,
    ID_PROV INT,
    GANANCIA DECIMAL(10,2)
)
BEGIN
	INSERT INTO PRODUCTOS
	(
		id_producto,
        nombre,
		descripcion,
        precio,
		stock,
        id_categoria,
        id_proveedor,
        ganancia
    )
	VALUES
	(
		null,
        NOMBRE,
        DESCP,
        PRECIO,
        STOCK,
        ID_CAT,
        ID_PROV,
        GANANCIA
    );
    SELECT LAST_INSERT_ID() AS id_producto;
END $$
DELIMITER ;


-- Editar un producto por id
DELIMITER $$
CREATE PROCEDURE sp_editar_productos(
    IN p_id_producto INT,
    IN p_nombre VARCHAR(100),
    IN p_descripcion TEXT,
    IN p_precio DECIMAL(10, 2),
    IN p_stock INT,
    IN p_id_categoria INT,
    IN p_id_proveedor INT,
    IN p_ganancia DECIMAL(10, 2)
)
BEGIN
    UPDATE PRODUCTOS
    SET
        nombre = p_nombre,
        descripcion = p_descripcion,
        precio = p_precio,
        stock = p_stock,
        id_categoria = p_id_categoria,
        id_proveedor = p_id_proveedor,
        ganancia = p_ganancia
    WHERE id_producto = p_id_producto;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;


-- Eliminar un producto por id
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_productos(
    IN p_id_producto INT
)
BEGIN
    DECLARE existe_producto INT;

    SELECT COUNT(*) INTO existe_producto
    FROM PRODUCTOS
    WHERE id_producto = p_id_producto;

    IF existe_producto = 0 THEN
        SELECT 'ERROR: Producto no existe.' AS mensaje;
    ELSE
        DELETE FROM PRODUCTOS WHERE id_producto = p_id_producto;
        SELECT 'Producto y toda su información relacionada han sido eliminados correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;


-- Visualizar todos los registros de PRODUCTOS
DELIMITER $$
CREATE PROCEDURE sp_visualizar_productos()
BEGIN
    SELECT * FROM PRODUCTOS;
END $$
DELIMITER ;

-- Visualizar un registro de PRODUCTOS por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_productos(
    IN p_id INT
)
BEGIN
    SELECT * FROM PRODUCTOS WHERE id_producto = p_id;
END $$
DELIMITER ;


-- Visualizar un registro de productos por nombre, categoria o proveedor
-- Regresa una lista de acuerdo a los insertado ya sea que se pone el nombre del producto, o se filtra por la categoria de este o se filtra por proveedor
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_nom_cat_prov_productos(
    IN p_nombre VARCHAR(50),
    IN p_id_categoria INT,
    IN p_id_proveedor INT
)
BEGIN
    SELECT 
        P.id_producto,
        P.nombre AS producto,
        P.descripcion,
        P.precio,
        P.stock,
        P.ganancia,
        P.precio + (P.precio * P.ganancia) AS precio_final,
        C.id_categoria,
        C.nombre AS categoria,
        PR.id_proveedor,
        PR.nombre AS proveedor
    FROM PRODUCTOS AS P
    INNER JOIN CATEGORIAS AS C ON P.id_categoria = C.id_categoria
    INNER JOIN PROVEEDORES AS PR ON P.id_proveedor = PR.id_proveedor
    WHERE 
        (p_nombre IS NULL OR P.nombre LIKE CONCAT('%', p_nombre, '%'))
        AND (p_id_categoria IS NULL OR P.id_categoria = p_id_categoria)
        AND (p_id_proveedor IS NULL OR P.id_proveedor = p_id_proveedor)
	ORDER BY precio_final DESC;
END $$
DELIMITER ;


-- Visualizar un registro de productos enteros + proveedor + categoria
-- Regresa una lista entera de productos + su información de proveedor y categoria.
DELIMITER $$
CREATE PROCEDURE sp_obtener_todos_productos()
BEGIN
    SELECT 
        P.id_producto,
        P.nombre AS producto,
        P.descripcion,
        P.precio,
        P.stock,
        P.ganancia,
        P.precio + (P.precio * P.ganancia) AS precio_final,
        C.id_categoria,
        C.nombre AS categoria,
        PR.id_proveedor,
        PR.nombre AS proveedor
    FROM PRODUCTOS AS P
    INNER JOIN CATEGORIAS AS C ON P.id_categoria = C.id_categoria
    INNER JOIN PROVEEDORES AS PR ON P.id_proveedor = PR.id_proveedor
    ORDER BY precio_final DESC;
END $$
DELIMITER ;


-- VENTAS
-- Crea una nueva venta junto con sus conexiones a cliente y usuario
-- Se puede usar aqui en el gestor para agregar una nueva venta pero verifica que haya clientes y usuarios aqui
DELIMITER $$
CREATE PROCEDURE sp_crear_ventas
(
    IN p_fecha DATETIME,
    IN p_total DECIMAL(10,2),
    IN p_id_cliente INT,
    IN p_id_usuario INT
)
BEGIN
    INSERT INTO VENTAS (fecha, total, id_cliente, id_usuario)
    VALUES (p_fecha, p_total, p_id_cliente, p_id_usuario);
END $$
DELIMITER ;


-- Visualizar todas las ventas
DELIMITER $$
CREATE PROCEDURE sp_visualizar_ventas()
BEGIN
    SELECT * FROM VENTAS;
END $$
DELIMITER ;


-- Visualizar una venta por id
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_ventas
(
    IN p_id INT
)
BEGIN
    SELECT * FROM VENTAS WHERE id_venta = p_id;
END $$
DELIMITER ;


-- Visualizar una venta por fecha e id del usuario
DELIMITER $$
CREATE PROCEDURE sp_buscar_por_fecha_usuario_ventas(
    IN p_usuario INT,
    IN p_fecha DATE
)
BEGIN
    SELECT 
        V.id_venta, 
        V.fecha, 
        V.total,
        V.id_cliente, 
        C.nombre AS cliente,
        V.id_usuario, 
        U.nombre AS usuario,
        CASE
            -- Si el total pagado (sumatoria de todos los pagos para la venta) es mayor o igual al total:
            WHEN IFNULL(SUM(P.monto), 0) >= V.total THEN 
                -- Si la venta es de hace más de 30 días, se marca como Expirado ('E')
                CASE WHEN DATEDIFF(NOW(), V.fecha) > 30 THEN 'E' ELSE 'P' END
            -- Si se hizo algún pago, pero no se cubre el total
            WHEN IFNULL(SUM(P.monto), 0) > 0 AND IFNULL(SUM(P.monto), 0) < V.total THEN 'FP'
            -- Si no existe registro de pago o es 0
            ELSE 'FP'
        END AS estado_pago
    FROM VENTAS AS V
    INNER JOIN CLIENTES AS C ON V.id_cliente = C.id_cliente
    INNER JOIN USUARIOS AS U ON V.id_usuario = U.id_usuario
    LEFT JOIN PAGOS AS P ON V.id_venta = P.id_venta
    WHERE V.id_usuario = p_usuario
      AND DATE(V.fecha) = p_fecha
    GROUP BY 
        V.id_venta, 
        V.fecha, 
        V.total, 
        V.id_cliente, 
        C.nombre, 
        V.id_usuario, 
        U.nombre
    ORDER BY V.fecha DESC;
END $$
DELIMITER ;

DROP PROCEDURE sp_info_ventas;
-- Visualizar la info de una venta
DELIMITER $$
CREATE PROCEDURE sp_info_ventas(IN p_id_venta INT)
BEGIN
    SELECT 
        v.id_venta,
        v.fecha,
        v.total,
        c.id_cliente	AS id_cliente,
        c.nombre        AS nombre_cliente,
        u.id_usuario	AS id_usuario,
        u.nombre        AS nombre_usuario
    FROM VENTAS v
    JOIN CLIENTES c ON v.id_cliente = c.id_cliente
    JOIN USUARIOS u ON v.id_usuario = u.id_usuario
    WHERE v.id_venta = p_id_venta;
END$$
DELIMITER ;



-- DETALLE_VENTAS
-- Crea una nueva detalle_ventas junto con sus conexiones a venta y producto
-- Se puede usar aqui en el gestor para agregar una nueva detalle_venta pero verifica que se haya ingresado una venta y productos anteriormente
DELIMITER $$
CREATE PROCEDURE sp_crear_detalle_ventas
(
    IN p_cantidad INT,
    IN p_precio_unitario DECIMAL(10,2),
    IN p_subtotal DECIMAL(10,2),
    IN p_id_venta INT,
    IN p_id_producto INT
)
BEGIN
    INSERT INTO DETALLE_VENTAS (cantidad, precio_unitario, subtotal, id_venta, id_producto)
    VALUES (p_cantidad, p_precio_unitario, p_subtotal, p_id_venta, p_id_producto);
END $$
DELIMITER ;

-- Visualizar todos los detalles ventas
DELIMITER $$
CREATE PROCEDURE sp_visualizar_detalle_ventas()
BEGIN
    SELECT * FROM DETALLE_VENTAS;
END $$
DELIMITER ;


-- Visualizar un detalle venta por id
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_detalle_ventas
(
    IN p_id INT
)
BEGIN
    SELECT * FROM DETALLE_VENTAS WHERE id_detalle = p_id;
END $$
DELIMITER ;


-- METODO_PAGO
-- Crea un nuevo metodo_pago junto con sus conexiones a venta y producto
-- Se puede usar aqui en el gestor para agregar una nueva detalle_venta
DELIMITER $$
CREATE PROCEDURE sp_crear_metodo_pago(
    IN METODO_NOMBRE VARCHAR(50),
    IN DESCRIPCION TEXT
)
BEGIN
    INSERT INTO METODO_PAGO (id_metodo_pago, nombre_metodo, descripcion)
    VALUES (NULL, METODO_NOMBRE, DESCRIPCION);

    SELECT LAST_INSERT_ID() AS id_metodo_pago;
END $$
DELIMITER ;

-- Editar método de pago por ID
DELIMITER $$
CREATE PROCEDURE sp_editar_metodo_pago(
    IN p_id_metodo_pago INT,
    IN p_nombre_metodo VARCHAR(50),
    IN p_descripcion TEXT
)
BEGIN
    UPDATE METODO_PAGO
    SET
        nombre_metodo = p_nombre_metodo,
        descripcion = p_descripcion
    WHERE id_metodo_pago = p_id_metodo_pago;

    SELECT ROW_COUNT() AS filas_afectadas;
END $$
DELIMITER ;

-- Eliminar método de pago por ID
DELIMITER $$
CREATE PROCEDURE sp_eliminar_total_metodo_pago(
    IN p_id_metodo_pago INT
)
BEGIN
    DECLARE existe_metodo INT;

    SELECT COUNT(*) INTO existe_metodo
    FROM METODO_PAGO
    WHERE id_metodo_pago = p_id_metodo_pago;

    IF existe_metodo = 0 THEN
        SELECT 'ERROR: Método de pago no existe.' AS mensaje;
    ELSE
        DELETE FROM METODO_PAGO WHERE id_metodo_pago = p_id_metodo_pago;
        SELECT 'Método de pago eliminado correctamente.' AS mensaje;
    END IF;
END $$
DELIMITER ;

-- Visualizar todos los métodos de pago
DELIMITER $$
CREATE PROCEDURE sp_visualizar_metodo_pago()
BEGIN
    SELECT * FROM METODO_PAGO;
END $$
DELIMITER ;

-- Visualizar método de pago por ID
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_metodo_pago(
    IN p_id INT
)
BEGIN
    SELECT * FROM METODO_PAGO WHERE id_metodo_pago = p_id;
END $$
DELIMITER ;



-- PAGOS
-- Crea un nuevo pago junto con sus conexiones a venta y metodo_pago
-- Se puede usar aqui en el gestor para agregar una nueva detalle_venta pero se debe revisar que haya presentes ventas y metodos de pagos en sus correspondiente tablas
DELIMITER $$
CREATE PROCEDURE sp_crear_pagos
(
    IN p_fecha_pago DATETIME,
    IN p_monto DECIMAL(10,2),
    IN p_id_venta INT,
    IN p_id_metodo_pago INT
)
BEGIN
    INSERT INTO PAGOS (fecha_pago, monto, id_venta, id_metodo_pago)
    VALUES (p_fecha_pago, p_monto, p_id_venta, p_id_metodo_pago);
END $$
DELIMITER ;

-- Visualizar todos los pagos
DELIMITER $$
CREATE PROCEDURE sp_visualizar_pagos()
BEGIN
    SELECT * FROM PAGOS;
END $$
DELIMITER ;

-- Visualizar un pago por id
DELIMITER $$
CREATE PROCEDURE sp_visualizar_por_id_pagos
(
    IN p_id INT
)
BEGIN
    SELECT * FROM PAGOS WHERE id_pago = p_id;
END $$
DELIMITER ;

-- Procedimientos para obtener pagos por usuario
DELIMITER $$
CREATE PROCEDURE sp_lista_usuario_pagos(
    IN p_id_usuario INT
)
BEGIN
    SELECT 
        P.id_pago,
        COALESCE(MP.nombre_metodo, C.nombre) AS referencia_pago,
        C.nombre AS cliente,
        P.monto,
        P.fecha_pago,
        V.total AS total_venta,
        CASE
            WHEN SUM(P2.monto) >= V.total THEN 'COMPLETO'
            ELSE 'INCOMPLETO'
        END AS estado_pago
    FROM PAGOS P
    INNER JOIN VENTAS V ON P.id_venta = V.id_venta
    INNER JOIN CLIENTES C ON V.id_cliente = C.id_cliente
    LEFT JOIN METODO_PAGO MP ON P.id_metodo_pago = MP.id_metodo_pago
    LEFT JOIN PAGOS P2 ON P2.id_venta = V.id_venta
    WHERE V.id_usuario = p_id_usuario
    GROUP BY P.id_pago, MP.nombre_metodo, C.nombre, P.monto, P.fecha_pago, V.total;
END $$
DELIMITER ;



-- Procedimiento para obtener info de un pago por id y usuario
DELIMITER $$
CREATE PROCEDURE sp_info_modal_pagos(
    IN p_id_pago INT,
    IN p_id_usuario INT
)
BEGIN
    SELECT 
        P.id_pago,
        P.monto,
        P.fecha_pago,
        MP.nombre_metodo,
        V.id_venta,
        V.fecha AS fecha_venta,
        V.total AS total_venta,
        U.nombre AS usuario,
        C.nombre AS cliente
    FROM PAGOS P
    INNER JOIN METODO_PAGO MP ON P.id_metodo_pago = MP.id_metodo_pago
    INNER JOIN VENTAS V ON P.id_venta = V.id_venta
    INNER JOIN USUARIOS U ON V.id_usuario = U.id_usuario
    INNER JOIN CLIENTES C ON V.id_cliente = C.id_cliente
    WHERE P.id_pago = p_id_pago
      AND V.id_usuario = p_id_usuario;
END $$
DELIMITER ;

