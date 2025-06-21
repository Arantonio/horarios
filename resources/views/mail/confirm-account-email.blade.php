<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Conta</title>
</head>
<body>
    <h2>Bem-vindo(a) ao {{ env('APP_NAME') }}!</h2>
    <p>Para concluir o seu registo, clique no link abaixo para definir a sua senha:</p>

    <p>
        <a href="{{ $url }}" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px;">
            Clique aqui para definir a sua senha
        </a>
    </p>

    <p>Se você não se registrou, ignore este e-mail.</p>
    <p>Obrigado, <br> Equipe {{ env('APP_NAME') }}</p>
</body>
</html>
