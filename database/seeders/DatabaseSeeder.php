<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Merek;
use App\Models\Ruang;
use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "nama" => "Rafif Gavi",
            "nim_nip" => "2311500777",
            "jabatan_lab" => "spv_inventory",
            "password" => Hash::make("123"),
            "alamat" => "Tangsel",
            "no_hp" => "087212",
            "angkatan_asisten" => "2023"
        ]);

        
        for ($i=1; $i <= 3 ; $i++) { 
             Gudang::create([
                "kd_gudang" => "gd-$i",
                "nama_gudang" => "Gudang $i"
                ]);

              Barang::create([
                "kd_barang" => "br-$i",
                "nama_barang" => "Barang $i"
                ]);

             Ruang::create([
                "kd_ruang" => "rg-$i",
                "nama_ruang" => "Ruang $i"
                ]);

             Merek::create([
                "kd_merek" => "mrk-$i",
                "nama_merek" => "Merek $i"
                ]);
        }


        
    }
}
