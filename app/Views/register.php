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
    <title>Materialize Example</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register_screen.css">
    <style>
       .input{
        border-color: black;
       }
    </style>
</head>
<body>
<div class="parent">

    <div class="child">

        <div class="left">
        </div>
        <div class="right">
            <form method = "POST" action = <?php echo base_url('register'); ?>>
            
            <div class="input-field col s6">
            <label for="name" class="active">Full Name <font color="red"> *</font></label>
            <input type="text" id="name" name="name" class="validate">
            </div>

            <div class="input-field col s6">
            <label for="email" class="active">Email Address<font color="red" > *</font></label>
            <input type="email" id="email" name="email" class="validate" >
            </div>

            <div class="input-field col s6">
            <label for="phone" class="active">Phone<font color="red" > *</font></label>
            <input type="tel" id="phone" name="phone" class="validate" >
            </div>

            <div class="input-field col s6">
            <label for="dob" class="active">Dob<font color="red" > *</font></label>
            <input  id="dob" name="dob" class="validate" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
            </div>

            <div class="input-field col s6">
            <label for="password" class="active">Password<font color="red" > *</font></label>
            <input type="password" id="password" name="password" class="validate" >
            </div>
             
            <button type="submit"  id="submitButton">Register User</button>
            </form>
        
        </div>
    </div>

</div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>