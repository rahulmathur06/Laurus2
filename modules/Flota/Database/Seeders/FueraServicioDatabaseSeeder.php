<?php

namespace Modules\Fueraservicio\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class FueraServicioDatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        // Creando modulo de contabilidad
        DB::table('modules')->insert([
                ['module_name' => 'FueraServicio']
        ]);

        $moduleId = DB::getPdo()->lastInsertId();

        DB::table('modules_permissions')->insert([
            [
                'module_id' => $moduleId,
                'display_name' => 'Ver Flotilla',
                'permission' => 'flotillas.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Index Fuera de Servicio',
                'permission' => 'fueraservicio.index'
            ],
                [
                //reporte disponibilidad
                'module_id' => $moduleId,
                'display_name' => 'Crear Fuera de Servicio',
                'permission' => 'fueraservicio.create'
            ],
                [
                //reporte disponibilidad
                'module_id' => $moduleId,
                'display_name' => 'Actualizar Fuera de Servicio',
                'permission' => 'fueraservicio.update'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Eliminar Fuera de Servicio',
                'permission' => 'fueraservicio.destroy'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Index Perdida Total',
                'permission' => 'perdida.index'
            ],
                [
                //reporte disponibilidad
                'module_id' => $moduleId,
                'display_name' => 'Crear Perdida Total',
                'permission' => 'perdida.create'
            ],
                [
                //reporte disponibilidad
                'module_id' => $moduleId,
                'display_name' => 'Actualizar Perdida Total',
                'permission' => 'perdida.update'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Eliminar Perdida Total',
                'permission' => 'perdida.destroy'
            ]
        ]);
        // $this->call("OthersTableSeeder");
    }

}
