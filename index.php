<?php include './links.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduConnect | Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <form action="./loginAuth.php" method="post">
                    <h1 class="text-center p-3">LOGIN</h1>

                    <?php
                        if (isset($_GET['error'])) {?>
                            <p class='error mx-4 p-2 bg-danger-subtle rounded'><?php echo $_GET['error'];?></p>
                        <?php
                        }
                    ?>
                    <div class="px-5 py-2">
                        <label for="userID" class="form-label">User ID:</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-regular fa-id-badge"></i></span>
                            <input type="text" name="userID" id="userID" class="form-control" placeholder="User ID" aria-label="User ID" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="px-5 py-2">
                        <label for="pwd" class="form-label">Password:</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="pwd" id="pwd"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="d-grid g-3 col-6 mx-auto my-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>