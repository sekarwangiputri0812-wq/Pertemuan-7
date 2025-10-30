<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data yang Dikirim</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .result-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        .data-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .data-label {
            font-weight: bold;
            color: #34495e;
            margin-bottom: 5px;
        }
        .data-value {
            color: #2c3e50;
            font-size: 16px;
        }
        .error {
            color: #e74c3c;
            text-align: center;
            padding: 20px;
            background-color: #ffeaea;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .back-button {
            display: inline-block;
            background-color: #520546;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #520546;

        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Data yang Dikirim</h1>
        
        <?php
        // Cek apakah semua data telah dikirim
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
            $alamat = isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '';
            $tanggal_lahir = isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : '';
            $jenis_kelamin = isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : '';
            
            // Validasi apakah semua field telah diisi
            $errors = [];
            
            if (empty($nama)) {
                $errors[] = "Nama harus diisi";
            }
            
            if (empty($alamat)) {
                $errors[] = "Alamat harus diisi";
            }
            
            if (empty($tanggal_lahir)) {
                $errors[] = "Tanggal lahir harus diisi";
            }
            
            if (empty($jenis_kelamin)) {
                $errors[] = "Jenis kelamin harus dipilih";
            }
            
            // Jika ada error, tampilkan pesan error
            if (!empty($errors)) {
                echo '<div class="error">';
                echo '<h3>Terjadi kesalahan:</h3>';
                echo '<ul>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul>';
                echo '</div>';
                echo '<a href="form.html" class="back-button">Kembali ke Form</a>';
            } else {
                // Jika tidak ada error, tampilkan data
                echo '<div class="data-item">';
                echo '<div class="data-label">Nama:</div>';
                echo '<div class="data-value">' . $nama . '</div>';
                echo '</div>';
                
                echo '<div class="data-item">';
                echo '<div class="data-label">Alamat:</div>';
                echo '<div class="data-value">' . nl2br($alamat) . '</div>';
                echo '</div>';
                
                echo '<div class="data-item">';
                echo '<div class="data-label">Tanggal Lahir:</div>';
                echo '<div class="data-value">' . date('d F Y', strtotime($tanggal_lahir)) . '</div>';
                echo '</div>';
                
                echo '<div class="data-item">';
                echo '<div class="data-label">Jenis Kelamin:</div>';
                echo '<div class="data-value">' . $jenis_kelamin . '</div>';
                echo '</div>';
                
                echo '<a href="form.html" class="back-button">Kembali ke Form</a>';
            }
        } else {
            // Jika halaman diakses tanpa menggunakan metode POST
            echo '<div class="error">';
            echo 'Halaman ini hanya dapat diakses setelah mengisi form.';
            echo '</div>';
            echo '<a href="form.html" class="back-button">Kembali ke Form</a>';
        }
        ?>
    </div>
</body>
</html>