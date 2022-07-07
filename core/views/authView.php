<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes-solution</title>

    <link rel="stylesheet" href="css/auth_style.css">
    <link rel="stylesheet" href="css/auth_adaptive.css">
</head>
<body>
    <div id="full-bg">
        <form id="form-container" action="#" method="post">

            <div id="authorization-form">
                <h1>Make some note :)</h1>

                <div id="email-input-container">
                    <p>leave your email here...</p>
                    <img src="img/Vector.svg">
                    <input type="email" name="auth_email" required> 
                </div>

                <div id="password-input-container">
                    <p>and try to remember password...</p>
                    <img src="img/carbon_password.svg">
                    <input type="password" name="auth_pass" required> 
                </div>

            </div>

            <input id="buttonstart" type="submit" value="Let's go!"></input>

        </form>
    </div>  

</body>
</html>