<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .container {
            display: flex;
            height: 100vh;
        }
        
        .image-side {
            background-image: url('https://via.placeholder.com/600x800'); /* Substitua pelo link da sua imagem */
            background-size: cover;
            background-position: center;
            flex: 1;
        }
        
        .form-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            flex: 1;
        }
        
        .form-side h2 {
            margin-bottom: 20px;
        }
        
        .form-side form {
            width: 100%;
            max-width: 400px;
        }
        
        .form-control {
            margin-bottom: 15px;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

    <x-alert />

    <div class="container">
        <!-- Lado da Imagem -->
        <div class="image-side"></div>

        <!-- Lado do Formulário -->
        <div class="form-side">
            <h2>Login</h2>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
                <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                
                <!-- Esqueceu a senha -->
                <div class="forgot-password">
                    <a href="{{ route('forgot-password.show') }}">Esqueceu a Senha?</a>
                </div>

                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>

    <!-- JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
