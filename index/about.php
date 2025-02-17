<?php
include('../config/connection.php');
include('header.php');
?>

<div class="main-hero">
    <h1 class="main-hero-title">Malika's Drink</h1>
</div>

<div class="quote-container">
    <h1>Quote</h1>
</div>

<div class="about-container">
    <div class="about-wrapper">
        <div class="about-image-wrapper">
            <img src="../image/default/merch1.png" alt="About Image" class="about-image">
        </div>
        <div class="about-text-wrapper">
            <h1 class="about-main-title">What is Malika's Drink ?</h1>
            <p class="about-subtitle">Lorem Ipsum</p>
        </div>
    </div>
</div>

<div class="traditional-container">
    <h1 class="section-title">Traditional Drink</h1>
    <div class="drinks-wrapper">
        <div class="drink-item">
            <div class="drink-image"></div>
            <div class="drink-label">
                <span>Drink's Name</span>
            </div>
        </div>
        <div class="drink-item">
            <div class="drink-image"></div>
            <div class="drink-label">
                <span>Drink's Name</span>
            </div>
        </div>
        <div class="drink-item">
            <div class="drink-image"></div>
            <div class="drink-label">
                <span>Drink's Name</span>
            </div>
        </div>
    </div>
</div>

<div class="character-container">
    <div class="character-wrapper">
        <h1 class="section-title">Our Character</h1>
        <div class="character-image-wrapper">
            <div class="character-item">
                <img src="https://dashboard.codeparrot.ai/api/image/Z7KupqWN819FoZd8/frame-12.png" alt="Character Frame" class="character-image">
            </div>
            <div class="character-item">
                <img src="https://dashboard.codeparrot.ai/api/image/Z7KupqWN819FoZd8/frame-12.png" alt="Character Frame" class="character-image">
            </div>
        </div>
    </div>
</div>

<style>
    /* General Styles */
    .main-hero {
        width: 95%;
        height: 50vh;
        border-radius: 20px;
        background: linear-gradient(90deg, rgba(99, 10, 16, 1) 0%, rgba(145, 31, 39, 1) 37.53%);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main-hero-title {
        font-size: 96px;
        font-weight: 400;
        color: #fcf0c8;
        margin: 0;
        text-align: center;
    }

    /* Responsive Adjustments */
    @media (max-width: 900px) {
        .main-hero {
            padding: 40px 0;
            height: auto;
        }

        .main-hero-title {
            font-size: 48px;
        }
    }

    /* Quote Section */
    .quote-container {
        width: 95%;
        background-color: #f7d098;
        border-radius: 20px;
        text-align: center;
        margin: 0.5rem;
    }

    .quote-container h1 {
        color: #630a10;
        font-size: 48px;
        font-weight: 400;
    }

    /* About Section */
    .about-container {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0.5rem;
    }

    .about-wrapper {
        display: flex;
        gap: 75px;
        align-items: center;
    }

    .about-image-wrapper {
        width: 400px;
        height: 400px;
    }

    .about-image {
        width: 100%;
        height: 100%;
        max-width: 40rem;
        background-color: #911f27;
        border-radius: 20px;
        transition: transform 0.3s ease;
    }

    .about-image:hover {
        transform: scale(1.02);
        cursor: pointer;
    }

    .about-text-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 718px;
    }

    .about-main-title {
        font-size: 48px;
        font-weight: 400;
        color: #630a10;
        margin: 0;
        text-align: left;
        transition: opacity 0.3s ease;
    }

    .about-subtitle {
        font-size: 36px;
        font-weight: 400;
        color: #630a10;
        margin-top: 10px;
        text-align: left;
        transition: opacity 0.3s ease;
    }

    .about-main-title:hover,
    .about-subtitle:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    /* Traditional Drink Section */
    .traditional-container {
        width: 95%;
        margin: 0 auto;
        padding: 20px;
    }

    .section-title {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
        text-align: center;
        margin-bottom: 46px;
    }

    .drinks-wrapper {
        display: flex;
        justify-content: space-between;
        gap: 46px;
    }

    .drink-item {
        width: 400px;
        height: 400px;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .drink-image {
        width: 100%;
        height: 270px;
        background-color: #911f27;
        border-radius: 20px 20px 0 0;
        transition: transform 0.3s ease;
    }

    .drink-image:hover {
        transform: scale(1.02);
        cursor: pointer;
    }

    .drink-label {
        width: 100%;
        height: 130px;
        background-color: #f7d098;
        border-radius: 0 0 20px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }

    .drink-label:hover {
        background-color: #f5c27b;
        cursor: pointer;
    }

    .drink-label span {
        font-size: 48px;
        font-weight: 400;
        color: #630a10;
    }

    /* Character Section */
    .character-container {
        width: 95%;
        background-color: #fff;
        margin: 0 auto;
        padding: 20px;
        min-height: 558px;
        display: flex;
        align-items: center;
    }

    .character-wrapper {
        max-width: 1406px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 43px;
        align-items: center;
        width: 100%;
    }

    .section-title {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
        text-align: center;
        margin: 0;
        width: 100%;
    }

    .character-image-wrapper {
        width: 100%;
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .character-item {
        flex: 1;
        max-width: calc(50% - 10px);
        border-radius: 20px;
        overflow: hidden;
    }

    .character-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        background-color: #911F27;
        border-radius: 20px;
        transition: transform 0.3s ease;
    }

    .character-image:hover {
        transform: scale(1.02);
        cursor: pointer;
    }

    @media (max-width: 1440px) {
        .character-wrapper {
            max-width: 90%;
        }

        .section-title {
            font-size: 48px;
        }

        .character-image {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .character-image-wrapper {
            flex-direction: column;
        }

        .character-item {
            max-width: 100%;
        }

        .character-image {
            height: 250px;
        }
    }
</style>

<?php include('footer.php'); ?>