<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->insert([
            'name' => 'Ver Configuración',
            'slug' => str_slug('Ver Configuración'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Usuarios',
            'slug' => str_slug('Ver Usuarios'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Concejo Municipal',
            'slug' => str_slug('Ver Concejo Municipal'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Comisiones',
            'slug' => str_slug('Ver Comisiones'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Agenda',
            'slug' => str_slug('Ver Agenda'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Noticias',
            'slug' => str_slug('Ver Noticias'),
        ]);


        DB::table('permissions')->insert([
            'name' => 'Ver Obras',
            'slug' => str_slug('Ver Obras'),
        ]);


        DB::table('permissions')->insert([
            'name' => 'Ver Sliders',
            'slug' => str_slug('Ver Sliders'),
        ]);


        DB::table('permissions')->insert([
            'name' => 'Ver Popup',
            'slug' => str_slug('Ver Popup'),
        ]);


        DB::table('permissions')->insert([
            'name' => 'Ver Servicios',
            'slug' => str_slug('Ver Servicios'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Convocatorias',
            'slug' => str_slug('Ver Convocatorias'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Normas',
            'slug' => str_slug('Ver Normas'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Videos',
            'slug' => str_slug('Ver Videos'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Documentos Institucionales',
            'slug' => str_slug('Ver Documentos Institucionales'),
        ]);

        DB::table('permissions')->insert([
            'name' => 'Ver Otros documentos importantes',
            'slug' => str_slug('Ver Otros documentos importantes'),
        ]);


    }
}
