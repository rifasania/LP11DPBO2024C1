# LP11DPBO2024C1

# JANJI
Saya Rifa Sania NIM 2206697 mengerjakan Latihan Praktikum 11 dalam mata kuliah Desain Pemrograman Berorientasi Objek
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin...

# Penjelasan Program
### Model
1. DB.class.php: Kelas ini bertanggung jawab untuk menangani koneksi ke database dan menyediakan metode untuk mengeksekusi query SQL.
    - Konstruktor kelas ini menerima parameter host, user, password, dan nama database.
    - Metode open() digunakan untuk membuka koneksi ke database.
    - Metode execute($query) digunakan untuk mengeksekusi query SQL yang diberikan.
    - Metode getResult() digunakan untuk mengambil hasil dari eksekusi query sebelumnya.
    - Metode close() digunakan untuk menutup koneksi ke database.


2. Pasien.class.php: Kelas ini merepresentasikan entitas Pasien dengan properti seperti id, nik, nama, tempat, tl, gender, email, dan telp.

    - Konstruktor kelas ini menerima parameter untuk mengisi nilai properti.
    - Terdapat metode setter (set) dan getter (get) untuk setiap properti.


3. TabelPasien.class.php: Kelas ini mewarisi dari kelas DB dan menyediakan metode untuk berinteraksi dengan tabel pasien di database, seperti:

    - getPasien() untuk mendapatkan semua data pasien.
    - getPasienById($id) untuk mendapatkan data pasien berdasarkan id.
    - insertPasien($data) untuk menyisipkan data pasien baru.
    - updatePasien($id, $data) untuk memperbarui data pasien berdasarkan id.
    - deletePasien($id) untuk menghapus data pasien berdasarkan id.

</br>

### Presenter   
1. KontrakPresenter.php: Ini adalah sebuah interface yang mendefinisikan kontrak (antarmuka) untuk kelas presenter.
2. ProsesPasien.php: Kelas ini mengimplementasikan interface KontrakPresenter dan bertindak sebagai presenter. Kelas ini mengelola aliran data antara model dan view. Kelas ini mengambil data dari kelas TabelPasien, memrosesnya, dan menyediakan data tersebut kepada view.
    - Konstruktor kelas ini membuat instance dari TabelPasien dan menyiapkan array untuk menyimpan data pasien.
    - Metode prosesDataPasien() mengambil data pasien dari TabelPasien dan menyimpannya dalam array data.
    - Metode addPasien($data), updatePasien($id, $data), dan deletePasien($id) memanggil metode yang sesuai dari TabelPasien untuk menambah, memperbarui, atau menghapus data pasien.
    - Metode getId($i), getNik($i), getNama($i), getTempat($i), getTl($i), getGender($i), getEmail($i), getTelp($i), dan getSize() digunakan untuk mengambil data pasien dari array data dan menyediakannya kepada view.

</br>

### View
1. KontrakView.php: Ini adalah sebuah interface yang mendefinisikan kontrak (antarmuka) untuk kelas view.
2. TampilPasien.php: Kelas ini mengimplementasikan interface KontrakView dan menangani logika presentasi. Kelas ini berinteraksi dengan kelas ProsesPasien untuk mendapatkan data dan menghasilkan keluaran HTML.
    - Konstruktor kelas ini membuat instance dari ProsesPasien.
    - Metode tampil() memanggil metode prosesDataPasien() dari ProsesPasien dan membuat HTML untuk menampilkan daftar pasien.
    - Metode tambahPasien() dan editPasien($id) menampilkan formulir HTML untuk menambah atau mengedit data pasien. Jika ada data yang dikirimkan melalui formulir, metode ini akan memanggil metode addPasien($data) atau updatePasien($id, $data) dari ProsesPasien.
    - Metode hapusPasien($id) memanggil metode deletePasien($id) dari ProsesPasien untuk menghapus data pasien.

</br>

### Templates
1. form.html: Template HTML ini digunakan untuk menampilkan formulir untuk menambah atau mengedit data pasien.
2. skin.html: Template HTML ini digunakan untuk menampilkan daftar pasien dalam bentuk tabel.

</br>

### Controller
1. index.php: File ini bertindak sebagai controller. Tugas utamanya adalah:
    - Mengimpor semua file yang dibutuhkan.
    - Membuat instance dari TampilPasien.
    - Memeriksa parameter permintaan (add, id_hapus, id_edit) dan memanggil metode yang sesuai dari TampilPasien untuk menambah pasien baru, menghapus pasien, mengedit pasien, atau menampilkan daftar pasien.

</br></br>    

# Alur Program
1. Ketika pengguna mengakses aplikasi melalui index.php, file ini bertindak sebagai controller dan menginisialisasi kelas TampilPasien.
2. Tergantung pada parameter permintaan (add, id_hapus, id_edit), index.php memanggil metode yang sesuai dari kelas TampilPasien.
3. Jika pengguna ingin menampilkan daftar pasien, metode tampil() dari kelas TampilPasien akan dipanggil. Metode ini berinteraksi dengan kelas ProsesPasien (Presenter) dengan memanggil metode prosesDataPasien().
4. Dalam metode prosesDataPasien() di kelas ProsesPasien, data pasien diambil dari kelas TabelPasien (Model) menggunakan metode getPasien(). Data pasien kemudian diproses dan disimpan dalam array data.
5. Setelah memproses data, kelas ProsesPasien menyediakan data yang telah diproses kepada kelas TampilPasien melalui metode seperti getId($i), getNik($i), getNama($i), dan seterusnya.
6. Kelas TampilPasien menggunakan data yang diberikan oleh ProsesPasien untuk membuat HTML yang akan ditampilkan kepada pengguna.
7. Jika pengguna ingin menambah, mengedit, atau menghapus pasien, alur yang serupa akan diikuti. Kelas TampilPasien akan memanggil metode yang sesuai dari kelas ProsesPasien, yang pada gilirannya akan berinteraksi dengan kelas TabelPasien untuk melakukan operasi yang diminta.