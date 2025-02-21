<head>
    <title>Register</title>
    <link rel="icon" href="/malikas-drink/image/default/logo.png" type="image/png">
</head>

<div class="register">
    <div class="page">
        <div class="containerregister">
            <div class="left">
                <div class="content">
                    <h1>Create an Account</h1>
                    <p>Sign up to get started</p>
                    <form action="register_process.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" id="user_name" name="user_name" maxlength="50" required>
                            <label for="user_name">Username</label>
                        </div>
                        <div class="input-group">
                            <input type="password" id="password" name="password" maxlength="100" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-group">
                            <input type="text" id="nama_admin" name="nama_admin" maxlength="100" required>
                            <label for="nama_admin">Full Name</label>
                        </div>
                        <div class="input-group">
                            <input type="text" id="alamat_admin" name="alamat_admin" maxlength="255" required>
                            <label for="alamat_admin">Address</label>
                        </div>
                        <div class="input-group">
                            <input type="number" id="no_telp_admin" name="no_telp_admin" maxlength="15" required>
                            <label for="no_telp_admin">Phone Number</label>
                        </div>
                        <div class="input-group">
                            <input type="file" id="foto_admin" name="foto_admin" accept="image/*" required>
                        </div>
                        <div>
                            <button class="button-6" type="submit">Register</button>
                            <a href="/malikas-drink/admin/" class="button-6">Login</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <img src="water.png" alt="Register Image"> <br>
                <p>Don't forget your daily water </p>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --bg: #025464;
        --color: #F8F1F1;
        --tr1: #E57C23;
        --tr2: #E8AA42;
    }

    body {
        background-color: var(--tr1);
        margin: 0;
        padding: 0;
        display: block;
        min-height: 100vh;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .register {
        box-sizing: border-box;
        color: var(--color);
        max-width: 900px;
        width: 100%;
        margin: 40px auto;
    }

    .containerregister {
        display: flex;
        flex-wrap: wrap;
        background-color: var(--bg);
        border-radius: 20px;
        box-shadow: 10px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .left,
    .right {
        flex: 1;
        min-width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }

    .right {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .right img {
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    .right p {
        margin-top: 10px;
        color: var(--color);
        font-size: 14px;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.3);
        padding: 5px 10px;
        border-radius: 5px;
    }

    .content {
        max-width: 350px;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 300px;
    }

    .input-group {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
    }

    .input-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid var(--color);
        font-size: 16px;
        border-radius: 5px;
        color: var(--bg);
    }

    .input-group label {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--color);
        transition: 0.3s;
        color: var(--bg);
        padding: 0 5px;
        font-size: 14px;
        pointer-events: none;
    }

    .input-group input:focus+label,
    .input-group input:valid+label {
        top: -5px;
        left: 12px;
        color: var(--tr2);
        font-size: 12px;
    }

    /* Style for File Input */
    .input-group input[type="file"] {
        background: var(--color);
        color: var(--bg);
        border: none;
        padding: 8px;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-group input[type="file"]::-webkit-file-upload-button {
        background: var(--tr2);
        color: var(--bg);
        border: none;
        padding: 8px;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-group input[type="file"]:hover {
        background: var(--tr1);
    }

    /* Button Styles */
    .button-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    button {
        background-color: var(--color);
        border-radius: 50px;
        color: var(--bg);
        border: 2px solid var(--tr1);
        padding: 12px 24px;
        text-align: center;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    button:hover {
        background: var(--tr2);
    }

    a.button-6 {
        display: inline-block;
        text-decoration: none;
        text-align: center;
        padding: 12px 24px;
        background-color: var(--color);
        border-radius: 50px;
        color: var(--bg);
        border: 2px solid var(--tr1);
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    a.button-6:hover {
        background: var(--tr2);
    }


    /* Responsive Design */
    @media (max-width: 768px) {
        .containerregister {
            flex-direction: column;
        }

        .left,
        .right {
            padding: 20px;
        }

        .content {
            max-width: 100%;
        }

        form {
            max-width: 100%;
        }

        button {
            width: 100%;
        }
    }
</style>