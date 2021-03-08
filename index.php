<?php 
session_start();
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/solid.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Register for the event</title>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col text-center mb-md-5">
                <h1>Register for the upcoming event</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
                <?php if(isset($errors) && count($errors) > 0): ?>
                <div class="alert alert-danger">Please correct the errors!</div>
                <?php endif; ?>
                <form method="POST" action="actions/register.php">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 py-3">
                            <label for="firstname" class="text-muted">Provide your first name</label>
                            <input 
                            type="text" 
                            name="firstname" 
                            class="form-control form-control-lg" 
                            placeholder="firstname"
                            value="<?= $_SESSION['old']['firstname'] ?? ''?>">
                            <?php 
                                if(isset($errors['firstname'])): 
                                foreach($errors['firstname'] as $error):
                            ?>
                            <small class="text-danger"><?= $error ?></small>
                            <?php
                                endforeach;
                                endif; 
                            ?>
                        </div>
                        <div class="col-sm-12 col-md-6 py-3">
                            <label for="lastname" class="text-muted">Last name</label>
                            <input type="text" name="lastname" class="form-control form-control-lg" placeholder="lastname" 
                            value="<?= $_SESSION['old']['lastname'] ?? ''?>">
                            <?php 
                                if(isset($errors['lastname'])): 
                                foreach($errors['lastname'] as $error):
                            ?>
                            <small class="text-danger"><?= $error ?></small>
                            <?php
                                endforeach; 
                                endif; 
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col py-3">
                            <label for="email" class="text-muted">E-Mail address</label>
                            <input type="email"
                            value="<?= $_SESSION['old']['email'] ?? ''?>" name="email" class="form-control form-control-lg" placeholder="ada@lovelace.com">
                            <?php 
                                if(isset($errors['email'])): 
                                foreach($errors['email'] as $error):
                            ?>
                            <small class="text-danger"><?= $error ?></small>
                            <?php
                                endforeach; 
                                endif; 
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col py-3">
                            <label for="address" class="text-muted">Address</label>
                            <input type="text" name="address" 
                            value="<?= $_SESSION['old']['address'] ?? ''?>" class="form-control form-control-lg" placeholder="address">
                            <?php 
                                if(isset($errors['address'])): 
                                foreach($errors['address'] as $error):
                            ?>
                            <small class="text-danger"><?= $error ?></small>
                            <?php
                                endforeach; 
                                endif; 
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col py-3">
                            <input type="checkbox" name="receive_updates" checked>
                            I would like to receive updates from the organizing commitee
                        </div>
                    </div>
                    <div class="row">
                        <div class="col py-3">
                            <button class="float-end btn btn-success btn-lg">
                                <i class="uis uis-check"></i>
                                Register for the event
                            </button>
                        </div>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    <?php unset($_SESSION['errors']); session_destroy(); $errors = []; ?>
    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
