<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\AparaturDesa;
use App\Models\Gender;
use App\Models\Finance;
use App\Models\Program;
use App\Models\Category;
use App\Models\Keuangan;
use App\Models\Marriage;
use App\Models\Programs;
use App\Models\Religion;
use App\Models\Education;
use App\Models\Potential;
use App\Models\Assistance;
use App\Models\Profession;
use App\Models\Assistances;
use Illuminate\Database\Seeder;
use App\Models\VillagePotential;
use App\Models\AssistanceProgram;
use App\Models\LayananMandiri;
use App\Models\StatusLayanan;
use App\Models\UserRole;
use App\Models\Village;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'username' => 'adamalfarizi',
            'nik' => '173040023',
            'password' => bcrypt('173040023'),
            'user_role_id' =>'1'
        ]);
        User::create([
            'username' => 'adamal',
            'nik' => '173040024',
            'password' => bcrypt('123456789'),
            'user_role_id' =>'2'
        ]);
        User::create([
            'username' => 'adal',
            'nik' => '173040025',
            'password' => bcrypt('987654321'),
            'user_role_id' =>'3'
        ]);
        User::create([
            'username' => 'adalaaa',
            'nik' => '1730400',
            'password' => bcrypt('123456'),
            'user_role_id' =>'3'
        ]);

        //Hak Akses
        UserRole::create([
            'role' => 'admin'
        ]);
        UserRole::create([
            'role' => 'pelayanan'
        ]);
        UserRole::create([
            'role' => 'masyarakat'
        ]);
        // User::factory(3)->create();

        // Admin::create([
        //     'name' => 'Adam Alfarizi',
        //     'username' => 'adamalfarizi',
        //     'email' => 'adamalfa18@gmail.com',
        //     'password' => bcrypt('173040023')
        // ]);
        // Admin::create([
        //     'name' => 'Adam',
        //     'username' => 'adama',
        //     'email' => 'adamalfa8@gmail.com',
        //     'password' => bcrypt('1730400233')
        // ]);


        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Usaha',
            'kategori' => 'surat_keterangan_usaha'

        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Terdaptar',
            'kategori' => 'surat_keterangan_terdaftar'

        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Domisili',
            'kategori' => 'surat_keterangan_domisili'

        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Pindah',
            'kategori' => 'surat_keterangan_pindah'

        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Tidak Mampu',
            'kategori' => 'surat_keterangan_tidak_mampu'

        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Meninggal',
            'kategori' => 'surat_keterangan_meninggal'

        ]);
        LayananMandiri::create([
            'nama_layanan' => 'Surat Keterangan Belum Nikah',
            'kategori' => 'surat_keterangan_belum_menikah'

        ]);

        StatusLayanan::create([
            'status' => 'proses',
        ]);
        StatusLayanan::create([
            'status' => 'gagal',
        ]);

        


        Post::factory(20)->create();



        Profession::create([
            'kelompok' => 'Politik'
        ]);
        Profession::create([
            'kelompok' => 'Guru'
        ]);

        Religion::create([
            'agama' => 'Islam'
        ]);

        Education::create([
            'pendidikan' => 'Diploma 1'
        ]);

        Marriage::create([
            'status' => 'menikah'
        ]);
        Marriage::create([
            'status' => 'belum'
        ]);


        Assistance::create([
            'program_id' => '1',
            'nama' => 'waw',
            'nik' => '1726538323',
            'alamat' => 'adaaa'
        ]);
        Assistance::create([
            'program_id' => '1',
            'nama' => 'waw',
            'nik' => '1726538323',
            'alamat' => 'adaaa'
        ]);
        Assistance::create([
            'program_id' => '2',
            'nama' => 'waw',
            'nik' => '1726538323',
            'alamat' => 'adaaa'
        ]);


        Category::create([
            'name' => 'Sosial',
            'slug' => 'sosial'

        ]);
        Category::create([
            'name' => 'Budaya',
            'slug' => 'budaya'

        ]);

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik'

        ]);
    }
}
