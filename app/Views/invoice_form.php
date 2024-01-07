<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1>Toko Diskon</h1>

            <form action="<?= base_url(
                'invoice/generateInvoice'
            ) ?>" method="post">
                <div class="mb-3">
                    <label for="total_amount" class="form-label">Total Belanja (IDR):</label>
                    <input type="number" name="total_amount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Proses Faktur</button>
            </form>

            <?php if (session()->getFlashdata('voucher_code')): ?>
                <p class="mt-3">Kode Voucher Anda: <?= session()->getFlashdata(
                    'voucher_code'
                ) ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
