<!--
    Nama    : Zikra Daffa Saputra
    NIM     : 121140018
    Kelas   : RC
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS PEMWEB</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Form Input</h2>
    <form id="dataForm" action="process.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        <br>

        <label>Jenis Kelamin:</label>
        <input type="radio" id="pria" name="jenis_kelamin" value="pria"> Pria
        <input type="radio" id="wanita" name="jenis_kelamin" value="wanita"> Wanita
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <input type="submit" value="Submit" id="submitBtn">
    </form>

    <h2>Data dari Server</h2>
    <table id="dataTable">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data dari server akan ditampilkan di sini -->
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
