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
                'name' => 'Pertanyaan Umum (General FAQs)',
                'slug' => 'pertanyaan-umum-(general-faqs)',
                'description' => 'Informasi dasar tentang perusahaan, visi, misi, dan sejarah singkat.',
                'image' => 'general.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Produk atau Layanan',
                'slug' => 'produk-atau-layanan',
                'description' => 'FAQ terkait dengan produk atau layanan yang ditawarkan, fitur, dan manfaatnya.',
                'image' => 'products.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Pemesanan dan Pembayaran',
                'slug' => 'pemesanan-dan-pembayaran',
                'description' => 'Informasi tentang cara memesan produk atau layanan, opsi pembayaran, dan kebijakan faktur.',
                'image' => 'booking.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Pengiriman dan Pengembalian',
                'slug' => 'pengiriman-dan-pengembalian',
                'description' => 'Pertanyaan tentang prosedur pengiriman, biaya pengiriman, dan kebijakan pengembalian barang.',
                'image' => 'delivery.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Teknis dan Dukungan Produk',
                'slug' => 'teknis-dan-dukungan-produk',
                'description' => 'Panduan untuk menangani masalah teknis, dukungan produk, dan informasi perbaikan.',
                'image' => 'product_support.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Akun dan Registrasi',
                'slug' => 'akun-dan-registrasi',
                'description' => 'Pertanyaan seputar pembuatan akun, manajemen akun, dan proses registrasi.',
                'image' => 'account.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Kebijakan Privasi dan Keamanan',
                'slug' => 'kebijakan-privasi-dan-keamanan',
                'description' => 'FAQ yang menjelaskan kebijakan privasi, keamanan data, dan perlindungan informasi pelanggan.',
                'image' => 'privacy.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Karir dan Rekrutmen',
                'slug' => 'karir-dan-rekrutmen',
                'description' => 'Informasi tentang peluang karir, proses rekrutmen, dan kebijakan sumber daya manusia',
                'image' => 'career.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Hubungi Kami',
                'slug' => 'hubungi-kami',
                'description' => 'Cara menghubungi perusahaan, termasuk alamat kantor, nomor telepon, dan formulir kontak online.',
                'image' => 'contactus.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'name' => 'Partnership dan Kerjasama Bisnis',
                'slug' => 'partnership-dan-kerjasama-bisnis',
                'description' => 'Pertanyaan terkait dengan peluang kerjasama bisnis, afiliasi, atau program mitra.',
                'image' => 'partnership.png',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        Topic::insert($topics);
    }
}
