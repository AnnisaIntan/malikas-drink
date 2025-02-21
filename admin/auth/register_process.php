<head>
    <title>Register</title>
    <link rel="icon" href="/malikas-drink/image/default/logo.png" type="image/png">
    <script src="../../asset/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body style="background-color: #E57C23;">

    <?php
    include "../../config/connection.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user_name = mysqli_real_escape_string($koneksi, $_POST['user_name']);
        $password = $_POST['password'];
        $nama_admin = mysqli_real_escape_string($koneksi, $_POST['nama_admin']);
        $alamat_admin = mysqli_real_escape_string($koneksi, $_POST['alamat_admin']);
        $no_telp_admin = mysqli_real_escape_string($koneksi, $_POST['no_telp_admin']);

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Handle file upload
        $foto_admin = "";
        if (!empty($_FILES['foto_admin']['name'])) {
            $target_dir = "../../image/"; // Make sure this directory exists
            $imageFileType = strtolower(pathinfo($_FILES['foto_admin']['name'], PATHINFO_EXTENSION));

            // Allowed file types
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_types)) {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Upload Failed',
                    text: 'Only JPG, JPEG, PNG & GIF files are allowed.',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '/malikas-drink/admin/registration.php';
                });
            </script>";
                exit();
            }

            // Rename file using user_name + extension
            $file_name = "../image/" . "photo-" . $user_name . "." . $imageFileType;
            $target_file = $target_dir . $file_name;

            // Move uploaded file
            if (move_uploaded_file($_FILES['foto_admin']['tmp_name'], $target_file)) {
                $foto_admin = $file_name;
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Upload Failed',
                    text: 'Error uploading file.',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '/malikas-drink/admin/registration.php';
                });
            </script>";
                exit();
            }
        }

        // Insert into database
        $query = "INSERT INTO admin (user_name, password, nama_admin, alamat_admin, no_telp_admin, foto_admin) 
              VALUES ('$user_name', '$hashed_password', '$nama_admin', '$alamat_admin', '$no_telp_admin', '$foto_admin')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: 'Redirecting...',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() {
                window.location.href = '/malikas-drink/admin/';
            }, 2000);
        </script>";

            // Ensure PHP waits for the SweetAlert before redirecting
            ob_flush();
            flush();
            sleep(2);
            exit();
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: 'An error occurred. Please try again.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '/malikas-drink/admin/registration.php';
            });
        </script>";
        }
    }
    ?>

</body>

</html>