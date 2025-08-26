@if(session('success') || session('error') || $message ?? false)
    <div class="alert 
        @if(session('success') || $type === 'success') alert-success 
        @elseif(session('error') || $type === 'error') alert-danger 
        @endif
    ">
        {{ session('success') ?? session('error') ?? $message }}
    </div>
@endif
