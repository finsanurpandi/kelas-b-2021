@php $color; @endphp

@if ($type == 'danger')
    @php $color = 'red'; @endphp
@elseif ($type == 'info')
    @php $color = 'blue'; @endphp
@elseif ($type == 'success')
    @php $color = 'green'; @endphp
@elseif ($type == 'warning')
    @php $color = 'orange'; @endphp
@elseif ($type == 'secondary')
    @php $color = 'gray'; @endphp
@endif

<div {{ $attributes->merge(['class' => 'bg-'.$color.'-500 text-sm text-white rounded-md p-4']) }} role="alert">
   {{ $message }}
</div>

