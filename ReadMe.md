# TP8DPBO2425C1
Saya Arya Purnama Sauri dengan NIM 2408521 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Desain Program (Sistem Manajemen Informasi Akademik Dosen)

## Database

### Nama
`tp_mvc25`

### Relasi

### Struktur Tabel
Memiliki 3 entitas (tabel) yaitu `lecturers`, `departments`, dan `courses`.

#### 1. Tabel: `lecturers`
Tabel ini menyimpan data dosen yang terdaftar.

| Field        | Tipe Data             | Constraint   | Keterangan                                                   |
|-------       |-----------            |------------  |------------                                                  |
| `id`         | INT(11)           | PRIMARY KEY  | ID PRIMARY unik seorang dosen dengan AUTO_INCREMENT   |
| `name`       | VARCHAR(100)           | NOT NULL     | Nama lengkap dosen                                                  |
| `nidn`      | VARCHAR(20)                | NOT NULL     | NIDN (Nomor Induk Dosen Nasional)                                                 |
| `phone`           | VARCHAR(20)           | NOT NULL     | Nomor telepon dosen                |
| `join_date`    | DATE  | NOT NULL     | Tanggal dosen mulai bergabung      |
| `department_id`    | INT(11)  | FOREIGN KEY     | ID departemen (relasi ke tabel departments)                                   |

#### 2. Tabel: `departments`
Tabel ini menyimpan data departemen/jurusan yang tersedia.

| Field              | Tipe Data        | Constraint    | Keterangan                                             |
|-------             |-----------       |------------   |------------                                            |
| `id`          | INT(11)          | PRIMARY KEY   | ID PRIMARY unik departemen dengan AUTO_INCREMENT   |
| `name`       |  VARCHAR(100)    | NOT NULL      |  Nama departemen                                       |
| `description`            |  TEXT     | NOT NULL      | Deskripsi lengkap departemen                                             |

#### 3. Tabel: `courses`
Tabel ini menyimpan data mata kuliah yang tersedia.

| Field              | Tipe Data        | Constraint    | Keterangan                                             |
|-------             |-----------       |------------   |------------                                            |
| `id`          | INT(11)          | PRIMARY KEY   | ID PRIMARY unik mata kuliah dengan AUTO_INCREMENT   |
| `name`       |  VARCHAR(100)    | NOT NULL      | Nama mata kuliah                                       |
| `credit`            |  INT(11)     | NOT NULL      | Jumlah SKS (Satuan Kredit Semester)                                             |
| `lecturer_id`           | INT(11)          | FOREIGN KEY      | ID dosen pengampu (relasi ke tabel lecturers)                          |

## MVC (Model-View-Controller)   

### 1. `Lecturers` (Dosen)

#### Model
Mengelola data dosen di database.
- constructor() : Inisialisasi koneksi database dari config/database.php
- getAll() : Mengambil semua data dosen dengan JOIN ke tabel departments untuk menampilkan nama departemen
- getById($id) : Mengambil data dosen spesifik berdasarkan ID
- create($name, $nidn, $phone, $join_date, $department_id) : Menambah data dosen baru ke database
- update($id, $name, $nidn, $phone, $join_date, $department_id) : Mengupdate data dosen berdasarkan ID
- delete($id) : Menghapus data dosen dari database berdasarkan ID
- getDeparments() : Mengambil semua data departemen (untuk dropdown select di form)

#### View
Menampilkan antarmuka pengelolaan data dosen.
- index.php : Menampilkan tabel list semua dosen dengan kolom: ID, Name, NIDN, Phone, Join Date, Department, dan tombol Edit & Delete
- create.php - Menampilkan form input untuk menambah dosen baru dengan field: name, nidn, phone, join_date, dan dropdown department
- edit.php - Menampilkan form edit dengan data existing dosen yang sudah terisi (pre-filled) dan dropdown department yang terseleksi sesuai data

#### Controller
Mengatur alur CRUD lecturer.
- constructor() - Inisialisasi objek LecturerModel untuk digunakan di seluruh method controller
- index() - Memanggil getAll() dari model, kemudian menampilkan view index.php dengan data dosen
- create() - Memanggil getDepartments() dari model untuk dropdown, kemudian menampilkan view create.php
- store() - Menerima data POST dari form create, validasi input, memanggil create() model untuk insert ke DB, lalu redirect ke index
- edit($id) - Menerima parameter ID, memanggil getById($id) dan getDepartments(), kemudian menampilkan view edit.php dengan data
- update() - Menerima data POST dari form edit, validasi input, memanggil update() model untuk update DB, lalu redirect ke index
- delete($id) - Menerima parameter ID, memanggil delete($id) model untuk hapus data dari DB, kemudian redirect ke index

### 2. Deparments
Mengelola data departemen di database.
#### Model
- constructor() - Inisialisasi koneksi database dari config/database.php
- getAll() - Mengambil semua data departemen
- getById($id) - Mengambil data departemen spesifik berdasarkan ID
- create($name, $description) - Menambah departemen baru ke database
- update($id, $name, $description) - Mengupdate data departemen berdasarkan ID
- delete($id) - Menghapus data departemen dari database berdasarkan ID

#### View
Menampilkan antarmuka pengelolaan departemen.
- index.php - Menampilkan tabel list departemen dengan kolom: ID, Name, Description, dan tombol Edit & Delete
- create.php - Menampilkan form input untuk menambah departemen dengan field: name dan description
- edit.php - Menampilkan form edit dengan data departemen existing yang sudah terisi otomatis

#### Controller
Mengatur alur CRUD departemen.
- constructor() - Inisialisasi objek DepartmentModel
- index() - Memanggil getAll() model dan menampilkan view index.php dengan list departemen
- create() - Menampilkan view create.php (form kosong untuk input departemen baru)
- store() - Menerima POST data, memanggil create() model untuk insert, redirect ke index
- edit($id) - Menerima ID, memanggil getById($id), menampilkan view edit.php dengan data pre-filled
- update() - Menerima POST data, memanggil update() model, redirect ke index setelah berhasil update
- delete($id) - Menerima ID, memanggil delete($id) model untuk hapus data, redirect ke index

### 3. Courses
Mengelola data mata kuliah di database.
#### Model
- constructor() - Inisialisasi koneksi database dari config/database.php
- getAll() - Mengambil semua data courses dengan LEFT JOIN ke tabel lecturers untuk menampilkan nama dosen pengampu
- getById($id) - Mengambil data course spesifik berdasarkan ID
- create($name, $credit, $lecturer_id) - Menambah mata kuliah baru dengan data nama, SKS, dan ID dosen pengampu
- update($id, $name, $credit, $lecturer_id) - Mengupdate data course existing berdasarkan ID
- delete($id) - Menghapus data mata kuliah dari database berdasarkan ID
- getLecturers() - Mengambil semua data dosen untuk dropdown select di form create/edit course

#### View
Menampilkan antarmuka pengelolaan mata kuliah.
- index.php - Menampilkan tabel list courses dengan kolom: ID, Name, Credit, Lecturer Name, dan tombol Edit & Delete
- create.php - Menampilkan form input untuk menambah course dengan field: name, credit, dan dropdown lecturer
- edit.php - Menampilkan form edit dengan data course existing dan dropdown lecturer yang terseleksi sesuai data

#### Controller
Mengatur alur CRUD mata kuliah.
- constructor() Inisialisasi objek CourseModel
- index() - Memanggil getAll() model untuk ambil data courses beserta nama dosen, tampilkan view index.php
- create() - Memanggil getLecturers() untuk dropdown, kemudian menampilkan view create.php
- store() - Menerima POST (name, credit, lecturer_id), validasi, panggil create() model, redirect ke index
- edit($id) - Menerima ID, panggil getById($id) dan getLecturers(), tampilkan view edit.php dengan data
- update() - Menerima POST data edit, validasi, panggil update() model, redirect ke index setelah sukses
- delete($id) - Menerima ID, panggil delete($id) model untuk hapus course, redirect ke index

# Penjelasan Alur Program
## 1. Jalankan Program
## 2. Menampilkan tampilan awal 
   Terdapat navbar yang mengandung 3 link yang bisa ditekan oleh user:
   - Lecturers
   - Deparments
   - Courses
## 3. Menekan halaman Lecturers
   * READ
      1. Menampilkan data dosen dalam tabel dengan kolom: ID, Name, NIDN, Phone, Join Date, Department, dan tombol Actions (Edit & Delete)
   * CREATE
      1. Klik tombol "Add New" di atas tabel
      2. Sistem menampilkan form dengan field: Name, NIDN, Phone, Join Date, Department (dropdown)
      3. Isi semua field yang diperlukan
      4. Klik "Cancel" untuk membatalkan atau "Submit" untuk menyimpan
      5. Sistem validasi input di controller
      6. Data disimpan ke database via LecturerModel->create()
      7. Redirect ke halaman index dengan pesan sukses
   * UPDATE
      1. Klik tombol "Edit" pada baris data yang ingin diubah
      2. Sistem menampilkan form edit dengan data existing sudah terisi
      3. Ubah data sesuai kebutuhan
      4. Klik "Cancel" untuk membatalkan atau "Update" untuk menyimpan
      5. Sistem validasi dan update via LecturerModel->update()
      6. Redirect ke halaman index
   * DELETE
      1. Klik tombol "Delete" pada baris data yang ingin dihapus
      2. Muncul konfirmasi JavaScript: "Are you sure?"
      3. Klik "Cancel" untuk batal atau "OK" untuk konfirmasi
      4. Data dihapus dari database via LecturerModel->delete()
      5. Halaman refresh otomatis

## 4. Menekan halaman Deparments
   * READ
      1. Menampilkan tabel departemen dengan kolom: ID, Name, Description, dan tombol Actions (Edit & Delete)
   * CREATE
      1. Klik tombol "Add New"
      2. Form tampil dengan field: Name dan Description
      3. Isi data yang diperlukan
      4. Klik "Submit" untuk menyimpan atau "Cancel" untuk batal
      5. Data tersimpan via DepartmentModel->create()
      6. Redirect ke index
   * UPDATE
      1. Klik tombol "Edit" pada data yang dipilih
      2. Form edit muncul dengan data existing
      3. Ubah data yang diinginkan
      4. Klik "Update" untuk simpan perubahan
      5. Data terupdate via DepartmentModel->update()
      6. Redirect ke index
   * DELETE
      1. Klik tombol "Delete"
      2. Konfirmasi: "Are you sure?"
      3. Jika OK, data dihapus via DepartmentModel->delete()
      4. Halaman refresh otomatis
## 5. Menekan halaman Courses
   * READ
      1. Menampilkan tabel courses dengan kolom: ID, Name, Credit, Lecturer Name, dan tombol Actions
   * CREATE
      1. Klik tombol "Add New"
      2. Form tampil dengan field: Name, Credit (number), Lecturer (dropdown)
      3. Pilih dosen pengampu dari dropdown
      4. Klik "Submit" untuk simpan atau "Cancel" untuk batal
      5. Data tersimpan via CourseModel->create()
      6. Redirect ke index
   * UPDATE
      1. Klik tombol "Edit" pada data yang dipilih
      2. Form edit muncul dengan data existing dan dropdown lecturer terseleksi
      3. Ubah data sesuai kebutuhan
      4. Klik "Update" untuk simpan
      5. Data terupdate via CourseModel->update()
      6. Redirect ke index
   * DELETE
      1. Klik tombol "Delete"
      2. Konfirmasi: "Are you sure?"
      3. Jika OK, data dihapus via CourseModel->delete()
      4. Halaman refresh otomatis

# Dokumentasi