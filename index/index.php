<?php
include('../config/connection.php');
include('header.php');
?>

<!-- Main -->
<div class="index-main-frame" style="margin-bottom: 50px;">
    <div class="index-content-frame">
        <h1 class="index-welcome-text">WELCOME</h1>
        <h2 class="index-subtitle-text">TO WEBSITE MALIKA'S DRINK</h2>
    </div>
</div>

<div class="index-frame-24" style="margin-bottom: 50px;">
    <div class="index-rectangle-15">
        <img src="../image/default/logo.png" alt="Logo">
    </div>
    <div class="index-frame-23">
        <h1 class="index-title">What is Malika's Drink?</h1>
        <p class="index-subtitle">Discover the finest drinks with a cultural twist.</p>
    </div>
</div>

<div class="index-container" style="margin-bottom: 50px;">
    <h1 class="index-title">What They Said</h1>
    <div class="index-testimonials">
        <div class="index-testimonial-card">
            <p class="index-testimonial-text">"Amazing drinks!"</p>
            <div class="index-name-tag"><span class="index-name">Anne</span></div>
        </div>
        <div class="index-testimonial-card">
            <p class="index-testimonial-text">"Loved every sip!"</p>
            <div class="index-name-tag"><span class="index-name">Diana</span></div>
        </div>
        <div class="index-testimonial-card">
            <p class="index-testimonial-text">"Unique and refreshing!"</p>
            <div class="index-name-tag"><span class="index-name">Intan</span></div>
        </div>
    </div>
</div>

<div class="index-container" style="margin-bottom: 50px;">
    <h1 class="index-title" style="margin-bottom: 20px;">Merchandise</h1>
    <div class="index-products">
        <div class="index-product-card">
            <div class="index-image-container" style="background-image: url('../image/default/merch1.png');"></div>
            <div class="index-name-tag">
                <p class="index-product-text">Sticker</p>
            </div>
        </div>
        <div class="index-product-card">
            <div class="index-image-container" style="background-image: url('../image/default/merch2.jpg');"></div>
            <div class="index-name-tag">
                <p class="index-product-text">Malika's Pillow</p>
            </div>
        </div>
        <div class="index-product-card">
            <div class="index-image-container" style="background-image: url('../image/default/merch3.jpg');"></div>
            <div class="index-name-tag">
                <p class="index-product-text">Malika's T-Shirt</p>
            </div>
        </div>
    </div>
</div>

<div class="index-container2" style="margin-bottom: 50px;">
    <div class="index-feedback-text"><span>Give Feedback?</span></div>
    <div class="index-click-button"><a href="download.php#comment">Click Here</a></div>
</div>

<?php include('footer.php'); ?>

<style>
    .index-container {
        width: 95%;
        margin: auto;
        padding: 20px;
        text-align: center;
    }

    .index-container2 {
        width: 95%;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
    }

    .index-main-frame {
        width: 93%;
        height: 60vh;
        border-radius: 20px;
        background: linear-gradient(90deg, #911f27 0%, #630a10 85%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FCF0C8;
        text-align: center;
        justify-content: flex-start;
        padding-left: 30px;
    }

    .index-content-frame {
        margin-left: 30px;
        text-align: left;
    }

    .index-welcome-text {
        font-size: 80px;
        font-weight: bold;
        margin: 0;
        padding: 0;
    }

    .index-subtitle-text {
        font-size: 40px;
    }

    .index-frame-24 {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        margin: 3rem auto;
    }

    .index-rectangle-15 img {
        width: 200px;
        height: 200px;
        border-radius: 20px;
    }

    .index-title {
        font-size: 42px;
        color: #630a10;
    }

    .index-subtitle {
        font-size: 20px;
        color: #630a10;
    }

    .index-testimonials,
    .index-products {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .index-testimonial-card,
    .index-product-card {
        width: 300px;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        transition: 0.3s;
        background: #911f27;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .index-testimonial-card:hover,
    .index-product-card:hover {
        transform: scale(1.05);
    }

    .index-name-tag {
        background: #f7d098;
        color: #630a10;
        padding: 10px 0;
        width: 100%;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        order: 2;
        margin-top: 10px;
    }

    .index-image-container {
        width: 250px;
        height: 250px;
        background-size: cover;
        border-radius: 20px;
        border: 5px solid #911f27;
    }

    .index-testimonial-text {
        font-size: 20px;
        font-weight: bold;
        color: #fcf0c8;
        margin-bottom: 10px;
    }

    .index-product-text {
        font-size: 20px;
        font-weight: bold;
        color: #630a10;
        margin-bottom: 10px;
    }

    .index-feedback-text,
    .index-click-button {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        padding: 15px 30px;
        border-radius: 15px;
    }

    .index-feedback-text {
        background: #630a10;
        color: #fcf0c8;
        font-size: 72px;
        padding: 20px 40px;
    }

    .index-click-button {
        background: #f7d098;
        cursor: pointer;
    }

    .index-click-button:hover {
        background: #e5c088;
    }

    .index-click-button a {
        text-decoration: none;
        color: #630a10;
    }

    @media (max-width: 1200px) {
        .index-frame-24 {
            flex-direction: column;
            gap: 40px;
        }
    }
</style>