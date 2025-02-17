<?php
include('../config/connection.php');
include('header.php');
?>

<style>
    .news-header-section {
        width: 100%;
        max-width: 1566px;
        height: 426px;
        padding: 87px 157px;
        background: linear-gradient(90deg, rgba(145, 31, 39, 1) 29%, rgba(252, 240, 200, 1) 100%);
        border-radius: 20px;
        min-width: 800px;
        box-sizing: border-box;
    }

    .news-content-wrapper {
        display: flex;
        flex-direction: column;
        gap: 19px;
        width: 100%;
        max-width: 762px;
    }

    .news-tagline {
        font-size: 128px;
        font-weight: 400;
        color: #fcf0c8;
        margin: 0;
    }

    .news-sub-tagline {
        font-size: 64px;
        font-weight: 400;
        color: #fcf0c8;
        margin: 0;
    }

    .news-read-more {
        font-family: 'PixelFont';
        width: 184px;
        height: 44px;
        padding: 13px 33px;
        background-color: #fcf0c8;
        border-radius: 20px;
        border: none;
        font-size: 36px;
        font-weight: 400;
        color: #630a10;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .news-read-more:hover {
        background-color: #630a10;
        color: #fcf0c8;
    }

    .news-read-more:active {
        transform: scale(0.98);
    }

    .news-main-tagline {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        background-color: #f7d098;
        border-radius: 20px;
        padding: 19px 126px;
        min-width: 571px;
        height: 116px;
        box-sizing: border-box;
    }

    .news-tagline-text {
        font-size: 96px;
        font-weight: 400;
        color: #630a10;
        margin: 0;
        line-height: 1.2;
    }

    .news-section {
        display: flex;
        flex-direction: column;
        gap: 30px;
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
    }

    .news-section-title {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
        margin: 0;
        padding: 10px 0;
    }

    .news-grid {
        display: flex;
        flex-direction: row;
        gap: 30px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .news-card {
        width: 300px;
        height: 300px;
        background-color: #911f27;
        border-radius: 20px;
        position: relative;
        cursor: pointer;
        transition: transform 0.3s ease;
        overflow: hidden;
    }

    .news-card:hover {
        transform: scale(1.02);
    }

    .news-card-title {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 20px;
        background-color: #f7d098;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        box-sizing: border-box;
        text-align: center;
    }

    .news-card-title span {
        font-size: 48px;
        font-weight: 400;
        color: #630a10;
    }

    @media (max-width: 800px) {
        .news-header-section {
            padding: 40px 20px;
        }

        .news-tagline {
            font-size: 64px;
        }

        .news-sub-tagline {
            font-size: 32px;
        }

        .news-read-more {
            font-size: 18px;
            padding: 10px 20px;
        }
    }

    @media (max-width: 600px) {
        .news-main-tagline {
            padding: 10px 20px;
            min-width: auto;
            width: 100%;
        }

        .news-tagline-text {
            font-size: 48px;
        }
    }

    @media (max-width: 768px) {
        .news-card {
            width: 100%;
            max-width: 300px;
        }

        .news-grid {
            gap: 20px;
        }

        .news-section-title {
            font-size: 48px;
        }
    }
</style>

<div class="news-header-section">
    <div class="news-content-wrapper">
        <h1 class="news-tagline">Tagline News</h1>
        <h2 class="news-sub-tagline">Sub-Tagline</h2>
        <button class="news-read-more">READ MORE</button>
    </div>
</div>

<div class="news-main-tagline">
    <h1 class="news-tagline-text">Tagline News</h1>
</div>

<div class="news-section">
    <!-- Latest News Section -->
    <h2 class="news-section-title">Latest News</h2>
    <div class="news-grid">
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
    </div>

    <!-- Title Section -->
    <h2 class="news-section-title">Title</h2>
    <div class="news-grid">
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
    </div>

    <!-- Character News Section -->
    <h2 class="news-section-title">Character News</h2>
    <div class="news-grid">
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
        <div class="news-card">
            <div class="news-card-title">
                <span>Title News</span>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>