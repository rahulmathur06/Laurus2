<?php namespace Modules\Reservaciones\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Permissions\Entities\Module;

class ReservacionesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
                
                $module = Module::create([
                    'module_name' => 'Reservaciones'
                ]);
                                
                $menus = $module->menus()->createMany([
                    [
                        'nombre' => 'Locaciones'
                    ],
                    [
                        'nombre' => 'Autos'
                    ],
                    [
                        'nombre' => 'Horarios'
                    ],
                    [
                        'nombre' => 'Seguros'
                    ],
                    [
                        'nombre' => 'Accesos'
                    ],
                    [
                        'nombre' => 'Tarifas'
                    ],
                    [
                        'nombre' => 'Promociones'
                    ],
                    [
                        'nombre' => 'DropOff'
                    ],
                    [
                        'nombre' => 'Extras'
                    ]
                ]);
                
                $submenus = [
                    'Locaciones' => [
                        'Oficinas' => [
                            'Ver' => 'locacion.view',
                            'Crear' => 'locacion.create',
                            'Editar' => 'locacion.edit',
                            'Eliminar' => 'locacion.delete'
                        ],
                        'Destinos' => [
                            'Ver' => 'destino.view',
                            'Crear' => 'destino.create',
                            'Editar' => 'destino.edit',
                            'Eliminar' => 'destino.delete'
                        ],
                        'Ciudades' => [
                            'Ver' => 'ciudad.view',
                            'Crear' => 'ciudad.create',
                            'Editar' => 'ciudad.edit',
                            'Eliminar' => 'ciudad.delete'
                        ]
                    ],
                    'Autos' => [
                        'Categorias' => [
                            'Ver' => 'categorias.view',
                            'Crear' => 'categorias.create',
                            'Editar' => 'categorias.edit',
                            'Eliminar' => 'categorias.delete'
                        ],
                        'Clases' => [
                            'Ver' => 'clases.view',
                            'Crear' => 'clases.create',
                            'Editar' => 'clases.edit',
                            'Eliminar' => 'clases.delete'
                        ],
                        'Flotillas' => [
                            'Ver' => 'flotilla.view',
                            'Crear' => 'flotilla.create',
                            'Editar' => 'flotilla.edit',
                            'Eliminar' => 'flotilla.delete'
                        ],
                        'Cierres' => [
                            'Ver' => 'cierres.view',
                            'Crear' => 'cierres.create',
                            'Editar' => 'cierres.edit',
                            'Eliminar' => 'cierres.delete'
                        ]
                    ],
                    'Horarios' => [
                        'Anticipacion' => [
                            'Ver' => 'anticipacion.view',
                            'Crear' => 'anticipacion.create',
                            'Editar' => 'anticipacion.edit',
                            'Eliminar' => 'anticipacion.delete'
                        ],
                        'Restriccion' => [
                            'Ver' => 'restriccion.view',
                            'Crear' => 'restriccion.create',
                            'Editar' => 'restriccion.edit',
                            'Eliminar' => 'restriccion.delete'
                        ]
                    ],
                    'Seguros' => [
                        'Grupos' => [
                            'Ver' => 'grupo.view',
                            'Crear' => 'grupo.create',
                            'Editar' => 'grupo.edit',
                            'Eliminar' => 'grupo.delete'
                        ],
                        'Catalogos' => [
                            'Ver' => 'catalogo.view',
                            'Crear' => 'catalogo.create',
                            'Editar' => 'catalogo.edit',
                            'Eliminar' => 'catalogo.delete'
                        ],
                        'Coberturas' => [
                            'Ver' => 'cobertura.view',
                            'Crear' => 'cobertura.create',
                            'Editar' => 'cobertura.edit',
                            'Eliminar' => 'cobertura.delete'
                        ],
                        'Tarifas' => [
                            'Ver' => 'seguros-tarifa.view',
                            'Crear' => 'seguros-tarifa.create',
                            'Editar' => 'seguros-tarifa.edit',
                            'Eliminar' => 'seguros-tarifa.delete'
                        ]
                    ],
                    'Accesos' => [
                        'Accesos' => [
                            'Ver' => 'acceso.view',
                            'Crear' => 'acceso.create',
                            'Editar' => 'acceso.edit',
                            'Eliminar' => 'acceso.delete'
                        ]
                    ],
                    'Tarifas' => [
                        'Rangos Minimo-Maximo' => [
                            'Ver' => 'rangos.view',
                            'Crear' => 'rangos.create',
                            'Editar' => 'rangos.edit',
                            'Eliminar' => 'rangos.delete'
                        ],
                        'Captura de Tarifas' => [
                            'Ver' => 'tarifas.view',
                            'Crear' => 'tarifas.create',
                            'Editar' => 'tarifas.edit',
                            'Eliminar' => 'tarifas.delete'
                        ],
                        'Autorizacion de Tarifas' => [
                            'Ver' => 'tarifa_auth.view',
                            'Editar' => 'tarifa_auth.edit',
                        ],
                        'Impuestos' => [
                            'Ver' => 'impuestos.view',
                            'Crear' => 'impuestos.create',
                            'Editar' => 'impuestos.edit',
                            'Eliminar' => 'impuestos.delete'
                        ]
                    ],
                    'Promociones' => [
                        'Listado' => [
                            'Ver' => 'promos.view',
                            'Crear' => 'promos.create',
                            'Editar' => 'promos.edit',
                            'Eliminar' => 'promos.delete'
                        ],
                        'Asignacion' => [
                            'Ver' => 'promo-locaciones.view',
                            'Crear' => 'promo-locaciones.create',
                            'Editar' => 'promo-locaciones.edit',
                            'Eliminar' => 'promo-locaciones.delete'
                        ]
                    ],
                    'DropOff' => [
                        'Lista de Ubicaciones DropOff' => [
                            'Ver' => 'ubicaciones.view',
                            'Crear' => 'ubicaciones.create',
                            'Editar' => 'ubicaciones.edit',
                            'Eliminar' => 'ubicaciones.delete'
                        ],
                        'Costos de DropOff' => [
                            'Ver' => 'dropoffcostos.view',
                            'Crear' => 'dropoffcostos.create',
                            'Editar' => 'dropoffcostos.edit',
                            'Eliminar' => 'dropoffcostos.delete'
                        ]
                    ],
                    'Extras' => [
                        'Lista de Extras' => [
                            'Ver' => 'extras.view',
                            'Crear' => 'extras.create',
                            'Editar' => 'extras.edit',
                            'Eliminar' => 'extras.delete'
                        ]
                    ]
                ];
                foreach($menus as $menu){
                    $entries = [];
                    foreach($submenus[$menu->nombre] as $name => $options){
                        //$name_sanatized = str_replace(' ', '', strtolower($name));
                        foreach($options as $display => $actual){
                            $entries[] = [
                                'module_id' => $module->id,
                                'display_name' => $display.' '.$name,
                                'permission' => $actual
                            ];
                        }
                    }
                    $menu->permissions()->createMany($entries);
                }
	}

}