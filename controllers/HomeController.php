<?php
namespace Controllers;

require "./core/Controller.php";
use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->getLandingData();
        $this->loadView('home/landing', $data);
    }

    public function getLandingData()
    {
        return [
            'empresa' => [
                'razon_social' => 'VentaGo',
                'ruc' => '20603512345',
                'director' => 'David Ojeda',
                'direccion' => 'Av. Los Álamos 457, Urb. Las Palmeras, Lima, Perú',
                'tipo' => 'MYPE',
                'condicion' => 'SOCIO',
                'rubro_principal' => 'Venta de productos de cualquier tipo',
                'rubro_secundario' => 'servicios de soporte técnico',
            ],

            'mision_vision' => [
                'mision' => [
                    'icono' => 'fas fa-bullseye',
                    'contenido' => 'Brindar a nuestros clientes una experiencia de compra confiable, accesible y moderna, ofreciendo una amplia variedad de productos de calidad que se adapten a sus necesidades diarias, con un servicio rápido, transparente y enfocado en la satisfacción total del cliente.'
                ],
                'vision' => [
                    'icono' => 'fas fa-binoculars',
                    'contenido' => 'Convertirnos en una de las plataformas de ventas más reconocidas del país, destacando por nuestra innovación, compromiso con el cliente y capacidad para ofrecer soluciones comerciales integrales que faciliten la vida de las personas.'
                ],
                'valores' => [
                    'Integridad',
                    'Servicio',
                    'Compromiso',
                    'Respeto',
                    'Responsabilidad'
                ]
            ],

            'productos' => [
    [
        'titulo' => 'Tienda Online',
        'descripcion' => 'Plataforma moderna para comprar y vender una amplia variedad de productos de manera rápida y segura.',
        'icono' => 'fas fa-shopping-cart'
    ],
    [
        'titulo' => 'Ofertas y Descuentos',
        'descripcion' => 'Sistema inteligente que muestra las mejores promociones y rebajas disponibles cada semana.',
        'icono' => 'fas fa-tags'
    ],
    [
        'titulo' => 'Gestión de Pedidos',
        'descripcion' => 'Herramienta para seguimiento de compras, estado de envío y atención postventa en tiempo real.',
        'icono' => 'fas fa-box'
    ],
    [
        'titulo' => 'Atención al Cliente 24/7',
        'descripcion' => 'Canales de comunicación rápidos y eficaces para resolver consultas y brindar soporte continuo.',
        'icono' => 'fas fa-headset'
    ],
            ],

            'mercado' => [
    'geografico' => 'Nacional, con proyección de expansión a nivel latinoamericano',
    'psicografico' => 'Consumidores modernos, prácticos y digitales que buscan comodidad, precios competitivos y confianza en sus compras',
    'conductual' => 'Clientes interesados en adquirir productos de diferentes categorías desde una sola plataforma, priorizando la rapidez y la seguridad en sus compras'
],

            'clientes' => [
    'target' => 'Consumidores y empresas peruanas que buscan una plataforma confiable para adquirir productos de diversas categorías',
    'sectores' => [
        'Tecnología',
        'Hogar y Electrodomésticos',
        'Moda y Accesorios',
        'Salud y Belleza',
        'Alimentos y Bebidas',
        'Emprendimientos locales'
    ]
],

'equipo' => [
    'gerencia' => [
        'DAVID OJEDA' => 'Director General'
    ],
    'areas' => [
        'Desarrollo' => ['PIERO COSQUILLO', 'ALEXANDRA SANJINES'],
        'Marketing' => ['LUCEBO HORNA', 'MICHELLE LOPEZ', 'ELERY SALINAS'],
        'Diseño' => ['ABRAHAM PEÑA', 'ESTEPHANIE VENEGAS'],
        'Soporte y Atención al Cliente' => ['DHANIA ENCISO', 'MARIO CONCHA', 'NICOLE TORRES'],
        'Logística y Ventas' => ['JULIO RAMOS', 'CAROLINA VERA']
    ]
],
        ];
    }
}