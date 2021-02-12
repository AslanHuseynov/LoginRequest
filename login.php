<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Form in PHP</title>
</head>
<body style="background:#CCC;">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card bg-dark mt-5">
                <div class="card-title bg-primary text-white mt-5">
                    <h3 class="text-center py-3">PHP Login Form</h3>
                </div>

                <?php
                if(@$_GET['Empty']==true)
                {
                    ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                    <?php
                }
                ?>


                <?php
                if(@$_GET['Invalid']==true)
                {
                    ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                    <?php
                }
                ?>

                <div class="card-body">
                    <form action="check_user.php" method="post">
                        <input type="text" name="UName" placeholder=" UserName" class="form-control mb-3">
                        <input type="password" name="Password" placeholder=" Password" class="form-control mb-3">
                        <button class="btn btn-success mt-3" name="Submit">Submit</button>
                    </form>
                </div>

                <?php if(isset($_SESSION['response'])){ ?>
                        <div>
                            <p><?= $_SESSION['response'] ?></p>
                        </div>
                <?php }elseif(isset($_SESSION['error'])){ ?>
                        <div>
                            <p><?= $_SESSION['error'] ?></p>
                        </div>
                <?php }else{ ?>
                    <div>
                        <p><?= $_SESSION['false'] ?></p>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"</script>

</body>
</html>
