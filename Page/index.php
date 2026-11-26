<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PT. Seoul Nikko Indonesia — Distributor Material Las & Suku Cadang Industri</title>
<meta name="description" content="Distributor resmi NICHIA, KISWEL, Hyundai Welding, Harris dan Kennametal. Bahan las khusus, peralatan industri, dan suku cadang pembangkit listrik. Jakarta sejak 2007.">
<style>
/* ============================================================
   LANDING PAGE SEDERHANA — COMPANY PROFILE PT. SNI
   ------------------------------------------------------------
   Struktur halaman:
     1. Navbar      (logo + menu)
     2. Hero        (judul + ajakan / CTA)
     3. Brand       (daftar merek distribusi)
     4. Tentang     (profil singkat perusahaan)
     5. Layanan     (kartu produk/layanan)
     6. Keunggulan  (alasan memilih kami)
     7. Kontak      (alamat, telepon, email)
     8. Footer
   CSS polos tanpa framework agar mudah dipahami dan diubah.
   ============================================================ */

/* --- Warna & variabel global --- */
:root{
  --primary:#0A3A82;      /* warna utama (biru) */
  --primary-dark:#062a5e; /* warna tombol saat hover */
  --accent:#D8A64A;       /* warna aksen (emas) */
  --text:#1f2937;         /* warna teks utama */
  --text-soft:#5b6572;    /* warna teks sekunder */
  --bg-soft:#f4f7fb;      /* latar bagian abu muda */
  --border:#e3e8ef;       /* warna garis pemisah */
  --radius:14px;          /* sudut membulat kartu */
  --shadow:0 10px 30px rgba(10,58,130,.08);
}

*{margin:0;padding:0;box-sizing:border-box;}

html{scroll-behavior:smooth;}

body{
  font-family:"Segoe UI",Arial,Helvetica,sans-serif;
  color:var(--text);
  line-height:1.7;
}

a{text-decoration:none;color:inherit;}
img{max-width:100%;display:block;}

.container{max-width:1100px;margin:0 auto;padding:0 20px;}
section[id]{scroll-margin-top:80px;} /* agar judul tidak tertutup navbar saat di-klik menu */

/* ---------- 1. NAVBAR ---------- */
.navbar{
  position:sticky;top:0;z-index:10;
  background:#fff;
  border-bottom:1px solid var(--border);
}
.navbar .container{
  display:flex;align-items:center;justify-content:space-between;
  height:70px;
}
.logo{font-size:22px;font-weight:800;color:var(--primary);display:flex;align-items:center;}
.logo img{height:40px;width:auto;max-width:100%;display:block;object-fit:contain;}
.logo span{color:var(--accent);}
.nav-menu{display:flex;gap:24px;list-style:none;align-items:center;}
.nav-menu a{font-weight:600;color:var(--text);}
.nav-menu a:hover{color:var(--primary);}
.btn-cta{
  display:inline-block;background:var(--primary);color:#fff;
  padding:10px 20px;border-radius:8px;font-weight:600;
}
.btn-cta:hover{background:var(--primary-dark);}
.nav-toggle{display:none;background:none;border:1px solid var(--border);border-radius:8px;padding:6px 12px;font-size:18px;cursor:pointer;}

/* ---------- 2. HERO ---------- */
.hero{
  background:linear-gradient(135deg,var(--primary),#123f8f);
  color:#fff;text-align:center;padding:90px 20px;
}
.hero h1{font-size:clamp(28px,5vw,48px);line-height:1.25;margin-bottom:16px;}
.hero p{max-width:640px;margin:0 auto 30px;font-size:18px;color:#dbe4f5;}
.btn-hero{
  display:inline-block;padding:14px 28px;border-radius:8px;
  font-weight:700;margin:6px;
}
.btn-hero.filled{background:var(--accent);color:var(--primary);}
.btn-hero.filled:hover{filter:brightness(1.05);}
.btn-hero.outline{border:2px solid #fff;color:#fff;}
.btn-hero.outline:hover{background:#fff;color:var(--primary);}

/* ---------- 3. BRAND (strip merek) ---------- */
.brands{background:#fff;padding:26px 0;border-bottom:1px solid var(--border);}
.brands .container{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;gap:14px 40px;}
.brands span{font-size:14px;color:var(--text-soft);}
.brands strong{font-size:20px;color:var(--primary);}

/* ---------- BAGIAN UMUM ---------- */
.section{padding:80px 0;}
.section .title{text-align:center;margin-bottom:48px;}
.section .title h2{font-size:32px;color:var(--primary);margin-bottom:8px;}
.section .title p{color:var(--text-soft);max-width:620px;margin:0 auto;}

/* ---------- 4. TENTANG ---------- */
.about{display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center;}
.about-text h2{color:var(--primary);font-size:30px;margin-bottom:16px;}
.about-text p{margin-bottom:16px;color:var(--text-soft);}
.about-text strong{color:var(--text);}
.about-card{
  background:var(--bg-soft);border-radius:var(--radius);padding:32px;
  border-left:4px solid var(--accent);
}
.about-card h3{color:var(--primary);margin-bottom:8px;}

/* ---------- 5. LAYANAN (kartu) ---------- */
.services{background:var(--bg-soft);}
.card-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;}
.card{
  background:#fff;border-radius:var(--radius);padding:28px;
  box-shadow:var(--shadow);border:1px solid var(--border);
}
.card .icon{
  width:52px;height:52px;border-radius:12px;background:var(--primary);
  color:#fff;display:flex;align-items:center;justify-content:center;
  font-size:24px;margin-bottom:16px;
}
.card h3{margin-bottom:10px;color:var(--primary);}
.card p{color:var(--text-soft);font-size:15px;}

/* ---------- 6. KEUNGGULAN ---------- */
.values{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;text-align:center;}
.values .item{padding:24px;}
.values .num{font-size:40px;font-weight:800;color:var(--accent);display:block;margin-bottom:8px;}
.values h3{margin-bottom:8px;}
.values p{color:var(--text-soft);font-size:15px;}

/* ---------- 7. KONTAK ---------- */
.contact{background:var(--primary);color:#fff;}
.contact .section-inner{display:grid;grid-template-columns:1.2fr 1fr;gap:40px;}
.contact h2{font-size:30px;margin-bottom:12px;}
.contact p{color:#cdd9ef;margin-bottom:24px;}
.contact-info{list-style:none;}
.contact-info li{padding:10px 0;border-bottom:1px solid rgba(255,255,255,.15);}
.contact-info strong{color:var(--accent);display:block;font-size:13px;text-transform:uppercase;letter-spacing:.5px;}
.contact-info a:hover{color:var(--accent);}
.wa-btn{
  display:inline-block;margin-top:24px;background:#25D366;color:#fff;
  padding:14px 26px;border-radius:8px;font-weight:700;
}
.wa-btn:hover{background:#1eb958;}
.text-minta-penawaran{color: #fefefe;}

/* ---------- 8. FOOTER ---------- */
footer{background:#06213f;color:#9fb0c8;text-align:center;padding:24px 0;font-size:14px;}

/* ---------- RESPONSIVE (layar kecil / HP) ---------- */
@media (max-width:760px){
  .nav-menu{
    display:none;position:absolute;top:70px;left:0;right:0;
    background:#fff;flex-direction:column;padding:16px 20px;
    border-bottom:1px solid var(--border);
  }
  .nav-menu.open{display:flex;}
  .nav-toggle{display:inline-block;}
  .about,.card-grid,.values,.contact .section-inner{grid-template-columns:1fr;}
}
</style>
</head>
<body>

<!-- ========== 1. NAVBAR ========== -->
<nav class="navbar">
  <div class="container">
    <!-- Ganti teks ini dengan <img src="logo.png"> bila sudah punya file logo -->
    <a href="#" class="logo"><img src="<?= BASE_URL ?>/Public/assets/images/sni.jpg" alt="PT. Seoul Nikko Indonesia" /></a>
    <button class="nav-toggle" id="nav-toggle" aria-label="Buka menu">&#9776;</button>
    <ul class="nav-menu" id="nav-menu">
      <li><a href="#tentang">Tentang</a></li>
      <li><a href="#layanan">Layanan</a></li>
      <li><a href="#keunggulan">Keunggulan</a></li>
      <li><a href="#kontak">Kontak</a></li>
      <li><a href="#kontak" class="btn-cta"><p class="text-minta-penawaran">Minta Penawaran</p></a></li>
    </ul>
  </div>
</nav>

<!-- ========== 2. HERO (judul utama) ========== -->
<header class="hero">
  <h1>Mitra Terpercaya Material Las<br>&amp; Suku Cadang Industri</h1>
  <p>Distributor resmi merek las dunia — melayani pabrik, galangan kapal, dan proyek industri di seluruh Indonesia sejak 2007.</p>
  <a href="https://wa.me/62XXXXXXXXXX" class="btn-hero filled">Chat WhatsApp</a>
  <a href="#layanan" class="btn-hero outline">Lihat Layanan</a>
</header>

<!-- ========== 3. BRAND (merek yang didistribusikan) ========== -->
<div class="brands">
  <div class="container">
    <span>Distributor resmi:</span>
    <strong>NICHIA</strong><strong>Nikkei Aluminium</strong><strong>KISWEL</strong>
    <strong>Hyundai Welding</strong><strong>Harris</strong><strong>Kennametal</strong>
  </div>
</div>

<!-- ========== 4. TENTANG (profil singkat) ========== -->
<section class="section" id="tentang">
  <div class="container about">
    <div class="about-text">
      <h2>Tentang Kami</h2>
      <p><strong>PT. Seoul Nikko Indonesia</strong> adalah distributor material las khusus dan suku cadang industri yang berkedudukan di <strong>LTC Glodok, Jakarta</strong>, sejak tahun 2007.</p>
      <p>Kami memasok <strong>bahan las</strong> (elektroda, kawat las, flux) untuk berbagai aplikasi — dari baja karbon, stainless, hingga paduan nikel — serta <strong>suku cadang tahan aus untuk pembangkit listrik</strong> (coal mill &amp; boiler).</p>
      <p>Seluruh produk berasal dari pabrikan ternama Korea dan Jepang dengan kualitas setara OEM.</p>
    </div>
    <div class="about-card">
      <h3>Visi Kami</h3>
      <p>Menjadi mitra material las dan suku cadang industri yang paling dipercaya di Indonesia — melayani dari bengkel kecil hingga proyek nasional.</p>
    </div>
  </div>
</section>

<!-- ========== 5. LAYANAN (kartu produk) ========== -->
<section class="section services" id="layanan">
  <div class="container">
    <div class="title">
      <h2>Layanan &amp; Produk Kami</h2>
      <p>Lengkap untuk kebutuhan bengkel, fabrikasi, hingga pemeliharaan pabrik.</p>
    </div>
    <div class="card-grid">
      <div class="card">
        <div class="icon">&#9889;</div>
        <h3>Bahan Las</h3>
        <p>Elektroda &amp; kawat las baja karbon, stainless, hardfacing, tahan panas, besi cor, dan logam non-besi.</p>
      </div>
      <div class="card">
        <div class="icon">&#128736;</div>
        <h3>Peralatan &amp; Mesin Las</h3>
        <p>Mesin las, aksesori, alat ukur, kompresor, generator, dan perkakas industri pendukung.</p>
      </div>
      <div class="card">
        <div class="icon">&#127981;</div>
        <h3>Suku Cadang Pembangkit</h3>
        <p>Roll tire, table liner, throat ring, pelat hardfacing, dan pelapis keramik untuk PLTU.</p>
      </div>
    </div>
  </div>
</section>

<!-- ========== 6. KEUNGGULAN (alasan memilih) ========== -->
<section class="section" id="keunggulan">
  <div class="container">
    <div class="title">
      <h2>Kenapa Memilih Kami?</h2>
      <p>Tiga alasan pelanggan mempercayakan kebutuhan materialnya kepada kami.</p>
    </div>
    <div class="values">
      <div class="item">
        <span class="num">01</span>
        <h3>Material yang Tepat</h3>
        <p>Kami merekomendasikan material sesuai aplikasi dan kondisi kerja Anda — bukan sekadar menjual.</p>
      </div>
      <div class="item">
        <span class="num">02</span>
        <h3>Pasokan Cepat &amp; Pasti</h3>
        <p>Penawaran cepat dan jadwal pengiriman yang ditepati, karena waktu henti pabrik sangat mahal.</p>
      </div>
      <div class="item">
        <span class="num">03</span>
        <h3>Kemitraan Jangka Panjang</h3>
        <p>Dari bengkel kecil sampai proyek nasional, kami ingin tumbuh bersama industri Indonesia.</p>
      </div>
    </div>
  </div>
</section>

<!-- ========== 7. KONTAK ========== -->
<section class="section contact" id="kontak">
  <div class="container section-inner">
    <div>
      <h2>Butuh Penawaran?</h2>
      <p>Kirim daftar kebutuhan, nomor part, atau gambar teknis Anda. Tim kami akan segera membalas dengan penawaran harga.</p>
      <!-- GANTI 62XXXXXXXXXX dengan nomor WhatsApp aktif, contoh: https://wa.me/6281234567890 -->
      <a href="https://wa.me/62XXXXXXXXXX" class="wa-btn" target="_blank" rel="noopener">Chat via WhatsApp</a>
    </div>
    <ul class="contact-info">
      <li><strong>Alamat</strong>LTC Glodok Lt. GF2 Blok RA 70, Jl. Hayam Wuruk No. 127, Jakarta Barat 11180</li>
      <li><strong>Telepon</strong><a href="tel:+622126071148">021 2607 1148</a> / <a href="tel:+622126071149">021 2607 1149</a></li>
      <li><strong>Fax</strong>021 2607 1158</li>
      <li><strong>Email</strong><a href="mailto:adm@seoulnikko.com">adm@seoulnikko.com</a></li>
    </ul>
  </div>
</section>

<!-- ========== 8. FOOTER ========== -->
<footer>
  <p>&copy; 2026 PT. Seoul Nikko Indonesia — Jakarta, Indonesia</p>
</footer>

<!-- JS kecil: hanya untuk menu di layar HP -->
<script>
  var toggle = document.getElementById('nav-toggle');
  var menu = document.getElementById('nav-menu');
  toggle.addEventListener('click', function () {
    menu.classList.toggle('open');
  });
</script>
</body>
</html>