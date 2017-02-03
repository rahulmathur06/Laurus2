<?php namespace Modules\Flota\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FlotaTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Creando modulo de contabilidad
        DB::table('modules')->insert([
            ['module_name' => 'Flotilla']
        ]);
        $idFlota = DB::getPdo()->lastInsertId();

        DB::table('modules_permissions')->insert([
            [
                //vehiculos
                'module_id'    =>  $idFlota,
                'display_name'  =>  'Ver vehiculos',
                'permission'    =>  'vehiculos.view'
            ],
            [
                //reporte disponibilidad
                'module_id'    =>  $idFlota,
                'display_name'  =>  'Ver reporte disponibilidad',
                'permission'    =>  'disponibilidad.view'
            ],
            [
                //reporte inventario
                'module_id'    =>  $idFlota,
                'display_name'  =>  'Ver reporte reporte inventario',
                'permission'    =>  'inventario.view'
            ],
        ]);
    }

}