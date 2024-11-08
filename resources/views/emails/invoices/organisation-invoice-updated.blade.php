@component('mail::message')
# Purchase Invoice Updated

## {{ $invoice->organisation?->name }}
<p>Invoice No: <b>{{ $invoice->invoice_no }}</b></p>
<p>Description: <b>{{ $invoice->transactionType?->name }}</b></p>
<p>Amount Due: <b>GHS {{ number_format($invoice->total_due, 2) }}</b></p>
<p>Due Date: <b>{{ $invoice->due_date?->format('M d, Y') }}</b></p>
<p>Status: <b>{{ $invoice->paid ? 'PAID' : 'PENDING' }}</b></p>

@if( !$invoice->paid )
@component('mail::button', ['url' => 'https://memberz.org'])
Pay Now
@endcomponent
@endif

Thank you for your business,<br>
{{ config('mail.from.name') }}
@endcomponent
