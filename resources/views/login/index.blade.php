@extends('app')

@section('content')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('loginError')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <div class="col-lg-6 d-none d-lg-block ">

                                    <img class="rounded-circle" src="logologin.png" style="width:400px;height: 400px;" >

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                    </div>
                                    <form action="/login" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <input type ="text" name="username" class="form-control  @error('username') is-invalid @enderror"
                                                    id="username" placeholder="Username" requiredvalue="{{ old('username')}}">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm mb-3 mb-sm-0">
                                                <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" required>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                        <!-- id="exampleInputPassword" -->
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->


                                        <button class ="btn btn-primary btn-user btn-block mt-3" type="submit">Login</button>
                                    </form>

                                    <div class="text-center">
                                        <h2 class="h4 text-gray-900 mb-4">Belum memiliki Akun? Silahkan Daftar!</h2>
                                        <a class="medium" href="\register">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

@endsection
