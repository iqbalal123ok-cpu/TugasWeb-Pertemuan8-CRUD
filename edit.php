<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/models/ProductModel.php';

$model = new ProductModel();

$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    flash('error', 'ID produk tidak valid.');
    redirect('index.php');
}

$product = $model->find($id);
if (!$product) {
    flash('error', 'Produk tidak ditemukan.');
    redirect('index.php');
}

$categories = $model->categories();
$suppliers  = $model->suppliers();
$errors     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    [$data, $errors] = validateProduct($_POST, $categories, $suppliers);

    if (!$errors) {
        try {
            $model->update($id, $data);
            flash('success', 'Produk berhasil diperbarui.');
            redirect('index.php');           // Post/Redirect/Get
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $errors['name'] = 'Gagal memperbarui data. Coba lagi.';
        }
    }

    $product = [
        'id'          => $id,
        'name'        => $_POST['name']        ?? '',
        'category_id' => $_POST['category_id'] ?? '',
        'supplier_id' => $_POST['supplier_id'] ?? '',
        'price'       => $_POST['price']       ?? '',
        'stock'       => $_POST['stock']       ?? '',
    ];
}

$pageTitle   = 'Edit Produk';
$submitLabel = 'Perbarui';

require __DIR__ . '/includes/header.php';
?>
<h1>Edit Produk</h1>
<div class="card">
    <?php require __DIR__ . '/includes/form.php'; ?>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
