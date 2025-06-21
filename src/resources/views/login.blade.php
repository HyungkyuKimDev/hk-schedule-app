<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <input type="text" name="id" id="id" placeholder="ID">
    <input type="password" name="password" id="password" placeholder="Password">
    <button id="login">Login</button>
    <button id="register">Register</button>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('login').addEventListener('click', function() {
            fetch('/login', {
                method: 'POST',
                body: JSON.stringify({ id: document.getElementById('id').value, password: document.getElementById('password').value }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
</body>
</html>