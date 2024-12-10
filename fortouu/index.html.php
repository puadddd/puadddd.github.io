<?php 
// Set zona waktu
date_default_timezone_set('Asia/Jakarta');

// Fungsi untuk menulis pesan ke file
function tulisKeFile($file, $data) {
    $fp = fopen($file, 'a');
    fwrite($fp, $data);
    fclose($fp);
}

// Tangani permintaan POST dengan parameter 'p'
if (isset($_POST['p'])) {
    $pesan = htmlspecialchars($_POST['p']); // Hindari XSS
    $timestamp = date("d-M-Y (H:i)");
    $konten = "
<div class='cp'>Pesan :<br/>{$pesan}<p>{$timestamp}</p></div>";
    tulisKeFile('.png', $konten);
    die(json_encode(["s" => 200]));
}

// Tangani permintaan POST dengan parameter 'd'
if (isset($_POST['d'])) {
    $data = htmlspecialchars($_POST['d']); // Hindari XSS
    tulisKeFile('.png', $data);
    die(json_encode(["s" => 200]));
}

// Tangani permintaan GET dengan parameter 'd'
if (isset($_GET['d'])) {
    $fr = fopen('.png', 'r');
    $data = fgets($fr);
    fclose($fr);
    die(json_encode(["d" => $data]));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fortouu</title>
    <script src="https://dekatutorial.github.io/ct/s.js"></script>
</head>
<body>
<?php 
// Tangani permintaan GET dengan parameter 'pesan'
if (isset($_GET['pesan'])) {
    echo "<div id='ccp'>";
    $fp = fopen('.png', 'r');
    while (!feof($fp)) {
        echo fgets($fp);
    }
    fclose($fp);
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

// Variabel untuk konten ucapan
const teksHai = "Hai, ada surat buat kamu nih";

const konten = [
    { gambar: "sticker1.jpg", ucapan: "halooo sayaank" },
    { gambar: "sticker2.webp", ucapan: "aku kangen kamuu" },
    { gambar: "sticker1.jpg", ucapan: "makasih sayank udah milih aku" },
    { gambar: "sticker3.jpg" },
    { ucapan: "i love youuuu" }
];

// Variabel musik dan nomor WhatsApp
const music = "musik.mp4";
const nomorWhatsapp = "6282114816074";

// Panggil fungsi DekaTutorial untuk memuat konten
DekaTutorial(konten, music, nomorWhatsapp);
</script>
</body>
</html>
