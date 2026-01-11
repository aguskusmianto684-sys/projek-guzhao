<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="shortcut icon" href="{{ asset('admin') }}/images/image.png" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 30px 25px;
            width: 360px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
            animation: fadeIn .4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
            font-size: 24px;
        }

        .alert {
            background: #ffdddd;
            color: #b20000;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 12px;
            font-size: 14px;
            text-align: center;
        }

        .alert-success {
            background: #d4f8d4;
            color: #0e7f20;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #c9c9c9;
            border-radius: 6px;
            font-size: 14px;
        }

        input:focus {
            border-color: #1976d2;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1976d2;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            letter-spacing: 0.4px;
        }

        button:hover {
            background: #1259a3;
        }

        small {
            display: block;
            text-align: center;
            color: #777;
            margin-top: 12px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="login-container">

    <h2>Login Admin</h2>

    {{-- gagal login --}}
    @if (session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif

    {{-- berhasil logout --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error dari validator --}}
    @if ($errors->any())
        <div class="alert">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.attempt') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit">Masuk</button>
    </form>

</div>

</body>
</html>
