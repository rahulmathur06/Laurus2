<?php namespace Modules\Reservaciones\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservacionesDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		DB::table('mv3_locaciones_estados')->insert([
			//Estados
			[
				'nombre'	=>	'Coahuila de Zaragoza',
				'acron'		=>	'COA'
			],
			[
				'nombre'	=>	'Nuevo León',
				'acron'		=>	'NLE'
			],
			[
				'nombre'	=>	'Tamaulipas',
				'acron'		=>	'TAM'
			],
			[
				'nombre'	=>	'Baja California',
				'acron'		=>	'BCN'
			],
			[
				'nombre'	=>	'Baja California Sur',
				'acron'		=>	'BCS'
			],
			[
				'nombre'	=>	'Chihuahua',
				'acron'		=>	'CHH'
			],
			[
				'nombre'	=>	'Durango',
				'acron'		=>	'DUR'
			],
			[
				'nombre'	=>	'Sinaloa',
				'acron'		=>	'SIN'
			],
			[
				'nombre'	=>	'Sonora',
				'acron'		=>	'SON'
			],
			[
				'nombre'	=>	'Colima',
				'acron'		=>	'COL'
			],
			[
				'nombre'	=>	'Nayarit',
				'acron'		=>	'NAY'
			],
			[
				'nombre'	=>	'Michoacán de Ocampo',
				'acron'		=>	'MIC'
			],
			[
				'nombre'	=>	'Jalisco',
				'acron'		=>	'JAL'
			],
			[
				'nombre'	=>	'Hidalgo',
				'acron'		=>	'HID'
			],
			[
				'nombre'	=>	'Puebla',
				'acron'		=>	'PUE'
			],
			[
				'nombre'	=>	'Tlaxcala',
				'acron'		=>	'TLA'
			],
			[
				'nombre'	=>	'Veracruz',
				'acron'		=>	'VER'
			],
			[
				'nombre'	=>	'Aguascalientes',
				'acron'		=>	'AGU'
			],
			[
				'nombre'	=>	'Guanajuato',
				'acron'		=>	'GUA'
			],
			[
				'nombre'	=>	'Querétaro',
				'acron'		=>	'QUE'
			],
			[
				'nombre'	=>	'San Luis Potosí',
				'acron'		=>	'SLP'
			],
			[
				'nombre'	=>	'Zacatecas',
				'acron'		=>	'ZAC'
			],
			[
				'nombre'	=>	'Distrito Federal',
				'acron'		=>	'DIF'
			],
			[
				'nombre'	=>	'Estado de México',
				'acron'		=>	'MEX'
			],
			[
				'nombre'	=>	'Morelos',
				'acron'		=>	'MOR'
			],
			[
				'nombre'	=>	'Campeche',
				'acron'		=>	'CAM'
			],
			[
				'nombre'	=>	'Quintana Roo',
				'acron'		=>	'ROO'
			],
			[
				'nombre'	=>	'Tabasco',
				'acron'		=>	'TAB'
			],
			[
				'nombre'	=>	'Yucatán',
				'acron'		=>	'YUC'
			],
			[
				'nombre'	=>	'Chiapas',
				'acron'		=>	'CHIP'
			],
			[
				'nombre'	=>	'Guerrero',
				'acron'		=>	'GRO'
			],
			[
				'nombre'	=>	'Oaxaca',
				'acron'		=>	'OAX'
			]
		]);


		// $this->call("OthersTableSeeder");
	}

}