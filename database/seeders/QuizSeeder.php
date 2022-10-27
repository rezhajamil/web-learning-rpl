<?php

namespace Database\Seeders;

use App\Models\QuizSession;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuizSession::create([
            'nama' => 'PRETEST PEMROGRAMAN WEB KELAS XI RPL 1',
            'soal' => json_encode([
                'Didalam penggunaan tabel terdapat atribut colspan yang berfungsi untuk…',
                'Untuk membuat paragraf menggunakan tag?',
                'HTML Merupakan singkatan dari…',
                'Untuk membuat baris baru menggunakan tag?',
                'Karakter yang digunakan untuk tag akhir?',
                'Untuk membuat tabel menggunakan tag?',
                'Saat membuat tabel tag <tr> berfungsi untuk?',
                'Fungsi dari cellpading adalah...',
                'Fungsi dari tag <td> dan <tr> adalah…',
                'Fungsi dari tag <th> adalah...',
            ]),
            'opsi' => json_encode([
                'Menggabungkan beberapa cell baris',
                'Menggabungkan beberapa cell kolom',
                'Memisahkan beberapa cell baris',
                'Memisahkan beberapa cell kolom',
                '<p>',
                '<paragraf>',
                '<i>',
                '<italic>',
                'Hyper Text Markup Laguage',
                'Hyper Tool Markup Laguage',
                'Hyper Test Markup Laguage',
                'Hyper Link Markup Leaguage',
                '<newline>',
                '<break>',
                '<br>',
                '<hr>',
                '<>',
                '*',
                '/',
                '\\',
                '<tables>',
                '<tb>',
                '<tab>',
                '<table>',
                'Membuat kolom',
                'Membuat baris',
                'Membuat body tabel',
                'Membuat header tabel',
                'Mengatur baris',
                'Mengatur antar paragraf',
                'Mengatur jarak',
                'Mengatur warna',
                '<td> membuat sel, <tr> membuat sel',
                '<td> membuat kolom, <tr> membuat baris',
                '<td> membuat baris, <tr> membuat kolom',
                '<td> membuat kolom, <tr> membuat kolom',
                'Membuat judul pada header',
                'Membuat judul pada web browser',
                'Membuat kolom',
                'Membuat baris',
            ]),
            'jawaban' => json_encode([
                'A',
                'A',
                'A',
                'C',
                'C',
                'D',
                'B',
                'C',
                'B',
                'A',
            ]),
        ]);
    }
}
