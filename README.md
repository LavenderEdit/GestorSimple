# GestorSimple

GestorSimple es un sistema de gestión empresarial desarrollado en PHP utilizando el patrón MVC. La aplicación se organiza en módulos para la administración de ventas, clientes, productos, proveedores, categorías, tipos de usuario, tipos de cliente y métodos de pago. Cada módulo cuenta con su propia lógica en controladoras, modelos y vistas, lo que permite un fácil mantenimiento y escalabilidad del proyecto.

## Características

- **MVC Estructurado:** Organización del código en Modelos, Vistas y Controladoras.
- **Gestión de Ventas:** Registro, edición, búsqueda y análisis de ventas.
- **Gestión de Clientes:** Registro, actualización, eliminación y búsqueda de clientes.
- **Gestión de Productos:** Administración completa de productos (registro, edición, eliminación y búsqueda).
- **Gestión de Proveedores:** Permite el registro y gestión de proveedores.
- **Gestión de Categorías:** Gestión de categorías para clasificar productos.
- **Tipos de Usuario y Clientes:** Manejo de roles y clasificación de usuarios y clientes.
- **Métodos de Pago:** Registro y administración de métodos de pago.
- **Interfaz Dinámica:** Uso de AJAX y jQuery para cargar contenido de forma dinámica sin recargar la página.
- **Modales con Bootstrap 5:** Los formularios para agregar/editar se presentan en modales responsivos y estilizados.
- **Validación y Seguridad:** Uso de filtros en PHP, manejo de sesiones y sanitización de datos.
- **Plantillas Reutilizables:** Funciones genéricas para renderizar listados y formularios.

## Tecnologías Utilizadas

- **Backend:** PHP, MySQL  
- **Patrón:** MVC (Model, View, Controller)  
- **Frontend:** HTML5, CSS3 (Bootstrap 5), JavaScript (ES6+), jQuery  
- **Herramientas:** XAMPP (para desarrollo local), Git para control de versiones

## Instalación

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/LavenderEdit/GestorSimple.git
   ```

2. **Configurar el entorno de desarrollo:**
   - Instala XAMPP o tu servidor Apache/PHP favorito.
   - Configura el archivo `config.php` en la carpeta `database` con los datos de conexión a la base de datos.
   - Importa el script SQL que crea las tablas y procedimientos almacenados. Este archivo se encuentra en la carpeta `database` o se puede extraer desde el proyecto.

3. **Configurar las rutas del proyecto:**
   - Asegúrate de que la raíz del proyecto esté correctamente configurada en tu servidor web.
   - Verifica las rutas de los includes y `router.php`.

## Uso

- **Acceso al sistema:**  
  Accede a la aplicación a través de `http://localhost/GestorSimple/` (o la URL correspondiente en tu entorno).

- **Navegación:**  
  El sistema cuenta con un sidebar para navegar entre los módulos. Cada módulo se carga dinámicamente mediante AJAX en el área de contenido.

- **Operaciones CRUD:**  
  Los módulos permiten realizar operaciones de creación, lectura, actualización y eliminación. Se utilizan modales para el ingreso y edición de datos.

## Estructura del Proyecto

```
GestorSimple/
├── controllers/         # Controladoras (MVC)
│   ├── AuthController.php
│   ├── ClientesController.php
│   ├── CategoriaController.php
│   ├── ProductoController.php
│   ├── ProveedoresController.php
│   ├── TipoclienteController.php
│   ├── TipousuarioController.php
│   └── MetodoPagoController.php
├── database/            # Configuraciones y scripts de la base de datos
│   ├── config.php
│   └── (scripts SQL y procedimientos almacenados)
├── models/              # Modelos
│   ├── BaseModel.php
│   ├── Clientes.php
│   ├── Categoria.php
│   ├── Productos.php
│   ├── Proveedores.php
│   ├── Tipocliente.php
│   ├── Tipousuario.php
│   └── MetodoPago.php
├── views/               # Vistas (HTML/PHP)
│   ├── auth/
│   ├── clientes/
│   ├── categorias/
│   ├── productos/
│   ├── proveedores/
│   ├── tipocliente/
│   ├── tipousuario/
│   └── metodopago/
├── js/                  # Archivos JavaScript
│   ├── api/             # Funciones de API (ej: apiRequest.js, renderItems.js, renderOptions.js)
│   ├── clientes/        # Funciones y modales para clientes (initModalClientes.js, etc.)
│   ├── categorias/      # Funciones para categorías (initModalCategoria.js, renderTemplateCategoria.js, categoriaMethods.js)
│   ├── productos/       # Funciones para productos (initModalProductos.js, renderTemplateProductos.js, productMethods.js)
│   ├── proveedores/     # Funciones para proveedores (initModalProveedores.js, renderTemplateProveedores.js, proveedorMethods.js)
│   ├── tipocliente/     # Funciones para tipos de cliente
│   ├── tipousuario/     # Funciones para tipos de usuario
│   └── metodopago/      # Funciones para métodos de pago
├── router.php           # Enrutador principal para la aplicación
└── README.md            # Este archivo
```

## Funcionalidades Dinámicas

- **Carga de Contenido:**  
  El archivo `router.php` se encarga de cargar dinámicamente las vistas según la ruta y activar las funciones de inicialización de cada módulo (por ejemplo, `initVentas()`, `initProductos()`, etc.).

- **API y AJAX:**  
  Se utiliza la función `apiRequest()` en conjunto con jQuery para realizar peticiones AJAX al backend y actualizar los listados de forma dinámica sin recargar la página.

- **Modales:**  
  Cada módulo tiene su modal propio para operaciones CRUD. Al cerrar los modales se limpian los formularios para evitar datos residuales.

## Consideraciones

- **PHP 8.1:**  
  Ten en cuenta que algunas constantes (como `FILTER_SANITIZE_STRING`) están obsoletas en PHP 8.1 y se recomienda utilizar alternativas, por ejemplo, `FILTER_SANITIZE_SPECIAL_CHARS` o `htmlspecialchars`.

- **Seguridad:**  
  Se utiliza la sanitización de datos y la validación de parámetros en los procedimientos almacenados y controladoras para prevenir inyecciones SQL y otros posibles ataques.

- **Escalabilidad:**  
  La estructura modular y el uso de funciones genéricas para renderizar listados y opciones facilitan la incorporación de nuevos módulos y la extensión del sistema.

## Contribuciones

Si deseas contribuir al proyecto, por favor sigue estos pasos:
1. Haz un fork del repositorio.
2. Crea una rama para tu característica: `git checkout -b feature/nueva-caracteristica`.
3. Realiza tus cambios y haz commit.
4. Envía un pull request describiendo los cambios realizados.

## Licencia

Este proyecto se distribuye bajo la [Licencia MIT](LICENSE.txt).
