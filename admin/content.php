<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'admin_show':
            include('admin_show.php');
            break;
        case 'admin_add':
            include('admin_add.php');
            break;
        case 'admin_read':
            include('admin_read.php');
            break;

        case 'news_show':
            include('news_show.php');
            break;
        case 'news_add':
            include('news_add.php');
            break;
        case 'news_read':
            include('news_read.php');
            break;

        case 'gallery_show':
            include('gallery_show.php');
            break;
        case 'gallery_add':
            include('gallery_add.php');
            break;
        case 'gallery_read':
            include('gallery_read.php');
            break;

        case 'game_show':
            include('game_show.php');
            break;
        case 'game_add':
            include('game_add.php');
            break;
        case 'game_read':
            include('game_read.php');
            break;

        case 'comment_show':
            include('comment_show.php');
            break;
        case 'comment_add':
            include('comment_add.php');
            break;
        case 'comment_read':
            include('comment_read.php');
            break;

        case 'merchan_show':
            include('merchan_show.php');
            break;
        case 'merchan_add':
            include('merchan_add.php');
            break;
        case 'merchan_read':
            include('merchan_read.php');
            break;

        case 'creator_show':
            include('creator_show.php');
            break;
        case 'creator_add':
            include('creator_add.php');
            break;
        case 'creator_read':
            include('creator_read.php');
            break;
    }
}
