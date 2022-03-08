<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>

<body>
    <h3>Data Account</h3>

    <a href="/account"> Kembali</a>

    <br />
    <br />

    <form action="/create/account" method="post">
        {{ csrf_field() }}
        Username <input type="text" name="usernmae" required="required"> <br />
        Password <input type="text" name="password" required="required"> <br />
        Name <input type="text" name="name" required="required"> <br />
        Role <input name="role" required="required"><br />
        <input type="submit" value="Simpan Data">
    </form>
</body>

</html>