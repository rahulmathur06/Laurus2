<?php

namespace Modules\CuentasCorporativas\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Tasks\Entities\Flow;
use Illuminate\Support\Facades\DB;

class CuentasCorporativasDatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

//        $flow_crm = Flow::create([
//                    'name' => 'Executive CRM Workflow',
//                    'description' => 'Enterprise workflow for executives',
//                    'module' => 'CuentasCorporativas',
//                    'active' => 1]);
//
//        $flow_auth = Flow::create([
//                    'name' => 'Enterprise Authorization WorkFlow',
//                    'description' => 'Workflow for authorisation of enterprises',
//                    'module' => 'CuentasCorporativas',
//                    'active' => 1]);
//        
//        echo '------------------------<br/>CRM: '.$flow_crm->id.'<br/> Auth: '.$flow_auth->id.'<br/>--------------------';
        
           // Creando modulo de contabilidad
        DB::table('modules')->insert([
                ['module_name' => 'CuentasCorporativas']
        ]);

        $moduleId = DB::getPdo()->lastInsertId();

        DB::table('modules_permissions')->insert([
            [
                'module_id' => $moduleId,
                'display_name' => 'Ver Cuentas Corporativas',
                'permission' => 'cuentascorporativas.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Ver Checklist',
                'permission' => 'cuentascorporativas.config.checklist.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Ver Tipos de Empresas',
                'permission' => 'cuentascorporativas.config.empresas.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Ver Tipos de Personas',
                'permission' => 'cuentascorporativas.config.personas.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Ver Empresas',
                'permission' => 'cuentascorporativas.empresas.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Ver Empresas Externas',
                'permission' => 'cuentascorporativas.empresas.externas.view'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Aprueba la Empresa',
                'permission' => 'cuentascorporativas.empresas.approve'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Asignar Tarea',
                'permission' => 'cuentascorporativas.empresas.task.assign'
            ],
                [
                'module_id' => $moduleId,
                'display_name' => 'Marcar Tarea',
                'permission' => 'cuentascorporativas.empresas.task.mark'
            ]
        ]);

        // $this->call("OthersTableSeeder");
    }

}
