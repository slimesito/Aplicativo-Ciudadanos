@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert">
            <i class="fa-solid fa-triangle-exclamation mb-2"></i> {{ $error }}
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        </div>
    @endforeach
@endif