<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name'         => 'Kost Putri 1',
            'description'  => 'Kost Putri sederhana',
            'price'        => 500000,
            'available'    => true,
            'city'         => 'Bandung',
            'owner_id'     => 1,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);

        DB::table('rooms')->insert([
            'name'         => 'Kost Putri 2',
            'description'  => 'Kost Putri di dekat daerah perkantoran',
            'price'        => 900000,
            'available'    => true,
            'city'         => 'Jakarta',
            'owner_id'     => 1,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);

        DB::table('rooms')->insert([
            'name'         => 'Kost Putri 3',
            'description'  => 'Kost Putri dengan fasilitas lengkap : AC, Kamar Mandi di dalam, dll',
            'price'        => 1200000,
            'available'    => false,
            'city'         => 'Jakarta',
            'owner_id'     => 1,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);
        
        DB::table('rooms')->insert([
            'name'         => 'Kost Putra 1',
            'description'  => 'Kost Putra Murah di daerah Kampus UGM, 1 Kamar untuk 2 orang',
            'price'        => 500000,
            'available'    => true,
            'city'         => 'Yogyakarta',
            'owner_id'     => 1,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);
        
        DB::table('rooms')->insert([
            'name'         => 'Kost Putra 2',
            'description'  => 'Kost Putra Murah di daerah Kampus UGM, 1 Kamar untuk 2 orang',
            'price'        => 500000,
            'available'    => true,
            'city'         => 'Yogyakarta',
            'owner_id'     => 1,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);
    }
}
