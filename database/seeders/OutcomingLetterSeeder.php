<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutcomingLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outcoming_letters')->insert([
            [
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '2024-10-05',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Undangan rapat koordinasi Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '2000-10-05',
                'pengirim' => 'BAA',
                'perihal' => 'Undangan Akademik',
                'keterangan' => 'Pemberitahuan kegiatan akademik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_surat' => '003/LPPM/X/2026',
                'tanggal' => '2024-04-05',
                'pengirim' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi',
                'keterangan' => 'Undangan kegiatan sosialisasi penelitian',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}