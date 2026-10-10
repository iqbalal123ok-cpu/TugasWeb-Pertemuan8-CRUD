

# Aplikasi CRUD Inventaris (PHP Native & PDO)

Repository ini dibuat untuk menyelesaikan Tugas Rutin 8: CRUD Inventaris pada mata kuliah Pemrograman Web. Aplikasi ini dibangun menggunakan PHP Native dengan pendekatan Object-Oriented Programming (OOP), koneksi PDO bersistem Singleton Pattern, serta menerapkan keamanan prepared statements.

---

## Tampilan Aplikasi

![Tampilan Aplikasi CRUD](https://raw.githubusercontent.com/username-kamu/TugasWeb-Pertemuan8-CRUD/main/assets/screenshot.png)

## Fitur Utama

1. CRUD (Create, Read, Update, Delete): Pengelolaan data produk inventaris secara lengkap.
2. Relasi Database (3NF & JOIN): Tabel produk terhubung dengan tabel kategori dan supplier menggunakan Foreign Key dan ditampilkan menggunakan query JOIN.
3. Keamanan (Prepared Statements): Seluruh query input aman dari celah SQL Injection.
4. Sanitasi Output: Menggunakan htmlspecialchars() untuk mencegah serangan XSS.

---

## Langkah-Langkah Import Database (schema.sql)

Berikut adalah panduan untuk mengimpor database menggunakan **XAMPP** (menggantikan langkah HeidiSQL/Laragon):

1. **Nyalakan Web Server Lokal**
* Buka aplikasi **XAMPP Control Panel**.
* Pastikan modul **Apache** dan **MySQL** dalam keadaan aktif (klik tombol **Start** sampai berwarna hijau).
* **Cara verifikasi:** Pastikan status di samping Apache dan MySQL menunjukkan tulisan "Running" dengan nomor port yang aktif.


2. **Buka phpMyAdmin**
* Buka browser internet kamu (Chrome, Edge, dll.).
* Ketik alamat berikut di address bar: `http://localhost/phpmyadmin/` lalu tekan Enter.
* **Cara verifikasi:** Halaman dasbor phpMyAdmin akan terbuka dan tampil di layar browser.


3. **Buat Database Baru**
* Di panel sebelah kiri phpMyAdmin, klik tombol **New** (Baru).
* Pada kolom *Database name*, ketik: `inventaris_db`.
* Pada pilihan *Collation* di sebelah kanannya, pilih `utf8mb4_general_ci`.
* Klik tombol **Create** (Buat).
* **Cara verifikasi:** Nama `inventaris_db` akan muncul di daftar database sebelah kiri.


4. **Pilih Database yang Telah Dibuat**
* Klik pada nama database `inventaris_db` di daftar sebelah kiri untuk membukanya.
* **Cara verifikasi:** Tampilan utama di kanan akan berubah dan menunjukkan bahwa kamu sedang berada di dalam database `inventaris_db` (biasanya ada tulisan "No tables found in database").


5. **Import File SQL**
* Pada menu bagian atas, klik tab **Import**.
* Klik tombol **Choose File** (Pilih File) atau **Browse...**.
* Cari dan pilih file `schema.sql` yang berada di dalam folder utama proyek kamu, lalu klik **Open**.
* **Cara verifikasi:** Nama file `schema.sql` akan tampil di sebelah tombol *Choose File*.


6. **Jalankan Proses Import**
* Gulir ke bagian paling bawah halaman, lalu klik tombol **Go** (Kirim) berwarna hijau.
* **Cara verifikasi:** Muncul pesan hijau bertuliskan *"Import has been successfully finished"* dan daftar tabel dari proyek kamu akan langsung muncul di panel sebelah kiri.
---

## Cara Menjalankan Program

1. Buka browser dan akses melalui URL lokal:(atau http://localhost/inventaris/).
