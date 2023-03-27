<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>CAESAR CIPHER GEN</title>
    <style>
        .monospace {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
    <?php include("header.php") ?>
    <main>
        <article class="notice" dir="top">
            <h2>Pilih menu</h2>
            <a href="enkripsi.php" class="button">Enkripsi Data</a>
            <a href="dekripsi.php" class="button">Dekripsi Data</a>
            <ul style="margin-top: 35px; color:grey;">
                <li>Enkripsi data berfungsi untuk merahasiakan pesan sehingga orang lain tidak dapat mengetahui isi pesan sebenarnya</li>
                <li>Dekripsi data berfungsi untuk menerjemahkan pesan rahasia berdasarkan key (kunci yang sama untuk meng-enkripsi data)</li>
            </ul>
        </article>
        <section>
            <div>
                <h3>Tentang Caesar Cipher</h3>
                <p>
                    Caesar Cipher merupakan teknik enkripsi sederhana dengan mensubstitusikan suatu karakter huruf dengan karakter lain yang memiliki selisih poin tertentu.
                    Lebih lanjut mengenai Caesar Chiper, bisa dilihat pada halaman <a href="https://id.wikipedia.org/wiki/Sandi_Caesar">berikut</a>
                    dan <a href="https://en.wikipedia.org/wiki/ROT13">halaman berikut</a>
                </p>
                <hr>
                <p>
                    Contoh: jika menggunakan key <strong>"geser 3 kekanan" atau  "geser +3":</strong>
                </p>
                <table>
                    <tr>
                        <td>Alfabet biasa</td>
                        <td class="monospace">ABCDEFGHIJKLMNOPQRSTUVWXYZ</td>
                    </tr>
                    <tr>
                        <td>Alfabet sandi</td>
                        <td class="monospace">DEFGHIJKLMNOPQRSTUVWXYZABC</td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>Proses enkripsi dan dekripsi</h3>
                <p>
                Proses penyandian (enkripsi) dapat secara matematis menggunakan operasi modulus
                dengan mengubah huruf-huruf menjadi angka, <span class="monospace">A=0, B=1,..., Z=25.</span>
                Secara matematis dapat dituliskan sebagaimana berikut ini    
                </p>
                <table>
                    <tr>
                        <td>proses enkripsi</td>
                        <td style="background-color:lightgray;">
                            <img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/77b59c7a676a99610ddee4ffc305aa7f9cda3b1a" style="height: 25px;" alt="rumus enkripsi caesar cipher">
                        </td>
                    </tr>
                    <tr>
                        <td>proses dekripsi</td>
                        <td style="background-color:lightgray;">
                            <img src="https://wikimedia.org/api/rest_v1/media/math/render/svg/8ed607e0202ff8d35aa41559f846cac9d358a362" style="height: 25px;" alt="rumus dekripsi caesar cipher">
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>Contoh implementasi Caesar Cipher</h3>
                <table>
                    <tr>
                        <td>Key</td>
                        <td>+3</td>
                    </tr>
                    <tr>
                        <td>Plaintext</td>
                        <td>saku</td>
                    </tr>
                    <tr>
                        <td>Ciphertext</td>
                        <td>vdnx</td>
                    </tr>
                </table>
            </div>       
        </section> 
    </main>
    <a href="#top">Back to top</a>
    <?php include("footer.php") ?>
</body>
</html>
