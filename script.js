// Fungsi untuk menetapkan cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Fungsi untuk mendapatkan nilai cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Fungsi untuk menghapus cookie
function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}

// Fungsi untuk mendapatkan data dari server dan menampilkan di tabel
function fetchDataAndDisplay() {
    fetch('process.php?fetchData=true')
        .then(response => response.json())
        .then(data => {
            // Hapus semua baris tabel sebelum menambahkan data baru
            var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = '';

            // Iterasi melalui data dan tambahkan ke tabel
            data.forEach(row => {
                var newRow = tableBody.insertRow(tableBody.rows.length);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);

                cell1.innerHTML = row.nama;
                cell2.innerHTML = row.tanggal_lahir;
                cell3.innerHTML = row.jenis_kelamin;
                cell4.innerHTML = row.email;
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}



// Simpan data ke cookie saat halaman dimuat
window.onload = function () {
    var nama = getCookie('nama');
    var tanggal_lahir = getCookie('tanggal_lahir');
    var jenis_kelamin = getCookie('jenis_kelamin');
    var email = getCookie('email');

    if (nama) document.getElementById('nama').value = nama;
    if (tanggal_lahir) document.getElementById('tanggal_lahir').value = tanggal_lahir;
    if (jenis_kelamin) document.getElementById(jenis_kelamin).checked = true;
    if (email) document.getElementById('email').value = email;
};

// Simpan data ke cookie saat formulir di-submit
document.getElementById('dataForm').addEventListener('submit', function (event) {
    var nama = document.getElementById('nama').value;
    var tanggal_lahir = document.getElementById('tanggal_lahir').value;
    var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
    var email = document.getElementById('email').value;

    // Simpan data ke cookie
    setCookie('nama', nama, 30);
    setCookie('tanggal_lahir', tanggal_lahir, 30);
    if (jenis_kelamin) setCookie('jenis_kelamin', jenis_kelamin.value, 30);
    setCookie('email', email, 30);
});

// Hapus cookie saat formulir di-reset
document.getElementById('dataForm').addEventListener('reset', function () {
    eraseCookie('nama');
    eraseCookie('tanggal_lahir');
    eraseCookie('jenis_kelamin');
    eraseCookie('email');
});

// Rekam Persitiwa
document.getElementById('submitBtn').addEventListener('click', function () {
    // Logika manipulasi DOM saat tombol submit ditekan
    console.log("Tombol Submit ditekan");
});

// Rekam Persitiwa
document.getElementById('tanggal_lahir').addEventListener('change', function () {
    // Logika manipulasi DOM saat tanggal lahir diubah
    var tanggalLahirValue = this.value;
    console.log("Tanggal Lahir diubah menjadi: " + tanggalLahirValue);
});


// Rekam Persitiwa
document.getElementById('pria').addEventListener('change', function () {
    // Logika manipulasi DOM saat radio button pria diubah
    console.log("Radio Pria diubah");
});

// Panggil fungsi fetchDataAndDisplay saat halaman dimuat
document.addEventListener('DOMContentLoaded', fetchDataAndDisplay);