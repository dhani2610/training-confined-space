<?php

namespace App\Services;

use App\Models\Program;
use App\Models\Article;
use Illuminate\Support\Str;

class ConfinedSpaceSchemeService
{
    /**
     * Master definition of 4 Confined Space Training Programs
     */
    public static function getMasterPrograms(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Training Confined Space (K3 Ruang Terbatas) Muda',
                'slug' => 'training-confined-space-muda',
                'level_name' => 'Tingkat Muda / Teknisi & Operator Lapangan',
                'badge' => 'Tingkat Muda',
                'short_description' => 'Pembinaan dan sertifikasi kompetensi personel K3 Ruang Terbatas tingkat Muda bagi teknisi dan operator pelaksana yang bertugas memasuki dan bekerja di dalam ruang terbatas sesuai standar Kemnaker RI & BNSP.',
                'full_description' => 'Program Training Confined Space Tingkat Muda (K3 Ruang Terbatas Muda) dirancang secara komprehensif untuk membekali calon petugas teknisi pelaksana dengan keterampilan identifikasi bahaya atmosferik, pengoperasian gas detector, pemakaian Self-Contained Breathing Apparatus (SCBA) & safety harness, penerapan Sistem Izin Masuk (Confined Space Entry Permit), serta prosedur isolasi energi LOTO sebelum memasuki tangki, bejana tekan, gorong-gorong, atau silo industri.',
                'curriculum' => [
                    'Peraturan Perundangan K3 Ruang Terbatas (Kepdirjen Binwasnaker No. Kep. 113/DJPPK/IX/2006 & SKKNI)',
                    'Pengenalan Karakteristik & Klasifikasi Confined Space (Tangki, Silo, Manhole, Terowongan, Pipa)',
                    'Identifikasi Bahaya Atmosferik: Oksigen Defisiensi / Oksigen Eksidensia, Toksik, & Flammable',
                    'Pengoperasian, Uji Fungsi (Bump Test), dan Kalibrasi Alat Gas Detector 4 Gas',
                    'Prosedur Lockout / Tagout (LOTO) & Isolasi Mekanikal / Elektrikal Ruang Terbatas',
                    'Teknik Ventilasi Paksa (Purging & Positive / Negative Forced Ventilation) Menuju Ambang Aman',
                    'Standar APD Khusus Confined Space, Penggunaan Full Body Harness, Tripod, & Winch Lifeline',
                    'Pengoperasian Unit SCBA Bertekanan Positif 300 Bar & Masker Respirator Air-Purifying',
                    'Komunikasi Petugas Masuk (Entrant) dan Petugas Madya / Jaga (Standby Person)',
                    'Simulasi Tanggap Darurat Evakuasi Non-Entry Rescue Sederhana & P3K Dasar Asfiksia'
                ],
                'requirements' => [
                    'Pendidikan minimal SLTA / SMK sederajat atau berpengalaman di bidang teknis',
                    'Surat keterangan sehat dari dokter (bebas penyakit jantung, asma kronis, & claustrophobia)',
                    'Fotokopi KTP dan pas foto berlatar merah',
                    'Surat tugas atau rekomendasi dari perusahaan sponsor / mandiri'
                ],
                'certification_body' => 'Kemnaker RI & BNSP',
                'duration' => '3 Hari (24 Jam Pelajaran Teori & Praktikum Lapangan)',
                'icon' => 'bi-shield-check',
                'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1200&auto=format&fit=crop&q=80',
                'topic_key' => 'confined_space_muda',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Training Confined Space (K3 Ruang Terbatas) Madya',
                'slug' => 'training-confined-space-madya',
                'level_name' => 'Tingkat Madya / Petugas Jaga & Standby Person (Attendant)',
                'badge' => 'Tingkat Madya',
                'short_description' => 'Pelatihan dan sertifikasi Petugas Jaga Ruang Terbatas (Standby Person / Attendant) yang bertanggung jawab memantau keselamatan di luar pintu masuk, mencatat logbook personel, dan mengendalikan komunikasi darurat.',
                'full_description' => 'Program Training Confined Space Tingkat Madya membina calon Petugas Jaga (Attendant) yang berposisi di luar pintu masuk ruang terbatas. Bertanggung jawab memonitor kondisi lingkungan di dalam dan sekitar confined space, mengontrol daftar hadir dan durasi pekerja di dalam (entrant logsheet), memastikan suplai udara kompresor/blower tetap stabil, mendeteksi bahaya sebelum kondisi menjadi kritis, dan mengoordinasikan evakuasi darurat tanpa membahayakan diri sendiri.',
                'curriculum' => [
                    'Wewenang & Tanggung Jawab Hukum Petugas Madya (Standby Person / Attendant)',
                    'Manajemen Verifikasi Izin Kerja Masuk Ruang Terbatas (Confined Space Entry Permit)',
                    'Pencatatan Logbook Personel, Waktu Kerja Maksimum, & Pemantauan Rotasi Entrant',
                    'Monitoring Kualitas Udara Secara Kontinu Menggunakan Detektor Gas Portable Eksternal',
                    'Supervisi Sistem Ventilasi Blower & Pengendalian Debu / Gas Buang di Sekitar Manhole',
                    'Protokol Komunikasi Efektif: Radio Komunikasi Intrinsically Safe, Peluit, & Tali Isyarat',
                    'Penetapan & Penjagaan Perimeter Area Bahaya (Barikade & Rambu Peringatan Ruang Terbatas)',
                    'Manajemen Tanggap Darurat & Komando Aktivasi Tim Penyelamat Rescue Confined Space',
                    'Prosedur Penghentian Pekerjaan (Stop Work Authority) Saat Terjadi Anomali Atmosfer',
                    'Praktik Simulasi Evakuasi Darurat Eksternal Menggunakan Tripod Winch Retrieval System'
                ],
                'requirements' => [
                    'Pendidikan minimal SLTA / D3 / S1 dengan pengalaman kerja di area industri atau K3',
                    'Surat keterangan sehat jasmani & bebas fobia ruang tertutup',
                    'Fotokopi KTP dan pas foto resmi',
                    'Surat rekomendasi perusahaan / pendaftaran profesional'
                ],
                'certification_body' => 'Kemnaker RI & BNSP',
                'duration' => '3 Hari (24 Jam Pelajaran Intensif)',
                'icon' => 'bi-eye-fill',
                'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=1200&auto=format&fit=crop&q=80',
                'topic_key' => 'confined_space_madya',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Training Confined Space (K3 Ruang Terbatas) Utama',
                'slug' => 'training-confined-space-utama',
                'level_name' => 'Tingkat Utama / Pengawas & Ahli K3 Ruang Terbatas (Supervisor / Entry Supervisor)',
                'badge' => 'Tingkat Utama (Supervisor)',
                'short_description' => 'Pelatihan kepemimpinan tingkat pengawas (Entry Supervisor) dan Ahli K3 untuk otorisasi izin kerja, penilaian risiko Job Safety Analysis (JSA), audit kepatuhan prosedur, dan manajemen keselamatan ruang terbatas industri.',
                'full_description' => 'Program Training Confined Space Tingkat Utama ditujukan bagi Manajer K3, Safety Supervisor, Lead Insinyur, dan Pengawas Operasional. Membekali kompetensi tingkat tinggi dalam melakukan penilaian risiko terperinci (HIRADC & JSA), merancang skenario ventilasi rekayasa teknik, menguji keabsahan hasil pengujian gas multi-titik, mengesahkan dan menutup Entry Permit, mengaudit kontraktor pihak ketiga, serta memimpin investigasi insiden dan evaluasi kepatuhan keselamatan kerja ruang terbatas.',
                'curriculum' => [
                    'Hierarki Perundangan K3 Nasional & Internasional (OSHA 29 CFR 1910.146, AS/NZS 2865, & Kemnaker)',
                    'Tanggung Jawab Hukum Otoritas Penandatangan Izin Masuk (Entry Supervisor Authority)',
                    'Penyusunan Job Safety Analysis (JSA), Hazard Identification, Risk Assessment and Determining Control (HIRADC)',
                    'Perhitungan Termodinamika & Rekayasa Ventilasi Udara (Air Changes Per Hour / ACH Requirement)',
                    'Evaluasi Kimia Gas Toksik Laten, Gas Inert (Nitrogen Purging), & Batas Paparan Kerja (TLV-TWA, STEL, IDLH)',
                    'Audit Sistem Pengendalian Energi Berbahaya (Lockout / Tagout / Tryout System)',
                    'Manajemen Kontraktor & Pengawasan Kerja Pihak Ketiga di Ruang Terbatas Industri',
                    'Perancangan Dokumen Rencana Tanggap Darurat (Emergency Response Plan / ERP Ruang Terbatas)',
                    'Metodologi Investigasi Kecelakaan Kerja, Analisis Akar Masalah (RCA), & Tindakan Korektif (CAPA)',
                    'Audit Kelayakan Peralatan: Sertifikasi Kalibrasi Gas Detector, Uji Hidrostatik SCBA, & Kelayakan Rigging'
                ],
                'requirements' => [
                    'Pendidikan minimal D3 / S1 Teknik atau pengalaman kerja relevan di bidang keselamatan kerja K3',
                    'Surat keterangan sehat dokter',
                    'Curriculum Vitae (CV) & salinan ijazah terakhir',
                    'Fotokopi KTP dan pas foto resmi'
                ],
                'certification_body' => 'Kemnaker RI & BNSP',
                'duration' => '4 Hari (32 Jam Pelajaran Tingkat Manajerial & Praktik Otorisasi)',
                'icon' => 'bi-award-fill',
                'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb18615f3?w=1200&auto=format&fit=crop&q=80',
                'topic_key' => 'confined_space_utama',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'id' => 4,
                'title' => 'Training Penyelamat (Rescue) Confined Space (K3 Ruang Terbatas)',
                'slug' => 'training-rescue-confined-space',
                'level_name' => 'Spesialisasi Tim Tanggap Darurat & Penyelamat Teknis (Emergency Rescue Team)',
                'badge' => 'Spesialisasi Rescue',
                'short_description' => 'Pelatihan intensif tim tanggap darurat (Emergency Response Team) untuk evakuasi korban insiden di dalam ruang terbatas dengan teknik vertical rescue, tali temali, tripod sistem mekanikal, dan pertolongan pertama resusitasi medis.',
                'full_description' => 'Program Training Penyelamat (Rescue) Confined Space adalah pelatihan taktis penyelamatan berisiko tinggi. Melatih tim rescue perusahaan dan personel tanggap darurat untuk melakukan penyelamatan darurat baik metode non-entry maupun entry rescue. Mencakup pemakaian SCBA di lorong sempit, teknik pemasangan stretcher tandu spinal kedap ruang, mechanical advantage hauling & lowering system 4:1 / 5:1, mitigasi bahaya sekunder saat evakuasi, serta stabilisasi dan resusitasi korban intoksikasi gas beracun sebelum dirujuk ke rumah sakit.',
                'curriculum' => [
                    'Doktrin & Etika Keselamatan Tim Penyelamat Confined Space: First Do No Harm & Rescuer Safety First',
                    'Fisiologi Korban Asfiksia, Keracunan H2S, CO, & Trauma Fisik Cedera Tulang Belakang di Ruang Sempit',
                    'SOP Penilaian Cepat Situasi Darurat (Scene Assessment & Atmospheric Re-evaluation)',
                    'Pengoperasian Sistem Penyelamatan Non-Entry Retrieval (Tripod, Davit Arm, & Self-Retracting Lifeline)',
                    'Teknik Entry Rescue Bertim: Penetrasi 2 Orang Rescuer Menggunakan SCBA & Airline Breathing System',
                    'Tali Temali Teknis (Rigging), Anchor System, Mechanical Advantage Pulley System (3:1, 4:1, 5:1)',
                    'Teknik Imobilisasi Korban Menggunakan Sked Stretcher, Basket Litter, & Spine Board Vertikal / Horisontal',
                    'Manajemen Manuver Korban Melalui Manhole Sempit (Diameter < 60 cm) & Hambatan Internal Baffle Tangki',
                    'Pertolongan Pertama Resusitasi Jantung Paru (CPR / RJP), Terapi Oksigen Portabel, & Penanganan Trauma',
                    'Simulasi Lapangan Skenario Nyata: Evakuasi Korban Pingsan dari Kedalaman 15 Meter Tanpa Cahaya'
                ],
                'requirements' => [
                    'Pendidikan minimal SLTA / sederajat dengan fisik prima dan stamina tinggi',
                    'Surat keterangan sehat dokter spesialis (kardiologi & paru) serta bebas penyakit kronis / fobia',
                    'Diutamakan telah memiliki dasar K3 atau tergabung dalam Emergency Response Team (ERT)',
                    'Fotokopi KTP dan pas foto resmi'
                ],
                'certification_body' => 'Kemnaker RI & BNSP',
                'duration' => '4 Hari (32 Jam Pelajaran Simulasi Taktis & Praktikum Rescue Berat)',
                'icon' => 'bi-life-preserver',
                'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=1200&auto=format&fit=crop&q=80',
                'topic_key' => 'confined_space_rescue',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ]
        ];
    }

    /**
     * Find master program by slug
     */
    public static function findProgram(string $slug): ?array
    {
        foreach (static::getMasterPrograms() as $p) {
            if ($p['slug'] === $slug) {
                return $p;
            }
        }
        return null;
    }

    /**
     * Generate 200 distinct curriculum topics for Confined Space in any region
     * Every topic starts with "Training Confined Space" or "Training K3 Ruang Terbatas"
     */
    public static function get200Topics(): array
    {
        $baseThemes = [
            'Prosedur Izin Masuk dan Verifikasi Entry Permit',
            'Pengoperasian Kalibrasi dan Bump Test Gas Detector 4 Gas',
            'Deteksi Bahaya Gas Hidrogen Sulfida H2S dan Karbon Monoksida CO',
            'Pengendalian Bahaya Defisiensi Oksigen dan Asfiksia Akut',
            'Sistem Ventilasi Paksa Purging dan Sirkulasi Udara Blower',
            'Prosedur Isolasi Energi Berbahaya Lockout Tagout LOTO',
            'Standar Pemakaian Self Contained Breathing Apparatus SCBA 300 Bar',
            'Pemasangan Tripod Safety Harness dan Fall Arrester Lifeline',
            'Prosedur Kerja Aman Petugas Jaga Standby Person Attendant',
            'Analisis Keselamatan Kerja Job Safety Analysis JSA Ruang Sempit',
            'Teknik Penyelamatan Darurat Non Entry Rescue Menggunakan Winch',
            'Manajemen Tanggap Darurat dan Protokol Evakuasi Korban Cedera',
            'Pertolongan Pertama Resusitasi CPR dan Terapi Oksigen Medis',
            'Pembersihan Tangki Bahan Bakar Minyak BBM dan Petrokimia',
            'Inspeksi Bejana Tekan Boiler dan Kolom Distilasi Industri',
            'Operasional Pemeliharaan Silo Pangan Biji Bijian dan Debu Mudah Meledak',
            'Prosedur Masuk Saluran Gorong Gorong Drainase dan Sewer Bawah Tanah',
            'Pekerjaan Ruang Terbatas di Pabrik Kelapa Sawit dan Tangki CPO',
            'K3 Ruang Terbatas Pembangkit Listrik PLTU PLTA dan Turbin Generator',
            'Keselamatan Masuk Palka Kapal Kargo dan Ruang Mesin Maritim',
            'Mitigasi Kebocoran Gas Metana CH4 di Jaringan Pipa Gas Alam',
            'Inspeksi Jaringan Pipa Air Bersih PDAM dan Bak Pengolahan IPAL',
            'SOP Pengelasan dan Pekerjaan Panas Hot Work di Dalam Tangki',
            'Pembersihan Endapan Lumpur B3 Sludge pada Tangki Pengolahan Limbah',
            'Sertifikasi Kompetensi Petugas K3 Ruang Terbatas Kemnaker RI'
        ];

        $scopes = [
            'Standar Industri Manufaktur',
            'Sektor Minyak dan Gas Bumi Migas',
            'Kawasan Pergudangan Logistik Modern',
            'Fasilitas Pengolahan Limbah Industri',
            'Sektor Maritim dan Galangan Kapal',
            'Proyek Infrastruktur Konstruksi Bawah Tanah',
            'Industri Pengolahan Makanan dan Minuman',
            'Fasilitas Kilang dan Petrokimia Terpadu'
        ];

        $topics = [];
        $counter = 1;

        foreach ($scopes as $scope) {
            foreach ($baseThemes as $theme) {
                if ($counter > 200) {
                    break 2;
                }
                $topics[] = [
                    'index' => $counter,
                    'title' => "Training Confined Space {$theme} {$scope}",
                    'desc' => "Panduan komprehensif {$theme} dalam lingkup {$scope} dengan acuan regulasi Kemenaker RI, standar internasional OSHA, dan penerapan perlindungan nyawa di ruang terbatas."
                ];
                $counter++;
            }
        }

        // Fill remaining up to 200
        while ($counter <= 200) {
            $topics[] = [
                'index' => $counter,
                'title' => "Training Confined Space Prosedur Keselamatan Kerja Modul {$counter}",
                'desc' => "Kurikulum modul ke-{$counter} pembinaan K3 Ruang Terbatas yang mengupas tata kelola keselamatan, manajemen risiko confined space, serta standar teknis perlindungan pekerja."
            ];
            $counter++;
        }

        return $topics;
    }

    /**
     * Get 4 programs contextualized for a region
     */
    public static function getProgramsForRegion(string $regionName): array
    {
        $programs = static::getMasterPrograms();
        $results = [];
        foreach ($programs as $item) {
            $copy = $item;
            $copy['regional_title'] = "{$item['title']} di {$regionName}";
            $copy['regional_short_desc'] = "Layanan pembinaan dan sertifikasi resmi {$item['level_name']} yang diselenggarakan untuk wilayah {$regionName}.";
            $results[] = (object) $copy;
        }
        return $results;
    }

    /**
     * Get 200 article topics formatted for a program & region
     */
    public static function getArticlesForProgram(string $programSlug, string $regionName, ?string $districtName = null): array
    {
        $topics = static::get200Topics();
        $program = static::findProgram($programSlug) ?: static::getMasterPrograms()[0];
        $displayRegion = $districtName ? "{$districtName}, {$regionName}" : $regionName;

        $results = [];
        foreach ($topics as $t) {
            $fullTitle = "{$t['title']} di {$displayRegion}";
            $slug = Str::slug("{$t['title']} di {$displayRegion}");
            $results[] = (object) [
                'index' => $t['index'],
                'title' => $fullTitle,
                'slug' => $slug,
                'excerpt' => $t['desc'] . " Pelatihan resmi bersertifikasi Kemnaker RI & BNSP di {$displayRegion}.",
                'category' => $program['level_name'] ?? 'K3 Ruang Terbatas',
                'read_time' => '35-45 Menit Bacaan Lengkap',
                'author' => 'Instruktur Ahli K3 Confined Space Kemnaker RI',
                'views' => rand(180, 650),
            ];
        }
        return $results;
    }

    /**
     * Generate 6,000 - 9,000 word article content
     */
    public static function generate6000WordContent(string $fullTitle, string $regionName, array $program): string
    {
        $programTitle = $program['title'];
        $levelName = $program['level_name'] ?? 'Tingkat K3 Ruang Terbatas';
        $certBody = $program['certification_body'] ?? 'Kemnaker RI & BNSP';

        // 28 Structured Comprehensive Chapters (Guaranteed 6,500 - 7,500 Words)
        $ch1 = "BAB 1: PENDAHULUAN DAN ARSITEKTUR KESELAMATAN {$fullTitle} DI {$regionName}\nPenyelenggaraan {$fullTitle} hadir sebagai jawaban mutlak dan komprehensif atas kebutuhan standardisasi keselamatan kerja berisiko tinggi di berbagai sektor industri, manufaktur, pembangkit energi listrik, petrokimia, utilitas publik, serta proyek konstruksi rekayasa sipil modern di seluruh wilayah {$regionName}. Bekerja di dalam ruang terbatas (confined space)—seperti tangki timbun bahan bakar minyak, bejana tekan, reaktor kimia industri, tangki fermentasi, silo penyimpanan semen dan biji-bijian, gorong-gorong drainase, pipa transmisi minyak dan gas, palka kapal maritim, serta bak pengolahan limbah industri (IPAL)—merupakan salah satu aktivitas dengan angka tingkat keparahan (severity rate) dan rasio fatalitas tertinggi di dunia kerja internasional. Ruang-ruang ini secara fundamental tidak dirancang sebagai tempat kerja manusia secara terus-menerus, memiliki akses keluar dan masuk yang sangat sempit dan terbatas, sirkulasi ventilasi udara alami yang sangat minim, serta menyimpan potensi akumulasi atmosfer mematikan yang dapat merenggut nyawa dalam hitungan detik.

Sebagai pusat aktivitas ekonomi, logistik, dan industri strategis di {$regionName}, keberadaan ratusan fasilitas pabrik, pergudangan modern, dermaga maritim, instalasi pengolahan air bersih dan limbah, serta jaringan terowongan utilitas bawah tanah menuntut kesiapan personel teknisi yang memiliki kompetensi tersertifikasi secara resmi oleh Kementerian Ketenagakerjaan RI dan BNSP. Data investigasi kecelakaan kerja nasional dan statistik global dari NIOSH dan OSHA menunjukkan fakta yang sangat tragis: lebih dari 60% korban jiwa dalam insiden confined space adalah para calon penyelamat (would-be rescuers) yang berniat menolong rekan kerjanya yang pingsan tanpa mengenakan alat pelindung pernapasan mandiri dan tanpa perhitungan risiko atmosfer. Oleh sebab itu, pelatihan {$fullTitle} ini tidak sekadar memberikan sertifikasi administratif, melainkan menanamkan doktrin keselamatan tanpa kompromi: tidak ada target pemeliharaan atau pekerjaan pabrik yang bernilai seharga nyawa manusia, dan tidak ada seorang pun yang diizinkan melangkah masuk ke dalam ruang terbatas tanpa adanya otorisasi resmi Izin Kerja Masuk (Entry Permit), jaminan isolasi energi LOTO, serta hasil pengujian atmosfer multi-gas yang terbukti aman.

Dalam kerangka pembinaan terpadu di {$regionName}, seluruh peserta dipersiapkan secara mental dan fisik untuk menghadapi berbagai skenario terburuk di lapangan kerja. Pendekatan berbasis kompetensi ini memadukan penguasaan teori fisika-kimia gas, pengoperasian instrumen deteksi modern berpresisi tinggi, hingga simulasi evakuasi korban darurat secara praktis. Dengan menginternalisasi budaya keselamatan kerja yang kokoh, setiap lulusan program ini diposisikan sebagai garda terdepan pelindung nyawa manusia yang mampu mengidentifikasi bahaya laten sebelum berkembang menjadi malapetaka, serta memastikan seluruh operasional perusahaan berjalan selaras dengan visi nasional terwujudnya Zero Accident di tempat kerja.";
        $ch2 = "BAB 2: LANDASAN HUKUM, REGULASI NASIONAL, DAN STANDAR KESELAMATAN INTERNASIONAL\nPelaksanaan {$fullTitle} di {$regionName} bersandar secara mutlak dan kokoh pada hierarki peraturan perundang-undangan ketenagakerjaan Republik Indonesia serta konvensi standar keselamatan internasional yang mengikat secara hukum bagi setiap pengurus perusahaan, kontraktor, dan tenaga kerja:
1. Undang-Undang Republik Indonesia Nomor 1 Tahun 1970 tentang Keselamatan Kerja:
Merupakan payung hukum dasar keselamatan kerja nasional yang mewajibkan setiap pimpinan tempat kerja untuk menerapkan syarat-syarat keselamatan kerja secara menyeluruh guna mencegah kecelakaan, peledakan, dan kebakaran, serta memberikan perlindungan maksimal bagi seluruh tenaga kerja dari paparan zat berbahaya di wilayah {$regionName}.
2. Surat Keputusan Direktur Jenderal Pembinaan Pengawasan Ketenagakerjaan (Kepdirjen Binwasnaker) No. Kep. 113/DJPPK/IX/2006:
Tentang Pedoman Teknis Pembinaan Keselamatan dan Kesehatan Kerja di Ruang Terbatas (Confined Spaces). Regulasi ini merupakan rujukan baku nasional yang mengatur klasifikasi ruang terbatas yang memerlukan izin masuk (Permit-Required Confined Space), kewajiban pembagian peran kompetensi resmi (Petugas Masuk / Entrant Tingkat Muda, Petugas Jaga / Attendant Tingkat Madya, dan Pengawas / Entry Supervisor Tingkat Utama), serta tata cara sertifikasi kompetensi.
3. Peraturan Menteri Ketenagakerjaan RI Nomor 5 Tahun 2018 tentang Keselamatan dan Kesehatan Kerja Lingkungan Kerja:
Menetapkan Nilai Ambang Batas (NAB) faktor kimia, fisika, biologi, dan ergonomi di tempat kerja, termasuk batas pajanan gas beracun (CO, H2S, SO2, NH3), pengendalian temperatur ekstrem (heat stress), dan standar pergantian sirkulasi udara bersih di ruang tertutup.
4. Peraturan Pemerintah Republik Indonesia Nomor 50 Tahun 2012 tentang Penerapan Sistem Manajemen K3 (SMK3):
Mewajibkan integrasi prosedur keselamatan ruang terbatas ke dalam sistem manajemen risiko perusahaan, mulai dari identifikasi bahaya, penilaian risiko, pengendalian operasional, hingga kesiapsiagaan tanggap darurat di fasilitas kerja {$regionName}.
5. Standar Kompetensi Kerja Nasional Indonesia (SKKNI) Bidang K3 Ruang Terbatas:
Menetapkan unit-unit kompetensi terukur yang wajib dikuasai oleh setiap peserta pelatihan di {$regionName}, mencakup persiapan kerja, pengujian atmosfer bertingkat, pemakaian alat pernapasan SCBA, komunikasi darurat, dan evakuasi teknis.
6. Standar Keselamatan Global OSHA 29 CFR 1910.146, AS/NZS 2865, dan NFPA 350:
Menyediakan pedoman komparasi praktik terbaik dunia mengenai batas aman paparan atmosfer, sistem ventilasi mekanis kontinu, prosedur isolasi energi LOTO, serta kriteria kesiapsiagaan tim penyelamat teknis (Technical Rescue Team) di industri modern.

Kepatuhan terhadap seluruh kerangka regulasi ini bersifat mandatori tanpa pengecualian bagi korporasi di {$regionName}. Pelanggaran terhadap peraturan keselamatan ruang terbatas bukan hanya membawa sanksi pidana dan denda administratif berat bagi pengurus tempat kerja, melainkan mempertaruhkan reputasi bisnis serta keberlangsungan izin operasional fasilitas industri.";
        $ch3 = "BAB 3: ANATOMI, DEFINISI, DAN IDENTIFIKASI RUANG TERBATAS (CONFINED SPACES)\nPeserta pembinaan di {$regionName} dibekali pemahaman komprehensif mengenai batasan fisik, karakteristik arsitektur, dan tipologi ruang terbatas guna mengeliminasi keraguan di lapangan kerja:
1. Tiga Kriteria Dasar Ruang Terbatas (Confined Space Definition):
Suatu ruang dikategorikan sebagai ruang terbatas apabila memenuhi tiga parameter simultan: (a) Memiliki dimensi ruang dan konfigurasi bukaan yang cukup besar sehingga memungkinkan seluruh tubuh seorang pekerja untuk masuk dan melakukan pekerjaan di dalamnya; (b) Memiliki akses jalan masuk atau keluar yang terbatas (limited or restricted means for entry or exit), seperti lubang manhole sempit, pintu palka berpenutup, saluran pipa berdiameter sempit, atau tangga monyet curam; dan (c) Tidak dirancang secara permanen untuk ditempati atau diduduki oleh pekerja secara terus-menerus (not designed for continuous employee occupancy).
2. Kriteria Ruang Terbatas yang Memerlukan Izin Masuk (Permit-Required Confined Space / PRCS):
Ruang terbatas dikategorikan sebagai PRCS jika memiliki satu atau lebih karakteristik bahaya berikut: (a) Mengandung atau memiliki potensi kuat mengandung atmosfer berbahaya (toxic, flammable, or oxygen-deficient); (b) Mengandung material cair atau padatan butiran yang berpotensi menimbun, menyelimuti, atau menenggelamkan pekerja (engulfment hazard); (c) Memiliki konfigurasi dinding internal yang melandai ke arah bawah atau lorong menyempit yang dapat menjebak atau menyesakkan pernapasan pekerja; atau (d) Mengandung bahaya keselamatan fisik dan mekanik serius lainnya seperti peralatan berputar tanpa pelindung, paparan tegangan listrik terbuka, atau suhu panas ekstrem.
3. Tipologi Ruang Terbatas yang Umum Ditemukan di Wilayah {$regionName}:
Di berbagai kawasan operasional industri dan infrastruktur publik {$regionName}, confined space meliputi: tangki penyimpanan minyak bumi dan bahan kimia, bejana tekan reaktor proses pabrik, tangki fermentasi alkohol atau makanan, silo penyimpanan semen curah dan gandum, boiler uap pembangkit listrik, gorong-gorong saluran drainase perkotaan, bak penampungan air limbah IPAL, terowongan bawah tanah kabel transmisi dan pipa PDAM, ruang pompa basah (wet well pump station), palka kapal kargo, serta kompartemen galian tanah dengan kedalaman lebih dari 1.5 meter.

Pengenalan anatomi ruang terbatas secara cermat memungkinkan pengawas lapangan di {$regionName} menentukan batas zona kerja aman dan mengklasifikasikan ruangan secara akurat. Penentuan ini menjadi pijakan dasar penentuan apakah suatu pekerjaan dapat dideklasifikasi menjadi non-permit atau wajib dijaga ketat di bawah pengawasan sistem izin masuk penuh.";
        $ch4 = "BAB 4: TOKSIKOLOGI GAS DAN IDENTIFIKASI BAHAYA ATMOSFERIK MEMATIKAN\nBahaya atmosferik merupakan faktor pembunuh nomor satu dalam insiden kecelakaan kerja ruang terbatas di {$regionName}:
1. Bahaya Asfiksia dan Defisiensi Oksigen (Oxygen Deficiency):
Kadar oksigen normal di udara atmosfer bebas adalah 20.9% volume. Di dalam ruang tertutup di {$regionName}, proses pembusukan biologis bahan organik, korosi oksidasi logam pada dinding baja tangki, reaksi kimia pelarut, atau proses pengurasan menggunakan gas inert (seperti Nitrogen Purging) dapat menguras kadar oksigen secara drastis. Kadar O2 di bawah 19.5% dikategorikan sebagai defisiensi oksigen berbahaya (oxygen-deficient atmosphere). Pada konsentrasi O2 12% - 16%, pekerja mengalami detak jantung cepat, sakit kepala, kebingungan mental, dan penurunan koordinasi motorik. Pada konsentrasi 6% - 10%, korban mengalami mual hebat, kehilangan kesadaran seketika dalam waktu kurang dari 40 detik, dan mengalami kematian akibat hipoksia otak permanen dalam hitungan 4 hingga 6 menit. Sebaliknya, kadar O2 di atas 23.5% (oxygen-enriched atmosphere) menciptakan bahaya kebakaran dan peledakan dahsyat karena menurunkan energi aktivasi pembakaran.
2. Bahaya Gas Beracun Karbon Monoksida (CO):
Gas yang tidak berwarna, tidak berbau, dan tidak menimbulkan iritasi ini dihasilkan dari pembakaran tidak sempurna bahan bakar hidrokarbon pada genset, kompresor, atau forklift bensin di dekat lubang masuk di {$regionName}. Gas CO mengikat hemoglobin darah manusia dengan afinitas 210 kali lebih kuat dibanding oksigen, membentuk karboksihemoglobin (CO-Hb) yang memblokade suplai oksigen ke otak dan jantung. Batas pajanan kerja TLV-TWA CO adalah 25 ppm, dan konsentrasi di atas 1200 ppm dikategorikan sebagai IDLH (Immediately Dangerous to Life or Health).
3. Bahaya Gas Maut Hidrogen Sulfida (H2S):
Gas yang terbentuk dari penguraian anaerobik limbah organik cair dan lumpur pada saluran gorong-gorong, tangki IPAL, septic tank, dan depo minyak di {$regionName}. Pada konsentrasi rendah (0.01 - 10 ppm), H2S berbau menyengat seperti telur busuk. Namun, pada konsentrasi di atas 100 ppm, H2S melumpuhkan saraf penciuman manusia (olfactory fatigue) dalam beberapa tarikan napas, menimbulkan rasa aman palsu. Pada konsentrasi 500 - 1000 ppm, satu tarikan napas tunggal menyebabkan kejang mendadak (knockdown), kelumpuhan sistem pernapasan, dan henti jantung seketika. Nilai TLV-TWA H2S adalah 1 ppm dengan batas IDLH sebesar 100 ppm.
4. Gas dan Uap Mudah Terbakar / Meledak (Flammable Gases & LEL):
Keberadaan uap bahan bakar bensin, gas metana (CH4) dari fermentasi limbah, atau uap pelarut thinner cat di dalam ruangan menciptakan risiko ledakan dahsyat jika bertemu dengan pemantik api atau percikan listrik statis. Standar K3 nasional mensyaratkan bahwa konsentrasi gas mudah terbakar di dalam confined space tidak boleh melebihi 10% dari Lower Explosive Limit (LEL) untuk izin masuk standar, dan wajib 0% LEL bila ada pekerjaan panas (hot work).

Penguasaan toksikologi gas ini menjadi bekal fundamental bagi peserta di {$regionName} agar senantiasa waspada dan tidak pernah mengandalkan indra penciuman manusia semata dalam mendeteksi gas berbahaya.";
        $ch5 = "BAB 5: PENGOPERASIAN, BUMP TEST, DAN KALIBRASI ALAT GAS DETECTOR 4 GAS\nPengujian atmosfer adalah mata, telinga, dan indra keselamatan utama sebelum memasuki ruang terbatas di {$regionName}:
1. Anatomi dan Prinsip Kerja Multi-Gas Detector Portabel:
Instrumen 4 Gas umumnya mendeteksi empat parameter simultan: Oksigen (O2), Gas Mudah Terbakar (LEL / Combustible Gas), Karbon Monoksida (CO), dan Hidrogen Sulfida (H2S). Sensor O2, CO, dan H2S menggunakan prinsip sel elektrokimia yang menghasilkan arus listrik proporsional terhadap konsentrasi gas. Sensor LEL menggunakan prinsip manik katalitik (catalytic bead pellistor) atau sensor optik inframerah non-dispersif (NDIR) yang mengukur panas pembakaran mikro atau penyerapan gelombang cahaya.
2. Pengujian Fungsi Harian (Bump Test / Functional Test):
Sebelum digunakan setiap hari di lokasi kerja {$regionName}, alat gas detector wajib melalui pengujian fungsi harian (bump test) menggunakan tabung gas kalibrasi campuran standar (calibration gas mixture). Uji ini bertujuan memastikan bahwa jalur sensor tidak tersumbat, sensor bereaksi secara akurat terhadap gas target dalam hitungan detik, serta seluruh alarm audio berdaya suara 95 dB, lampu indikator visual LED, dan alarm getar internal berfungsi normal 100%.
3. Prosedur Kalibrasi Rentang Penuh (Full Span Calibration):
Dilakukan secara berkala setiap 30 hari atau sesuai rekomendasi pabrikan menggunakan regulator gas bertekanan standar bersertifikat ISO. Kalibrasi menyesuaikan kurva respon sensor terhadap konsentrasi gas acuan yang diketahui guna mengoreksi pergeseran sensor (sensor drift) akibat faktor kelembaban, kontaminasi debu, dan usia sensor.
4. Metodologi Pengujian Bertingkat (Stratified Atmospheric Testing):
Gas memiliki berat jenis uap (vapor density) yang berbeda relatif terhadap udara atmosfer (udara = 1.0). Gas metana (CH4) lebih ringan dari udara (berat jenis ~0.55) sehingga melayang dan terkonsentrasi di bagian atap/puncak ruangan; gas Karbon Monoksida (CO) memiliki berat jenis hampir setara udara (~0.97) dan menyebar di bagian tengah; sedangkan gas Hidrogen Sulfida (H2S, berat jenis ~1.19) dan uap bensin jauh lebih berat dari udara sehingga mengendap pekat di dasar lantai ruang terbatas. Peserta pelatihan dilatih menggunakan tongkat probe dan selang sampling nilon teflon untuk menguji udara dari jarak aman pada interval ketinggian: Bagian Atas (Top), Bagian Tengah (Middle), dan Bagian Bawah (Bottom) selama minimal 2 detik per meter panjang selang sebelum pintu manhole dibuka penuh.

Disiplin pengujian berkala setiap interval 15 hingga 30 menit selama pekerjaan berlangsung menjamin bahwa perubahan kondisi udara di fasilitas kerja {$regionName} terpantau secara real-time tanpa celah kompromi.";
        $ch6 = "BAB 6: SISTEM IZIN KERJA MASUK RUANG TERBATAS (CONFINED SPACE ENTRY PERMIT)\nEntry Permit adalah dokumen legal keselamatan paling sakral dalam operasional industri di {$regionName}:
1. Filosofi dan Tanggung Jawab Hukum Izin Masuk:
Izin kerja masuk ruang terbatas (Entry Permit) bukan sekadar lembaran formalitas administratif, melainkan instrumen pengendalian bahaya tertulis yang mengikat secara hukum bagi seluruh pihak. Izin ini menjadi jaminan verifikasi bahwa seluruh langkah pencegahan bahaya, pengujian atmosfer, isolasi energi, dan rencana penyelamatan darurat telah diimplementasikan secara tuntas sebelum manusia pertama melangkah ke dalam ruangan di {$regionName}.
2. Komponen Informasi Wajib dalam Lembar Entry Permit:
Lembar permit harus memuat secara transparan: (a) Identitas spesifik confined space dan lokasi kerja; (b) Tujuan pekerjaan dan durasi waktu yang diizinkan (maksimal 1 shift kerja 8 jam); (c) Daftar nama seluruh personel yang diotorisasi masuk (authorized entrants); (d) Nama petugas jaga standby (attendant); (e) Nama dan tanda tangan otorisasi Entry Supervisor; (f) Hasil pencatatan angka pengujian gas awal dan interval pengujian ulang; (g) Verifikasi isolasi energi LOTO dan penutupan jalur pipa (blinding); (h) Catatan laju aliran ventilasi mekanik blower; (i) Daftar APD wajib dan peralatan evakuasi darurat yang telah terpasang di mulut manhole; (j) Nomor kontak darurat dan prosedur aktivasi tim SAR internal di {$regionName}.
3. Alur Otorisasi, Pembatalan, dan Penutupan Izin Kerja:
Entry Permit hanya sah ditandatangani oleh Entry Supervisor bersertifikat setelah melakukan inspeksi fisik langsung di bibir manhole. Izin wajib dibatalkan seketika (permit revocation) apabila: (a) Nilai pengujian gas melebihi ambang batas aman; (b) Sistem ventilasi blower mati mendadak; (c) Terjadi situasi darurat di area pabrik; atau (d) Muncul bahaya baru yang belum tercantum dalam Job Safety Analysis (JSA). Setelah pekerjaan tuntas, seluruh pekerja dan perkakas dievakuasi keluar, dilakukan verifikasi jumlah personel (headcount check), manhole ditutup rapat, dan berkas permit diarsipkan minimal 1 tahun untuk kepentingan audit K3.

Audit kepatuhan dokumentasi permit di {$regionName} dilakukan secara reguler guna menjamin akuntabilitas pengawas dan membiasakan transparansi dalam setiap penerbitan izin kerja berisiko tinggi.";
        $ch7 = "BAB 7: SISTEM ISOLASI ENERGI BERBAHAYA (LOCKOUT / TAGOUT / LOTO)\nPencegahan pelepasan energi berbahaya tak terduga menjadi syarat mutlak sebelum seseorang memasuki ruang terbatas di {$regionName}:
1. Identifikasi Seluruh Sumber Energi Berbahaya (Hazardous Energy Sources):
Ruang terbatas industri di {$regionName} dikelilingi berbagai potensi energi mematikan: energi listrik tegangan tinggi pada motor pengaduk mixer atau pompa sirkulasi; energi mekanik pada bilah pisau penggiling, sekrup konveyor, atau katup hidrolik; energi fluida bertekanan tinggi pada pipa uap panas (steam), gas alam, cairan asam sulfat, atau lumpur limbah; serta energi potensial gravitasi pada beban yang menggantung di atas ruang kerja.
2. Metode Isolasi Positif Mutlak (Positive Physical Isolation):
Untuk pipa fluida kimia beracun atau bertekanan, pemasangan gembok pada handel katup valve saja tidak mencukupi standar keselamatan. Standar K3 mensyaratkan penerapan isolasi fisik positif, meliputi: (a) Pelepasan segmen pipa (spool removal) dan penutupan ujung pipa dengan blind flange bertutup rapat; (b) Pemasangan plat baja buntu pejal (slip blind / spectacle blind) yang memiliki rating tekanan setara dengan pipa; atau (c) Sistem katup ganda dan pembuangan tengah (Double Block and Bleed / DBB) di mana katup pembuangan ventilasi terbuka penuh dan terkunci gembok.
3. Prosedur 6 Langkah Baku Pelaksanaan LOTO:
(a) Pemberitahuan kepada operator terdampak (notification); (b) Penghentian mesin secara normal sesuai SOP (shutdown); (c) Pemutusan sumber energi pada pemutus sirkuit utama (isolation); (d) Pemasangan gembok pribadi (padlock) dan label peringatan bahaya warna merah (danger tag); (e) Pelepasan sisa energi tersimpan (dissipation / bleeding of residual pressure, grounding muatan listrik statis, dan pengurasan kondensat); (f) Verifikasi nol energi (zero energy verification / test-tryout) dengan mencoba menekan tombol start lokal untuk memastikan peralatan benar-benar mati total sebelum izin masuk disahkan di {$regionName}.

Dengan penerapan standar LOTO yang ketat, risiko pekerja tergilas bilah mixer atau tersiram fluida kimia panas di fasilitas {$regionName} dapat dieliminasi secara total hingga tingkat risiko nol.";
        $ch8 = "BAB 8: REKAYASA TEKNIK SISTEM VENTILASI MEKANIS (PURGING & FORCED VENTILATION)\nPengendalian kualitas udara secara berkelanjutan wajib dilakukan sebelum dan selama pekerjaan berlangsung di {$regionName}:
1. Perbedaan Mendasar antara Purging dan Ventilasi Mekanis Kontinu:
Purging adalah proses pengurasan awal atmosfer berbahaya (uap bahan bakar atau gas beracun pekat) dari dalam tangki menggunakan media gas pendorong, seperti hembusan gas inert Nitrogen murni atau udara bertekanan tinggi, sebelum seorang pekerja diizinkan mendekati manhole. Mengingat Nitrogen menguras habis oksigen hingga 0%, maka pasca-purging wajib dilakukan ventilasi udara segar secara masif hingga kadar O2 kembali ke 20.9%. Sedangkan ventilasi kontinu adalah pasokan udara segar berkelanjutan menggunakan blower mekanik selama pekerja beraktivitas di dalam ruangan.
2. Perhitungan Laju Pergantian Udara Minimum (Air Changes Per Hour / ACH):
Standar keselamatan internasional OSHA dan Kemnaker mensyaratkan laju pergantian udara minimal 20 kali volume ruangan per jam (20 ACH). Kapasitas debit udara blower yang dibutuhkan dihitung dengan formula:
Kapasitas Blower (m³/menit) = [Volume Ruang Terbatas (m³) x 20 ACH] / 60 Menit.
Misalnya, untuk tangki dengan volume 120 m³, dibutuhkan blower dengan kapasitas debit minimum 40 m³/menit (atau sekitar 1412 CFM).
3. Konfigurasi dan Penempatan Selang Ventilasi (Ducting Strategy):
Unit blower wajib ditempatkan di luar ruangan pada area yang bersih dan berjarak minimal 5 meter di atas angin dari knalpot mesin genset, cerobong emisi, atau lubang ventilasi pembuangan di {$regionName}. Selang fleksibel ducting harus dijulurkan masuk ke dalam ruangan hingga mencapai dasar lantai atau sudut-sudut mati terjauh guna mendesak kantong udara beracun keluar melalui bukaan atas. Ventilasi dilarang keras menggunakan oksigen murni karena dapat memicu ledakan dahsyat bila terkena percikan oli atau gesekan.

Keahlian menghitung debit udara dan mengatur aliran aerodinamika ventilasi ini menjamin ruang kerja di fasilitas {$regionName} selalu dialiri oksigen segar yang melimpah dan aman bagi sistem pernapasan pekerja.";
        $ch9 = "BAB 9: PERLENGKAPAN ALAT PELINDUNG DIRI (APD) KHUSUS CONFINED SPACE\nBekerja di dalam ruang terbatas di {$regionName} menuntut perlengkapan pelindung diri berspesifikasi teknis khusus yang tahan terhadap lingkungan ekstrem:
1. Full Body Harness Kelas E / Rescue Berstandar EN 361 & ANSI Z359:
Harness wajib memiliki rancangan ergonomis dengan bantalan empuk di pundak dan pinggang. Memiliki D-Ring dorsal di bagian punggung atas untuk penahan jatuh (fall arrest) serta sepasang D-Ring evakuasi di pundak (shoulder rescue attachment) yang kompatibel dengan wristlets atau spreader bar evakuasi vertikal melalui lubang manhole berdiameter 45 - 60 cm.
2. Helm Keselamatan Model Industrial Climbing Helmet (EN 12492 / EN 397):
Helm kerja di ruang terbatas wajib memiliki tali dagu 4 titik (chin strap) dengan sistem pengunci yang tidak mudah lepas saat kepala terbentur dinding tangki, serta memiliki profil kubah ramping tanpa lidah depan yang membatasi pandangan ke atas.
3. Pakaian Kerja Coverall Flame Retardant (FR) dan Anti-Statis (EN 1149):
Di area yang menyimpan uap gas mudah terbakar di fasilitas {$regionName}, serat kain coverall wajib mengandung benang karbon konduktif untuk mendisipasikan listrik statis ke tanah, mencegah terjadinya pelepasan bunga api elektrostatik yang dapat memicu ledakan atmosfer.
4. Sarung Tangan Kimia dan Sepatu Safety Anti-Statis (ESD Safe):
Sepatu boot kerja wajib memiliki sol karet tahan minyak dan pelarut kimia, pelindung jari kaki berbahan komposit atau baja (steel toe cap 200 Joule), pelat anti-paku di bagian telapak kaki, serta nilai resistansi kelistrikan anti-statis (100 kΩ hingga 1000 MΩ) guna mengalirkan muatan statis tubuh ke bumi secara aman.

Pemeriksaan kelayakan fisik APD dilakukan setiap pagi sebelum digunakan di lapangan {$regionName}. Setiap kerusakan serat jahitan harness atau keausan sol sepatu langsung berbuah penarikan barang dari area kerja.";
        $ch10 = "BAB 10: PENGOPERASIAN UNIT SCBA 300 BAR DAN AIRLINE SYSTEM\nSistem suplai pernapasan independen adalah benteng pertahanan terakhir bagi kehidupan teknisi keselamatan di {$regionName}:
1. Komponen dan Prinsip Kerja Self-Contained Breathing Apparatus (SCBA):
Unit SCBA bertekanan positif terdiri dari: silinder tabung komposit serat karbon (carbon composite cylinder) bertekanan kerja 300 bar (4500 psi); katup silinder dengan manometer tekanan; regulator tahap pertama (pressure reducer) yang menurunkan tekanan dari 300 bar ke tekanan menengah 7-9 bar; selang transmisi berpelindung baja; katup permintaan pernapasan (Positive Pressure Demand Valve / PADV); dan masker wajah penuh (Full Face Mask) silikon tahan panas. Tekanan positif di dalam rongga masker menjamin bahwa udara beracun dari luar tidak akan pernah menyusup masuk meskipun terdapat celah kecil pada segel wajah.
2. Prosedur Uji Kerapatan Masker (Fit Testing) Mandiri:
Sebelum melangkah ke zona berbahaya di {$regionName}, teknisi wajib melakukan: (a) Uji tekanan negatif (negative pressure test) dengan menutup katup hisap menggunakan telapak tangan dan menarik napas dalam-dalam—masker harus menempel ketat dan mengempis ke wajah tanpa ada kebocoran udara selama 10 detik; (b) Uji tekanan positif (positive pressure test) dengan menutup katup hembus dan menghembuskan napas perlahan—udara harus tertahan di dalam masker tanpa ada desisan bocor di sekitar pelipis, pipi, atau dagu.
3. Manajemen Konsumsi Udara dan Batas Cadangan Darurat (Rule of Thirds):
Tabung silinder 6.8 liter pada tekanan 300 bar menyediakan volume udara bebas sekitar 2.040 liter. Dengan laju konsumsi pernapasan rata-rata saat kerja fisik sedang sebesar 40 liter/menit, durasi nominal teoritis tabung adalah 51 menit. Namun, kaidah operasional K3 menerapkan aturan ketat: 15 menit waktu kerja masuk, 15 menit waktu pengerjaan tugas, 10 menit waktu bergerak keluar, dan sisa tekanan 55 bar (alarm peluit bunyi mekanikal) dialokasikan mutlak sebagai cadangan darurat (reserve safety margin).

Penguasaan teknik pernapasan ritmis dan pengendalian ketenangan emosional saat mengenakan SCBA di {$regionName} terbukti mampu menghemat konsumsi udara hingga 25% lebih efisien.";
        $ch11 = "BAB 11: PERAN DAN TANGGUNG JAWAB PETUGAS JAGA RUANG TERBATAS (ATTENDANT / STANDBY PERSON)\nPetugas Madya di luar lubang manhole adalah penjaga nyawa bagi rekan kerjanya yang berada di dalam di {$regionName}:
1. Doktrin Pantang Meninggalkan Posisi (Never Leave the Post):
Petugas jaga dilarang keras meninggalkan bibir manhole dengan alasan apapun selama masih ada satu orang pun pekerja di dalam ruang terbatas. Petugas jaga tidak boleh diberi tugas sampingan yang dapat memecah fokus konsentrasinya, seperti mengambil perkakas ke gudang atau menerima telepon pribadi.
2. Pengendalian Lembar Catatan Personel (Entrant Logsheet Management):
Petugas jaga bertanggung jawab mencatat secara presisi detik demi detik: nama lengkap setiap pekerja yang masuk, nomor seri tabung SCBA atau gas detector yang dibawa, waktu tepat saat melangkah masuk, jenis aktivitas yang dilakukan, dan waktu keluar. Mengingatkan pekerja di dalam melalui radio apabila batas waktu kerja maksimum telah mendekati batas aman.
3. Otoritas Penghentian Pekerjaan (Stop Work Authority):
Petugas jaga memiliki wewenang penuh untuk memerintahkan evakuasi darurat seketika apabila: (a) Mendeteksi gejala keracunan, disorientasi, atau perilaku abnormal pada pekerja di dalam; (b) Blower ventilasi tiba-tiba mati atau mengeluarkan asap; (c) Monitor gas eksternal menunjukkan lonjakan gas berbahaya; atau (d) Terjadi situasi bahaya eksternal di area pabrik di {$regionName} yang mengancam keselamatan ruang terbatas.
4. Menjaga Perimeter Keamanan dan Mencegah Penyelamatan Liar:
Memasang barikade pembatas dan menolak orang luar atau pimpinan manajemen yang tidak berkepentingan untuk melongokkan kepala ke dalam manhole. Menahan rekan kerja yang panik agar tidak nekat melompat masuk tanpa APD saat terjadi kecelakaan di dalam ruangan.

Integritas petugas jaga di wilayah {$regionName} menjadi kunci penentu tidak terjadinya eskalasi insiden fatal yang kerap merenggut banyak korban secara bersamaan.";
        $ch12 = "BAB 12: PROTOKOL KOMUNIKASI DAN ISYARAT DARURAT RUANG TERBATAS\nSistem komunikasi multi-kanal menjamin pertukaran pesan vital antara bagian dalam dan luar di {$regionName}:
1. Perangkat Radio Dua Arah Bersertifikat Intrinsically Safe (IS):
Radio Handy Talkie (HT) yang digunakan di dalam ruang terbatas wajib memiliki sertifikasi tahan ledakan (Ex-proof / ATEX Zone 0 atau UL Class I Div 1). Penggunaan radio biasa dilarang keras karena baterai dan sirkuit internalnya dapat memercikkan loncatan listrik yang memicu ledakan uap gas.
2. Sistem Komunikasi Isyarat Tali Manual (O-A-T-H Lifeline Signal):
Bila sinyal frekuensi radio terhalang oleh ketebalan dinding beton bertulang atau struktur masif tangki baja di {$regionName}, protokol tarikan tali penyelamat O-A-T-H digunakan secara seragam oleh seluruh praktisi K3:
- 1 Tarikan Tali = 'O' (OK / Kondisi Aman dan Lancar)
- 2 Tarikan Tali = 'A' (Advance / Ulurkan Tali, Pekerja Hendak Bergerak Maju)
- 3 Tarikan Tali = 'T' (Take-up / Tarik dan Kencangkan Tali, Kurangi Kendur)
- 4 Tarikan Tali Berulang = 'H' (HELP / KONDISI DARURAT, TARIK PEKERJA KELUAR SEGERA!).
3. Sistem Alarm Suara dan Sirene Evakuasi (Evacuation Horn):
Penggunaan klakson udara portabel bertekanan gas yang menghasilkan bunyi melengking 120 dB untuk memberikan perintah evakuasi darurat tanpa kata-kata kepada seluruh personel di area kerja pabrik {$regionName}.

Simulasi berkala memastikan seluruh regu kerja memahami makna setiap kode dan isyarat tanpa keraguan sedetik pun saat kondisi darurat melanda.";
        $ch13 = "BAB 13: TEKNIK PENYELAMATAN DARURAT TANPA MASUK (NON-ENTRY RESCUE SYSTEM)\nMetode penyelamatan paling aman yang wajib dipersiapkan sebelum izin kerja ruang terbatas disahkan di {$regionName}:
1. Konfigurasi Tripod Keselamatan dan Winch Penyelamat Mekanikal:
Tripod aluminium berkekuatan uji beban statis minimal 22 kN (5.000 lbs) didirikan tepat tegak lurus di atas sumbu lubang manhole vertikal. Kaki tripod dikunci dengan pin baja pengaman dan diikat dengan rantai atau webbing pengikat bawah agar kaki tripod tidak meleset saat menerima beban hentakan di lantai pabrik yang berminyak di {$regionName}.
2. Sistem Self-Retracting Lifeline (SRL) dengan Fitur Emergency Retrieval:
Tali baja anti-karat (galvanized / stainless steel wire rope) berdiameter 5 mm terhubung dari winch tripod langsung ke D-Ring punggung pekerja di dalam melalui blok katrol penuntun (pulley head). Selama bekerja normal, kabel SRL bergerak mengulur dan menarik otomatis mengikuti langkah pekerja. Jika pekerja pingsan mendadak akibat paparan gas beracun, petugas jaga di luar langsung memutar tuas transmisi mekanik winch untuk menarik tubuh korban naik ke atas permukaan bibir manhole dalam waktu kurang dari 90 detik, tanpa petugas jaga harus mengambil risiko maut memasuki ruangan beracun.
3. Batasan dan Syarat Penggunaan Non-Entry Rescue:
Metode ini hanya efektif apabila jalur evakuasi korban bebas dari halangan struktur internal (pipa melintang, tangga, atau bilah mixer) dan lubang manhole memiliki bukaan lurus vertikal.

Pelatihan teknis di {$regionName} memprioritaskan metode non-entry ini karena secara statistik mampu memangkas angka kematian penyelamat hingga di atas 85%.";
        $ch14 = "BAB 14: STRATEGI DAN TAKTIK PENYELAMATAN DENGAN MASUK (ENTRY RESCUE PROTOCOL)\nApabila korban terjepit struktur internal atau tali keselamatan terputus di dalam tangki di {$regionName}:
1. Kualifikasi Otorisasi Tim Penyelamat Khusus (Designated Rescue Team):
Hanya personel regu penyelamat yang memiliki sertifikasi Training Penyelamat (Rescue) Confined Space resmi yang berhak melakukan operasi penyelamatan masuk ke dalam ruangan. Pekerja biasa atau rekan korban dilarang keras mencoba menjadi pahlawan tanpa peralatan lengkap karena hal tersebut terbukti memicu kematian ganda.
2. Struktur Tim Minimum Penyelamatan Masuk (Entry Rescue Squad):
Operasi penyelamatan masuk wajib diawaki minimal oleh 4 personel terlatih: (a) 1 Orang Incident Commander / Entry Supervisor yang memegang kendali komando di luar manhole; (b) 2 Orang Entry Rescuer yang masuk ke dalam ruangan secara berpasangan (Buddy System) mengenakan SCBA 300 bar; dan (c) 1 Orang Standby Backup Rescuer yang bersiaga penuh di bibir manhole dengan masker SCBA terpasang di wajah, siap masuk membantu tim utama bila terjadi insiden tak terduga.
3. Prosedur Ventilasi Agresif dan Suplai Udara Darurat:
Sebelum tim penyelamat melangkah masuk ke dalam tangki di {$regionName}, debit blower ventilasi dimaksimalkan ke kapasitas tertinggi untuk memasok udara segar ke arah korban. Tim penyelamat membawa tabung pernapasan darurat (Escape Breathing Apparatus / EEBD) atau selang cadangan untuk segera dipasangkan ke wajah korban sebelum proses evakuasi pemindahan dilakukan.

Disiplin komando dan ketenangan mental regu penyelamat di {$regionName} menjamin setiap manuver evakuasi terlaksana dalam batas waktu jendela emas (golden hour) penyelamatan otak.";
        $ch15 = "BAB 15: TEKNIK TALI-TEMALI, RIGGING, DAN MECHANICAL ADVANTAGE HAULING SYSTEM\nPenguasaan sistem katrol mekanis melipatgandakan tenaga tim penyelamat saat mengevakuasi korban di lapangan {$regionName}:
1. Prinsip Mechanical Advantage (MA) Rasio 3:1 dan 4:1:
Mengangkat beban tubuh manusia berbobot 80 kg dari kedalaman tangki 15 meter secara tarikan manual langsung menimbulkan kelelahan fisik ekstrem dan risiko cedera tulang belakang bagi penyelamat. Dengan merangkai sistem katrol rasio 3:1 (Z-Rig) atau 4:1 (Piggyback Hauling System), gaya tarikan yang dibutuhkan tereduksi secara drastis menjadi hanya sekitar 20 hingga 25 kg tenaga fisik.
2. Perangkat Penahan Penurunan Beban (Progress Capture Device / PCD):
Sistem rigging wajib dilengkapi alat pencegah beban merosot ke bawah, seperti Petzl I'D, RIG, atau Prusik Hitch berbahan aramid tahan panas. Perangkat ini secara otomatis mengunci tali traksi saat tuas tarikan dilepaskan, menjamin korban tidak terjatuh kembali ke dasar tangki.
3. Evaluasi Titik Angkur Keselamatan (Anchor Points Evaluation):
Titik angkur pada balok baja struktural (I-Beam) atau pilar beton fasilitas industri di {$regionName} wajib dievaluasi kekuatannya minimal mampu menahan beban statis 15 kN (~1.500 kg) untuk satu orang dan 22 kN untuk sistem penyelamatan dua orang. Penggunaan sling webbing bulat (round sling), carabiner triact-lock berstandar EN 362, dan pelindung sudut tali (edge roller / edge protector) dipraktikkan secara ketat.

Kombinasi sains fisika mekanika dan jam terbang rigging melahirkan tim penyelamat yang tangguh, cekatan, dan mampu beroperasi di ruang tersulit sekalipun di {$regionName}.";
        $ch16 = "BAB 16: PENGGUNAAN TANDU PENYELAMAT KHUSUS SKED STRETCHER DAN BASKET LITTER\nEvakuasi korban melalui lubang manhole berdiameter sempit (< 60 cm) di {$regionName} membutuhkan tandu berdesain aerodinamis khusus:
1. Spesifikasi Teknis Tandu Sked (Sked Rescue System):
Tandu Sked terbuat dari formula lembaran plastik polietilen elastis berkekuatan tinggi yang sangat licin saat diseret di atas lantai kasar atau dinding baja tangki. Saat korban dibaringkan di atasnya, tandu digulung membungkus tubuh korban secara rapat hingga membentuk silinder kaku berdiameter hanya 45 - 50 cm. Konfigurasi ini memungkinkan korban ditarik keluar secara vertikal melewati lubang manhole yang sangat sempit tanpa menyangkut.
2. Imobilisasi Cervical Spine dan Papan Punggung (Spine Board):
Mengingat korban kecelakaan confined space kerap mengalami jatuh dari tangga vertikal tangki, pemasangan kolar penyangga leher (cervical collar) wajib dilakukan sebelum korban dipindahkan. Hal ini mutlak guna mencegah kelumpuhan permanen atau kematian akibat dislokasi tulang leher korban saat ditarik ke atas.
3. Teknik Penyeimbangan Tandu Horizontal dan Vertikal:
Peserta pelatihan dilatih merangkai tali kekang (bridal strap) untuk memposisikan tandu secara horizontal saat melintasi lorong terowongan datar, serta mengubahnya secara cepat menjadi posisi vertikal tegak lurus saat melewati mulut manhole keluar di {$regionName}.

Keterampilan membebat dan memposisikan korban secara presisi di {$regionName} menjaga kestabilan tanda-tanda vital selama proses pengangkatan menuju ambulans darurat.";
        $ch17 = "BAB 17: PERTOLONGAN PERTAMA PADA KECELAKAAN (P3K) GAWAT DARURAT DI RUANG TERBATAS\nTindakan medis darurat pada menit-menit awal pasca-evakuasi menentukan keselamatan nyawa korban di {$regionName}:
1. Protokol Bantuan Hidup Dasar (Basic Life Support / BLS):
Segera setelah korban berhasil dikeluarkan ke udara bebas di luar manhole, tim medis memeriksa kesadaran (response), jalan napas (airway), pernapasan (breathing), dan denyut nadi karotis (circulation).
2. Resusitasi Jantung Paru (CPR / RJP) dan Pemasangan AED Portabel:
Bila korban mengalami henti napas dan henti jantung akibat keracunan gas H2S atau asfiksia oksigen, kompresi dada berkecepatan 100 - 120 kali per menit dengan kedalaman 5 - 6 cm wajib dilakukan secara kontinu tanpa interupsi. Tim penyelamat memasang elektroda Automated External Defibrillator (AED) portabel untuk mendeteksi ritme fibrilasi ventrikel dan memberikan kejutan defibrilasi bila diinstruksikan oleh mesin AED.
3. Terapi Oksigen Konsentrasi Tinggi (High-Flow Oxygen Therapy):
Untuk korban yang terpapar gas Karbon Monoksida (CO) atau asap beracun, pemberian oksigen medis murni 100% menggunakan masker Non-Rebreather Mask (NRM) dengan aliran debit 12 - 15 liter/menit wajib diberikan seketika. Terapi ini memperpendek waktu paruh eliminasi karboksihemoglobin (CO-Hb) di dalam darah dari 320 menit (udara biasa) menjadi hanya sekitar 80 menit, menyelamatkan organ otak dan jantung dari kerusakan permanen sebelum ambulans tiba di fasilitas {$regionName}.

Kesiapan kotak P3K standar industri dan keterampilan paramedis lapangan ini menjadi penyambung asa kehidupan bagi pekerja di fasilitas industri {$regionName}.";
        $ch18 = "BAB 18: K3 PEKERJAAN PANAS (HOT WORK) DI DALAM RUANG TERBATAS\nPekerjaan pengelasan listrik, pemotongan blender gas, dan penggerindaan di dalam confined space di {$regionName} melipatgandakan potensi risiko kebakaran dan peledakan dahsyat:
1. Kewajiban Izin Ganda (Dual Permit Requirement):
Setiap aktivitas yang menghasilkan percikan api atau panas di dalam ruang terbatas wajib mengantongi dua izin resmi yang aktif bersamaan: Confined Space Entry Permit dan Hot Work Permit.
2. Syarat Mutlak Konsentrasi Gas Mudah Terbakar Wajib Nol Persen:
Sebelum percikan api pengelasan dinyalakan, hasil pengujian gas detector pada seluruh sudut ruangan wajib menunjukkan angka mutlak 0% LEL (Nol Persen LEL), bukan sekadar di bawah 10% LEL. Bila terdapat sisa uap bahan bakar sedikit pun, pembersihan ulang dan ventilasi paksa wajib diulang hingga angka 0% tercapai.
3. Pengendalian Asap dan Gas Beracun Pengelasan (Welding Fumes Local Exhaust):
Proses pengelasan menghasilkan asap beracun logam berat (Ozon, Nitrogen Dioksida, Kromium Heksavalen) yang dapat merusak paru-paru pekerja dalam ruangan sempit. Blower penghisap asap lokal (Local Exhaust Ventilation / LEV) dengan corong fleksibel wajib diletakkan tepat pada jarak 15 - 20 cm dari busur api las untuk menyedot asap keluar ruangan secara instan.
4. Pengawasan Bahaya Kebakaran Berkelanjutan (Fire Watch Protocol):
Petugas khusus pengawas kebakaran (Fire Watch) bersiaga di luar manhole dengan alat pemadam api ringan (APAR) serbuk kimia kering 9 kg siap pakai. Tabung gas elpiji, asetilen, dan oksigen las dilarang keras dimasukkan ke dalam tangki; hanya selang las dan gagang blender yang boleh masuk, dilengkapi dengan katup penahan arus balik api (flashback arrestor). Pengawasan kebakaran berlanjut hingga 30 menit setelah pekerjaan las selesai guna mencegah kebakaran sekunder dari bara api tersembunyi di fasilitas {$regionName}.

Disiplin izin kerja ganda ini terbukti mampu mengeliminasi insiden kebakaran tragis di tangki-tangki industri wilayah {$regionName}.";
        $ch19 = "BAB 19: SPESIFIKASI PEKERJAAN CONFINED SPACE PADA INDUSTRI MIGAS DAN PETROKIMIA\nKawasan kilang pengolahan minyak, depo penimbunan BBM, terminal gas alam, dan industri petrokimia di {$regionName} menyimpan kompleksitas bahaya kimia tingkat tinggi:
1. Bahaya Pyrophoric Iron Sulfide (FeS) dan Teknik Mitigasinya:
Pada tangki penimbunan minyak mentah (crude oil) dan sistem perpipaan gas asam, endapan karat besi bereaksi dengan gas H2S membentuk endapan besi sulfida piroforik. Ketika dinding tangki dibuka dan endapan ini mongering serta terpapar oksigen udara luar, endapan ini dapat terbakar secara spontan (spontaneous ignition) tanpa adanya percikan api luar. Teknisi K3 di {$regionName} diajarkan metode pembasahan terus-menerus (continuous water wetting down) pada dinding tangki selama proses pembersihan hingga seluruh kerak sludge berhasil dikeluarkan secara aman.
2. Bahaya Paparan Senyawa Karsinogenik Benzena dan VOC:
Sludge dasar tangki minyak mengandung senyawa hidrokarbon volatil benzena yang bersifat karsinogenik (pemicu leukemia) dengan nilai batas pajanan TLV-TWA sangat rendah (0.5 ppm). Teknisi pembersih tangki wajib mengenakan pakaian pelindung kimia bertekanan positif (Chemical Protective Suit Level B) yang terhubung dengan suplai udara independen.
3. Penggunaan Perkakas Tangan Non-Sparking (Beryllium Copper Tools):
Seluruh perkakas tangan seperti palu, pahat pengerok, dan kunci pas yang digunakan di dalam tangki bahan bakar minyak wajib terbuat dari paduan tembaga-berilium (beryllium copper) atau aluminium-perunggu yang tidak memercikkan bunga api saat berbenturan dengan dinding baja tangki.

Standarisasi petrokimia kelas internasional ini diadopsi secara utuh dalam modul pelatihan di {$regionName} demi menjaga keandalan fasilitas energi vital nasional.";
        $ch20 = "BAB 20: SPESIFIKASI PEKERJAAN CONFINED SPACE PADA PABRIK KELAPA SAWIT DAN TANGKI CPO\nIndustri perkebunan kelapa sawit, pabrik minyak goreng, dan dermaga tangki timbun CPO di wilayah {$regionName} menyimpan risiko biokimia dan mekanik yang sangat spesifik:
1. Bahaya Fermentasi Biologis dan Gas Metana pada Tangki CPO:
Minyak sawit mentah (Crude Palm Oil) yang tersimpan di dalam tangki timbun berkapasitas ribuan ton dapat mengalami fermentasi anaerobik bila tercampur air endapan. Proses ini menghasilkan gas metana yang sangat mudah terbakar dan menguras habis kandungan oksigen di bagian atas kubah tangki (headspace). Sebelum teknisi masuk untuk pembersihan dinding, pengujian gas metana dan defisiensi O2 wajib dilakukan secara komprehensif.
2. Bahaya Mekanikal pada Bejana Clarifier, Sterilizer, dan Digester:
Pekerjaan pemeliharaan di dalam bejana pelumat buah sawit (digester) dan bejana pemisah lumpur (clarifier) menuntut penerapan isolasi LOTO ganda pada poros pengaduk mekanis serta penutupan katup uap panas (steam) bersuhu di atas 100°C yang dapat merebus pekerja seketika bila katup bocor.
3. Bahaya Terpeleset dan Tenggelam dalam Minyak Kental (Engulfment Hazard):
Dinding dan lantai tangki CPO sangat licin akibat lapisan lemak sawit. Pekerja wajib mengenakan sepatu boot bersol anti-slip khusus dan harness yang selalu terhubung pada tali penyelamat guna mencegah tergelincir masuk ke dalam kubangan endapan lumpur minyak kental di dasar tangki fasilitas {$regionName}.

Pemahaman kontekstual terhadap industri agribisnis lokal ini membekali teknisi di {$regionName} dengan keunggulan kompetitif yang relevan dengan kebutuhan pabrik kelapa sawit setempat.";
        $ch21 = "BAB 21: SPESIFIKASI PEKERJAAN CONFINED SPACE PADA INSTALASI IPAL, DRAINASE, DAN SEWER\nJaringan pengolahan air limbah domestik perkotaan, gorong-gorong saluran drainase jalan raya, dan septic tank industri di {$regionName} merupakan habitat utama gas mematikan:
1. Akumulasi Gas H2S, Metana, dan Amonia pada Endapan Lumpur Organik:
Air limbah yang mengalir di saluran bawah tanah kaya akan bakteri pembusuk yang menghasilkan konsentrasi gas H2S dan metana dalam jumlah sangat masif. Lapisan lumpur dasar gorong-gorong menyimpan gelembung gas beracun pekat yang dapat meletup keluar saat lumpur terinjak oleh sepatu bot pekerja. Oleh sebab itu, sebelum melangkah di saluran drainase {$regionName}, uji atmosfer terus-menerus wajib dijalankan.
2. Bahaya Banjir Bandang dan Gelombang Air Tiba-Tiba (Surge / Inundation Hazard):
Pekerja di dalam gorong-gorong bawah tanah menghadapi risiko maut hanyut atau tenggelam akibat luapan air hujan deras (flash flood) yang terjadi di bagian hulu wilayah {$regionName}, meskipun di lokasi mulut manhole kondisi cuaca terlihat cerah. SOP K3 mewajibkan pemantauan radar cuaca BMKG secara berkala, penempatan petugas pengawas aliran di hulu saluran, serta pemasangan jaring pengaman dan tali penambat darurat.
3. Bahaya Infeksi Biologis (Biological Hazards):
Limbah cair mengandung jutaan patogen virus dan bakteri berbahaya (leptospirosis, hepatitis, tetanus). Pekerja wajib divaksinasi dan mengenakan pakaian pelindung kedap air (waterproof coverall) serta masker respirator dengan filter partikulat P100.

Infrastruktur sanitasi dan utilitas perkotaan di {$regionName} bergantung penuh pada profesionalisme para petugas terlatih yang menguasai modul perlindungan komprehensif ini.";
        $ch22 = "BAB 22: MANAJEMEN PENGAWASAN KONTRAKTOR PIHAK KETIGA (CONTRACTOR SAFETY MANAGEMENT)\nPengawasan terhadap vendor, kontraktor pembersihan tangki, dan pihak ketiga di fasilitas industri {$regionName}:
1. Kualifikasi Pra-Syarat Kompetensi Personel Kontraktor:
Manajemen perusahaan pemberi kerja di {$regionName} wajib menetapkan standar baku: setiap personel kontraktor yang akan bertugas di ruang terbatas wajib memiliki sertifikat lisensi K3 Ruang Terbatas (Muda, Madya, Utama) yang diterbitkan secara sah oleh Kementerian Ketenagakerjaan RI dan masih berlaku aktif.
2. Verifikasi dan Kalibrasi Alat Kerja Kontraktor:
Sebelum pekerjaan dimulai, petugas K3 pabrik memeriksa kondisi fisik harness, tali lifeline, masa berlaku sertifikat kalibrasi gas detector milik kontraktor, uji hidrostatik tabung SCBA, serta kelayakan sertifikasi uji beban tripod winch yang dibawa ke lokasi kerja.
3. Pre-Job Safety Meeting dan Penandatanganan Izin Masuk Bersama:
Entry Supervisor dari pihak pabrik bersama perwakilan kontraktor menyelenggarakan safety briefing untuk menyelaraskan pemahaman mengenai prosedur tanggap darurat, jalur evakuasi, nomor hotline bantuan medis pabrik di {$regionName}, dan penandatanganan lembar Entry Permit secara bersama.

Penerapan Contractor Safety Management System (CSMS) yang konsisten menghilangkan celah miskomunikasi antara pemilik fasilitas dan pelaksana kerja di lapangan {$regionName}.";
        $ch23 = "BAB 23: INVESTIGASI KECELAKAAN KERJA DAN ANALISIS AKAR MASALAH (ROOT CAUSE ANALYSIS)\nPembelajaran mendalam dari insiden kecelakaan fatal ruang terbatas di masa lalu guna mencegah keberulangan di {$regionName}:
1. Metodologi Analisis 5-Whys dan Diagram Tulang Ikan (Fishbone Ishikawa):
Peserta pembinaan dilatih untuk tidak berhenti pada kesimpulan dangkal 'kesalahan manusia' (human error). Melalui teknik 5-Whys, investigasi menelusuri akar masalah sistematis di tingkat manajemen: Mengapa pekerja masuk tanpa SCBA? Karena tidak ada pengujian gas. Mengapa tidak ada pengujian gas? Karena alat detector rusak dan tidak dikalibrasi. Mengapa alat rusak dibiarkan? Karena ketiadaan anggaran pemeliharaan K3 dan lemahnya audit manajemen.
2. Perumusan Rencana Tindakan Korektif dan Preventif (CAPA):
Menghasilkan rekomendasi konkret: perombakan SOP Izin Masuk, pengadaan peralatan otomatisasi pembersihan tangki tanpa manusia (no-man entry automated tank cleaning / tank cleaning robotic), pemasangan sensor gas permanen dengan alarm otomatis, serta pelaksanaan audit berkala kepatuhan prosedur di fasilitas industri {$regionName}.

Budaya belajar dari kegagalan masa lalu mentransformasi sistem keselamatan kerja di {$regionName} menjadi semakin tangguh, adaptif, dan berorientasi pada pencegahan proaktif.";
        $ch24 = "BAB 24: SILABUS KURIKULUM LENGKAP 32 JAM PELAJARAN (JP) DAN JADWAL REGULER DI {$regionName}\nProgram pembinaan {$fullTitle} diselenggarakan secara profesional dalam format tatap muka intensif kelas teori dan simulasi praktik lapangan langsung:
Rincian Agenda Modul Pelatihan Resmi:
- Hari 1: Regulasi K3 Ruang Terbatas (UU 1/1970, Kepdirjen 113/2006, Permenaker 5/2018), Anatomi & Karakteristik Confined Space, Toksikologi Bahaya Atmosferik Gas Toksik & Flammable, dan Doktrin Perlindungan Nyawa (8 JP).
- Hari 2: Manajemen Prosedur Izin Masuk (Entry Permit), Sistem Isolasi Energi LOTO, Praktikum Pengoperasian Gas Detector 4 Gas, Teknik Bump Test & Kalibrasi Sensor, serta Rekayasa Kalkulasi Ventilasi Blower (8 JP).
- Hari 3: Standardisasi APD Khusus, Praktikum Pemasangan Full Body Harness Kelas E, Penggelaran Tripod Winch Retrieval System, dan Praktikum Pengoperasian Unit SCBA Bertekanan Positif 300 Bar (8 JP).
- Hari 4: Simulasi Tanggap Darurat Skenario Evakuasi Non-Entry Rescue dan Entry Rescue Terpadu, Penanganan Medis P3K, Resusitasi CPR & AED, Evaluasi Ujian Teori Nasional Kemnaker RI, dan Ujian Praktik Lapangan Komprehensif (8 JP).

Informasi Pendaftaran dan Layanan Konsultasi Pelatihan Resmi untuk Wilayah {$regionName}:
Untuk pendaftaran kelas publik reguler maupun penyelenggaraan in-house training khusus di fasilitas perusahaan Anda di {$regionName}, silakan menghubungi tim sekretariat resmi kami melalui layanan WhatsApp resmi:
- WhatsApp Utama Pendaftaran: 081399810272
- Layanan Hotline Khusus Detail Program & Kuota Peserta:
  1. Hotline 1: 08118500177
  2. Hotline 2: 081399810272
  3. Hotline 3: 087894580806
  4. Hotline 4: 087894580649

Fasilitas pelatihan mencakup modul materi cetak eksklusif, sertifikat pembinaan resmi Kemnaker RI, lisensi K3 resmi, makan siang, coffee break, serta simulasi praktik pada fasilitas confined space simulator berstandar nasional.";
        $ch25 = "BAB 25: PENGELOLAAN BEJANA TEKAN, TANGKI PENYIMPANAN, DAN SILO VERTIKAL DI {$regionName}\nKajian rekayasa teknis perlakuan pada infrastruktur bejana industri bertekanan dan penyimpanan curah:
1. Bahaya Keracunan Gas Terperangkap di Bawah Kerak Karat Bejana Tekan:
Bejana tekan yang digunakan dalam proses petrokimia dan gas industri seringkali menyimpan perangkap gas beracun (seperti gas asam atau merkaptan) di bawah kerak dinding bejana. Gas ini tidak terdeteksi saat pengujian udara awal, namun terlepas masif saat dilakukan pengerokan manual oleh pekerja di dalam.
2. Bahaya Ledakan Debu Mudah Terbakar (Combustible Dust Explosion) pada Silo:
Silo penyimpanan tepung terigu, biji gandum, serbuk batu bara, atau debu kayu di wilayah {$regionName} menyimpan risiko ledakan dahsyat jika partikel debu tersuspensi di udara dalam konsentrasi tertentu (di atas Minimum Explosive Concentration / MEC) dan tersulut percikan alat listrik. Penggunaan peralatan penerangan tahan ledakan (Ex-proof lighting) bertegangan rendah 24V dan grounding statis menjadi syarat mutlak.

Inspeksi ketebalan dinding menggunakan metode Non-Destructive Testing Ultrasonic Thickness Gauge (NDT UT) dipelajari secara ringkas guna memastikan bejana layak dimasuki tanpa risiko keruntuhan struktur di {$regionName}.";
        $ch26 = "BAB 26: STANDAR KELAYAKAN MEDIS DAN UJI PSIKOLOGIS PEKERJA RUANG TERBATAS\nKebugaran fisik dan stabilitas psikologis pekerja di {$regionName} wajib diverifikasi oleh dokter spesialis okupasi:
1. Pemeriksaan Medis Khusus Laik Kerja (Fit to Work Assessment):
Pekerja confined space wajib dinyatakan sehat secara fisik: terbebas dari riwayat penyakit kardiovaskular, hipertensi tidak terkontrol, epilepsi, hernia abdominal, asma bronkial, dan gangguan fungsi paru.
2. Pengujian Fobia Ruang Tertutup (Claustrophobia Test):
Kondisi mental pekerja diuji secara psikologis di dalam simulator ruangan sempit dan gelap dengan mengenakan masker pernapasan SCBA. Uji ini memastikan pekerja tidak mengalami serangan panik (panic attack) atau hiperventilasi mendadak di dalam confined space yang dapat memicu tindakan ceroboh seperti melepas masker di area beracun fasilitas {$regionName}.

Verifikasi kebugaran ini diulang secara berkala setiap 12 bulan demi menjamin setiap personel yang bertugas di {$regionName} selalu berada dalam kondisi prima terbaik.";
        $ch27 = "BAB 27: GLOSARIUM LENGKAP ISTILAH TEKNIS K3 RUANG TERBATAS (CONFINED SPACES)\nDaftar istilah standar keselamatan resmi bagi seluruh peserta pembinaan di {$regionName}:
- Attendant (Petugas Jaga / Madya): Personel bersertifikat yang bertugas di luar lubang masuk untuk memantau keselamatan pekerja di dalam dan mengendalikan komunikasi darurat.
- Confined Space (Ruang Terbatas): Ruangan berdimensi cukup untuk dimasuki seluruh tubuh, berakses terbatas, dan tidak dirancang untuk ditempati terus-menerus.
- Entrant (Petugas Masuk / Muda): Teknisi yang telah lulus sertifikasi resmi untuk memasuki dan melakukan pekerjaan di dalam ruang terbatas.
- Entry Permit (Izin Masuk): Dokumen otorisasi tertulis yang menetapkan syarat keselamatan untuk memasuki Permit-Required Confined Space.
- Entry Supervisor (Pengawas / Utama): Pejabat K3 berwenang yang mengesahkan, memantau, dan menutup izin kerja masuk ruang terbatas.
- IDLH (Immediately Dangerous to Life or Health): Kondisi atmosfer yang menimbulkan ancaman kematian mendadak atau dampak kesehatan buruk yang tidak dapat dipulihkan.
- LEL (Lower Explosive Limit): Konsentrasi terendah dari gas atau uap mudah terbakar di udara yang mampu menimbulkan nyala api bila ada pemantik.
- LOTO (Lockout / Tagout): Prosedur pemutusan dan penguncian sumber energi berbahaya menggunakan gembok fisik dan label peringatan.
- SCBA (Self-Contained Breathing Apparatus): Alat pelindung pernapasan mandiri bertekanan positif dengan pasokan udara dari tabung komposit 300 bar.
- TLV-TWA (Threshold Limit Value - Time Weighted Average): Batas konsentrasi zat kimia di udara tempat pekerja boleh terpapar selama 8 jam sehari tanpa dampak buruk.
- Bump Test: Pengujian respon fungsi sensor gas detector menggunakan gas kalibrasi campuran sebelum pemakaian harian.
- Purging: Pengurasan atmosfer berbahaya dari ruang terbatas menggunakan gas pendorong inert atau udara bebas bertekanan.
- Engulfment: Bahaya tertimbun atau terhisap cairan atau material butiran padat yang menyumbat saluran pernapasan.
- Sked Stretcher: Tandu evakuasi fleksibel berbahan polietilen tebal khusus evakuasi vertikal melalui lubang manhole sempit.";
        $ch28 = "BAB 28: KETENTUAN HUKUM, SANKSI KELALAIAN K3, DAN INTEGRITAS PROFESIONAL\nSebagai penutup panduan pembinaan resmi {$fullTitle} di {$regionName}, setiap praktisi keselamatan diingatkan pada konsekuensi hukum atas keselamatan jiwa pekerja:
1. Sanksi Hukum atas Kelalaian Fatal K3:
Berdasarkan Pasal 359 Kitab Undang-Undang Hukum Pidana (KUHP), barang siapa karena kesalahannya atau kealpaannya menyebabkan orang lain meninggal dunia (termasuk pimpinan perusahaan atau pengawas yang memerintahkan pekerja masuk ke ruang terbatas tanpa izin permit dan tanpa alat detektor gas), diancam dengan pidana penjara paling lama 5 (lima) tahun. Selain itu, pelanggaran terhadap ketentuan UU No. 1 Tahun 1970 dan regulasi Ketenagakerjaan dapat berakibat pada penutupan sementara tempat kerja, pencabutan izin operasional, serta tuntutan ganti rugi perdata.
2. Integritas dan Kode Etik Profesional K3:
Setiap pemegang sertifikat kompetensi {$programTitle} di {$regionName} terikat pada sumpah integritas profesional: senantiasa mengutamakan keselamatan dan perlindungan nyawa manusia di atas target kecepatan produksi pabrik, berani menggunakan hak Stop Work Authority tanpa ragu saat mendeteksi anomali atmosfer berbahaya, serta menegakkan disiplin keselamatan kerja dengan kejujuran dan dedikasi penuh demi terwujudnya Zero Accident di seluruh sektor industri Republik Indonesia.

Dengan memegang teguh komitmen etika profesi ini, Anda bukan sekadar menjalankan tugas teknis, melainkan menjadi pahlawan pelindung keselamatan bagi keluarga rekan kerja Anda di {$regionName}.";

        return implode("\n\n", [
            $ch1, $ch2, $ch3, $ch4, $ch5, $ch6, $ch7, $ch8, $ch9, $ch10,
            $ch11, $ch12, $ch13, $ch14, $ch15, $ch16, $ch17, $ch18, $ch19, $ch20,
            $ch21, $ch22, $ch23, $ch24, $ch25, $ch26, $ch27, $ch28
        ]);
    }

    /**
     * Get or dynamically generate a 6000-9000 word article
     */
    public static function getOrGenerateArticleBySlug(string $programSlug, string $articleSlug, string $regionName, ?string $districtName = null): Article
    {
        $program = static::findProgram($programSlug) ?: static::getMasterPrograms()[0];
        $displayRegion = $districtName ? "{$districtName}, {$regionName}" : $regionName;

        // Check if article with this slug exists
        $article = Article::where('slug', $articleSlug)->first();
        if ($article && str_word_count(strip_tags($article->content)) >= 6000) {
            return $article;
        }

        // Generate full 6000-9000 words
        $topics = static::get200Topics();
        $matchedTopic = $topics[0];
        foreach ($topics as $t) {
            if (Str::slug($t['title']) === Str::slug(str_replace("-di-{$regionName}", '', $articleSlug)) || Str::contains($articleSlug, Str::slug($t['title']))) {
                $matchedTopic = $t;
                break;
            }
        }

        $fullTitle = "{$matchedTopic['title']} di {$displayRegion}";
        $content = static::generate6000WordContent($fullTitle, $displayRegion, $program);

        if ($article) {
            $article->update([
                'title' => $fullTitle,
                'content' => $content,
                'program_id' => $program['id'],
                'category' => $program['level_name'] ?? 'K3 Ruang Terbatas',
                'excerpt' => "Panduan resmi kurikulum {$fullTitle}. Mengacu pada regulasi Kemnaker RI, standar internasional OSHA, prosedur Entry Permit, pengoperasian Gas Detector & SCBA, serta teknik evakuasi darurat.",
            ]);
            return $article;
        }

        return Article::create([
            'title' => $fullTitle,
            'slug' => $articleSlug,
            'category' => $program['level_name'] ?? 'K3 Ruang Terbatas',
            'province' => $regionName,
            'province_slug' => Str::slug($regionName),
            'city' => $districtName ?: $regionName,
            'city_slug' => Str::slug($districtName ?: $regionName),
            'district' => $districtName,
            'district_slug' => $districtName ? Str::slug($districtName) : null,
            'program_id' => $program['id'],
            'excerpt' => "Panduan resmi kurikulum {$fullTitle}. Mengacu pada regulasi Kemnaker RI, standar internasional OSHA, prosedur Entry Permit, pengoperasian Gas Detector & SCBA, serta teknik evakuasi darurat.",
            'content' => $content,
            'author' => 'Instruktur Ahli K3 Confined Space Kemnaker RI',
            'read_time' => 35,
            'views_count' => rand(300, 850),
            'is_featured' => true,
            'is_published' => true,
            'meta_title' => "{$fullTitle} | Sertifikasi Kemnaker RI & BNSP",
            'meta_description' => "Informasi lengkap kurikulum, jadwal, dan pendaftaran {$fullTitle}. Hubungi 081399810272 untuk konsultasi resmi.",
        ]);
    }
}
