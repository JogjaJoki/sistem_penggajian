<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ url('front') }}/assets/images/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('front') }}/assets/css/style-prefix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f5f6fa;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .login-form {
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            padding: 40px 60px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-group {
            position: relative;
            margin-bottom: 30px;
            width: 100%;
        }

        .input-group input {
            width: 90%;
            padding: 15px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #999;
            pointer-events: none;
            transition: all 0.3s;
        }

        .input-group input:focus {
            border-color: #333;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -10px;
            left: 15px;
            background-color: #fff;
            padding: 0 5px;
            color: #333;
            font-size: 12px;
        }

        button {
            width: 100%;
            padding: 15px 0;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h1>{{ env('APP_NAME') }}</h1>
            <h2>TEMPE MURNI NURYANTO</h2>
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" id="username" name="email" required>
                    <label for="username">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script src="{{ url('front') }}/assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
