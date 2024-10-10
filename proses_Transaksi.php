<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
        .result {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Input Transaksi Penjualan</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nama">Nama Barang:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga Satuan:</label>
            <input type="number" id="harga" name="harga" required>
        </div>
        <input type="submit" class="submit-btn" value="Proses Transaksi">
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function untuk memproses transaksi
    function prosesTransaksi($nama, $jumlah, $harga) {
        $total = $jumlah * $harga;
        return array(
            'nama' => $nama,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'total' => $total
        );
    }

    // Mengambil data dari form
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Memanggil fungsi prosesTransaksi
    $hasilTransaksi = prosesTransaksi($nama, $jumlah, $harga);
    
    // Menampilkan hasil transaksi
    echo "<div class='result'>";
    echo "<h2>Detail Transaksi</h2>";
    echo "Nama Barang: " . $hasilTransaksi['nama'] . "<br>";
    echo "Jumlah: " . $hasilTransaksi['jumlah'] . "<br>";
    echo "Harga Satuan: Rp " . number_format($hasilTransaksi['harga'], 0, ',', '.') . "<br>";
    echo "Total Harga: Rp " . number_format($hasilTransaksi['total'], 0, ',', '.') . "<br>";
    echo "</div>";
}
?>

</body>
</html>
