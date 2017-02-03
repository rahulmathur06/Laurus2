<?php

return [
    'name' => 'Reservaciones',
    'google_map_api_key' => env('GOOGLE_MAP_API_KEY'),
    'module_id' => 10,
    'module_menu_permissions' => [
        'locacion.view',
        'destino.view',
        'ciudad.view',
        'categorias.view',
        'clases.view',
        'flotilla.view',
        'cierres.view',
        'anticipacion.view',
        'restriccion.view',
        'grupo.view',
        'catalogo.view',
        'cobertura.view',
        'seguros-tarifa.view',
        'acceso.view',
        'rangos.view',
        'tarifas.view',
        'tarifa_auth.view',
        'impuestos.view',
        'promos.view',
        'promo-locaciones.view',
        'ubicaciones.view',
        'dropoffcostos.view',
        'extras.view',
    ]
];
