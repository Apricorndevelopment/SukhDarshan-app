@extends('admin/layout')
@section('page_title', 'Manage_blog')
@section('container')

    @if (!$order->invoice)
        <a href="{{ route('admin.invoices.generate', $order->id) }}" class="btn btn-success">Generate Invoice</a>
    @else
        <p><strong>Invoice:</strong> Already generated ({{ $order->invoice->invoice_number }})</p>
        <a href="{{ route('admin.invoices.show', $order->invoice->id) }}" class="btn btn-primary">View Invoice</a>
    @endif


@endsection
