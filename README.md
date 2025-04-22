# 📄 README - CMS Artikel Berita

## 📁 Struktur Proyek


---

├── dbcms.sql

├── index.php

├── koneksi.php

├── css/

│   └── styles.css

├── assets/

│   └── [gambar-artikel]


---

## 🗃 Struktur Database

Database: dbcms

### 1. article
- id (INT, PK)
- title (VARCHAR)
- date (DATE)
- picture (VARCHAR)
- content (TEXT)

### 2. author
- id (INT, PK)
- nickname (VARCHAR)

### 3. category
- id (INT, PK)
- name (VARCHAR)

### 4. article_author
- id (INT, PK)
- article_id (FK → article.id)
- author_id (FK → author.id)

### 5. article_category
- id (INT, PK)
- article_id (FK → article.id)
- category_id (FK → category.id)

Relasi:
- *Satu artikel* bisa memiliki *beberapa penulis dan kategori* (many-to-many).
- Tabel penghubung: article_author dan article_category.

---

## 📌 Contoh Query Menampilkan Artikel

sql
SELECT 
    a.title AS judul_artikel,
    a.date AS tanggal_publikasi,
    au.nickname AS nama_penulis,
    c.name AS nama_kategori,
    a.picture AS gambar,
    a.content AS isi_artikel
FROM 
    article a
JOIN 
    article_author aa ON a.id = aa.article_id
JOIN 
    author au ON aa.author_id = au.id
JOIN 
    article_category ac ON a.id = ac.article_id
JOIN 
    category c ON ac.category_id = c.id;



## 🛠 Cara Menjalankan

### 1. *Import Database*
- Gunakan phpMyAdmin atau MySQL command line:
  bash
  mysql -u root -p dbcms < dbcms.sql
  

### 2. *Konfigurasi Koneksi*
- Pastikan koneksi.php sesuai dengan pengaturan lokal:
  php
  $host = 'localhost';
  $db = 'dbcms';
  $user = 'root';
  $pass = '';
  

### 3. *Jalankan Aplikasi*
- Tempatkan file di dalam folder htdocs (XAMPP) atau direktori root server web lainnya.
- Akses via browser:
  
  http://localhost/nama-folder/index.php
  

---

## 🌐 Deskripsi Template Web

### 🎨 Tampilan
- Template minimalis dengan gaya bersih dan profesional.
- Navigasi atas menggunakan background biru gelap (#003366) dan teks putih.
- Artikel ditampilkan dalam kotak dengan gambar di kiri dan isi di kanan.

### 🧩 Fitur
- Daftar artikel dengan:
  - Judul
  - Penulis
  - Tanggal publikasi
  - Kategori
  - Gambar thumbnail
  - Isi artikel
- Tampilan responsif dan terpusat.
- Footer tetap dengan nama pembuat.

### 🖼 Styling (CSS)
- File CSS: css/styles.css
- Gaya menggunakan Arial dan layout konten rapi dalam .articlewrapper
- Gambar artikel dirancang mengambang (float: left) agar menyatu dengan teks
