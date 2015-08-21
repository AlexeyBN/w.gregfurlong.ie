<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 style="color:red;">Tweet was not posted!</h1>
    <table>
        <tr>
            <td>#ID:</td>
            <td><?php echo $tweet->id ?></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td><?php echo date('h:i:s A \o\n d/m/y', $tweet->date) ?></td>
        </tr>
        <tr>
            <td>Message:</td>
            <td><?php echo $tweet->text ?></td>
        </tr>
        <tr>
            <td>User:</td>
            <td><?php echo $tweet->user->first_name . ' ' . $tweet->user->last_name ?></td>
        </tr>
    </table>
    <?php echo $message ?>
</body>
</html>