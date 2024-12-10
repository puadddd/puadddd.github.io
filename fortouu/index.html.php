<?php 
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['p'])) {
    $fp = fopen('.png', 'a');
    fwrite($fp, '
<div class="cp">Pesan :<br/>' . htmlspecialchars($_POST['p']) . '<p>' . date("d-M-Y (H:i)") . '</p></div>');
    fclose($fp);
    die('{"s":200}');
}

if (isset($_POST['d'])) {
    $fa = fopen('.png', 'a');
    fwrite($fa, htmlspecialchars($_POST['d']));
    fclose($fa);
    die('{"s":200}');
}

if (isset($_GET['d'])) {
    $fr = fopen('.png', 'r');
    echo json_encode(["d" => fgets($fr)]);
    fclose($fr);
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://dekatutorial.github.io/ct/s.js"></script>
</head>
<body>
<?php 
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
Mau custom web ucapan online? Order Aja di Deka Tutorial !! (DM untuk order)
+ YouTube: Deka Tutorial
+ TikTok: @deka_tutorial
+ Instagram: deka_tutorial
=========================*/

const teksHai = "Hai, ada surat buat kamu nih";

const konten = [
    { gambar: "sticker1.jpg", ucapan: "halooo sayaank" },
    { gambar: "sticker2.webp", ucapan: "aku kangen kamuu" },
    { gambar: "sticker1.jpg", ucapan: "makasih sayank udah milih aku" },
    { gambar: "sticker3.jpg" },
    { ucapan: "i love youuuu" },
];

const music = "musik.mp4";
const nomorWhatsapp = "6282114816074";

/*=========================*/
DekaTutorial(konten, music, nomorWhatsapp);
</script>
</body>
</html>
