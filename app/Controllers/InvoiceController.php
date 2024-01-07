<?php

namespace App\Controllers;

use App\Models\InvoiceModel;

class InvoiceController extends BaseController
{
    public function index()
    {
        return view('invoice_form');
    }

    public function generateInvoice()
    {
        $totalAmount = $this->request->getPost('total_amount');
        $voucherCode = null; // Tidak perlu set nilai default lagi

        // Set diskon jika total belanja mencapai 2 juta
        if ($totalAmount >= 2000000) {
            $discountAmount = 10000;
            $voucherCode = uniqid(); // Menghasilkan kode unik
            $expiredAt = date('Y-m-d H:i:s', strtotime('+3 months'));
        } else {
            $discountAmount = 0;
            $expiredAt = null;
        }

        // Simpan data faktur ke database
        $invoiceModel = new InvoiceModel();
        $invoiceModel->save([
            'total_amount' => $totalAmount,
            'discount_amount' => $discountAmount,
            'voucher_code' => $voucherCode, // Database akan mengisi nilai default jika null
            'expired_at' => $expiredAt,
        ]);

        if ($discountAmount > 0) {
            // Redirect ke halaman awal dengan kode voucher
            return redirect()
                ->to('/')
                ->with('voucher_code', $voucherCode);
        } else {
            // Redirect ke halaman awal dengan pesan teks
            return redirect()
                ->to('/')
                ->with(
                    'message',
                    'Maaf, total belanja Anda tidak mencukupi untuk mendapatkan voucher.'
                );
        }
    }
}
