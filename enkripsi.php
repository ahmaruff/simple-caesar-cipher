<?php
session_start();
ob_start();
require "./cipher.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Enkripsi Text</title>
</head>
<body>
    <?php include("header.php") ?>
    <main>
        <div style="margin-bottom: 15px;">
            <a href="index.php">Home</a> \\
            <a href="dekripsi.php">Dekripsi Text</a>
        </div>
        <article>
            <section>
            <h2>Enkripsi plaintext</h2>
            <form action="enkripsi.php" method="post">
                <label for="plaintext">Masukkan text yang akan dienkripsi</label>
                <input type="text" name="plaintext" id="" required style="width: 100%; margin-bottom: 15px;">
                <label for="key">Masukkan key</label>
                <input type="number" name="key" id="" style="margin-bottom: 15px;">
                <br>
                <button type="submit" name="enkripsi" value="submit">Submit</button>
            </form>
            </section>
            <section>
                <h2>Output</h2>
                <?php if(isset($_SESSION['enkripsi'])) :?>
                <table>
                    <tr>
                        <td>Key</td>
                        <td><?= $_SESSION['key'] ?></td>
                    </tr>
                    <tr>
                        <td>Plaintext</td>
                        <td><?= $_SESSION['plaintext'] ?></td>
                    </tr>
                    <tr>
                        <td>Hasil enkripsi</td>
                        <td><?= $_SESSION['result'] ?></td>
                    </tr>
                </table>
                <?php endif ?>
            </section>
        </article>
        <br>
        <a href="index.php">Home</a> \\
        <a href="dekripsi.php">Dekripsi Text</a>
    </main>
    <?php include("footer.php") ?>
</body>
</html>

<?php
if(isset($_POST['enkripsi'])){
    $_SESSION['enkripsi'] = $_POST['enkripsi'];

    $plaintext = $_POST['plaintext'];
    $key = $_POST['key'] ?: 12;
    $result = Encipher($plaintext, $key);

    $_SESSION['plaintext'] = $plaintext;
    $_SESSION['key'] = $key;
    $_SESSION['result'] = $result; 
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
