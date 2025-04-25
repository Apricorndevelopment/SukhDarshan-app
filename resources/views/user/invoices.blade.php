@extends('user.layout')
@section('page_title', 'My Invoices')
@section('container')

    <div class="container mt-5">
        <h2>My Invoices</h2>

        @if ($invoices->count())
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Order ID</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>#{{ $invoice->order->id }}</td>
                            <td>₹{{ number_format($invoice->order->total, 2) }}</td>
                            <td>{{ $invoice->created_at->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('user.invoices.download', $invoice->id) }}" class="btn btn-sm btn-success">
                                    Download PDF
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No invoices found.</p>
        @endif
    </div>

@endsection
