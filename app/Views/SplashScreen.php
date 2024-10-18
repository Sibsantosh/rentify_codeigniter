<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/splash_screen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="parent">
        <div class="background">
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
        <div class="content">
            <div class="centercontent">
                <div class="note">
                    <img id="Logo" src="assets/images/Rentify_Logo.png" alt="Logo" height=50px width=60px>

                    Rentify...
                </div>
                <div class="next">
                    <?php if (session()->get('authenticatedUser') == null) { ?>

                        <a href="<?php echo base_url() . 'login'; ?>">
                        <?php } else {
                        ?>
                            <a href="<?php echo base_url() . 'dashboard'; ?>">
                            <?php } ?>


                            <i class="fa fa-arrow-right" style="font-size:36px; color:#000;" aria-hidden="true"></i></a>
                </div>


            </div>
        </div>
    </div>
</body>

</html>