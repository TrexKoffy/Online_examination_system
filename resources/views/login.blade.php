<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #3498db; /* Blue background color */
        }

        form {
            width: 400px;
            padding: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff; /* White background for the form */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-control {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <form action="{{ route('userLogin') }}" method="POST">
        @csrf
        <h2>Login</h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        @endif

        @if(Session::has('error'))
            <p style="color:red;">{{ Session::get('error') }}</p>
        @endif

        <div class="mb-3">
            <input placeholder="Enter your email" type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <input placeholder="Enter your password" type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button> 
        <a href="/forget-password">Forget Password</a>
    </form>
</body>
</html>
