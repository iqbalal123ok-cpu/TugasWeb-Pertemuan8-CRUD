<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/models/ProductModel.php';

// Hanya menerima POST (hapus via GET tidak aman)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    flash('error', 'ID produk tidak valid.');
    redirect('index.php');
}

try {
    $model = new ProductModel();
    if ($model->delete($id)) {
        flash('success', 'Produk berhasil dihapus.');
    } else {
        flash('error', 'Produk tidak ditemukan.');
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    flash('error', 'Gagal menghapus produk.');
}

redirect('index.php');
