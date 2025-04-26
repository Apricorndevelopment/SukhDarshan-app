<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Support\Str;
use PDF;

class InvoiceController extends Controller
{
    public function generate($orderId)
    {
        $order = Order::with('items')->findOrFail($orderId);

        $invoice = Invoice::create([
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
            'total' => $order->total
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice generated successfully.');
    }



    public function index()
    {
        $invoices = Invoice::with('order')->latest()->get();

        $ordersWithoutInvoices = Order::doesntHave('invoice')->latest()->get();

        return view('admin.invoices.index', compact('invoices', 'ordersWithoutInvoices'));
    }

    public function create()
    {
        $invoices = Invoice::with('order')->latest()->get();

        $ordersWithoutInvoices = Order::doesntHave('invoice')->latest()->get();

        return view('admin.invoices.create', compact('invoices', 'ordersWithoutInvoices'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('order.items.product')->findOrFail($id);
        return view('admin.invoices.show', compact('invoice'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('order.items.product')->findOrFail($id);
        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
    }
}
