# UAS-PEMWEB

Bagian 1: Client-side Programming
1.1 Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM.
Panduan:
- Buat form input dengan minimal 4 elemen input (teks, checkbox, radio, dll.)
- Menampilkan data dari server kedalam sebuah halaman menggunakan tag `table`
    Penjelasan:
    - File index.html berisi formulir input dan tabel HTML.
    - Formulir mencakup minimal 4 elemen input seperti teks, checkbox, radio, dan lainnya.
    - Tabel digunakan untuk menampilkan data dari server.
1.2 Buatlah beberapa event untuk menghandle interaksi pada halaman web
Panduan:
- Tambahkan minimal 3 event yang berbeda untuk menghandle form pada 1.1
- Implementasikan JavaScript untuk validasi setiap input sebelum diproses oleh PHP
    Penjelasan:
    - File script.js berisi kode JavaScript untuk menangani event dan validasi formulir.

Bagian 2: Server-side Programming
2.1 Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`. Tampilkan hasil pengolahan data ke layar.
Panduan:
- Gunakan metode POST atau GET pada formulir.
- Parsing data dari variabel global dan lakukan validasi disisi server
- Simpan ke basisdata termasuk jenis browser dan alamat IP pengguna
    Penjelasan:
    - Pada process.php terdapat skrip PHP yang mengelola data dari formulir menggunakan variabel global $_POST.
    - Menampilkan hasil pengolahan data ke layar.
2.2 Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda.
Panduan:
- Objek yang dibuat harus terkait dengan konteks pengembangan web saat ini.

Bagian 3: Database Management
3.1 Buatlah sebuah tabel pada database MySQL
Panduan:
- Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata
    Penjelasan:
    1. Membuat Database
        CREATE DATABASE mahasiswa;
    2. Menggunakan Database yang Dibuat
        USE mahasiswa;
    3. Membuat Tabel
        CREATE TABLE IF NOT EXISTS data_mahasiswa (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(50) NOT NULL,
            tanggal_lahir DATE NOT NULL,
            jenis_kelamin VARCHAR(10) NOT NULL,
            email VARCHAR(100) NOT NULL,
            browser_info TEXT,
            ip_address VARCHAR(15),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
3.2 Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses.
Panduan:
- Gunakan konstanta atau variabel untuk menyimpan informasi koneksi (host, username, password, nama database).
    Penjelasan:
    - Pada db_config.php terdapat konfigurasi koneksi ke database MySQL menggunakan konstanta atau variabel.
3.3 Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data.
Panduan:
- Gunakan query SQL yang sesuai dengan skenario yang diberikan.
    Penjelasan:
    - Pada process.php terdapat fungsi yang digunakan untuk menambah data baru ke database dengan query SQL

Bagian 4: State Management
4.1 Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session.
Panduan:
- Gunakan `session_start()` untuk memulai session.
- Simpan informasi pengguna ke dalam session.
    Penjelasan:
    - Pada process.php terdapat fugsi processFormData() untuk menghandle kondisi diatas
4.2 Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript.
Panduan:
- Buat fungsi-fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.
- Gunakan browser storage untuk menyimpan informasi secara lokal.
    Penjelasan:
    - Pada script.js terdapat fungsi untuk pengelolaan state menggunakan cookie dan browser storage pada sisi client
