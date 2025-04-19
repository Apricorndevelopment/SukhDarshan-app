<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ Proper import

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('order')->latest()->get();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function generate($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);

        $invoiceNumber = 'INV-' . strtoupper(Str::random(8));
        $pdf = Pdf::loadView('admin.invoices.invoice_pdf', compact('order', 'invoiceNumber')); // ✅ use Pdf

        $filePath = 'invoices/' . $invoiceNumber . '.pdf';
        Storage::disk('public')->put($filePath, $pdf->output());

        Invoice::create([
            'order_id' => $order->id,
            'invoice_number' => $invoiceNumber,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice generated successfully.');
    }

    public function download($id)
    {
        $invoice = Invoice::findOrFail($id);
        return Storage::disk('public')->download($invoice->file_path); // ✅ download method
    }
}
