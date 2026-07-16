<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            title: "Berhasil Keluar!",
            text: "Terima kasih telah menggunakan SmartKasir. Sampai jumpa lagi!",
            icon: "success",
            timer: 2000,
            showConfirmButton: false,
            backdrop: `
                rgba(253, 10, 10, 0.4)
                left top
                no-repeat
            `
        }).then(function() {
            window.location = "index.php";
        });
    </script>
</body>
</html>
