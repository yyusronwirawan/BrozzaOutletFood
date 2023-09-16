@if (session()->has('success'))
    <div class="alert alert-success" role="alert" id="alert">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger" role="alert" id="alert">
        {{ session('delete') }}
    </div>
@endif
@if (session()->has('edit'))
    <div class="alert alert-warning" role="alert" id="alert">
        {{ session('edit') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger" role="alert" id="alert">
        {{ session('error') }}
    </div>
@endif
@if (isset($info))
    <div class="alert alert-info" role="alert" id="alert">
        {{ $info }}
    </div>
@endif

{{-- menampilkan error validasi --}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
