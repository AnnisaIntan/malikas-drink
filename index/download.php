<?php
include('../config/connection.php');
include('header.php');
?>

<div class="download">
    <div class="download-header-section">
        <div class="download-image-container">
            <img src="https://dashboard.codeparrot.ai/api/image/Z7K_3KWN819FoZeS/rectangl.png" alt="Background" class="download-background-image">
        </div>
        <div class="download-content-container">
            <div class="download-text-content">
                <h1 class="download-title">Download</h1>
                <h2 class="download-subtitle">Get your Malika's Drink</h2>
            </div>
            <div class="download-action-section">
                <img src="https://dashboard.codeparrot.ai/api/image/Z7K_3KWN819FoZeS/frame-19.png" alt="Download icon" class="download-icon">
                <button class="download-button">Link in Here</button>
            </div>
        </div>
    </div>

    <div class="download-testimonials-container">
        <h1 class="download-testimonials-title">What they said</h1>
        <div class="download-testimonials-grid">
            <div class="download-testimonial-card">
                <p class="download-testimonial-text">Lorem Ipsum</p>
                <div class="download-name-tag">
                    <span class="download-name">Anne</span>
                </div>
            </div>
            <div class="download-testimonial-card">
                <p class="download-testimonial-text">Lorem Ipsum</p>
                <div class="download-name-tag">
                    <span class="download-name">Diana</span>
                </div>
            </div>
            <div class="download-testimonial-card">
                <p class="download-testimonial-text">Lorem Ipsum</p>
                <div class="download-name-tag">
                    <span class="download-name">Intan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="download-feedback-section" id="comment">
        <h1 class="download-title">Give Your Feedback</h1>
        <div class="download-content-wrapper">
            <div class="download-form-section">
                <form action="comment_process.php" method="post">
                    <div class="download-input-group">
                        <label class="download-input-label">Name</label>
                        <input type="text" name="nama_tamu" class="download-input-field" required>
                    </div>
                    <div class="download-input-group">
                        <label class="download-input-label">Message</label>
                        <textarea name="komentar" class="download-input-field" required></textarea>
                    </div>
                    <div class="download-submit-section">
                        <button type="submit" class="download-submit-button">Submit</button>
                    </div>
                </form>
            </div>
            <div class="download-image-section"></div>
        </div>
    </div>
</div>

<style>
    .download {
        margin: 0;
        padding: 0;
        width: 95%;
    }

    .download-header-section {
        display: flex;
        flex-direction: row;
        gap: 65px;
        min-width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    .download-image-container {
        flex: 1;
        max-width: 772px;
        height: auto;
    }

    .download-background-image {
        width: 100%;
        height: auto;
        border-radius: 20px;
        background-color: #911f27;
    }

    .download-content-container {
        display: flex;
        flex-direction: column;
        gap: 96px;
        flex: 1;
        max-width: 762px;
    }

    .download-text-content {
        display: flex;
        flex-direction: column;
        gap: 19px;
    }

    .download-title {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
        margin: 0;
    }

    .download-subtitle {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
        margin: 0;
    }

    .download-action-section {
        display: flex;
        flex-direction: row;
        gap: 75px;
        align-items: center;
    }

    .download-icon {
        width: 100px;
        height: 100px;
    }

    .download-submit-button {
        background-color: #007BFF;
        /* Blue color */
        color: #fff;
        /* White text */
        font-size: 16px;
        font-weight: bold;
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        width: 100%;
        max-width: 200px;
        text-align: center;
        display: block;
        margin: 10px auto;
    }

    .download-submit-button:hover {
        background-color: #0056b3;
        /* Darker blue */
        transform: scale(1.05);
    }

    .download-submit-button:active {
        background-color: #004494;
        transform: scale(0.98);
    }

    @media (max-width: 1200px) {
        .download-header-section {
            flex-direction: column;
            align-items: center;
        }

        .download-image-container,
        .download-content-container {
            max-width: 100%;
        }

        .download-title {
            font-size: 96px;
        }

        .download-subtitle {
            font-size: 48px;
        }

        .download-button {
            padding: 15px 100px;
        }
    }

    @media (max-width: 768px) {
        .download-title {
            font-size: 72px;
        }

        .download-subtitle {
            font-size: 36px;
        }

        .download-button {
            padding: 10px 80px;
        }
    }

    .download-testimonials-container {
        width: 100%;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        padding: 20px;
        margin: auto;
    }

    .download-testimonials-title {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
        text-align: center;
        margin: 0;
    }

    .download-testimonials-grid {
        display: flex;
        flex-direction: row;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .download-testimonial-card {
        width: 300px;
        height: 300px;
        background-color: #911f27;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        position: relative;
        margin: 10px;
    }

    .download-testimonial-text {
        font-size: 36px;
        font-weight: 400;
        color: #fcf0c8;
        margin: 13px 20px;
    }

    .download-name-tag {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100px;
        background-color: #f7d098;
        border-radius: 0 0 20px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .download-name {
        font-size: 48px;
        font-weight: 400;
        color: #630a10;
    }

    .download-testimonial-card:hover {
        transform: scale(1.02);
        transition: transform 0.2s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .download-name-tag:hover {
        background-color: #f5c27b;
        transition: background-color 0.2s ease-in-out;
    }

    @media (max-width: 768px) {
        .download-testimonials-title {
            font-size: 48px;
        }

        .download-testimonial-card {
            width: 90%;
            height: auto;
        }

        .download-name-tag {
            height: 80px;
        }

        .download-name {
            font-size: 36px;
        }
    }

    .download-feedback-section {
        max-width: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 21px;
        align-items: center;
    }

    .download-feedback-section .download-title {
        font-size: 128px;
        font-weight: 400;
        color: #630a10;
        text-align: center;
        margin: 0;
    }

    .download-content-wrapper {
        display: flex;
        flex-direction: column;
        gap: 21px;
        align-items: center;
    }

    @media (min-width: 800px) {
        .download-content-wrapper {
            flex-direction: row;
            justify-content: space-between;
        }
    }

    .download-form-section {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
        max-width: 775px;
    }

    .download-input-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .download-input-label {
        font-size: 64px;
        font-weight: 400;
        color: #630a10;
    }

    .download-input-field {
        width: 100%;
        height: 150px;
        background-color: #f7d098;
        border: none;
        border-radius: 20px;
        padding: 10px;
        font-size: 16px;
    }

    .download-submit-section {
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }

    .download-submit-icon {
        width: 150px;
        height: 100px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .download-submit-icon:hover {
        transform: scale(1.1);
    }

    .download-image-section {
        width: 100%;
        max-width: 650px;
        height: 650px;
        background-color: #911f27;
        border-radius: 20px;
    }

    .download-input-field:focus {
        outline: 2px solid #630a10;
    }

    .download-input-field:hover {
        background-color: #f8d8a8;
    }
</style>

<?php include('footer.php'); ?>