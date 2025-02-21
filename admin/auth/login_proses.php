<head>
    <title>Login</title>
    <script src="../../asset/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body style="background-color: #E57C23;">

    <?php
    session_start();
    include "../../config/connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_name = mysqli_real_escape_string($koneksi, $_POST['user_name']);
        $password_input = $_POST['password'];

        // Query to find the user by username
        $query = "SELECT * FROM admin WHERE user_name = '$user_name'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query error: " . mysqli_error($koneksi));
        }

        if (mysqli_num_rows($result) > 0) {
            $data_login = mysqli_fetch_assoc($result);
            $password_db = $data_login['password'];

            // Check if the password in the database is still MD5 (32 characters and only hex)
            if (strlen($password_db) == 32 && ctype_xdigit($password_db)) {
                // If the old password uses MD5
                if (md5($password_input) === $password_db) {
                    // Upgrade the password to password_hash()
                    $new_hashed_password = password_hash($password_input, PASSWORD_DEFAULT);
                    $update_query = "UPDATE admin SET password = '$new_hashed_password' WHERE id = " . $data_login['id'];
                    mysqli_query($koneksi, $update_query);

                    // Set session
                    $_SESSION['id'] = $data_login['id'];
                    $_SESSION['user_name'] = $data_login['user_name'];
                    $_SESSION['nama_admin'] = $data_login['nama_admin'];
                    $_SESSION['foto_admin'] = $data_login['foto_admin'];

                    $message = "Login Successful & Password Updated to New Format!";
                    $status = "success";
                    $redirect = "..";
                } else {
                    $message = "Incorrect Password!";
                    $status = "error";
                    $redirect = "..";
                }
            } else {
                // If the password is already using password_hash(), use password_verify()
                if (password_verify($password_input, $password_db)) {
                    // Set session
                    $_SESSION['id'] = $data_login['id'];
                    $_SESSION['user_name'] = $data_login['user_name'];
                    $_SESSION['nama_admin'] = $data_login['nama_admin'];
                    $_SESSION['foto_admin'] = $data_login['foto_admin'];

                    $message = "Login Successful!";
                    $status = "success";
                    $redirect = "..";
                } else {
                    $message = "Incorrect Password!";
                    $status = "error";
                    $redirect = "..";
                }
            }
        } else {
            $message = "Username Not Found!";
            $status = "error";
            $redirect = "..";
        }

        mysqli_free_result($result);
        mysqli_close($koneksi);

        // SweetAlert notification for successful/failed login
        echo "<script>
        Swal.fire({
            icon: '$status',
            title: '$message',
            timer: 2000,
            showConfirmButton: false
        }).then(() => {
            window.location.href = '$redirect';
        });
    </script>";
    } else {
        header("Location: ../index.php");
        exit();
    }
    ?>

</body>

</html>