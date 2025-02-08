<?php
include('../config/koneksi.php');
include('header.php');
?>

<!-- CSS Index -->
<link rel="stylesheet" href="css/styles.css" />

<!-- Main -->
<section class="main" id="main" style="background-image: url('foto/main-bg.jpg'); background-repeat: no-repeat; background-size: cover; position: relative;">
    <main class="content">
        <h1>Salamaki Ka Battuanta di Web Tau'na Makassar</h1>
        <p>
            Kota Makassar itu berada di Daerah Sulawesi Selatan lho, mau tau apa
            saja sih keunikan dan budaya yang ada di sana?
        </p>
        <a href="daerah.php" class="mainbtn">Yuk Cari Tau</a>
    </main>
</section>

<!-- Perkenalan -->
<section class="about" id="about">
    <h2><span>Tentang</span> Kami</h2>

    <div class="row">
        <div class="about-img">
            <img src="foto/logo-fe.jpg" alt="maskot" />
        </div>
        <div class="content">
            <h3>Allo Semuanya</h3>
            <p>Ini adalah Website tentang Kota Makassar.</p>
            <p>
                Perkenalkan, kami dari XI PPLG 2 sedang mengerjakan Tugas Akhir untuk kelas 11.
                Saya Salma Novita, bersama dengan rekan saya Annisa Intan, telah menyelesaikan Website yang bertemakan Nusantara.
                Kalian juga bisa melihat profil kami lebih lengkap <a href="editor.php">di sini</a> ya.
            </p>
        </div>
    </div>
</section>

<!-- Maskot -->
<section class="maskot" id="maskot">
    <h2><span>Maskot</span> Kami</h2>
    <p>
        Maskot kami adalah representasi dari keunikan dan kekayaan budaya Sulawesi Selatan, khususnya Makassar. Setiap maskot dipilih dengan cermat untuk menggambarkan karakteristik lokal yang khas, mulai dari fauna hingga simbol-simbol yang melambangkan semangat dan identitas daerah.
    </p>

    <div class="row">
        <div class="menu-card">
            <img src="foto/jalu.png" alt="Foto" class="menu-card-img" />
            <h3 class="menu-card-text">- Gi Jalu -</h3>
            <p class="menu-card-type">Burung Julang Sulawesi</p>
            <p class="menu-card-description">
                Gi Jalu adalah burung endemik Sulawesi yang dikenal dengan paruhnya yang kuat dan bulu-bulu indahnya. Burung ini menjadi simbol kelestarian alam dan kekuatan budaya Sulawesi Selatan.
            </p>
        </div>
        <div class="menu-card">
            <img src="foto/kubi.png" alt="Foto" class="menu-card-img" />
            <h3 class="menu-card-text">- Kubi -</h3>
            <p class="menu-card-type">Ikan Kubus Sulawesi</p>
            <p class="menu-card-description">
                Kubi adalah ikan kubus khas Sulawesi yang mewakili ketahanan dan kebijaksanaan. Kubi sering dianggap sebagai simbol umur panjang dan keseimbangan dalam budaya lokal.
            </p>
        </div>
    </div>
</section>


<!-- Kontak -->
<section id="kontak" class="kontak">
    <h2><span>Kontak</span> Kami</h2>

    <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127166.45402988097!2d119.40262754999999!3d-5.1114895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee329d96c4671%3A0x3030bfbcaf770b0!2sMakassar%2C%20Makassar%20City%2C%20South%20Sulawesi!5e0!3m2!1sen!2sid!4v1716522110137!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

        <form action="" class="form">
            <div class="input-group">
                <i data-feather="user"></i>
                <input type="text" placeholder="Nama" />
            </div>
            <div class="input-group">
                <i data-feather="mail"></i>
                <input type="text" placeholder="Email" />
            </div>
            <div class="input-group">
                <i data-feather="phone"></i>
                <input type="text" placeholder="No Telepon" />
            </div>
            <button class="btn">Kirim Pesan</button>
        </form>
    </div>
</section>

<?php include('footer.php'); ?>