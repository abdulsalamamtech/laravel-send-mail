@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
<img src="https://lh3.googleusercontent.com/a/ACg8ocLtLQYP_GnFu9shX1XiqX4cwjzlk4Lq5p67JhH_Hcgbzw=s40-p" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
