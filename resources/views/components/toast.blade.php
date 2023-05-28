@props([
    'message' => ''
])

<div class="toast show">
    <div class="toast-body">
        {{ $message }}
    </div>
</div>