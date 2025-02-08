@if(session('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-check mb-2"></i> {{ session('success') }}
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    </div>
@endif