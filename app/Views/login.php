<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/register_screen.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    
</head>
<body>
<div class="parent">

    <div class="child">

        <div class="left">
        </div>
        <div class="right">
            <form>
                <label for="name">Full Name <font color="red"> *</font></label>
                <input type="text" id="name" name="name">

            </form>
           
        </div>
    </div>

</div>
</body>
</html> -->






<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materialize Example</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Materialize Form</h2>
        <div class="row">
            <div class="input-field col s12">
                <input id="first_name" type="text" class="validate">
                <label for="first_name">First Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Last Name</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html> -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register_screen.css">
    <style>
        .input {
            border-color: black;
        }
    </style>
</head>

<body>
    <div class="parent">

        <div class="child">

            <div class="left">

                <div class="bold-text"> MAGIC IS IN THE DETAILS</div>
                <div class="normal-text"> Please Use Your Credentials to login.</div>
                <div class="normal-text"> If You are not a member please <a href="<?php echo base_url() . 'register'; ?>">register</a>.</div>
            </div>
            <div class="right">
                <form method="POST" action=<?php echo base_url('login'); ?>>



                    <div class="input-field col s6">
                        <label for="email" class="active">Email Address<font color="red"> *</font></label>
                        <input type="email" id="email" name="email" class="validate">
                    </div>


                    <div class="input-field col s6">
                        <label for="password" class="active">Password<font color="red"> *</font></label>
                        <input type="password" id="password" name="password" class="validate">
                    </div>

                    <button type="submit" id="submitButton">Login</button>
                </form>

            </div>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>

<?php if (isset($error)) { ?><script>
        alert("incorrect credentials")
    </script><?php } ?>