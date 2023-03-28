<?php
session_start();
ob_start();
require "cipher.php";
$alfabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Generate Kode</title>
</head>
<body>
    <?php include("header.php") ?>
    <main>
        <div style="margin-bottom: 15px;">
            <a href="index.php">Home</a>
        </div>
        <article>
            <section>
            <h2>Generate Kode Cipher</h2>
            <form action="kode-cipher.php" method="post">
                <label for="c_key">Masukkan key</label>
                <input type="number" name="c_key" id="">
                <button type="submit" name="cipher" value="generate">Generate</button>
            </form>
            </section>
            <section>
                <h2>Output</h2>
                <?php if(isset($_SESSION['cipher'])) :?>
                    <h4 style="margin: 0;">Key : <?= $_SESSION['c_key'] ?></h4>
                <figure>
                    <table>
                        <tr>
                            <td>Alfabet biasa</td>
                            <?php foreach (str_split($alfabet) as $char) :?>
                            <td><?= $char ?></td>
                            <?php endforeach ?>
                        </tr>
                        <tr>
                            <td>Alfabet cipher</td>
                            <?php foreach (str_split($_SESSION['kode_cipher']) as $code_ch) :?>
                            <td><?= $code_ch ?></td>
                            <?php endforeach ?>
                        </tr>
                    </table>
                </figure>
                <?php endif ?>
            </section>
        </article>
        <br>
        <a href="index.php">Home</a>
    </main>
    <?php include("footer.php") ?>
</body>
</html>

<?php
if(isset($_POST['cipher'])){
    $_SESSION['cipher'] = $_POST['cipher'];

    $key = $_POST['c_key'] ?: 12;
    $result = Encipher($alfabet, $key);

    $_SESSION['c_key'] = $key;
    $_SESSION['kode_cipher'] = $result; 
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
