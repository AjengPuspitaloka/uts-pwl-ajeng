<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register PLN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-title {
            color: #1a237e;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control, .form-select {
            border-radius: 12px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background: linear-gradient(to right, #1976d2, #0d47a1);
            border: none;
            border-radius: 12px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #0d47a1, #0b3c91);
        }

        .alert-danger, .alert-success {
            border-radius: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h4 class="text-center register-title"><i class="bi bi-person-plus-fill me-2"></i>Registrasi Akun</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>

        <p class="text-center mt-3">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">Login</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
