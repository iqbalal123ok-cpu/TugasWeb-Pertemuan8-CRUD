<?php
/**
 * Variabel yang dibutuhkan:
 * $product (array), $errors (array), $categories, $suppliers, $submitLabel
 */
?>
<form method="post" novalidate>
    <div class="field">
        <label for="name">Nama Produk</label>
        <input type="text" id="name" name="name" maxlength="150"
               value="<?= e($product['name'] ?? '') ?>" required>
        <?php if (isset($errors['name'])): ?><small class="error"><?= e($errors['name']) ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($categories as $c): ?>
                <option value="<?= e($c['id']) ?>"
                    <?= ((string) ($product['category_id'] ?? '') === (string) $c['id']) ? 'selected' : '' ?>>
                    <?= e($c['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errors['category_id'])): ?><small class="error"><?= e($errors['category_id']) ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label for="supplier_id">Supplier</label>
        <select id="supplier_id" name="supplier_id" required>
            <option value="">-- Pilih Supplier --</option>
            <?php foreach ($suppliers as $s): ?>
                <option value="<?= e($s['id']) ?>"
                    <?= ((string) ($product['supplier_id'] ?? '') === (string) $s['id']) ? 'selected' : '' ?>>
                    <?= e($s['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errors['supplier_id'])): ?><small class="error"><?= e($errors['supplier_id']) ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label for="price">Harga (Rp)</label>
        <input type="number" id="price" name="price" min="0" step="0.01"
               value="<?= e($product['price'] ?? '') ?>" required>
        <?php if (isset($errors['price'])): ?><small class="error"><?= e($errors['price']) ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label for="stock">Stok</label>
        <input type="number" id="stock" name="stock" min="0" step="1"
               value="<?= e($product['stock'] ?? '') ?>" required>
        <?php if (isset($errors['stock'])): ?><small class="error"><?= e($errors['stock']) ?></small><?php endif; ?>
    </div>

    <div class="actions">
        <button type="submit" class="btn btn-primary"><?= e($submitLabel) ?></button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </div>
</form>
