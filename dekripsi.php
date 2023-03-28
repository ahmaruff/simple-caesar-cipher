<?php
session_start();
ob_start();
require "cipher.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Dekripsi Text</title>
</head>

<body>
    <?php include("header.php") ?>
    <main>
        <div style="margin-bottom: 15px;">
            <a href="index.php">Home</a> \\
            <a href="enkripsi.php">Enkripsi Text</a>
        </div> 
        <article>
            <section>
                <h2>Dekripsi Text Rahasia</h2>
                <form action="dekripsi.php" method="post">
                    <label for="ciphertext">Masukkan text rahasia</label>
                    <input type="text" name="ciphertext" id="" required style="width: 100%; margin-bottom: 15px;">
                    <label for="d_key">Masukkan key</label>
                    <input type="number" name="d_key" id="" style="margin-bottom: 15px;">
                    <br>
                    <button type="submit" name="dekripsi" value="submit">Submit</button>
                </form>
            </section>
            <section>
                <h2>Output</h2>
                <?php if (isset($_SESSION['dekripsi'])) : ?>
                    <table>
                        <tr>
                            <td>Key</td>
                            <td><?= $_SESSION['d_key'] ?></td>
                        </tr>
                        <tr>
                            <td>Ciphertext</td>
                            <td><?= $_SESSION['ciphertext'] ?></td>
                        </tr>
                        <tr>
                            <td>Hasil dekripsi</td>
                            <td><?= $_SESSION['d_result'] ?></td>
                        </tr>
                    </table>
                <?php endif ?>
            </section>
        </article>
        <br>
        <a href="index.php">Home</a> \\
        <a href="enkripsi.php">Enkripsi Text</a>
    </main>
    <?php include("footer.php") ?>
</body>

<?php
if (isset($_POST['dekripsi'])) {
    $_SESSION['dekripsi'] = $_POST['dekripsi'];

    $ciphertext = $_POST['ciphertext'];
    $d_key = $_POST['d_key'] ?: 12;
    $d_result = Decipher($ciphertext, $d_key);

    $_SESSION['ciphertext'] = $ciphertext;
    $_SESSION['d_key'] = $d_key;
    $_SESSION['d_result'] = $d_result;
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
