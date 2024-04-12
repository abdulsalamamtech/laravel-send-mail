<x-mail::message>
# {{ $data['subject'] }}

{{ $data['message'] }}




<x-mail::button :url="'https://bit.ly/abdulsalamamtech'">
Contact Amtech
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}

</x-mail::message>
