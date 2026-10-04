<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/models/ProductModel.php';

$model      = new ProductModel();
$categories = $model->categories();
$suppliers  = $model->suppliers();
$errors     = [];
$product    = ['name' => '', 'category_id' => '', 'supplier_id' => '', 'price' => '', 'stock' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$data, $errors] = validateProduct($_POST, $categories, $suppliers);

    if (!$errors) {
        try {
            $model->create($data);
            flash('success', 'Produk berhasil ditambahkan.');
            redirect('index.php');           // Post/Redirect/Get
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $errors['name'] = 'Gagal menyimpan data. Coba lagi.';
        }
    }

    // tampilkan ulang input lama jika ada error
    $product = [
        'name'        => $_POST['name']        ?? '',
        'category_id' => $_POST['category_id'] ?? '',
        'supplier_id' => $_POST['supplier_id'] ?? '',
        'price'       => $_POST['price']       ?? '',
        'stock'       => $_POST['stock']       ?? '',
    ];
}

$pageTitle   = 'Tambah Produk';
$submitLabel = 'Simpan';

require __DIR__ . '/includes/header.php';
?>
<h1>Tambah Produk</h1>
<div class="card">
    <?php require __DIR__ . '/includes/form.php'; ?>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
