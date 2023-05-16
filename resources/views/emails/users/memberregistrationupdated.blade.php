@component('mail::message')
# Hello {{ $member_name }},

@if ($approved)
    We are glad to let you know that your registration for membership into the organisation, <b>{{ $organisation_name }}</b>, on Memberz.org has been <b>approved</b>.
@elseif ($canceled)
    We are sorry to let you know that your membership for <b>{{ $organisation_name }}</b>, on Memberz.org has been <b>canceled</b>.
@else
    We are sorry to let you know that your registration for membership into the organisation, <b>{{ $organisation_name }}</b>, on Memberz.org has been <b>rejected</b>.
@endif

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
