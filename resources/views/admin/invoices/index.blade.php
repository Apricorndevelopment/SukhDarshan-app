@extends('admin/layout')
@section('page_title', 'Category')
@section('container')
    <h2>All Invoices</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Invoice #</th>
                <th>Order ID</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->order_id }}</td>
                    <td><a href="{{ route('admin.invoices.download', $invoice->id) }}" class="btn btn-sm btn-primary">Download
                            PDF</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
