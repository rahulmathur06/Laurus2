<?php
/**
 * Created by PhpStorm.
 * User: Kontiki
 * Date: 25/05/2015
 * Time: 11:32 AM
 */
use \Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;



class UserTableSeeder extends Seeder{
    public function run(){
        \DB::table('users')->truncate();
        \DB::table('roles')->truncate();
        \DB::table('role_users')->truncate();
        $role = [
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [
                'user.view'   => true,
                'user.create' => true,
                'user.update' => true,
                'user.delete' => true,
                'role.view'   => true,
                'role.create' => true,
                'role.update' => true,
                'role.delete' => true,
                'role.permissions' => true,
                'notification.view' => true,
                'notification.create' => true,
                'notification.update' => true,
                'notification.delete' => true,
                'task.view' => true,
                'task.create' => true,
                'task.update' => true,
                'task.delete' => true,
                'ventas.view' => true,
                'pendientes.view' => true,
                'depositos.view' => true,
                'estadocuenta.view' => true,
                'auxmovimientos.view' => true,
                'antiguedad.view' => true,
                'polizas.view' => true,
                'cancelaciones.view' => true,
                'cuentas.view' => true,
                'agreements.index' => true,
                'agreements.create' => true,
                'agreements.edit' => true,
                'agreements.delete' => true,
                'agreements.task' => true,
                'agreements.assignuseredit' => true,
                'checklist.index' => true,
                'checklist.show' => true,
                'opportunity.index' => true,
                'opportunity.create' => true,
                'opportunity.edit' => true,
                'opportunity.delete' => true,
                'opportunity.task' => true,
                'opportunity.checklist' => true,
                'opportunity.assigment' => true,
                'agreements.view' => true,
                'agreements.update'=> true,
                'contabilidad.view' => true,
                'contabilidad.create' => true,
                'contabilidad.update' => true,
                'contabilidad.delete' => true,
                'vehiculos.view'  => true,
                'reportes.view' => true,
                'utilizacion.view' => true
            ]
        ];
        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();
        $admin = [
            'email'    => 'test@test.com',
            'password' => 'test',
            'image' => 'avatar-larus.jpeg',
            'position' => 'Administrador',
            'first_name' => 'Admin',
            'last_name' => 'example'

        ];
        $adminUser = Sentinel::registerAndActivate($admin);
        $adminUser->roles()->attach($adminRole);

    }

}