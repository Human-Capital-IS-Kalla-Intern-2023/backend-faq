<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                "user_id" => 1,
                "question" => "Apa itu Kalla Group",
                "slug" => "apa-itu-kalla-group",
                "answer" => "KALLA sebagai Grup Perusahaan telah melalui perjalanan panjang dalam berkontribusi pada pembangunan dan ekonomi masyarakat khususnya di wilayah Timur Indonesia. Selama lebih dari 70 tahun, Kontribusi kami kini menjangkau berbagai sektor mulai dari bidang perdagangan, transportasi, infrastruktur, properti, manufaktur, energi hingga pendidikan. Sektor-sektor tersebut telah menopang pertumbuhan ekonomi Indonesia saat ini dan di masa mendatang.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa visi dari Kalla Group",
                "slug" => "apa-visi-dari-kalla-group",
                "answer" => "Menjadi kelompok bisnis terbaik di Indonesia dan panutan dalam pengelolaan usaha yang profesional dan berkelanjutan",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa misi Kalla Group",
                "slug" => "apa-misi-dari-dari-kalla-group",
                "answer" => "\"Mengembangkan Sumber Daya Manusia yang unggul, bisnis proses yang efektif dan efisien, dan juga pengelolaan keuangan yang profesional dan bersih. Terlibat aktif dalam mengembangkan perekonomian nasional dan meningkatkan kesejahteraan rakyat demi kemajuan bersama.\"",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa sejarah singkat Kalla Group",
                "slug" => "apa-sejarah-singkat-kalla-group",
                "answer" => "\"Berawal di tahun 1952 ketika kedua orang tua kami, Hadji Kalla dan Hajjah Athirah mulai merintis bidang usaha perdagangan tekstil dan hasil bumi di kabupaten Watampone, Sulawesi Selatan. ... Adapun bidang usaha inti meliputi otomotif, transportasi-logistik, properti, konstruksi, manufaktur dan energi. Sebagai wujud kepedulian dalam mendukung pembangunan di wilayah ini, KALLA sebagai grup perusahaan berkomitmen memunculkan terobosan-terobosan baru guna memberikan manfaat yang lebih besar kepada masyarakat luas di negara kita tercinta, Indonesia.\"",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa corporate culture Kalla Group",
                "slug" => "apa-corporate-culture-kalla-group",
                "answer" => "Kerja Ibadah, Apresiasi Pelanggan, Lebih Cepat, Lebih Baik, Aktif Bersama",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Dimana Lokasi Kampus Kalla Institute",
                "slug" => "dimana-lokasi-kampus-kalla-institute",
                "answer" => "Alamat kampus berada di Nipah Park Office Building Lantai 5&6, Jl. Urip Sumoharjo, Kota Makassar",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Dimana saja showroom Kalla Toyota",
                "slug" => "dimana-saja-showroom-kalla-toyota",
                "answer" => "\"Kalla Toyota tersebar di wilayah Sulsel, Sulbar, Sulteng, dan Sultra. ... Di wilayah Sulbar, Kalla Toyota hadir di Mamuju, dan Polmas. Di wilayah Sulteng, Kalla Toyota hadir di Palu, Poso, dan Luwuk. Di wilayah Sultra, Kalla Toyota hadir di Kendari, Kolaka, dan Bau-bau.\"",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana cara mendapatkan penawaran terbaik",
                "slug" => "bagaimana-cara-mendapatkan-penawaran-terbaik",
                "answer" => "Kalla Toyota senantiasa memberikan penawaran terbaik setiap bulannya. Informasi promo tersebut dapat pelanggan dapatkan dengan berkunjung ke website Kalla Toyota di kallatoyota.co.id atau sosial media Kalla Toyota di Instagram @KallaToyotaID, Twitter @KallaToyotaID dan Facebook KallaToyota.me. Dapat pula menghubungi hotline Kalla Care di nomor 04113000103.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa itu Kalla Friend",
                "slug" => "apa-itu-kalla-friend",
                "answer" => "Kalla Friend adalah fitur dari Kalla OTO untuk mereferensikan teman atau keluarga Anda sebelum membeli kendaraan di Kalla Toyota. Dengan referensi tersebut, Anda mendapatkan tambahan poin di Kalla OTO. Orang yang mendapatkan referensi Anda juga akan mendapatkan reward dari Kalla Toyota. Fitur ini dapat digunakan meskipun Anda bukan valid member dari aplikasi ini.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah fitur Merchant dan Redeem Point hanya berlaku di Makassar",
                "slug" => "apakah-fitur-merchant-dan-redeem-point-hanya-berlaku-di-makassar",
                "answer" => "Pengumpulan dan penukaran poin tidak terbatas di Kota Makassar saja. Anda bisa mendapatkan ataupun menukarkan poin pada Merchant meski Anda tidak tinggal di Makassar.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana cara mendaftar servis kendaraan tanpa harus mengantri di bengkel",
                "slug" => "bagaimana-cara-mendaftar-servis-kendaraan-tanpa-harus-mengantri-di-bengkel",
                "answer" => "Untuk melakukan service tanpa mengantri, kami menyediakan layanan booking service yang bisa diakses melalui layanan Kalla Care di nomor 08114414030, juga bisa melalui aplikasi KTOS (Kalla Service) yang tersedia di android.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Jika saya sibuk, apakah proses taksasi mobil saya dapat dilakukan dirumah atau kantor",
                "slug" => "jika-saya-sibuk,-apakah-proses-taksasi-mobil-saya-dapat-dirumah-atau-kantor",
                "answer" => "Bisa, pelanggan hanya perlu melakukan janji temu dengan Used Car Advisor yang telah tersebar di berbagai daerah cakupan Kalla Toyota.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah dapat membeli sparepart/aksesoris tanpa datang ke bengkel",
                "slug" => "apakah-dapat-membeli-sparepart-aksesoris-tanpa-datang-ke-bengkel",
                "answer" => "Bisa melalui aplikasi KTOS (Kalla Service) menyediakan layanan pembelian spare part / aksesoris.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Jika mobil mengalami masalah di jalan, adakah layanan servis yang bisa membantu",
                "slug" => "jika-mobil-mengalami-masalah-di-jalan,-adakah-layanan-servis-yang-bisa-membantu",
                "answer" => "Layanan Extra Care Kalla Toyota siap membantu pelanggan yang mengalami kendala pada kendaraannya baik di rumah maupun di jalan, silahkan langsung menghubungi nomor Kalla Care 08114414030. Tim Kalla Toyota terdekat akan langsung mendatangi pelanggan.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bisakah melakukan servis tanpa datang langsung ke bengkel",
                "slug" => "bisakah-melakukan-servis-tanpa-datang-langsung-ke-bengkel",
                "answer" => "Tentu saja bisa, Kalla Toyota menghadirkan layanan Toyota Home Service berupa service kunjugan, dan layanan pickup service (teknisi akan menjemput kendaraan pelanggan kemudian dibawa ke bengkel).",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana cara saya melacak status pengiriman pesanan saya",
                "slug" => "bagaimana-cara-saya-melacak-status-pengiriman-pesanan-saya",
                "answer" => "Anda dapat melacak status pengiriman pesanan Anda melalui halaman akun pelanggan atau dengan menggunakan nomor pelacakan yang diberikan melalui email konfirmasi pesanan. Jika ada masalah, hubungi layanan pelanggan kami.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Berapa lama waktu pengiriman yang diperlukan untuk pesanan saya sampai",
                "slug" => "berapa-lama-waktu-pengiriman-yang-diperlukan-untuk-pesanan-saya-sampai",
                "answer" => "Waktu pengiriman bervariasi tergantung lokasi pengiriman dan jenis layanan yang dipilih. Perkiraan waktu pengiriman dapat ditemukan selama proses check-out, dan kami akan memberikan pembaruan melalui email.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah tersedia opsi pengiriman ekspres",
                "slug" => "apakah-tersedia-opsi-pengiriman-ekspres",
                "answer" => "Ya, kami menyediakan opsi pengiriman ekspres untuk pesanan yang memerlukan pengiriman lebih cepat. Opsi ini biasanya memiliki biaya tambahan yang tercantum selama proses check-out.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana jika saya tidak berada di rumah saat pesanan tiba",
                "slug" => "bagaimana-jika-saya-tidak-berada-di-rumah-saat-pesanan-tiba",
                "answer" => "Jika Anda tidak berada di rumah, kurir mungkin meninggalkan pemberitahuan untuk penjadwalan ulang pengiriman atau instruksi tambahan. Beberapa kurir juga menyediakan opsi penyerahan kepada tetangga atau penjemputan di pusat pengiriman terdekat.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah produk saya akan dijamin keamanannya selama pengiriman",
                "slug" => "apakah-produk-saya-akan-dijamin-keamanannya-selama-pengiriman",
                "answer" => "Ya, kami mengambil langkah-langkah untuk memastikan keamanan produk selama pengiriman. Jika Anda menerima produk yang rusak, harap segera hubungi layanan pelanggan kami dengan menyertakan foto produk yang rusak.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana proses dalam membeli mobil di Kalla Toyota",
                "slug" => "bagaimana-proses-dalam-membeli-mobil-di-kalla-toyota",
                "answer" => "Caranya cukup mudah, pelanggan cukup datang langsung ke showroom Kalla Toyota yang tersebar di wilayah Sulsel, Sulbar, Sulteng, dan Sultra. Pelanggan dapat memilih unit Toyota unggulan.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Dimana jadwal servis berkala dapat diketahui",
                "slug" => "dimana-jadwal-servis-berkala-dapat-diketahui",
                "answer" => "Setiap selesai melakukan servis berkala, service advisor akan menginformasikan jadwal servis berikutnya kepada pelanggan. Selain itu gantungan oli yang diberikan oleh tim bengkel juga sudah dicantumkan tanggal servis berikutnya. Setiap bulan tim bengkel Kalla Toyota juga akan mengundang atau menginformasikan pelanggan jika sudah memasuki waktu servis berkala.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Dimana kritik dan saran bisa dimasukkan jika ada pelayanan yang kurang memuaskan",
                "slug" => "dimana-kritik-dan-saran-bisa-dimasukkan-jika-ada-pelayanan-yang-kurang-memuaskan",
                "answer" => "Setiap selesai melakukan servis, Kalla Toyota akan melakukan follow up. Tiga hari setelahnya, pelanggan dapat menyampaikan kritik dan saran langsung ke bengkel. Akan ada Customer Relation Person (CRP) yang akan membatu menyelesaikan keluhan pelanggan.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bisakah saya memberikan poin Kallafriends pada teman atau keluarga saya yang menggunakan aplikasi Kallafriends",
                "slug" => "bisakah-saya-memberikan-poin-kallafriends-pada-teman-atau-keluarga-saya-yang-menggunakan-aplikasi-kallafriends",
                "answer" => "Anda tidak dapat melakukan transfer poin dari satu akun Kallafriends ke akun yang lain. Meski demikian, Anda dapat memindahkan akun Kallafriends Anda ke smartphone lain untuk menggunakan fitur-fiturnya, termasuk untuk mendapatkan dan menukarkan poin. Harap diingat, satu akun Kallafriends tidak dapat digunakan di dua smartphone sekaligus.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Saya tidak bisa menukarkan poin Kallafriends saya. Apa yang harus saya lakukan",
                "slug" => "saya-tidak-bisa-menukarkan-poin-kallafriends-saya.-Apa-yang-harus-saya-lakukan",
                "answer" => "Anda dapat menghubungi Layanan Customer Care 24 Jam Kalla Toyota di 08114414030 atau mendatangi kantor kami di Jl. Dr. Sam Ratulangi No. 8-10, Kec. Mariso, Makassar. Anda juga dapat mengirim e-mail ke customercare@hkalla.co.id atau mengisi formulir Customer Service di sini.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa membuat akun di situs web perusahaan ini",
                "slug" => "bagaimana-saya-bisa-membuat-akun-di-situs-web-perusahaan-ini",
                "answer" => "Untuk membuat akun, klik tombol \"Daftar\" di sudut kanan atas halaman beranda kami. Isi formulir pendaftaran dengan informasi yang diperlukan, lalu ikuti langkah-langkah selanjutnya untuk menyelesaikan proses pendaftaran.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana cara mengelola atau memperbarui informasi di akun saya",
                "slug" => "bagaimana-cara-mengelola-atau-memperbarui-informasi-di-akun-saya",
                "answer" => "Untuk mengelola atau memperbarui informasi akun, masuk ke akun Anda dan kunjungi halaman \"Pengaturan Akun\". Di sana, Anda dapat mengubah informasi pribadi, alamat, dan preferensi lainnya.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa yang harus saya lakukan jika lupa kata sandi akun saya",
                "slug" => "apa-yang-harus saya-lakukan-jika-lupa-kata-sandi-akun-saya",
                "answer" => "Jika Anda lupa kata sandi akun, kunjungi halaman masuk dan klik opsi \"Lupa Kata Sandi\". Ikuti petunjuk untuk mereset kata sandi Anda melalui email atau nomor telepon yang terdaftar.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana proses registrasi untuk mendapatkan akses ke [fitur/layanan tertentu]",
                "slug" => "bagaimana-proses-registrasi-untuk-mendapatkan-akses-ke-[fitur/layanan-tertentu]",
                "answer" => "Untuk mendaftar dan mendapatkan akses ke [fitur/layanan tertentu], kunjungi halaman [fitur/layanan tersebut] dan ikuti petunjuk pendaftaran. Pastikan Anda telah membuat akun sebelumnya atau daftar jika Anda belum memiliki akun.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah saya bisa memiliki lebih dari satu akun dengan satu alamat email",
                "slug" => "apakah-saya-bisa-memiliki-lebih-dari-satu-akun-dengan-satu-alamat-email",
                "answer" => "Saat ini, kami hanya mendukung satu akun per alamat email. Jika Anda memiliki pertanyaan lebih lanjut atau membutuhkan bantuan, silakan hubungi tim dukungan kami di dukungan@perusahaan.com.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana perusahaan melindungi informasi pribadi saya",
                "slug" => "bagaimana-perusahaan-melindungi-informasi-pribadi-saya",
                "answer" => "Kami mengambil serius keamanan informasi pribadi Anda. Kami menerapkan langkah-langkah keamanan teknis dan organisasional, termasuk enkripsi data dan akses terbatas, untuk melindungi informasi pribadi Anda dari akses yang tidak sah.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa jenis informasi pribadi yang perusahaan kumpulkan",
                "slug" => "apa-jenis-informasi-pribadi-yang-perusahaan-kumpulkan",
                "answer" => "Kami hanya mengumpulkan informasi pribadi yang diperlukan untuk memberikan layanan atau produk kepada Anda. Ini mungkin termasuk nama, alamat email, alamat fisik, dan informasi pembayaran. Kami tidak mengumpulkan informasi pribadi tanpa persetujuan Anda.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah perusahaan membagikan informasi pelanggan dengan pihak ketiga",
                "slug" => "apakah-perusahaan-membagikan-informasi-pelanggan-dengan-pihak-ketiga",
                "answer" => "Kami tidak menjual atau membagikan informasi pribadi pelanggan kepada pihak ketiga tanpa izin. Informasi Anda hanya digunakan untuk tujuan internal, seperti pemenuhan pesanan, layanan pelanggan, dan peningkatan produk.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa mengakses atau memperbarui informasi pribadi saya",
                "slug" => "bagaimana-saya-bisa-mengakses-atau-memperbarui-informasi-pribadi-saya",
                "answer" => "Anda dapat mengakses dan memperbarui informasi pribadi Anda dengan masuk ke akun Anda di situs web kami. Jika Anda memerlukan bantuan lebih lanjut, hubungi tim layanan pelanggan kami di layananpelanggan@perusahaan.com.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa kebijakan perusahaan terkait retensi data pelanggan",
                "slug" => "apa-kebijakan-perusahaan-terkait-retensi-data-pelanggan",
                "answer" => "Kami menyimpan informasi pribadi pelanggan selama yang diperlukan untuk memenuhi tujuan pengumpulan data awal atau sesuai dengan persyaratan hukum. Setelah periode retensi berakhir, data pribadi dihapus atau dihapus dengan aman dari sistem kami. Untuk informasi lebih lanjut, baca Kebijakan Privasi kami di sini.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa melamar pekerjaan di perusahaan ini",
                "slug" => "bagaimana-saya-bisa-melamar-pekerjaan-di-perusahaan-ini",
                "answer" => "Untuk melamar pekerjaan di perusahaan kami, silakan kunjungi halaman Karir di situs web kami. Di sana, Anda dapat menemukan daftar pekerjaan terbuka dan mengirimkan aplikasi Anda secara online.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah perusahaan ini menyediakan program magang atau pelatihan profesional",
                "slug" => "apakah-perusahaan-ini-menyediakan-program-magang-atau-pelatihan-profesional",
                "answer" => "Ya, kami menyediakan program magang dan pelatihan profesional. Informasi lebih lanjut tentang program ini dapat ditemukan di halaman Program Magang dan Pelatihan Profesional.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa langkah-langkah dalam proses rekrutmen di perusahaan ini",
                "slug" => "apa-langkah-langkah-dalam-proses-rekrutmen-di-perusahaan-ini",
                "answer" => "Proses rekrutmen kami melibatkan tahap seleksi berdasarkan kualifikasi, wawancara, dan asesmen. Untuk detail lebih lanjut tentang proses rekrutmen, silakan kunjungi halaman Proses Rekrutmen.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah perusahaan ini memiliki kebijakan diversitas dan inklusi",
                "slug" => "apakah-perusahaan-ini-memiliki-kebijakan-diversitas-dan-inklusi",
                "answer" => "Ya, kami memegang teguh kebijakan diversitas dan inklusi. Kami berkomitmen untuk menciptakan lingkungan kerja yang adil dan inklusif bagi semua karyawan. Baca lebih lanjut tentang kebijakan kami di halaman Diversitas dan Inklusi.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa mendapatkan informasi tentang tunjangan dan kebijakan sumber daya manusia lainnya",
                "slug" => "bagaimana-saya-bisa-mendapatkan-informasi-tentang-tunjangan-dan-kebijakan-sumber-daya manusia-lainnya",
                "answer" => "Informasi lengkap tentang tunjangan, kebijakan sumber daya manusia, dan manfaat lainnya dapat ditemukan di halaman Sumber Daya Manusia di situs web kami. Jika Anda memiliki pertanyaan lebih lanjut, hubungi departemen sumber daya manusia kami melalui hr@perusahaan.com.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa menghubungi layanan pelanggan perusahaan",
                "slug" => "bagaimana-saya-bisa-menghubungi-layanan-pelanggan-perusahaan",
                "answer" => "Untuk menghubungi layanan pelanggan kami, Anda dapat mengirim email ke layananpelanggan@perusahaan.com atau menghubungi nomor layanan pelanggan kami di 123-456-7890. Tim kami siap membantu Anda dengan pertanyaan atau masalah apa pun yang mungkin Anda miliki.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah perusahaan ini memiliki nomor telepon darurat untuk keadaan mendesak",
                "slug" => "apakah-perusahaan-ini-memiliki-nomor-telepon-darurat-untuk-keadaan-mendesak",
                "answer" => "Ya, kami memiliki nomor telepon darurat 24/7 yang dapat dihubungi dalam keadaan mendesak. Nomor telepon darurat tersebut adalah 987-654-3210.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa mengirim pertanyaan atau umpan balik melalui formulir kontak online",
                "slug" => "bagaimana-saya-bisa-mengirim-pertanyaan-atau-umpan-balik-melalui-formulir-kontak-online",
                "answer" => "Untuk mengirim pertanyaan atau umpan balik melalui formulir kontak online, kunjungi halaman Hubungi Kami di situs web kami. Isi formulir dengan informasi yang relevan dan kami akan segera merespons.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah ada opsi kontak lain selain email dan telepon",
                "slug" => "apakah-ada-opsi-kontak-lain-selain-email-dan-telepon",
                "answer" => "Selain email dan telepon, Anda juga dapat menghubungi kami melalui media sosial kami. Kami aktif di platform seperti Twitter, Facebook, dan LinkedIn. Temukan tautan ke akun media sosial kami di bagian bawah situs web kami atau kunjungi halaman Media Sosial Kami.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah perusahaan menyediakan program afiliasi",
                "slug" => "apakah-perusahaan-menyediakan-program-afiliasi",
                "answer" => "Ya, kami menawarkan program afiliasi yang memungkinkan mitra untuk mendapatkan komisi dengan memasarkan dan menjual produk atau layanan kami. Untuk informasi lebih lanjut dan cara bergabung, kunjungi halaman Program Afiliasi kami di sini.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Bagaimana saya bisa menjadi mitra bisnis perusahaan ini",
                "slug" => "bagaimana-saya-bisa-menjadi-mitra-bisnis-perusahaan-ini",
                "answer" => "Untuk menjadi mitra bisnis kami, silakan isi formulir aplikasi mitra di sini. Tim kami akan meninjau aplikasi Anda dan menghubungi Anda segera setelahnya untuk membahas lebih lanjut tentang peluang kerjasama.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah ada insentif khusus untuk mitra yang sukses",
                "slug" => "apakah-ada-insentif-khusus-untuk-mitra-yang-sukses",
                "answer" => "Ya, kami memberikan insentif khusus dan bonus kepada mitra yang mencapai tingkat kinerja tertentu. Ini termasuk peningkatan komisi, peluang promosi khusus, dan dukungan pemasaran tambahan. Detail lebih lanjut dapat ditemukan dalam panduan mitra kami.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apakah perusahaan ini mendukung kemitraan B2B",
                "slug" => "apakah-perusahaan-ini-mendukung-kemitraan-b2b",
                "answer" => "Ya, kami sangat mendukung kemitraan B2B. Jika Anda memiliki proposal kemitraan atau ingin menjelajahi cara kerjasama yang lebih mendalam, silakan hubungi tim kemitraan bisnis kami di email@perusahaan.com.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                "user_id" => 1,
                "question" => "Apa manfaat bergabung dengan program mitra perusahaan ini",
                "slug" => "apa-manfaat-bergabung-dengan-program-mitra-perusahaan-ini",
                "answer" => "Bergabung dengan program mitra kami memberikan akses kepada mitra untuk mendapatkan pendapatan tambahan, dukungan pemasaran, dan akses ke sumber daya khusus. Kami menyediakan alat pemasaran yang mudah digunakan, pelatihan mendalam, dan dukungan pelanggan yang andal untuk memastikan kesuksesan mitra dalam mengembangkan bisnis mereka bersama kami.",
                "is_status" => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];

        Question::insert($questions);
    }
}
