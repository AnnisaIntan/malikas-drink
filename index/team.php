<?php
include('../config/connection.php');
include('header.php');
?>

<div class="team-container">
    <!-- Header Banner -->
    <div class="team-header-banner">
        <h1>Our Team</h1>
        <h2>Malika's Drink</h2>
    </div>

    <!-- Who is that section -->
    <div class="team-content-section">
        <div class="team-text-content">
            <h2>Who is that?</h2>
            <p>Lorem Ipsum</p>
        </div>
        <div class="team-image-box"></div>
    </div>

    <!-- What is Malika's Drink section -->
    <div class="team-content-section team-reverse">
        <div class="team-image-box"></div>
        <div class="team-text-content">
            <h2>What is Malika's Drink ?</h2>
            <p>Lorem Ipsum</p>
        </div>
    </div>

    <!-- What they say section -->
    <div class="team-testimonials">
        <h2>What they say</h2>
        <div class="team-testimonial-cards">
            <div class="team-card">
                <div class="team-card-content"></div>
                <div class="team-name-tag">Joe</div>
            </div>
            <div class="team-card">
                <div class="team-card-content"></div>
                <div class="team-name-tag">Pitum</div>
            </div>
            <div class="team-card">
                <div class="team-card-content"></div>
                <div class="team-name-tag">Maru</div>
            </div>
        </div>
    </div>
</div>

<style>
    .team-container {
        width: 95%;
        max-width: 1920px;
        margin: 0 auto;
    }

    .team-header-banner {
        background: linear-gradient(90deg, rgba(145, 31, 39, 1) 30%, rgba(247, 208, 152, 1) 100%);
        padding: 60px 0;
        border-radius: 20px;
        text-align: center;
        color: #FCF0C8;
        margin-bottom: 40px;
    }

    .team-header-banner h1 {
        font-size: 128px;
        margin: 0;
    }

    .team-header-banner h2 {
        font-size: 64px;
        margin: 20px 0 0;
    }

    .team-content-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 40px;
        gap: 40px;
        margin-bottom: 40px;
    }

    .team-reverse {
        flex-direction: row-reverse;
    }

    .team-text-content {
        flex: 1;
    }

    .team-text-content h2 {
        font-size: 64px;
        color: #630A10;
        margin: 0;
    }

    .team-text-content p {
        font-size: 36px;
        color: #630A10;
        margin: 10px 0;
    }

    .team-image-box {
        width: 454px;
        height: 372px;
        background: #911F27;
        border-radius: 20px;
    }

    .team-testimonials {
        padding: 40px;
    }

    .team-testimonials h2 {
        font-size: 64px;
        color: #630A10;
        text-align: center;
        margin-bottom: 40px;
    }

    .team-testimonial-cards {
        display: flex;
        justify-content: center;
        gap: 170px;
    }

    .team-card {
        width: 400px;
        display: flex;
        flex-direction: column;
    }

    .team-card-content {
        height: 270px;
        background: #911F27;
        border-radius: 20px;
        margin-bottom: 10px;
    }

    .team-name-tag {
        background: #F7D098;
        color: #630A10;
        padding: 31px 52px;
        border-radius: 20px;
        font-size: 48px;
        text-align: center;
    }

    /* Hover effects */
    .team-image-box:hover,
    .team-card-content:hover {
        opacity: 0.9;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .team-name-tag:hover {
        background: #f0c27b;
        cursor: pointer;
        transition: background 0.3s ease;
    }
</style>

<?php include('footer.php'); ?>