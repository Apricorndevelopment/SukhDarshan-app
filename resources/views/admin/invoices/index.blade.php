@extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')
    <div class="container py-4">
        <h2 class="mb-4 text-primary fw-bold">📄 All Invoices</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle shadow-sm">
                <thead class="table-primary text-center">
                    <tr>
                        <th>📋 Invoice Number</th>
                        <th>👤 User</th>
                        <th>💰 Total Amount</th>
                        <th>⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td class="fw-bold">#{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->order->first_name }} {{ $invoice->order->last_name }}</td>
                            <td class="text-success fw-semibold">₹{{ number_format($invoice->total, 2) }}</td>
                            <td>
                                <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="btn btn-sm btn-info me-2">
                                    🔍 View
                                </a>
                                <a href="{{ route('admin.invoices.download', $invoice->id) }}"
                                    class="btn btn-sm btn-outline-success">
                                    ⬇️ PDF
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


{{-- @extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')
    <div class="container py-4">
        <h2 class="mb-4">All Invoices</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Invoice Number</th>
                        <th>User</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>#{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->order->first_name }} {{ $invoice->order->last_name }}</td>
                            <td>₹{{ number_format($invoice->total, 2) }}</td>
                            <td>
                                <a href="{{ route('admin.invoices.show', $invoice->id) }}"
                                    class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('admin.invoices.download', $invoice->id) }}"
                                    class="btn btn-outline-secondary btn-sm">Download PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection --}}
