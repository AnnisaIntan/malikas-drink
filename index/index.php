<?php
include('../config/connection.php');
include('header.php');
?>

<!-- Main -->
<div class="main-frame">
    <div class="content-frame">
        <h1 class="welcome-text">WELCOME</h1>
        <h2 class="subtitle-text">TO WEBSITE MALIKA'S DRINK</h2>
    </div>
</div>

<div class="frame-24" style="display: flex; flex-direction: row; align-items: center; gap: 179px;">
    <div class="rectangle-15" style="width: 454px; height: 372px; background-color: #f7d098; border-radius: 20px;">
        <img src="../image/default/logo.png" alt="Rectangle" style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px;">
    </div>
    <div class="frame-23" style="display: flex; flex-direction: column; justify-content: center;">
        <h1 class="title" style="font-size: 64px; color: #630a10; margin: 0;">What is Malika's Drink ?</h1>
        <p class="subtitle" style="font-size: 36px; color: #630a10; margin: 0;">Lorem Ipsum</p>
    </div>
</div>

<div class="container">
    <h1 class="title">What they said</h1>
    <div class="testimonials">
        <div class="testimonial-card">
            <p class="testimonial-text">Lorem Ipsum</p>
            <div class="name-tag">
                <span class="name">Anne</span>
            </div>
        </div>
        <div class="testimonial-card">
            <p class="testimonial-text">Lorem Ipsum</p>
            <div class="name-tag">
                <span class="name">Diana</span>
            </div>
        </div>
        <div class="testimonial-card">
            <p class="testimonial-text">Lorem Ipsum</p>
            <div class="name-tag">
                <span class="name">Intan</span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="title">Merchandise</h1>
    <div class="products">
        <div class="product-card">
            <div class="image-container" style="background-image: url('../image/default/merch1.png');"></div>
            <div class="label">Sticker</div>
        </div>
        <div class="product-card">
            <div class="image-container" style="background-image: url('../image/default/merch2.jpg');"></div>
            <div class="label">Malika's Pillow</div>
        </div>
        <div class="product-card">
            <div class="image-container" style="background-image: url('../image/default/merch3.jpg');"></div>
            <div class="label">Malika's T-Shirt</div>
        </div>
    </div>
</div>

<div class="container2">
    <div class="feedback-text">
        <span>Give Feedback?</span>
    </div>
    <div class="click-button">
        <span>
            <a href="download.php#comment">
                Click Here
            </a>
        </span>
    </div>
</div>

<?php include('footer.php'); ?>