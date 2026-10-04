<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): never
{
    header('Location: ' . $url);
    exit;
}

function flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function getFlash(): ?array
{
    $f = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $f;
}

/**
 * Validasi input produk. Mengembalikan [data_bersih, errors].
 */
function validateProduct(array $in, array $categories, array $suppliers): array
{
    $errors = [];

    $name = trim((string) ($in['name'] ?? ''));
    if ($name === '') {
        $errors['name'] = 'Nama produk wajib diisi.';
    } elseif (mb_strlen($name) > 150) {
        $errors['name'] = 'Nama produk maksimal 150 karakter.';
    }

    $categoryIds = array_map('intval', array_column($categories, 'id'));
    $categoryId = filter_var($in['category_id'] ?? null, FILTER_VALIDATE_INT);
    if ($categoryId === false || !in_array($categoryId, $categoryIds, true)) {
        $errors['category_id'] = 'Kategori tidak valid.';
    }

    $supplierIds = array_map('intval', array_column($suppliers, 'id'));
    $supplierId = filter_var($in['supplier_id'] ?? null, FILTER_VALIDATE_INT);
    if ($supplierId === false || !in_array($supplierId, $supplierIds, true)) {
        $errors['supplier_id'] = 'Supplier tidak valid.';
    }

    $price = filter_var($in['price'] ?? null, FILTER_VALIDATE_FLOAT);
    if ($price === false || $price < 0) {
        $errors['price'] = 'Harga harus angka ≥ 0.';
    }

    $stock = filter_var($in['stock'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
    if ($stock === false) {
        $errors['stock'] = 'Stok harus bilangan bulat ≥ 0.';
    }

    $data = [
        'name'        => $name,
        'category_id' => $categoryId,
        'supplier_id' => $supplierId,
        'price'       => $price,
        'stock'       => $stock,
    ];

    return [$data, $errors];
}
