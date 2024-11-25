<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cek Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #555;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input, select, button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #e6f7e6;
            border-left: 5px solid #28a745;
            border-radius: 5px;
            font-size: 18px;
            line-height: 1;
        }
        .result h2 {
            font-size: 20px;
            color: #28a745;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pengecekan Gaji Pegawai</h1>
        <form method="POST">
            <input type="text" name="nama" placeholder="Masukan Nama Pegawai" required>
            <input type="date" name="tanggal_lahir" required>
            <select name="posisi" required>
                <option value="" disabled selected>Pilih Posisi</option>
                <option value="Intern">Intern</option>
                <option value="Staff">Staff</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Manager">Manager</option>
            </select>
            <button type="submit" name="submit">Cek gaji</button>
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $posisi = $_POST['posisi'];

            $umur = date('Y') - date('Y', strtotime($tanggal_lahir));

            // Tentukan gaji berdasarkan posisi
            $gaji = ($posisi == "Intern") ? 2000000 :
                    (($posisi == "Staff") ? 4000000 :
                    (($posisi == "Supervisor") ? 7000000 : 9000000));

            echo "<div class='result'>";
            echo "<h2>Hasil</h2>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Umur:</strong> $umur tahun</p>";
            echo "<p><strong>Posisi:</strong> $posisi</p>";
            echo "<p><strong>Gaji:</strong> Rp " . number_format($gaji, 0, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
