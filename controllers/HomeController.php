<?php
namespace Controllers;

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
                'razon_social' => 'DIGITAL BUHO S.A.C',
                'ruc' => '20603684291',
                'director' => 'ENRIQUE BACA DEYVIS DANIEL',
                'direccion' => 'Urbanización Villa Los Ángeles Altura de la 4 de, Seoane 232',
                'tipo' => 'MYPE',
                'condicion' => 'SOCIO',
                'rubro_principal' => 'Programación informática',
                'rubro_secundario' => 'Venta al por menor por internet'
            ],

            'mision_vision' => [
                'mision' => [
                    'icono' => 'fas fa-bullseye',
                    'contenido' => 'Ayudar a los negocios y emprendedores a despegar su marca en el mundo digital mediante un trabajo creativo y comprometido.'
                ],
                'vision' => [
                    'icono' => 'fas fa-binoculars',
                    'contenido' => 'Ser punto de referencia en ofrecer las mejores soluciones de tecnología Digital en el Perú.'
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
                    'titulo' => 'Constructor Web',
                    'descripcion' => 'Plataforma para creación y edición de hojas de estilo con personalización avanzada',
                    'icono' => 'fas fa-code'
                ],
                [
                    'titulo' => 'Facturación Fácil',
                    'descripcion' => 'Sistema automatizado para generación de facturas electrónicas y reportes',
                    'icono' => 'fas fa-file-invoice-dollar'
                ],
                [
                    'titulo' => 'Correos Corporativos',
                    'descripcion' => 'Solución profesional de correos electrónicos personalizados con dominio empresarial',
                    'icono' => 'fas fa-envelope'
                ],
                [
                    'titulo' => 'Chat Buho',
                    'descripcion' => 'Plataforma unificada para gestión de comunicaciones multicanal',
                    'icono' => 'fas fa-comments'
                ]
            ],

            'mercado' => [
                'geografico' => 'Nacional',
                'psicografico' => 'Empresarios interesados en crecimiento y posicionamiento',
                'conductual' => 'Fortalecimiento de marca e interacción con clientes'
            ],

            'clientes' => [
                'target' => 'Pequeños y medianos empresarios peruanos',
                'sectores' => [
                    'Construcción',
                    'Alimentación',
                    'Retail',
                    'Moda',
                    'Educación corporativa',
                    'Servicios veterinarios'
                ]
            ],

            'equipo' => [
                'gerencia' => [
                    'DEYVIS ENRIQUE' => 'Gerente General'
                ],
                'areas' => [
                    'Desarrollo' => ['PIERO COSQUILLO', 'ALEXANDRA SANJINES'],
                    'Marketing' => ['LUCEBO HORNA', 'MICHELLE LOPEZ', 'ELERY SALINAS'],
                    'Diseño' => ['ABRAHAM PEÑA', 'ESTEPHANIE VENEGAS'],
                    'Soporte' => ['DHANIA ENCISO', 'MARIO CONCHA', 'NICOLE TORRES']
                ]
            ]
        ];
    }
}