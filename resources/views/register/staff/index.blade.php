<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label,
        input {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register.daftar') }}" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="text" id='email' name="email">
            <label for="username">Username</label>
            <input type="text" id='username' name="username">
            <label for="password">password</label>
            <input type="password" id='password' name="password">
            <label for="password">Konfirmasi Password</label>
            <input type="password" id='konfirmasi-password' name="konfirmasi-password">
            <label for="nama">nama</label>
            <input type="text" id='nama' name="nama">
            <label for="alamat">alamat</label>
            <input type="text" id='alamat' name="alamat">
            <label for="no_hp">no_hp</label>
            <input type="text" id='no_hp' name="no_hp">
            <select name="role" id="role">
                <option value="staf-distribusi">Staff Distribusi</option>
                <option value="staf-penjualan">Staff Penjualan</option>
            </select>
            <button type="submit">Daftar</button>
        </form>
    </div>
</body>

</html>
