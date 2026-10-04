

# Aplikasi CRUD Inventaris (PHP Native & PDO)

Repository ini dibuat untuk menyelesaikan Tugas Rutin 8: CRUD Inventaris pada mata kuliah Pemrograman Web[cite: 31]. Aplikasi ini dibangun menggunakan PHP Native dengan pendekatan Object-Oriented Programming (OOP), koneksi PDO bersistem Singleton Pattern, serta menerapkan keamanan prepared statements[cite: 31, 33].

---

## Tampilan Aplikasi

![Tampilan Aplikasi CRUD](https://raw.githubusercontent.com/username-kamu/TugasWeb-Pertemuan8-CRUD/main/assets/screenshot.png)

## Fitur Utama

1. CRUD (Create, Read, Update, Delete): Pengelolaan data produk inventaris secara lengkap[cite: 31, 33].
2. Relasi Database (3NF & JOIN): Tabel produk terhubung dengan tabel kategori dan supplier menggunakan Foreign Key dan ditampilkan menggunakan query JOIN[cite: 31, 33].
3. Keamanan (Prepared Statements): Seluruh query input aman dari celah SQL Injection[cite: 31].
4. Sanitasi Output: Menggunakan htmlspecialchars() untuk mencegah serangan XSS[cite: 31].

---

## Langkah-Langkah Import Database (schema.sql)

Jika kamu ingin menjalankan proyek ini di komputer lokal, ikuti cara import database berikut:

1. Nyalakan web server lokal (Laragon atau XAMPP), pastikan layanan Apache dan MySQL berjalan[cite: 33, 37].
2. Buka pengelola database (misalnya HeidiSQL melalui panel Laragon).
3. Klik menu File di pojok kiri atas, lalu pilih Load SQL file... (atau tekan Ctrl + O).
4. Pilih file schema.sql yang berada di dalam folder utama proyek ini, lalu klik Open[cite: 33].
5. Jalankan kode SQL tersebut dengan mengeklik ikon Segitiga Hijau (Run) atau menekan tombol F9.
6. Lakukan Refresh (F5), dan database inventaris_db beserta tabel dan data awalnya akan otomatis siap digunakan.

---

## Cara Menjalankan Program

1. Letakkan folder proyek TugasWeb-Pertemuan8-CRUD ke dalam direktori root web server (contoh: C:\laragon\www\ untuk Laragon)[cite: 30].
2. Buka browser dan akses melalui URL lokal: http://TugasWeb-Pertemuan8-CRUD.test/ (atau http://localhost/TugasWeb-Pertemuan8-CRUD/).
