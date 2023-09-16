<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="hero m-0 d-flex align-content-center  "
        style="background-color:rgb(216, 216, 241);min-height: 100vh;  background-repeat: no-repeat; background-size: cover;background-position: center; ">
        <form action="{{url('login/proses')}}" method="POST" class="bg-light p-4 rounded m-auto" style="--bs-bg-opacity: .5; margin-bottom:500px;">
            @csrf
            <h1 class="mb-4 text-center">Log In</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input autocomplete="off" type="email" class="form-control 
                {{-- Jika ada error --}}
                @error('email')
                    is-invalid
                @enderror
                
                " placeholder="arifin@kangean.co.id" id="exampleInputEmail1"
                    aria-describedby="emailHelp " name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                {{-- menampilkan pesann errornya --}}
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            {{-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <div class="button m-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <p class="mt-4">not a member? <a href="/login/register">Sign up now</a></p>
        </form>
        </div>
    </section>
</body>

</html>
