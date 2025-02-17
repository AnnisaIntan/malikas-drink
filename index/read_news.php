<?php
include('../config/connection.php');
include('header.php');
?>

<div class="news-read-container">
    <div class="news-read-header">
        <h1>Tagline News</h1>
        <h2>Sub-Tagline</h2>
    </div>

    <div class="news-read-content">
        <p class="news-read-main-text">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div>

    <div class="news-read-other-news-section">
        <h2 class="news-read-other-news-title">Other News</h2>
        <div class="news-read-news-cards">
            <div class="news-read-news-card">
                <div class="news-read-card-content">
                    <img src="https://dashboard.codeparrot.ai/api/image/Z7LX4DO_YEiK21ug/rectangl.png" alt="News Image" style="width: 100%; height: 100%; border-radius: 20px 20px 0 0;">
                </div>
                <div class="news-read-title-box">
                    <h3>Title News</h3>
                </div>
            </div>
            <div class="news-read-news-card">
                <div class="news-read-card-content">
                    <img src="https://dashboard.codeparrot.ai/api/image/Z7LX4DO_YEiK21ug/rectangl.png" alt="News Image" style="width: 100%; height: 100%; border-radius: 20px 20px 0 0;">
                </div>
                <div class="news-read-title-box">
                    <h3>Title News</h3>
                </div>
            </div>
            <div class="news-read-news-card">
                <div class="news-read-card-content">
                    <img src="https://dashboard.codeparrot.ai/api/image/Z7LX4DO_YEiK21ug/rectangl.png" alt="News Image" style="width: 100%; height: 100%; border-radius: 20px 20px 0 0;">
                </div>
                <div class="news-read-title-box">
                    <h3>Title News</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .news-read-container {
        max-width: 1233px;
        margin: 0 auto;
        padding: 20px;
    }

    .news-read-header {
        background: linear-gradient(180deg, rgba(145, 31, 39, 1) 54.9%, rgba(99, 10, 16, 1) 100%);
        border-radius: 20px;
        padding: 87px 300px;
        text-align: center;
        margin-bottom: 50px;
    }

    .news-read-header h1 {
        color: #fcf0c8;
        font-size: 128px;
        font-weight: 400;
        margin: 0;
        margin-bottom: 19px;
    }

    .news-read-header h2 {
        color: #fcf0c8;
        font-size: 64px;
        font-weight: 400;
        margin: 0;
    }

    .news-read-content {
        display: flex;
        justify-content: center;
        margin-bottom: 50px;
    }

    .news-read-main-text {
        max-width: 1233px;
        color: #630a10;
        font-size: 48px;
        font-weight: 400;
        text-align: justify;
        margin: 0;
    }

    .news-read-other-news-title {
        color: #630a10;
        font-size: 64px;
        font-weight: 400;
        margin-bottom: 30px;
    }

    .news-read-news-cards {
        display: flex;
        gap: 30px;
        justify-content: space-between;
    }

    .news-read-news-card {
        width: 400px;
        height: 400px;
        background: #911f27;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .news-read-card-content {
        flex-grow: 1;
        overflow: hidden;
    }

    .news-read-title-box {
        background: #f7d098;
        border-radius: 0 0 20px 20px;
        padding: 31px 52px;
        margin: 0;
    }

    .news-read-title-box h3 {
        color: #630a10;
        font-size: 48px;
        font-weight: 400;
        margin: 0;
        text-align: center;
    }

    /* Hover effects */
    .news-read-news-card:hover {
        transform: scale(1.02);
        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .news-read-title-box:hover {
        background: #f0c27b;
        transition: background 0.2s ease;
    }
</style>

<?php include('footer.php'); ?>