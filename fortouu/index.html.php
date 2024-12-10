<?php
// Set zona waktu ke Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

// Fungsi untuk menulis data ke file
function tulisKeFile($file, $data) {
    $fp = fopen($file, 'a');
    fwrite($fp, $data);
    fclose($fp);
}

// Tangani permintaan POST dengan parameter 'p' (pesan)
if (isset($_POST['p'])) {
    $pesan = htmlspecialchars($_POST['p'], ENT_QUOTES, 'UTF-8'); // Sanitasi input
    $timestamp = date("d-M-Y (H:i)");
    $konten = "
<div class='cp'>Pesan:<br/>{$pesan}<p>{$timestamp}</p></div>";
    tulisKeFile('.png', $konten);
    die(json_encode(["s" => 200])); // Balasan JSON
}

// Tangani permintaan POST dengan parameter 'd' (data mentah)
if (isset($_POST['d'])) {
    $data = htmlspecialchars($_POST['d'], ENT_QUOTES, 'UTF-8'); // Sanitasi input
    tulisKeFile('.png', $data);
    die(json_encode(["s" => 200])); // Balasan JSON
}

// Tangani permintaan GET dengan parameter 'd' (baca data)
if (isset($_GET['d'])) {
    $filePath = '.png';
    if (file_exists($filePath)) {
        $fr = fopen($filePath, 'r');
        $data = fgets($fr);
        fclose($fr);
        die(json_encode(["d" => $data])); // Balasan JSON
    } else {
        die(json_encode(["error" => "File not found"])); // Balasan error jika file tidak ada
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortouu - Ucapan Online</title>
    <script src="https://dekatutorial.github.io/ct/s.js"></script>
</head>
<body>
<?php
// Tangani permintaan GET dengan parameter 'pesan' (tampilkan semua pesan)
if (isset($_GET['pesan'])) {
    echo "<div id='ccp'>";
    $filePath = '.png';
    if (file_exists($filePath)) {
        $fp = fopen($filePath, 'r');
        while (!feof($fp)) {
            echo fgets($fp);
        }
        fclose($fp);
    } else {
        echo "<p>Belum ada pesan yang ditulis.</p>";
    }
    die("</div></body></html>");
}
?>
<script>
/*=========================
Mau custom web ucapan online? Order aja di Deka Tutorial!
+ YouTube: Deka Tutorial
+ TikTok: @deka_tutorial
+ Instagram: deka_tutorial
=========================*/

// Variabel untuk teks pembuka
const teksHai = "Hai, ada surat buat kamu nih";

// Konten ucapan dalam bentuk array
const konten = [
    { gambar: "sticker1.jpg", ucapan: "Halooo sayangku" },
    { gambar: "sticker2.webp", ucapan: "Aku kangen kamu!" },
    { gambar: "sticker1.jpg", ucapan: "Terima kasih sudah ada untukku" },
    { gambar: "sticker3.jpg" },
    { ucapan: "I love youuuu ❤️" }
];

// Variabel untuk musik dan nomor WhatsApp
const music = "musik.mp4";
const nomorWhatsapp = "6282114816074";

// Panggil fungsi DekaTutorial untuk memuat konten
DekaTutorial(konten, music, nomorWhatsapp);
</script>
</body>
</html>

