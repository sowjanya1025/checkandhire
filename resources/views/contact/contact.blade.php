<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckAndHire</title>
</head>
<body>
    <div>
        <h3>Someone has query on checkandhire.com</h3>
        <h3>Followings are the details.</h3>
    </div>
    <table style="text-align:left;width:100%;border:1px solid lightgrey">
        <tr>
            <th style="border:1px solid lightgrey">Name</th>
            <td style="border:1px solid lightgrey">{{$save->name}}</td>
        </tr>
        <tr>
            <th style="border:1px solid lightgrey">Email</th>
            <td style="border:1px solid lightgrey">{{$save->email}}</td>
        </tr>
        <tr>
            <th style="border:1px solid lightgrey">Mobile Number</th>
            <td style="border:1px solid lightgrey">{{$save->number}}</td>
        </tr>
        <tr style="border:1px solid lightgrey">
            <th style="border:1px solid lightgrey">Message</th>
            <td style="border:1px solid lightgrey">{{$save->message}}</td>
        </tr>
    </table>
</body>
</html>