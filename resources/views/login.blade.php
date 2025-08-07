<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Conexus</title>
    <link rel="stylesheet" href="{{ asset('CSS/styles.css') }}"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="logo">C<span class="logo-o">o</span>nexus</h1>
            <h2>Bem-vindo de volta!</h2>
            <p>Acesse sua conta para continuar.</p>

            <!-- MENSAGENS DE ERRO DE VALIDAÇÃO -->
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- MENSAGEM DE ERRO DE LOGIN INVÁLIDO -->
            @if(session('error'))
                <p style="color: red">{{ session('error') }}</p>
            @endif

            <!-- FORMULÁRIO DE LOGIN -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="password" placeholder="Digite sua senha" required>
                </div>

                <div class="options-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="manter-conectado" name="remember">
                        <label for="manter-conectado">Manter-me conectado</label>
                    </div>
                    <a href="#" class="forgot-password">Esqueci a senha</a>
                </div>

                <button type="submit" class="submit-btn">Entrar</button>
            </form>

            <p class="login-link">Não tem uma conta? <a href="{{ route('cadastro.create') }}">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>
