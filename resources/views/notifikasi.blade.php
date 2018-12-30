@if (session('success'))
    <div class="alert alert-success" role="alert">
        <b>status</b> : {{ session('success') }}
    </div>
@endif