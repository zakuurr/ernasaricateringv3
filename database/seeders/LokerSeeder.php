<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loker')->insert([
        	'judul' => 'Lowongan Pekerjaan Ernasari',
        	'posisi_pekerjaan' => 'Content Creator',
        	'link_job' => null,
        	'deskripsi' => 'JOB DESCRIPTION

            Membuat content video di tiktok
            Membuat content graphic di marketplace & social media
            Live selling (tiktok, shopee, IG)
            Planning tema dan schedulling jadwal tayang content
            Membuat tiktok content weekly
            Report tentang hasil content yg sudah dibuat (judul, viewers, comment)
            JOB QUALIFICATION

            Memiliki akun tiktok pribadi yang aktif (ada contentnya)
            S1 jurusan apapun (jurusan multimedia, ilmu komunikasi, atau dkv lebih disukai)
            Fasih dalam mengoperasikan sosial media (ig, tiktok)
            Usia maks 25th
            Bisa mengoperasikan canva
            Bisa mengoperasikan capcut (video editor)
            Bisa mengoperasikan tiktok
            Bisa mengoperasikan microsoft office (word, excel, ppt), email
            CV harus mencantumkan akun tiktok pribadi (dan tidak diprivate)',

            'foto' => '202208170649.png',
            'status' => 0,
        ]);
    }
}
