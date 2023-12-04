<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            [
                'user_id' => 1,
                'name' => 'Pertanyaan Umum (General FAQs)',
                'slug' => 'pertanyaan-umum-(general-faqs)',
                'description' => 'Informasi dasar tentang perusahaan, visi, misi, dan sejarah singkat.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Produk atau Layanan',
                'slug' => 'produk-atau-layanan',
                'description' => 'FAQ terkait dengan produk atau layanan yang ditawarkan, fitur, dan manfaatnya.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Pemesanan dan Pembayaran',
                'slug' => 'pemesanan-dan-pembayaran',
                'description' => 'Informasi tentang cara memesan produk atau layanan, opsi pembayaran, dan kebijakan faktur.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Pengiriman dan Pengembalian',
                'slug' => 'pengiriman-dan-pengembalian',
                'description' => 'Pertanyaan tentang prosedur pengiriman, biaya pengiriman, dan kebijakan pengembalian barang.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Teknis dan Dukungan Produk',
                'slug' => 'teknis-dan-dukungan-produk',
                'description' => 'Panduan untuk menangani masalah teknis, dukungan produk, dan informasi perbaikan.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Akun dan Registrasi',
                'slug' => 'akun-dan-registrasi',
                'description' => 'Pertanyaan seputar pembuatan akun, manajemen akun, dan proses registrasi.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Kebijakan Privasi dan Keamanan',
                'slug' => 'kebijakan-privasi-dan-keamanan',
                'description' => 'FAQ yang menjelaskan kebijakan privasi, keamanan data, dan perlindungan informasi pelanggan.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Karir dan Rekrutmen',
                'slug' => 'karir-dan-rekrutmen',
                'description' => 'Informasi tentang peluang karir, proses rekrutmen, dan kebijakan sumber daya manusia',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Hubungi Kami',
                'slug' => 'hubungi-kami',
                'description' => 'Cara menghubungi perusahaan, termasuk alamat kantor, nomor telepon, dan formulir kontak online.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'user_id' => 1,
                'name' => 'Partnership dan Kerjasama Bisnis',
                'slug' => 'partnership-dan-kerjasama-bisnis',
                'description' => 'Pertanyaan terkait dengan peluang kerjasama bisnis, afiliasi, atau program mitra.',
                'image' => '',
                'icon' => 'coffee',
                'is_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        Topic::insert($topics);
    }
}
