<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        table, tr, th, td{
            border: 1px solid grey;
            border-collapse: collapse;
        }
        td, th{
            padding: 1.3rem;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Date Of Birth</th>
        </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user->id;?></td>
            <td><?php echo $user->name;?></td>
            <td><?php echo $user->user_name;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php echo $user->dob;?></td>
        </tr>        
    <?php endforeach ?>
    </table>
</body>
</html>