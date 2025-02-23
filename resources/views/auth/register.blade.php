<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4e1c1;
            background-image: url('https://www.transparenttextures.com/patterns/old-wall.png');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            position: relative;
            font-family: 'Courier New', Courier, monospace;
        }
        .register-container {
            max-width: 400px;
            padding: 20px;
            background: #f8e4b5;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            border: 2px solid #a67c52;
        }
        h2 {
            color: #8b4513;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #d2a679;
            border-color: #a67c52;
        }
        .btn-primary:hover {
            background-color: #a67c52;
            border-color: #8b4513;
        }
        .corner-ribbon {
            position: absolute;
            top: 10px;
            right: -20px;
            background: #a67c52;
            color: #fff;
            padding: 10px 30px;
            transform: rotate(45deg);
            font-weight: bold;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .sparkle {
            position: absolute;
            width: 7px;
            height: 7px;
            background: #e3caa1;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall 4s linear infinite;
        }
        @keyframes fall {
            from { transform: translateY(-10vh); opacity: 1; }
            to { transform: translateY(100vh); opacity: 0; }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h2>Form Registrasi</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
            <center>Sudah punya akun? <a href="/login">Login</a></center>
        </form>
    </div>
    <div class="corner-ribbon">Register</div>
    <script>
        function createSparkle() {
            const sparkle = document.createElement("div");
            sparkle.classList.add("sparkle");
            sparkle.style.left = Math.random() * 100 + "vw";
            sparkle.style.animationDuration = Math.random() * 3 + 2 + "s";
            document.body.appendChild(sparkle);
            setTimeout(() => { sparkle.remove(); }, 4000);
        }
        setInterval(createSparkle, 200);
    </script>
</body>
</html>
