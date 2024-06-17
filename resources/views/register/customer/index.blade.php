@extends('layouts.register-menu')
@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>CS</b> - Relations</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="post" action="{{ route('register.add') }}" autocomplete="on">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi-password">Confirm Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="konfirmasi-password" name="konfirmasi-password"
                                placeholder="Confirm Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <div class="input-group mb-3">
                            <input type="nama" class="form-control" id="nama" name="nama" placeholder="nama">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
@endsection
