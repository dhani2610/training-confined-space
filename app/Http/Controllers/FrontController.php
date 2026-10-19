<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Program;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Statistic;
use App\Models\HeroSlide;
use App\Models\Testimonial;
use App\Models\ContactMessage;
use App\Services\RegionService;
use App\Services\ConfinedSpaceSchemeService;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    /**
     * Build dynamic main WhatsApp link
     */
    protected function getWaLink(?string $regionName = null, ?string $programName = null): string
    {
        $phone = Setting::get('whatsapp_number', '081399810272');
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        $template = Setting::get('whatsapp_template', 'Halo Admin Training Confined Space, saya ingin informasi dan konsultasi pendaftaran pelatihan K3 Ruang Terbatas untuk wilayah {region}. Mohon info jadwal terbaru dan persyaratannya.');
        
        $regionText = $regionName ?? 'Nasional';
        $programText = $programName ? " program {$programName}" : '';

        $message = str_replace(
            ['{region}', '{program}'],
            [$regionText, $programText],
            $template
        );

        return "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($message);
    }

    /**
     * Get the 4 official WhatsApp hotlines
     * 1. 08118500177
     * 2. 081399810272 (Main Hotline)
     * 3. 087894580806
     * 4. 087894580649
     */
    protected function get4WaHotlines(?string $regionName = null, ?string $programTitle = null): array
    {
        $regionText = $regionName ?: 'Indonesia';
        $progText = $programTitle ? " program {$programTitle}" : ' Pelatihan K3 Ruang Terbatas';

        $raw1 = Setting::get('whatsapp_detail_1', '08118500177');
        $raw2 = Setting::get('whatsapp_detail_2', '081399810272');
        $raw3 = Setting::get('whatsapp_detail_3', '087894580806');
        $raw4 = Setting::get('whatsapp_detail_4', '087894580649');

        $clean = function($num) {
            $n = preg_replace('/[^0-9]/', '', $num);
            return str_starts_with($n, '0') ? ('62' . substr($n, 1)) : $n;
        };

        $msg1 = "Halo CS 1 Training Confined Space, saya ingin menanyakan jadwal batch terdekat dan ketersediaan kuota{$progText} di {$regionText}.";
        $msg2 = "Halo Admin Utama Training Confined Space, saya ingin konsultasi pendaftaran resmi dan sertifikasi Kemnaker RI / BNSP{$progText} untuk wilayah {$regionText}.";
        $msg3 = "Halo Konsultan Teknis Training Confined Space, saya ingin konsultasi silabus teknis, materi gas detector, dan modul SCBA{$progText} di {$regionText}.";
        $msg4 = "Halo Divisi Kerjasama Perusahaan, kami berminat menyelenggarakan In-House Training Confined Space{$progText} untuk tim kami di {$regionText}. Mohon proposal penawarannya.";

        return [
            [
                'number' => $raw1,
                'clean' => $clean($raw1),
                'title' => 'Hotline 1 (Jadwal & Kuota)',
                'desc' => 'Informasi Jadwal Batch & Ketersediaan Kuota Kelas',
                'icon' => 'bi-calendar2-check',
                'url' => "https://api.whatsapp.com/send?phone={$clean($raw1)}&text=" . urlencode($msg1),
                'badge' => 'Fast Response'
            ],
            [
                'number' => $raw2,
                'clean' => $clean($raw2),
                'title' => 'Hotline Utama (Pendaftaran & Sertifikasi)',
                'desc' => 'Pusat Pendaftaran Resmi Lisensi Kemnaker RI & BNSP',
                'icon' => 'bi-award-fill',
                'url' => "https://api.whatsapp.com/send?phone={$clean($raw2)}&text=" . urlencode($msg2),
                'badge' => 'Hotline Utama'
            ],
            [
                'number' => $raw3,
                'clean' => $clean($raw3),
                'title' => 'Hotline 3 (Silabus & Teknis SCBA)',
                'desc' => 'Konsultasi Kurikulum, Detektor Gas & Praktik Lapangan',
                'icon' => 'bi-book-half',
                'url' => "https://api.whatsapp.com/send?phone={$clean($raw3)}&text=" . urlencode($msg3),
                'badge' => 'Konsultan Teknis'
            ],
            [
                'number' => $raw4,
                'clean' => $clean($raw4),
                'title' => 'Hotline 4 (In-House Training & Korporasi)',
                'desc' => 'Layanan Pelatihan Khusus Perusahaan & Pabrik Industri',
                'icon' => 'bi-buildings-fill',
                'url' => "https://api.whatsapp.com/send?phone={$clean($raw4)}&text=" . urlencode($msg4),
                'badge' => 'B2B & Korporasi'
            ],
        ];
    }

    /**
     * Standard FAQs for Confined Space
     */
    protected function getConfinedSpaceFaqs(string $regionName = 'Indonesia', string $programTitle = 'Training Confined Space'): array
    {
        return [
            [
                'q' => "Apa saja persyaratan wajib untuk mengikuti {$programTitle} di {$regionName}?",
                'a' => "Persyaratan utama meliputi: Fotokopi KTP/Identitas resmi, pas foto terbaru latar belakang merah, ijazah pendidikan minimal SLTA/SMK sederajat (atau D3/S1 untuk Pengawas Utama), surat keterangan sehat dari dokter (bebas penyakit asma, epilepsi, dan claustrophobia), serta surat tugas/rekomendasi bila utusan perusahaan."
            ],
            [
                'q' => "Apakah sertifikasi yang diterbitkan diakui oleh Kementerian Ketenagakerjaan RI (Kemnaker) & BNSP?",
                'a' => "Ya, sertifikat dan lisensi diterbitkan sesuai regulasi resmi Kepdirjen Binwasnaker No. Kep. 113/DJPPK/IX/2006 tentang Pedoman Teknis Pembinaan K3 Ruang Terbatas dan SKKNI K3, sehingga berlaku secara sah di seluruh sektor industri dan diakui secara nasional maupun audit internasional."
            ],
            [
                'q' => "Peralatan keselamatan praktikum apa saja yang disediakan selama pelatihan di {$regionName}?",
                'a' => "Peserta mendapatkan praktikum hands-on dengan peralatan standar industri: Multi-Gas Detector 4 Gas (O2, LEL, CO, H2S), unit tabung SCBA (Self-Contained Breathing Apparatus) 300 Bar bertekanan positif, tripod rescue & winch man-riding, full body harness, blower ventilasi paksa, dan perlengkapan evakuasi darurat stretcher confined space."
            ],
            [
                'q' => "Berapa lama durasi pelatihan dan bagaimana sistem pembinaannya?",
                'a' => "Pelatihan berlangsung intensif selama 3 hingga 5 hari kerja (tergantung jenjang Muda, Madya, Utama, atau Rescue). Sistem mencakup pemaparan teori hukum & regulasi, studi kasus kecelakaan kerja, simulasi izin masuk (entry permit & LOTO), serta praktikum langsung di confined space simulator."
            ],
            [
                'q' => "Bagaimana cara melakukan pendaftaran atau permohonan In-House Training di fasilitas kami?",
                'a' => "Anda dapat langsung menghubungi hotline WhatsApp resmi kami di 081399810272 (Hotline Utama), 08118500177, 087894580806, atau 087894580649 untuk menerima silabus lengkap, jadwal batch publik terdekat di {$regionName}, atau estimasi penawaran in-house training di lokasi kerja Anda."
            ]
        ];
    }

    /**
     * 1. Beranda (Home)
     */
    public function index()
    {
        $programs = Program::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        if ($programs->isEmpty()) {
            $programs = collect(ConfinedSpaceSchemeService::getMasterPrograms());
        }

        $articles = Article::where('is_published', true)->orderBy('id', 'desc')->take(3)->get();
        $faqs = Faq::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        if ($faqs->isEmpty()) {
            $faqs = collect($this->getConfinedSpaceFaqs());
        }

        $statistics = Statistic::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $heroSlides = HeroSlide::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        $provinces = RegionService::getProvinces();
        $waLink = $this->getWaLink();
        $waNumbers = $this->get4WaHotlines('Nasional');

        return view('front.index', compact(
            'programs',
            'articles',
            'faqs',
            'statistics',
            'heroSlides',
            'testimonials',
            'provinces',
            'waLink',
            'waNumbers'
        ));
    }

    /**
     * 2. Tentang Kami (Sejarah, Visi, Misi)
     */
    public function about()
    {
        $programs = Program::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $statistics = Statistic::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $provinces = RegionService::getProvinces();
        $waLink = $this->getWaLink('Tentang Kami');
        $waNumbers = $this->get4WaHotlines('Tentang Kami');

        return view('front.about', compact('programs', 'statistics', 'provinces', 'waLink', 'waNumbers'));
    }

    /**
     * 3. Program List & Detail
     */
    public function programs()
    {
        $programs = Program::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        if ($programs->isEmpty()) {
            $programs = collect(ConfinedSpaceSchemeService::getMasterPrograms());
        }
        $provinces = RegionService::getProvinces();
        $waLink = $this->getWaLink();
        $waNumbers = $this->get4WaHotlines('Nasional');

        return view('front.programs', compact('programs', 'provinces', 'waLink', 'waNumbers'));
    }

    public function programDetail($slug)
    {
        $program = Program::where('slug', $slug)->first();
        if (!$program) {
            $data = ConfinedSpaceSchemeService::findProgram($slug);
            if (!$data) {
                abort(404, 'Program Pelatihan Confined Space tidak ditemukan.');
            }
            $program = (object) $data;
        }

        $otherPrograms = Program::where('slug', '!=', $slug)->where('is_active', true)->get();
        if ($otherPrograms->isEmpty()) {
            $all = ConfinedSpaceSchemeService::getMasterPrograms();
            $otherPrograms = collect(array_filter($all, fn($p) => $p['slug'] !== $slug));
        }

        $provinces = RegionService::getProvinces();
        $waLink = $this->getWaLink('Nasional', $program->title);
        $waNumbers = $this->get4WaHotlines('Nasional', $program->title);
        $faqs = $this->getConfinedSpaceFaqs('Nasional', $program->title);

        return view('front.program-detail', compact(
            'program',
            'otherPrograms',
            'provinces',
            'waLink',
            'waNumbers',
            'faqs'
        ));
    }

    /**
     * 4. Wilayah: Provinsi
     */
    public function wilayahProvinsi($slug)
    {
        $province = RegionService::findProvince($slug);
        if (!$province) {
            abort(404, 'Provinsi tidak ditemukan.');
        }

        $regionName = 'Provinsi ' . $province['name'];
        $programs = ConfinedSpaceSchemeService::getProgramsForRegion($regionName);
        $articles = ConfinedSpaceSchemeService::getArticlesForProgram('training-confined-space-muda', $regionName);
        $waLink = $this->getWaLink($regionName);
        $waNumbers = $this->get4WaHotlines($regionName);
        $faqs = $this->getConfinedSpaceFaqs($regionName);
        $mapsUrl = RegionService::getMapUrl($regionName);

        return view('front.wilayah-provinsi', compact(
            'province',
            'regionName',
            'programs',
            'articles',
            'waLink',
            'waNumbers',
            'faqs',
            'mapsUrl'
        ));
    }

    /**
     * Wilayah: Provinsi -> Program -> 200 Article Cards
     */
    public function wilayahProvinsiProgramDetail($provinceSlug, $programSlug)
    {
        $province = RegionService::findProvince($provinceSlug);
        if (!$province) {
            abort(404, 'Provinsi tidak ditemukan.');
        }

        $regionName = 'Provinsi ' . $province['name'];
        $program = ConfinedSpaceSchemeService::findProgram($programSlug);
        if (!$program) {
            abort(404, 'Program pelatihan tidak ditemukan.');
        }

        $articles = ConfinedSpaceSchemeService::getArticlesForProgram($programSlug, $regionName);
        $kecamatanList = RegionService::getKecamatanForRegion($regionName);
        $mapsUrl = RegionService::getMapUrl($regionName);
        $waLink = $this->getWaLink($regionName, $program['title']);
        $waNumbers = $this->get4WaHotlines($regionName, $program['title']);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $program['title']);
        $otherPrograms = ConfinedSpaceSchemeService::getProgramsForRegion($regionName);

        return view('front.program-region-detail', compact(
            'province',
            'regionName',
            'program',
            'articles',
            'kecamatanList',
            'mapsUrl',
            'waLink',
            'waNumbers',
            'faqs',
            'otherPrograms'
        ));
    }

    /**
     * Wilayah: Provinsi -> Program -> Article Detail (6000-9000 words)
     */
    public function wilayahProvinsiProgramArticleDetail($provinceSlug, $programSlug, $articleSlug)
    {
        $province = RegionService::findProvince($provinceSlug);
        if (!$province) {
            abort(404, 'Provinsi tidak ditemukan.');
        }

        $regionName = 'Provinsi ' . $province['name'];
        $program = ConfinedSpaceSchemeService::findProgram($programSlug);
        if (!$program) {
            abort(404, 'Program pelatihan tidak ditemukan.');
        }

        $article = ConfinedSpaceSchemeService::getOrGenerateArticleBySlug($programSlug, $articleSlug, $regionName);
        $article->increment('views_count');

        $allArticles = ConfinedSpaceSchemeService::getArticlesForProgram($programSlug, $regionName);
        $kecamatanList = RegionService::getKecamatanForRegion($regionName);
        $mapsUrl = RegionService::getMapUrl($regionName);
        $waLink = $this->getWaLink($regionName, $article->title);
        $waNumbers = $this->get4WaHotlines($regionName, $article->title);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $program['title']);

        return view('front.program-article-detail', compact(
            'province',
            'regionName',
            'program',
            'article',
            'allArticles',
            'kecamatanList',
            'mapsUrl',
            'waLink',
            'waNumbers',
            'faqs'
        ));
    }

    /**
     * Wilayah: Kabupaten / Kota
     */
    public function wilayahKabkot($provinceSlug, $kabkotSlug)
    {
        $data = RegionService::findKabkot($provinceSlug, $kabkotSlug);
        if (!$data) {
            abort(404, 'Kabupaten/Kota tidak ditemukan.');
        }

        $province = $data['province'];
        $kabkotName = $data['name'];
        $kecamatanList = $data['kecamatan'] ?? [];

        $programs = ConfinedSpaceSchemeService::getProgramsForRegion($kabkotName);
        $articles = ConfinedSpaceSchemeService::getArticlesForProgram('training-confined-space-muda', $kabkotName);
        $waLink = $this->getWaLink($kabkotName);
        $waNumbers = $this->get4WaHotlines($kabkotName);
        $faqs = $this->getConfinedSpaceFaqs($kabkotName);
        $mapsUrl = RegionService::getMapUrl($kabkotName);

        return view('front.wilayah-kabkot', compact(
            'province',
            'kabkotName',
            'kabkotSlug',
            'kecamatanList',
            'programs',
            'articles',
            'waLink',
            'waNumbers',
            'faqs',
            'mapsUrl'
        ));
    }

    /**
     * Wilayah: Kabupaten / Kota -> Program -> 200 Article Cards
     */
    public function wilayahKabkotProgramDetail($provinceSlug, $kabkotSlug, $programSlug)
    {
        $data = RegionService::findKabkot($provinceSlug, $kabkotSlug);
        if (!$data) {
            abort(404, 'Kabupaten/Kota tidak ditemukan.');
        }

        $province = $data['province'];
        $kabkotName = $data['name'];
        $regionName = $kabkotName;

        $program = ConfinedSpaceSchemeService::findProgram($programSlug);
        if (!$program) {
            abort(404, 'Program pelatihan tidak ditemukan.');
        }

        $articles = ConfinedSpaceSchemeService::getArticlesForProgram($programSlug, $regionName);
        $kecamatanList = $data['kecamatan'] ?? RegionService::getKecamatanForRegion($regionName);
        $mapsUrl = RegionService::getMapUrl($regionName);
        $waLink = $this->getWaLink($regionName, $program['title']);
        $waNumbers = $this->get4WaHotlines($regionName, $program['title']);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $program['title']);
        $otherPrograms = ConfinedSpaceSchemeService::getProgramsForRegion($regionName);

        return view('front.program-region-detail', compact(
            'province',
            'kabkotName',
            'kabkotSlug',
            'regionName',
            'program',
            'articles',
            'kecamatanList',
            'mapsUrl',
            'waLink',
            'waNumbers',
            'faqs',
            'otherPrograms'
        ));
    }

    /**
     * Wilayah: Kabupaten / Kota -> Program -> Article Detail (6000-9000 words)
     */
    public function wilayahKabkotProgramArticleDetail($provinceSlug, $kabkotSlug, $programSlug, $articleSlug)
    {
        $data = RegionService::findKabkot($provinceSlug, $kabkotSlug);
        if (!$data) {
            abort(404, 'Kabupaten/Kota tidak ditemukan.');
        }

        $province = $data['province'];
        $kabkotName = $data['name'];
        $regionName = $kabkotName;

        $program = ConfinedSpaceSchemeService::findProgram($programSlug);
        if (!$program) {
            abort(404, 'Program pelatihan tidak ditemukan.');
        }

        $article = ConfinedSpaceSchemeService::getOrGenerateArticleBySlug($programSlug, $articleSlug, $regionName);
        $article->increment('views_count');

        $allArticles = ConfinedSpaceSchemeService::getArticlesForProgram($programSlug, $regionName);
        $kecamatanList = $data['kecamatan'] ?? RegionService::getKecamatanForRegion($regionName);
        $mapsUrl = RegionService::getMapUrl($regionName);
        $waLink = $this->getWaLink($regionName, $article->title);
        $waNumbers = $this->get4WaHotlines($regionName, $article->title);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $program['title']);

        return view('front.program-article-detail', compact(
            'province',
            'kabkotName',
            'kabkotSlug',
            'regionName',
            'program',
            'article',
            'allArticles',
            'kecamatanList',
            'mapsUrl',
            'waLink',
            'waNumbers',
            'faqs'
        ));
    }

    /**
     * Wilayah: Kecamatan -> Program -> 200 Article Cards
     */
    public function wilayahKecamatanProgramDetail($provinceSlug, $kabkotSlug, $kecamatanSlug, $programSlug)
    {
        $data = RegionService::findKabkot($provinceSlug, $kabkotSlug);
        if (!$data) {
            abort(404, 'Kabupaten/Kota tidak ditemukan.');
        }

        $province = $data['province'];
        $kabkotName = $data['name'];
        $kecamatanName = ucwords(str_replace('-', ' ', $kecamatanSlug));
        $regionName = "Kecamatan {$kecamatanName}, {$kabkotName}";

        $program = ConfinedSpaceSchemeService::findProgram($programSlug);
        if (!$program) {
            abort(404, 'Program pelatihan tidak ditemukan.');
        }

        $articles = ConfinedSpaceSchemeService::getArticlesForProgram($programSlug, $kabkotName, "Kecamatan {$kecamatanName}");
        $kecamatanList = $data['kecamatan'] ?? [];
        $mapsUrl = RegionService::getMapUrl("{$kecamatanName}, {$kabkotName}");
        $waLink = $this->getWaLink($regionName, $program['title']);
        $waNumbers = $this->get4WaHotlines($regionName, $program['title']);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $program['title']);
        $otherPrograms = ConfinedSpaceSchemeService::getProgramsForRegion($regionName);

        return view('front.program-region-detail', compact(
            'province',
            'kabkotName',
            'kabkotSlug',
            'kecamatanName',
            'kecamatanSlug',
            'regionName',
            'program',
            'articles',
            'kecamatanList',
            'mapsUrl',
            'waLink',
            'waNumbers',
            'faqs',
            'otherPrograms'
        ));
    }

    /**
     * Wilayah: Kecamatan -> Program -> Article Detail (6000-9000 words)
     */
    public function wilayahKecamatanProgramArticleDetail($provinceSlug, $kabkotSlug, $kecamatanSlug, $programSlug, $articleSlug)
    {
        $data = RegionService::findKabkot($provinceSlug, $kabkotSlug);
        if (!$data) {
            abort(404, 'Kabupaten/Kota tidak ditemukan.');
        }

        $province = $data['province'];
        $kabkotName = $data['name'];
        $kecamatanName = ucwords(str_replace('-', ' ', $kecamatanSlug));
        $regionName = "Kecamatan {$kecamatanName}, {$kabkotName}";

        $program = ConfinedSpaceSchemeService::findProgram($programSlug);
        if (!$program) {
            abort(404, 'Program pelatihan tidak ditemukan.');
        }

        $article = ConfinedSpaceSchemeService::getOrGenerateArticleBySlug($programSlug, $articleSlug, $kabkotName, "Kecamatan {$kecamatanName}");
        $article->increment('views_count');

        $allArticles = ConfinedSpaceSchemeService::getArticlesForProgram($programSlug, $kabkotName, "Kecamatan {$kecamatanName}");
        $kecamatanList = $data['kecamatan'] ?? [];
        $mapsUrl = RegionService::getMapUrl("{$kecamatanName}, {$kabkotName}");
        $waLink = $this->getWaLink($regionName, $article->title);
        $waNumbers = $this->get4WaHotlines($regionName, $article->title);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $program['title']);

        return view('front.program-article-detail', compact(
            'province',
            'kabkotName',
            'kabkotSlug',
            'kecamatanName',
            'kecamatanSlug',
            'regionName',
            'program',
            'article',
            'allArticles',
            'kecamatanList',
            'mapsUrl',
            'waLink',
            'waNumbers',
            'faqs'
        ));
    }

    /**
     * 5. Artikel Hub
     */
    public function articles(Request $request)
    {
        $query = Article::where('is_published', true)->orderBy('id', 'desc');
        if ($request->has('q') && !empty($request->q)) {
            $keyword = $request->q;
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('excerpt', 'like', "%{$keyword}%")
                  ->orWhere('content', 'like', "%{$keyword}%");
            });
        }

        $articles = $query->paginate(9);
        $programs = Program::where('is_active', true)->get();
        $provinces = RegionService::getProvinces();
        $masterTopics = ConfinedSpaceSchemeService::get200Topics();
        $waLink = $this->getWaLink();
        $waNumbers = $this->get4WaHotlines('Nasional');

        return view('front.articles', compact('articles', 'programs', 'provinces', 'masterTopics', 'waLink', 'waNumbers'));
    }

    public function articleDetail($slug)
    {
        $article = Article::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $article->increment('views_count');

        $relatedArticles = Article::where('id', '!=', $article->id)->where('is_published', true)->take(3)->get();
        $programs = Program::where('is_active', true)->get();
        $provinces = RegionService::getProvinces();
        $regionName = $article->city ?: ($article->province ?: 'Indonesia');
        $waLink = $this->getWaLink($regionName, $article->title);
        $waNumbers = $this->get4WaHotlines($regionName, $article->title);
        $faqs = $this->getConfinedSpaceFaqs($regionName, $article->title);

        return view('front.article-detail', compact(
            'article',
            'relatedArticles',
            'programs',
            'provinces',
            'waLink',
            'waNumbers',
            'faqs'
        ));
    }

    /**
     * 6. Kontak & Form Submission
     */
    public function contact()
    {
        $programs = Program::where('is_active', true)->get();
        $provinces = RegionService::getProvinces();
        $waLink = $this->getWaLink();
        $waNumbers = $this->get4WaHotlines('Nasional');

        return view('front.contact', compact('programs', 'provinces', 'waLink', 'waNumbers'));
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:30',
            'company' => 'nullable|string|max:150',
            'region' => 'nullable|string|max:100',
            'program_id' => 'nullable|exists:programs,id',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Terima kasih! Pesan dan formulir konsultasi Anda telah berhasil terkirim. Tim pendaftaran kami akan segera menghubungi Anda melalui nomor WhatsApp / telepon yang tertera.');
    }
}
