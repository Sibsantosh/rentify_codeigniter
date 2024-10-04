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
    <link rel="stylesheet" href="assets/css/register_screen.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
<style>
    body{
    margin: 0;
}
.parent{
    background: url(../images/rentify_background.png);
    width: 100vw;
    height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
.child{
    background-color: white;
    width: 70vw;
    height: 70vh;
    display: flex;
    flex-wrap: wrap;
    
}
.left{
    background: url(../images/rentify_background.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50%;
    width: 40%;
    height: 100%;
}
.right{
    
    width: 60%;
    height: 100%;
}



@media (max-width: 768px) {
    .child{
        height: 100vh;
        width: 100vw;
    }
   
}

/* Media query for smaller mobile devices */
@media (max-width: 480px) {
    .left{
        display: none;
    }
    .child{
        height: 100vh;
        width: 100vw;
    }

}






form {
    margin: 20px;
    
}

/* Media query for tablets and mobile devices */

/* Styling for the input box */
input[type="text"] {
    padding: 10px;
    width: 100%;
    
    background: #FFFFF6;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
   
    transition: border-color 0.3s ease-in-out;
}

input[type="email"] {
    padding: 10px;
    width: 100%;
    
   
    background: #FFFFF6;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}
input[type="password"] {
    padding: 10px;
    width: 100%;
    
    
    background: #FFFFF6;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}
input[type="date"] {
    padding: 5px;
    width: 100%;
    
 
    background: #FFFFF6;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}
input[type="tel"] {
    padding: 10px;
    width: 100%;
    
    
    background: #FFFFF6;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}
select {
    padding: 10px;
    width: 100%;
    
    
    justify-content: center;
    align-items: center;
    background: #FFFFF6;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}
#submitButton{
    padding: 10px;
    width: 100%;
    margin-bottom: 10px;
    align-items: center;
    justify-content: center;
    
    color: #fff;
    background: #143558;
    border: 1px solid #222222;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}
label{
    color: #143558b4;
    
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
}
/* Change border color on focus 
    border-color: #007BFF;
    outline: none;
}*/






button {
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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
            <input type="text" id="name" name="name" class="validate" value ="<?php echo(isset($postData)?  $postData->getUserName():"");?>">
            </div>

            <div class="input-field col s6">
            <label for="email" class="active">Email Address<font color="red" > *</font></label>
            <input type="email" id="email" name="email" class="validate" value ="<?php echo(isset($postData)?  $postData->getEmail():"");?>" >
            </div>

            <div class="input-field col s6">
            <label for="phone" class="active">Phone<font color="red" > *</font></label>
            <input type="tel" id="phone" name="phone" class="validate" value ="<?php echo(isset($postData)?  $postData->getPhoneNumber():"");?>" >
            </div>

            <div class="input-field col s6">
            <label for="dob" class="active">Dob<font color="red" > *</font></label>
            <input  id="dob" name="dob" class="validate" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" value ="<?php echo(isset($postData)?  $postData->getDateOfBirth():"");?>">
            </div>

            <div class="input-field col s6">
            <label for="password" class="active">Password<font color="red" > *</font></label>
            <input type="password" id="password" name="password" class="validate" value ="<?php echo(isset($postData)?  $postData->getPassword():"");?>">
            </div>
             
            <button type="submit" id="submitButton">Register User</button>
            </form>
        
        </div>
    </div>

</div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>