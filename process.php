<?php
require_once 'db_config.php';

class FormProcessor {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function processFormData() {
        session_start(); // Mulai session

        // Pengolahan data dari form
        $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
        $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

        // Validasi data
        if (empty($nama) || empty($tanggal_lahir) || empty($jenis_kelamin) || empty($email)) {
            die('Data tidak lengkap');
        }

        // Menyimpan data ke basis data
        $this->saveToDatabase($nama, $tanggal_lahir, $jenis_kelamin, $email);

        // Simpan data ke session
        $_SESSION['user_data'] = array(
            'nama' => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email
        );

        // Redirect kembali ke index.php setelah pemrosesan data
        header("Location: index.php");
    }

    private function saveToDatabase($nama, $tanggal_lahir, $jenis_kelamin, $email) {
        // Insert data ke tabel data_mahasiswa
        $browser_info = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];

        $query = "INSERT INTO data_mahasiswa (nama, tanggal_lahir, jenis_kelamin, email, browser_info, ip_address) VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$email', '$browser_info', '$ip_address')";

        if (mysqli_query($this->koneksi, $query)) {
            echo "Data disimpan ke basis data.<br>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($this->koneksi);
        }
    }

    public function fetchData() {
        $query = "SELECT * FROM data_mahasiswa";
        $result = mysqli_query($this->koneksi, $query);

        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}

$formProcessor = new FormProcessor($koneksi);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formProcessor->processFormData();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['fetchData'])) {
    // Mengirimkan data sebagai JSON ke index.php saat diminta
    echo json_encode($formProcessor->fetchData());
} else {
    // Redirect ke index.php jika akses langsung ke process.php
    header("Location: index.php");
}
?>
