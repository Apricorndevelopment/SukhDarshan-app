@extends('user.layout')
@section('page_title', 'User Invoices')
@section('container')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <div class="container my-5">
        <h2 class="mb-4 text-center text-primary">
            <i class="bi bi-receipt"></i> Your Invoices
        </h2>

        @if ($invoices->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle"></i> No invoices found.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle shadow-sm">
                    <thead class="table-primary">
                        <tr class="text-center">
                            <th><i class="bi bi-hash"></i> Invoice Number</th>
                            <th><i class="bi bi-currency-rupee"></i> Total</th>
                            <th><i class="bi bi-download"></i> Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr class="text-center">
                                <td>#{{ $invoice->invoice_number }}</td>
                                <td>₹{{ number_format($invoice->total, 2) }}</td>
                                <td>
                                    <a href="{{ route('user.invoices.download', $invoice->id) }}"
                                        class="btn btn-sm btn-success">
                                        <i class="bi bi-download"></i> PDF
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection


{{-- @extends('user.layout')
@section('page_title', 'User Invoices')
@section('container')
    <div class="container my-4">
        <h2 class="mb-4 text-center">Your Invoices</h2>

        <div class="row justify-content-center">
            @forelse ($invoices as $invoice)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title mb-2">Invoice #{{ $invoice->invoice_number }}</h5>
                                <p class="card-text mb-3">
                                    <strong>Total:</strong> ₹{{ number_format($invoice->total, 2) }}
                                </p>
                            </div>
                            <a href="{{ route('user.invoices.download', $invoice->id) }}" class="btn btn-primary mt-auto">
                                Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No invoices found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection --}}
