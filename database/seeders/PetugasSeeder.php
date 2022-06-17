<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Anggraeni'],
			['nama' => 'Anjar Winarko'],
			['nama' => 'Aprilia Pustaka Rini'],
			['nama' => 'Aulia Caesar Nugrahaeni'],
			['nama' => 'Bondan Peksojandhu'],
			['nama' => 'Dasih Widayati'],
			['nama' => 'Diah Rosanita Wijayanti'],
            ['nama' => 'Dian Marharaeni'],
            ['nama' => 'Endang Budiningsih'],
            ['nama' => 'Endang Susilowarti'],
            ['nama' => 'Endang Wahyuningsih'],
			['nama' => 'Farid E Susanta'],
			['nama' => 'Galih Nugroho Jati'],
			['nama' => 'Henry Prabowo'],
			['nama' => 'Hersyintia Nurhida Sari'],
			['nama' => 'Ika Pawestri Haris Sakunta'],
			['nama' => 'Jarot Wahyu'],
            ['nama' => 'Jati Wiyono Wahyu Kusnendar'],
            ['nama' => 'Kristanto Setiawan'],
            ['nama' => 'Marhaeni Sekar Fajar P'],
			['nama' => 'Nabila Adnani'],
			['nama' => 'Nur Haifani Khansaq Jauhari'],
			['nama' => 'Prima  Andhikawati'],
			['nama' => 'Purwanto'],
			['nama' => 'Purwantoro  Agung Sulistiyo'],
			['nama' => 'Rana Agni Bukit'],
            ['nama' => 'Reni Ana Rohmawati'],
            ['nama' => 'Rini Rahma Hasnawati'],
            ['nama' => 'Sati Purnaningsih'],
			['nama' => 'Siti Rahmah'],
			['nama' => 'Sri Akhadiyanti'],
			['nama' => 'Sri Rahayu Prakarsawati'],
			['nama' => 'Stefani Seravina Venti M'],
			['nama' => 'Sundari'],
			['nama' => 'Syaiful Yusron Alkatiri'],
            ['nama' => 'Tri Handaka'],
            ['nama' => 'Trian Yuniarsah'],  
            ['nama' => 'Wahyuning Astuti']         
        ];
        Petugas::insert($data);
    }
}
