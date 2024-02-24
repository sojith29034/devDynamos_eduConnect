<?php include '../common/links.php' ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./teacher.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./ngoApplication.php">NGO APPLICATIONS</a>
                </li>
            </ul>
        </div>

        
        <div class="dropstart">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-regular fa-circle-user"></i> <?=$_SESSION['uname']?> </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">My Profile</a></li>
                <li><a class="dropdown-item" href="#">My Classes</a></li>
            </ul>
        </div>
    </div>
</nav> 