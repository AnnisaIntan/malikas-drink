<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
            // Profile
        case 'my_profile':
            include('profile.php');
            break;

            // Admin Section
        case 'admin_show':
            include('admin/admin_show.php');
            break;
        case 'admin_add':
            include('admin/admin_add.php');
            break;
        case 'admin_read':
            include('admin/admin_read.php');
            break;
        case 'admin_process':
            include('admin/admin_process.php');
            break;

            // News Section
        case 'news_show':
            include('news/news_show.php');
            break;
        case 'news_add':
            include('news/news_add.php');
            break;
        case 'news_read':
            include('news/news_read.php');
            break;
        case 'news_process':
            include('news/news_process.php');
            break;

            // Gallery Section
        case 'gallery_show':
            include('gallery/gallery_show.php');
            break;
        case 'gallery_add':
            include('gallery/gallery_add.php');
            break;
        case 'gallery_read':
            include('gallery/gallery_read.php');
            break;
        case 'gallery_process':
            include('gallery/gallery_process.php');
            break;

            // Game Section
        case 'game_show':
            include('game/game_show.php');
            break;
        case 'game_add':
            include('game/game_add.php');
            break;
        case 'game_read':
            include('game/game_read.php');
            break;
        case 'game_process':
            include('game/game_process.php');
            break;

            // Comment Section
        case 'comment_show':
            include('comment/comment_show.php');
            break;
        case 'comment_add':
            include('comment/comment_add.php');
            break;
        case 'comment_read':
            include('comment/comment_read.php');
            break;
        case 'comment_process':
            include('comment/comment_process.php');
            break;

            // Merchandise Section
        case 'merchan_show':
            include('merchan/merchan_show.php');
            break;
        case 'merchan_add':
            include('merchan/merchan_add.php');
            break;
        case 'merchan_read':
            include('merchan/merchan_read.php');
            break;
        case 'merchan_process':
            include('merchan/merchan_process.php');
            break;

            // Creator Section
        case 'creator_show':
            include('creator/creator_show.php');
            break;
        case 'creator_add':
            include('creator/creator_add.php');
            break;
        case 'creator_read':
            include('creator/creator_read.php');
            break;
        case 'creator_process':
            include('creator/creator_process.php');
            break;
    }
}
