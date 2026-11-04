<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomingLetterSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incoming_letters')->insert([
            [   
            'nomor_surat' => '001/FT/X/2026',
            'tanggal' => '2026-10-05',
            'pengirim' => 'Fakultas Teknik',
            'perihal' => 'Undangan Rapat',
            'keterangan' => 'Undangan rapat koordinasi Fakultas Teknik',
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'nomor_surat' => '002/BAA/X/2026',
            'tanggal' => '2026-10-05',
            'pengirim' => 'BAA',
            'perihal' => 'Undangan Akademik',
            'keterangan' => 'Pemberitahuan kegiatan akademik',
            'created_at' => now(),
            'updated_at' => now(),
         ],
         [
            'nomor_surat' => '003/LPPM/X/2026',
            'tanggal' => '2026-04-05',
            'pengirim' => 'LPPM',
            'perihal' => 'Undangan Sosialisasi',
            'keterangan' => 'Undangan sosialisasi program penelitian',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
