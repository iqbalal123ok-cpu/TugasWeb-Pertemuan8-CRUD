<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/models/ProductModel.php';

$model    = new ProductModel();
$products = $model->all();
$pageTitle = 'Daftar Produk';

require __DIR__ . '/includes/header.php';
?>
<div class="page-head">
    <h1>Daftar Produk</h1>
    <a href="create.php" class="btn btn-primary">+ Tambah Produk</a>
</div>

<div class="table-wrap">
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Supplier</th>
            <th class="num">Harga</th>
            <th class="num">Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!$products): ?>
        <tr><td colspan="7" class="empty">Belum ada data produk.</td></tr>
    <?php else: ?>
        <?php foreach ($products as $i => $p): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= e($p['name']) ?></td>
            <td><?= e($p['category_name']) ?></td>
            <td><?= e($p['supplier_name']) ?></td>
            <td class="num">Rp <?= e(number_format((float) $p['price'], 0, ',', '.')) ?></td>
            <td class="num"><?= e($p['stock']) ?></td>
            <td class="row-actions">
                <a href="edit.php?id=<?= e($p['id']) ?>" class="btn btn-small btn-warning">Edit</a>
                <form action="delete.php" method="post" class="inline"
                      onsubmit="return confirm('Yakin ingin menghapus produk &quot;<?= e(addslashes($p['name'])) ?>&quot;?');">
                    <input type="hidden" name="id" value="<?= e($p['id']) ?>">
                    <button type="submit" class="btn btn-small btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
