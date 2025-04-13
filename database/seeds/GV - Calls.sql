/*
	// Crear ventas con procedimientos de almacenado
	CALL sp_crear_ventas('2024-12-05', 245.50, 1, 1);
	CALL sp_crear_ventas('2024-12-15', 312.75, 2, 1);
	CALL sp_crear_ventas('2025-01-07', 157.20, 3, 1);
	CALL sp_crear_ventas('2025-01-20', 689.99, 4, 1);
	CALL sp_crear_ventas('2025-02-03', 423.80, 5, 1);
	CALL sp_crear_ventas('2025-02-10', 578.30, 6, 1);
	CALL sp_crear_ventas('2025-02-25', 330.50, 7, 1);
	CALL sp_crear_ventas('2025-03-05', 999.99, 8, 1);
	CALL sp_crear_ventas('2025-03-16', 450.00, 9, 1);
	CALL sp_crear_ventas('2025-03-27', 275.75, 10, 1);
    // Ventas del 2025-04-07
	CALL sp_crear_ventas('2025-04-07', 100.25, 2, 1);
	CALL sp_crear_ventas('2025-04-07', 210.50, 3, 1);
	CALL sp_crear_ventas('2025-04-07', 150.75, 4, 1);
	CALL sp_crear_ventas('2025-04-07', 320.90, 5, 1);
	CALL sp_crear_ventas('2025-04-07', 280.00, 6, 1);
	CALL sp_crear_ventas('2025-04-07', 175.30, 7, 1);
	CALL sp_crear_ventas('2025-04-07', 430.45, 8, 1);
	CALL sp_crear_ventas('2025-04-07', 299.99, 9, 1);
	CALL sp_crear_ventas('2025-04-07', 360.80, 10, 1);
    
    // Crear pagos para las ventas del 2025-04-07
    CALL sp_crear_pagos('2025-04-08', 50.00, 21, 1);
	CALL sp_crear_pagos('2025-04-09', 50.25, 21, 1);
	CALL sp_crear_pagos('2025-04-09', 210.50, 22, 3);
	CALL sp_crear_pagos('2025-04-09', 150.75, 23, 2);
	CALL sp_crear_pagos('2025-04-10', 180.00, 24, 3);
	CALL sp_crear_pagos('2025-04-10', 140.90, 24, 3);
	CALL sp_crear_pagos('2025-04-11', 280.00, 25, 1);
	CALL sp_crear_pagos('2025-04-12', 170.30, 26, 4);
	CALL sp_crear_pagos('2025-04-12', 430.45, 27, 6);
	CALL sp_crear_pagos('2025-04-13', 299.95, 28, 1);
	CALL sp_crear_pagos('2025-04-10', 360.80, 29, 2);
*/
CALL sp_visualizar_metodo_pago();
CALL sp_visualizar_pagos();
CALL sp_visualizar_ventas();
CALL sp_buscar_por_fecha_usuario_ventas(1, '2025-04-07');

CALL sp_visualizar_productos();

CALL sp_visualizar_proveedores();

CALL sp_visualizar_categoria();

CALL sp_editar_categoria(11, 'Jug', 'JUGUETES RIKOS');

CALL sp_buscar_proveedores(null, 'Pro');
CALL sp_productos_por_proveedores(1);

CALL sp_visualizar_productos();
CALL sp_visualizar_por_nom_cat_prov_productos(null, null, 10);
CALL sp_obtener_todos_productos();
CALL sp_info_ventas(13);

CALL sp_eliminar_total_cliente(1);

CALL sp_lista_usuario_pagos(1);
CALL sp_info_modal_pagos(18, 1);