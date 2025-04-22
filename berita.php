<?php
include 'koneksi.php';

$sql = "SELECT 
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
    category c ON ac.category_id = c.id;";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="css/styles.css?v=<?= time(); ?>">
</head>
<body>
<nav class="navbar">
        <div class="nav-container">
            <h2 class="logo">Berita Terkini</h2>
        </div>
    </nav>
<?php if ($result->num_rows > 0): ?>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="articlewrapper">
        <h1><?php echo $row['judul_artikel']; ?></h1>
        <h4><?= htmlspecialchars($row['nama_penulis']) ?></h4>
        <h6><?php echo $row['tanggal_publikasi'] ;?> | Kategori: <?= htmlspecialchars($row['nama_kategori']) ?></h6>
        <img src="assets/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul_artikel']) ?>">
        <p><?php echo $row['isi_artikel']; ?></p>

        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p style="text-align: center;">Tidak ada artikel yang ditemukan.</p>
<?php endif; ?>

<div class="footer">
    <p>© 2025 ABBIYI QOBUS SYAMSID</p>
</div>

</body>
</html>
