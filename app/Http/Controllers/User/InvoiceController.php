<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::id())->latest()->get();
        return view('user.invoices', compact('invoices'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('order.items.product')->where('user_id', Auth::id())->findOrFail($id);
        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
    }
}
