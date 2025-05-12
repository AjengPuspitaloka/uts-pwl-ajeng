<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login PLN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
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

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            width: 370px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            color: #4a148c;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #ccc;
        }

        .form-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #6a1b9a;
        }

        .form-group {
            position: relative;
        }

        .form-control::placeholder {
            padding-left: 25px;
        }

        .btn-primary {
            background: linear-gradient(to right, #ab47bc, #8e24aa);
            border: none;
            border-radius: 12px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #8e24aa, #6a1b9a);
        }

        .alert-danger {
            border-radius: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h4 class="text-center login-title"><i class="bi bi-door-open-fill me-2"></i>Login PLN</h4>

        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="mb-3 form-group">
                <i class="bi bi-person-fill form-icon"></i>
                <input type="text" name="username" class="form-control ps-5" placeholder="Username" required autofocus>
            </div>
           <div class="mb-3 form-group">
    <i class="bi bi-lock-fill form-icon"></i>
    <input type="password" name="password" class="form-control ps-5 pe-5" placeholder="Password" id="password" required>
    <i class="bi bi-eye-slash-fill form-icon" id="togglePassword" style="right: 12px; left: auto; cursor: pointer; position: absolute;"></i>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        // toggle type
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // toggle icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash-fill');
    });
</script>

            <div class="mb-3">
                <label for="role" class="form-label fw-bold">Login sebagai</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
            <p class="text-center mt-3">
    Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold text-primary">Daftar</a>
</p>

        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
