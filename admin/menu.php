<div align="center" style="margin: 1rem 0;">
    <h2 style="line-height: 1;">Malika's Drink</h2>
    <h6 >Server and Database Side</h6>
</div>

<div class="menu-container" style="margin-top: 2rem;">
    <button class="hamburger">☰</button>
    <ul class="menu">
        <li><a href="index.php?page=profile_show">Profile</a></li>
        <li><a href="index.php?page=admin_show">Admin</a></li>
        <li><a href="index.php?page=news_show">News</a></li>
        <li><a href="index.php?page=gallery_show">Gallery</a></li>
        <li><a href="index.php?page=game_show">Game</a></li>
        <li><a href="index.php?page=comment_show">Comment</a></li>
        <li><a href="index.php?page=merchan_show">Merchandise</a></li>
        <li><a href="index.php?page=creator_show">Creator</a></li>
        <li><a href="auth/logout.php">Log Out</a></li>
    </ul>
</div>

<script>
    document.querySelector('.hamburger').addEventListener('click', function() {
        document.querySelectorAll('.menu').forEach(menu => menu.classList.toggle('show'));
        this.textContent = this.textContent === '☰' ? '✖' : '☰';
    });
</script>

<style>
    :root {
        --bg: #025464;
        --color: #F8F1F1;
        --tr1: #E57C23;
        --tr2: #E8AA42;
    }

    h2, h6{
        margin: 0;
        padding: 0;
    }

    .hamburger {
        display: none;
        font-size: 24px;
        cursor: pointer;
        padding: 10px;
        background: var(--tr1);
        color: white;
        border: none;
        border-radius: 5px;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .menu {
        list-style: none;
        margin: 0 auto;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .menu li {
        background-color: var(--color);
        border: 2px solid var(--tr2);
        padding: 10px;
        text-align: left;
        border-radius: 10px;
    }

    .menu li a {
        display: block;
        color: var(--bg);
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .menu li:hover {
        background-color: var(--tr2);
    }

    @media (max-width: 768px) {
        .menu-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .hamburger {
            display: block;
            margin-top: 1rem;
        }

        .menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 50px;
            right: 10px;
            background: white;
            border: 2px solid #430A5D;
            border-radius: 10px;
            width: 200px;
            padding: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .menu.show {
            display: flex;
            margin-top: 1.7rem;
            margin-right: 20px;
        }
    }
</style>