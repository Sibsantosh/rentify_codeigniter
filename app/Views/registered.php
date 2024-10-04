<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/all_users.css">
    <title>Document</title>
</head>
<body>
 
        <div class="list">  
        <h2>Registered Users</h2>
        <hr style="margin-top: 10px;">
        <?php 
                if(isset($data)){
                    $count = 0;
                    foreach($data as $d){ ?>
                        <div class="card">
                            <div class="personDetails">
                                <h3><?= $d->getUserName()?></h3>
                                <?= $d->getEmail()?>
                            </div>
                            <div class="personJob">
                            <?= $d->getPhoneNumber()?><br>
                            <?= $d->getDateOfBirth()?><br>
                            
                            </div>
                            <div class="cardActions">
                            <a href="<?php echo base_url().'edit/'.$d->getRecordId() ?>"><button class="edit-button"   ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                <a href="<?php echo base_url().'delete/'.$d->getRecordId() ?>"><button class="delete-button"  ><i class="fa fa-times" aria-hidden="true"></i></button></a>
                        </div>
                        </div>

                        <?php
                        $count++;
                    }

                }
            ?>
        </div>
        <a href="<?php echo base_url().'register'; ?>"><button>New User</button></>
</body>
</html>