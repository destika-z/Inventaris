@props([
'icon',
'title',
'description'
])

<div class="feature-card h-100">

<div class="feature-icon">

<i class="bi {{ $icon }}"></i>

</div>

<h4>

{{ $title }}

</h4>

<p>

{{ $description }}

</p>

</div>