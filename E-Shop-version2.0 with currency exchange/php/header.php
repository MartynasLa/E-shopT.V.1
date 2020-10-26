<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navabar-brand text-warning">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket "></i>Shopping-Cart
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"

        >
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Change Currency
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="finance.php">&euro;EUR</a>
                <a class="dropdown-item" href="finance.php">GBP</a>
                <a class="dropdown-item" href="finance.php">$USD</a>
            </div>
            </div>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                   <h5 class="px-5">
                       <i class="fas fa-shopping-cart"></i> Cart 
                       <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                echo"<span id='cart_count' class='text-warning bg-light'>$count</span>";
                            }else{
                                echo"<span id='cart_count' class='text-warning bg-light'>0</span>";
                            }
                       ?>
                   </h5> 
                </a>
            </div>
        </div>

    </nav>

</header>