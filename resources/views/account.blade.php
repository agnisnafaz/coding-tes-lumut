<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNT</title>
</head>

<body>
    <h3>Data Account</h3>
    <a href="/account/tambah"> + Tambah Account </a>

    <br />
    <br />

    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach($accounts as $a)
        <tr>
            <td>{{ $a->account_username}}</td>
            <td>{{ $a->account_password}}</td>
            <td>{{ $a->account_name}}</td>
            <td>{{ $a->account_role}}</td>
            <td>{{ $a->account_action}}</td>
            <td>
                <a href="/account/edit/{{$a->account}}"> Edit </a>
                <a href="/account/hapus/{{$a->account}}"> Hapus </a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>