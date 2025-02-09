<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hidden Place Malika's Drink</title>
    <link rel="icon" href="../image/default/logo.png" type="image/png">
    <style>
        body {
            background-color: #E57C23;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .isi {
            display: flex;
            flex-wrap: wrap;
            padding: 1rem;
        }

        .kiri {
            width: 19%;
            border: 5px solid #E8AA42;
            background-color: #025464;
            font-size: 18px;
            color: #2B2A4C;
            padding: 1rem;
            box-sizing: border-box;
            flex: 1 1 20%;
        }

        .kanan {
            width: 76%;
            border: 5px solid #E8AA42;
            background-color: #025464;
            padding: 1rem;
            box-sizing: border-box;
            flex: 1 1 75%;
        }

        .bawah {
            width: 97.6%;
            height: auto;
            border: 7px solid var(--tr2);
            background-color: var(--bg);
            text-align: center;
            padding: 0.5rem;
            margin: 0 1.2% 1% 1.2%;
            color: var(--tr2);
            line-height: 1.3;
        }

        .bawah h3,
        .bawah h6 {
            margin: 5px 0;
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #E8AA42;
        }

        .header h2 {
            margin: 0.5rem 0;
            font-size: 24px;
        }

        .guest-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .guest-container h2 {
            flex: 1;
            margin: 0;
            text-align: right;
            padding-right: 1rem;
        }

        .guest-container img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #E8AA42;
        }

        .bold-hr {
            border: none;
            height: 5px;
            background-color: #E8AA42;
            margin: 10px 0;
        }

        @media (max-width: 768px) {

            .kiri,
            .kanan {
                width: 100%;
                flex: 1 1 100%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION["id"])) {
    ?>
        <div class="isi">
            <div class="kiri">
                <?php include "menu.php"; ?>
            </div>
            <div class="kanan">
                <div class="header">
                    <?php
                    if (isset($_SESSION['nama_admin']) && isset($_SESSION['foto_admin'])) {
                        $nama_admin = htmlspecialchars($_SESSION['nama_admin']);
                        $foto_admin = htmlspecialchars($_SESSION['foto_admin']);
                        echo "<div class='guest-container'>";
                        echo "<h2>{$nama_admin}</h2>";
                        echo "<img src='../image/{$foto_admin}' alt='Admin Photo'>";
                        echo "</div>";
                    } else {
                        echo "<div class='guest-container'>";
                        echo "<h2>Guest</h2>";
                        echo "<img src='../image/default/guest.png' alt='Guest Photo'>";
                        echo "</div>";
                    }
                    ?>
                    <hr class="bold-hr">
                </div>
                <?php
                if (isset($_GET['page'])) {
                    include "content.php"; 
                } else {
                    echo "<h2 class='start-text'>Please select one of the menus on the side to open the data</h2>"; // Show the message if no menu is selected
                }
                ?>
            </div>
        </div>

        <div class="bawah">
            <h3>Copyright &copy; 2025, Malika's Drink</h3>
            <h6>Annisa Intan Suwardana - XII PPLG 2 - SMK Negeri 12 Surabaya</h6>
        </div>
    <?php
    } else {
        include "auth/index.php";
    }
    ?>
</body>

</html>

<style>
    :root {
        --bg: #025464;
        --color: #F8F1F1;
        --tr1: #E57C23;
        --tr2: #E8AA42;
    }

    * {
        text-decoration: none;
        color: var(--color);
        box-sizing: border-box;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }

    h1 {
        margin: 0;
    }

    .button-primary {
        font-weight: bold;
        cursor: pointer;
        background-color: var(--tr2);
        color: var(--color);
        border-radius: 10px;
        border: 2px solid var(--tr1);
        padding: 8px 16px;
        margin-bottom: 5px;
        font-size: 16px;
        transition: 0.3s;
    }

    .button-primary:hover {
        background-color: var(--tr1);
        color: white;
    }

    table  {
        width: 100%;
        border-collapse: collapse;
    }
    
    #THIStable {
        background-color:rgb(32,150,174, 0.8);
    }

    table tr td {
        padding: 5px;
    }

    .kepala {
        border: 1px;
        color: white;
        font-weight: bold;
    }

    .gambar {
        width: 100px;
        height: auto;
        max-height: 100px;
        border-radius: 5px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .start-text {
        margin: 0;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 60%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    @media (max-width: 768px) {
        .gambar {
            width: 60px;
        }

        .action-buttons button {
            font-size: 12px;
            padding: 5px;
        }

        .start-text {
            display: none;
        }
    }
</style>