@props(['judul','jumlah','kondisi','color'])

@php
    $persen = $jumlah > 0 ? ($kondisi/$jumlah)*100 : 0;
@endphp

<div class="progress-item">

    <div class="progress-info">

        <span class="progress-label">

            {{ $judul }}

        </span>

        <span class="progress-value">

            {{ $kondisi }}

        </span>

    </div>

    <div class="progress modern-progress">

        <div class="progress-bar bg-{{ $color }}"
             style="width:{{ $persen }}%">
        </div>

    </div>

</div>

