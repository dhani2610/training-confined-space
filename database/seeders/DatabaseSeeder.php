<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Statistic;
use App\Models\HeroSlide;
use App\Models\Program;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Services\ConfinedSpaceSchemeService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Super Admin User
        User::firstOrCreate(
            ['email' => 'admin@confinedspace.com'],
            [
                'name' => 'Super Administrator Training Confined Space',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings (Includes the 4 official WhatsApp numbers requested by client)
        $settings = [
            'site_name' => 'Training Confined Space',
            'site_tagline' => 'Pusat Pembinaan & Sertifikasi K3 Ruang Terbatas Berlisensi Kemnaker RI & BNSP',
            'company_name' => 'Lembaga Pelatihan K3 Confined Space Indonesia',
            'license_info' => 'Sertifikasi Resmi Kemnaker RI & BNSP Sesuai Kepdirjen Binwasnaker No. Kep. 113/DJPPK/IX/2006',
            'whatsapp' => '081399810272', // Main WA
            'whatsapp_detail_1' => '08118500177',
            'whatsapp_detail_2' => '081399810272',
            'whatsapp_detail_3' => '087894580806',
            'whatsapp_detail_4' => '087894580649',
            'email' => 'kontak@trainingconfinedspace.com',
            'email_secondary' => 'sekretariat.confinedspace@gmail.com',
            'phone' => '081399810272',
            'address' => 'Gedung K3 Safety Center, Jl. Jend. Sudirman Kav. 52-53, Kawasan Industri & Bisnis Jakarta',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28298835848!2d106.759478!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e498c0a531%3A0x7d87f7b2c0e86b0a!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
            'office_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB | Hotline Darurat: 24 Jam',
            'hero_title' => 'Pusat Training K3 Ruang Terbatas (Confined Space) & Sertifikasi Kemnaker RI',
            'hero_description' => 'Mewujudkan tenaga kerja industri yang kompeten, tanggap darurat, dan berstandar keselamatan tinggi dalam memasuki dan bekerja di ruang terbatas di seluruh Indonesia.',
            'about_history' => 'Lembaga Training Confined Space Indonesia didirikan dengan dedikasi penuh untuk menekan angka kecelakaan kerja fatal di ruang terbatas industri. Mengacu pada Kepdirjen Binwasnaker No. Kep. 113/DJPPK/IX/2006 dan standar internasional OSHA 29 CFR 1910.146, kami telah melatih dan melisensikan lebih dari 12.500 teknisi, petugas jaga, supervisor, dan personel penyelamat rescue di berbagai sektor migas, petrokimia, kelapa sawit, utilitas PDAM, konstruksi, dan galangan kapal.',
            'about_vision' => 'Menjadi pusat keunggulan pelatihan dan sertifikasi K3 Ruang Terbatas (Confined Space) terdepan, terpercaya, dan bereputasi global di Indonesia dengan komitmen Zero Accident.',
            'about_mission' => "1. Menyelenggarakan program pembinaan K3 Ruang Terbatas Muda, Madya, Utama, dan Rescue berstandar Kemnaker RI dan BNSP.\n2. Menyediakan fasilitas praktikum simulator tangki confined space modern, detektor gas mutakhir, dan peralatan rescue vertical berstandar internasional.\n3. Membentuk budaya keselamatan kerja yang mengedepankan kepatuhan sistem Izin Masuk (Entry Permit) dan pemakaian APD respiratorik SCBA.\n4. Membangun kemitraan strategis dengan sektor industri untuk menjamin keselamatan seluruh tenaga kerja di ruang terbatas se-Indonesia.",
            'floating_wa_text' => 'Halo Admin, saya ingin konsultasi mengenai jadwal dan pendaftaran Training Confined Space (K3 Ruang Terbatas).',
        ];

        foreach ($settings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val, 'group' => 'general']);
        }

        // 3. Statistics (Editable in Admin Panel)
        $statistics = [
            [
                'key' => 'peserta_tersertifikasi',
                'label' => 'Peserta Tersertifikasi',
                'value' => '12.500',
                'unit' => '+',
                'icon' => 'bi-people-fill',
                'description' => 'Alumni teknisi Muda, Madya, Utama, dan Rescue dari 500+ perusahaan industri di Indonesia.',
                'sort_order' => 1,
            ],
            [
                'key' => 'perusahaan_mitra',
                'label' => 'Perusahaan Mitra & Klien',
                'value' => '540',
                'unit' => '+',
                'icon' => 'bi-building-check',
                'description' => 'BUMN Karya, Kontraktor Migas, Petrokimia, Pabrik Kelapa Sawit, & Industri Makanan.',
                'sort_order' => 2,
            ],
            [
                'key' => 'tingkat_kelulusan',
                'label' => 'Tingkat Kelulusan Uji',
                'value' => '99.4',
                'unit' => '%',
                'icon' => 'bi-patch-check-fill',
                'description' => 'Tingkat kelulusan ujian teori dan praktik lapangan Kemnaker RI & BNSP.',
                'sort_order' => 3,
            ],
            [
                'key' => 'jangkauan_provinsi',
                'label' => 'Jangkauan Wilayah TUK',
                'value' => '38',
                'unit' => 'Provinsi',
                'icon' => 'bi-geo-alt-fill',
                'description' => 'Layanan in-house training dan uji kompetensi di seluruh kota dan kabupaten se-Indonesia.',
                'sort_order' => 4,
            ]
        ];

        Statistic::truncate();
        foreach ($statistics as $stat) {
            Statistic::create($stat);
        }

        // 4. Hero Slides
        $slides = [
            [
                'title' => 'Training Confined Space (K3 Ruang Terbatas) Bersertifikat Kemnaker RI & BNSP',
                'subtitle' => 'Pembinaan komprehensif keselamatan masuk dan bekerja di tangki, bejana tekan, gorong-gorong, dan silo industri.',
                'badge' => 'Standar Keselamatan Kerja Nasional',
                'cta_text' => 'Lihat Program Pelatihan',
                'cta_link' => '#program',
                'cta2_text' => 'Konsultasi WhatsApp',
                'cta2_link' => 'https://api.whatsapp.com/send?phone=6281399810272',
                'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1600&auto=format&fit=crop&q=80',
                'sort_order' => 1,
            ],
            [
                'title' => 'Kuasai Deteksi Gas, Pemakaian SCBA 300 Bar, & Sistem Izin Kerja Masuk',
                'subtitle' => 'Melatih teknisi entrant, attendant, dan supervisor dengan simulator ruang sempit berstandar internasional.',
                'badge' => 'Simulator Praktik Nyata',
                'cta_text' => 'Jelajahi Wilayah Pelatihan',
                'cta_link' => '#wilayah',
                'cta2_text' => 'Hubungi Hotline',
                'cta2_link' => '/kontak',
                'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=1600&auto=format&fit=crop&q=80',
                'sort_order' => 2,
            ],
            [
                'title' => 'Spesialisasi Tim Penyelamat Rescue Confined Space Berisiko Tinggi',
                'subtitle' => 'Teknik vertical rescue, tali rigging 4:1 mechanical advantage, dan evakuasi korban lewati manhole sempit.',
                'badge' => 'Emergency Response Team',
                'cta_text' => 'Skema Rescue',
                'cta_link' => '/program/training-rescue-confined-space',
                'cta2_text' => 'Daftar In-House Training',
                'cta2_link' => 'https://api.whatsapp.com/send?phone=6281399810272',
                'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb18615f3?w=1600&auto=format&fit=crop&q=80',
                'sort_order' => 3,
            ]
        ];

        HeroSlide::truncate();
        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }

        // 5. Programs (The 4 Official Confined Space Programs)
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Article::truncate();
        Program::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $masterPrograms = ConfinedSpaceSchemeService::getMasterPrograms();
        $fillable = (new Program)->getFillable();
        foreach ($masterPrograms as $prog) {
            $data = array_intersect_key($prog, array_flip($fillable));
            Program::create($data);
        }

        // 6. Testimonials
        $testimonials = [
            [
                'name' => 'Ir. Eko Prasetyo, S.T., M.Eng',
                'role' => 'HSE Superintendent Kilang Pengolahan Minyak',
                'company' => 'PT Pertamina Kilang Internasional',
                'content' => 'Pelatihan Confined Space Tingkat Utama di lembaga ini sangat komprehensif. Materi otorisasi Entry Permit, pengujian gas bertingkat, dan isolasi LOTO diajarkan secara ketat sesuai kondisi nyata di kilang minyak.',
                'rating' => 5,
                'program_name' => 'Training Confined Space (K3 Ruang Terbatas) Utama',
                'sort_order' => 1,
            ],
            [
                'name' => 'Budi Santoso, S.Tr.T.',
                'role' => 'Koordinator Emergency Response Team (ERT)',
                'company' => 'PT Semen Indonesia (Persero) Tbk',
                'content' => 'Praktik simulasi evakuasi rescue di manhole vertikal dengan Sked Stretcher dan SCBA benar-benar menguji mental dan keterampilan tim kami. Instruktur sangat kompeten dan bersertifikasi internasional.',
                'rating' => 5,
                'program_name' => 'Training Penyelamat (Rescue) Confined Space',
                'sort_order' => 2,
            ],
            [
                'name' => 'Hendra Setiawan',
                'role' => 'Teknisi Pemeliharaan Tangki & Bejana Tekan',
                'company' => 'PT Chandra Asri Petrochemical Tbk',
                'content' => 'Sebagai teknisi entrant, pelatihan tingkat Muda memberikan pemahaman krusial mengenai bahaya laten gas H2S dan asfiksia. Sekarang saya dan tim merasa jauh lebih aman dan percaya diri saat bekerja di dalam tangki.',
                'rating' => 5,
                'program_name' => 'Training Confined Space (K3 Ruang Terbatas) Muda',
                'sort_order' => 3,
            ],
            [
                'name' => 'Rina Wijayanti, S.Si',
                'role' => 'Safety Officer Instalasi Pengolahan Air Limbah',
                'company' => 'PT Kawasan Industri Jababeka Tbk',
                'content' => 'Tugas sebagai Petugas Jaga Madya (Attendant) ternyata sangat menentukan keselamatan rekan di dalam. Pelatihan ini melatih kedisiplinan pencatatan logbook, komunikasi isyarat, dan pengoperasian winch retrieval darurat.',
                'rating' => 5,
                'program_name' => 'Training Confined Space (K3 Ruang Terbatas) Madya',
                'sort_order' => 4,
            ]
        ];

        Testimonial::truncate();
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 7. FAQs
        $faqs = [
            [
                'question' => 'Apa itu Training Confined Space (K3 Ruang Terbatas) dan siapa yang wajib mengikutinya?',
                'answer' => 'Training Confined Space adalah program pelatihan dan pembinaan keselamatan kerja bagi personel yang bertugas memasuki, menjaga, mengawasi, atau menyelamatkan pekerja di dalam ruangan terbatas seperti tangki, bejana tekan, silo, gorong-gorong, manhole, dan palka kapal. Pelatihan ini wajib diikuti oleh teknisi pabrik, operator tangki, petugas K3 industri, supervisor lapangan, serta anggota tim tanggap darurat (ERT).',
                'category' => 'Umum',
                'sort_order' => 1,
            ],
            [
                'question' => 'Apa perbedaan antara Confined Space Muda, Madya, Utama, dan Rescue?',
                'answer' => 'Tingkat Muda diperuntukkan bagi pekerja yang bertugas masuk ke dalam ruang terbatas (Entrant); Tingkat Madya untuk petugas jaga yang berjaga di luar pintu masuk (Standby Person / Attendant); Tingkat Utama untuk pengawas atau supervisor yang berwenang mengesahkan Izin Masuk (Entry Supervisor); sedangkan Tingkat Rescue difokuskan khusus pada tim penyelamat darurat untuk teknik evakuasi korban di ruang sempit menggunakan tali dan tandu khusus.',
                'category' => 'Program',
                'sort_order' => 2,
            ],
            [
                'question' => 'Sertifikat apa yang akan didapatkan peserta setelah lulus pelatihan?',
                'answer' => 'Peserta yang dinyatakan kompeten akan memperoleh Sertifikat Kompetensi K3 Ruang Terbatas resmi dari Kementerian Ketenagakerjaan Republik Indonesia (Kemnaker RI) / Badan Nasional Sertifikasi Profesi (BNSP), Surat Keputusan Penunjukan (SKP) Lisensi K3, serta Kartu Lisensi K3 resmi yang terdaftar secara nasional.',
                'category' => 'Sertifikasi',
                'sort_order' => 3,
            ],
            [
                'question' => 'Apakah pelatihan ini bisa diselenggarakan secara In-House di lokasi pabrik / perusahaan kami?',
                'answer' => 'Ya, kami melayani penyelenggaraan In-House Training langsung di fasilitas perusahaan Anda di seluruh wilayah Indonesia (38 Provinsi), lengkap dengan pengujian langsung pada confined space eksisting pabrik Anda dan pendampingan penyusunan SOP lokal.',
                'category' => 'Pendaftaran',
                'sort_order' => 4,
            ],
            [
                'question' => 'Bagaimana cara mendaftar dan nomor kontak resmi mana yang dapat dihubungi?',
                'answer' => 'Anda dapat mendaftar langsung secara online melalui portal ini atau menghubungi tim sekretariat kami melalui 4 nomor WhatsApp resmi: 08118500177, 081399810272, 087894580806, atau 087894580649.',
                'category' => 'Kontak',
                'sort_order' => 5,
            ]
        ];

        Faq::truncate();
        foreach ($faqs as $f) {
            Faq::create($f);
        }

        // 8. Initial 3 Featured Articles (6000-9000 words each for Homepage 3-Card Display)
        $prog1 = Program::where('slug', 'training-confined-space-muda')->first();
        $prog2 = Program::where('slug', 'training-confined-space-madya')->first();
        $prog3 = Program::where('slug', 'training-confined-space-utama')->first();

        $sampleArticles = [
            [
                'title' => 'Training Confined Space Prosedur Keselamatan Kerja Masuk Tangki dan Bejana Tekan Industri di DKI Jakarta',
                'slug' => 'training-confined-space-keselamatan-tangki-bejana-tekan-dki-jakarta',
                'category' => 'K3 Ruang Terbatas Muda',
                'province' => 'DKI Jakarta',
                'province_slug' => 'dki-jakarta',
                'city' => 'Kota Jakarta Pusat',
                'city_slug' => 'kota-jakarta-pusat',
                'district' => 'Kemayoran',
                'district_slug' => 'kemayoran',
                'program_id' => $prog1 ? $prog1->id : null,
                'excerpt' => 'Kajian komprehensif standar masuk ruang terbatas, pengoperasian gas detector 4 gas, batas ambang LEL, prosedur isolasi energi LOTO, dan pemakaian SCBA 300 bar di DKI Jakarta.',
                'content' => ConfinedSpaceSchemeService::generate6000WordContent(
                    'Training Confined Space Prosedur Keselamatan Kerja Masuk Tangki dan Bejana Tekan Industri di DKI Jakarta',
                    'DKI Jakarta',
                    $prog1 ? $prog1->toArray() : ConfinedSpaceSchemeService::getMasterPrograms()[0]
                ),
                'author' => 'Tim Dewan Instruktur Ahli K3 Ruang Terbatas',
                'read_time' => 35,
                'views_count' => 1480,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Training Confined Space Pengawasan Petugas Jaga Standby Person Attendant di Jawa Barat',
                'slug' => 'training-confined-space-pengawasan-petugas-jaga-attendant-jawa-barat',
                'category' => 'K3 Ruang Terbatas Madya',
                'province' => 'Jawa Barat',
                'province_slug' => 'jawa-barat',
                'city' => 'Kota Bandung',
                'city_slug' => 'kota-bandung',
                'district' => 'Batununggal',
                'district_slug' => 'batununggal',
                'program_id' => $prog2 ? $prog2->id : null,
                'excerpt' => 'Tata kelola verifikasi Entry Permit, pengendalian logsheet pekerja, pemantauan kualitas udara berkelanjutan, dan komando evakuasi darurat tanpa masuk di Jawa Barat.',
                'content' => ConfinedSpaceSchemeService::generate6000WordContent(
                    'Training Confined Space Pengawasan Petugas Jaga Standby Person Attendant di Jawa Barat',
                    'Jawa Barat',
                    $prog2 ? $prog2->toArray() : ConfinedSpaceSchemeService::getMasterPrograms()[1]
                ),
                'author' => 'Instruktur Utama K3 Ruang Terbatas Kemnaker RI',
                'read_time' => 38,
                'views_count' => 1250,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Training Confined Space Otorisasi Entry Permit Manajemen Risiko dan Tanggap Darurat di Jawa Timur',
                'slug' => 'training-confined-space-otorisasi-permit-manajemen-risiko-jawa-timur',
                'category' => 'K3 Ruang Terbatas Utama',
                'province' => 'Jawa Timur',
                'province_slug' => 'jawa-timur',
                'city' => 'Kota Surabaya',
                'city_slug' => 'kota-surabaya',
                'district' => 'Tegalsari',
                'district_slug' => 'tegalsari',
                'program_id' => $prog3 ? $prog3->id : null,
                'excerpt' => 'Panduan tingkat manajerial Entry Supervisor dalam audit kepatuhan permit-required confined space, rekayasa ventilasi ACH, dan kepemimpinan tanggap darurat di Jawa Timur.',
                'content' => ConfinedSpaceSchemeService::generate6000WordContent(
                    'Training Confined Space Otorisasi Entry Permit Manajemen Risiko dan Tanggap Darurat di Jawa Timur',
                    'Jawa Timur',
                    $prog3 ? $prog3->toArray() : ConfinedSpaceSchemeService::getMasterPrograms()[2]
                ),
                'author' => 'Dewan Pakar K3 Ruang Terbatas Nasional',
                'read_time' => 40,
                'views_count' => 1620,
                'is_featured' => true,
                'is_published' => true,
            ],
        ];

        foreach ($sampleArticles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }
    }
}
