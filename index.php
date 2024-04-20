<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
    <style>
        form {
            text-align: right;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>

<body>
    <form>
        <label for="captcha">کد امنیتی:</label>
        <img src="captcha.php"><br><br>
        <input type="text" id="captcha" name="captcha"><br><br>
        <input type="submit" value="ورود">
    </form>
</body>

</html>