<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css"/>
    <script src="/script.js"></script>
    <link rel="icon shortcut" type="image/icon" href="ClotheLineBW.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?=$title?></title>
</head>

<body id="clicked" class="home">
    <nav class="navigation">
        <ul class="nav">
            <li>
                <a href="category.php?f=" class="All">All</a>
            </li>
            <li>
                <a href="category.php?f=women" class="Womens">Women's</a>
                <ul>
                    <li>
                        <a href="category.php?f=wJackets" class="Jackets">Jackets</a>
                    </li>
                    <li>
                        <a href="category.php?f=wH&S" class="Hoodies & Sweatshirts">Hoodies & Sweatshirts</a>
                    </li>
                    <li>
                        <a href="category.php?f=wTops" class="Tops">Tops</a>
                    </li>
                    <li>
                        <a href="category.php?f=wShoes" class="Shoes">Shoes</a>
                    </li>
                    <li>
                        <a href="category.php?f=wTrousers" class="Trousers">Trousers</a>
                    </li>
                    <li>
                        <a href="category.php?f=wDresses" class="Dresses">Dresses</a>
                    </li>
                    <li>
                        <a href="category.php?f=wSkirts" class="Skirts">Skirts</a>
                    </li>
                    <li>
                        <a href="category.php?f=wJackets" class="Jackets">Jackets</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="category.php?f=men" class="Mens">Men's</a>
                <ul>
                    <li>
                        <a href="category.php?f=mJackets" class="Jackets">Jackets</a>
                    </li>
                    <li>
                        <a href="category.php?f=mH&S" class="Hoodies & Sweatshirts">Hoodies & Sweatshirts</a>
                    </li>
                    <li>
                        <a href="category.php?f=mTops" class="Tops">Tops</a>
                    </li>
                    <li>
                        <a href="category.php?f=mShoes" class="Shoes">Shoes</a>
                    </li>
                    <li>
                        <a href="category.php?f=mTrousers" class="Trousers">Trousers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="Boys">Boy's</a>
                <ul>
                    <li>
                        <a href="category.html" class="Jackets">Jackets</a>
                    </li>
                    <li>
                        <a href="category.html" class="Hoodies & Sweatshirts">Hoodies & Sweatshirts</a>
                    </li>
                    <li>
                        <a href="category.html" class="Tops">Tops</a>
                    </li>
                    <li>
                        <a href="category.html" class="Shoes">Shoes</a>
                    </li>
                    <li>
                        <a href="category.html" class="Trousers">Trousers</a>
                    </li>
                    <li>
                        <a href="category.html" class="Jeans">Jeans</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="Girls">Girl's</a>
                <ul>
                    <li>
                        <a href="category.html" class="Jackets">Jackets</a>
                    </li>
                    <li>
                        <a href="category.html" class="Hoodies & Sweatshirts">Hoodies & Sweatshirts</a>
                    </li>
                    <li>
                        <a href="category.html" class="Tops">Tops</a>
                    </li>
                    <li>
                        <a href="category.html" class="Shoes">Shoes</a>
                    </li>
                    <li>
                        <a href="category.html" class="Dresses">Dresses</a>
                    </li>
                    <li>
                        <a href="category.html" class="Skirts">Skirts</a>
                </ul>
                </li>
                <li>
                    <a href="category.php" class="Baby">Baby</a>
                    <ul>
                        <li>
                            <a href="category.html" class="Onesies">Onesies</a>
                        </li>
                        <li>
                            <a href="category.html" class="Sleepers">Sleepers</a>
                        </li>
                        <li>
                            <a href="category.html" class="Swaddles">Swaddles</a>
                        </li>
                        <li>
                            <a href="category.html" class="Bibs">Bibs</a>
                        </li>
                        <li>
                            <a href="category.html" class="Hats">Hats</a>
                        </li>
                    </ul>
                </li>
                <li></li>
                <li></li>
                <a href="index.php"class="logolink"><img src="ClotheLineLogoColour.jpeg" alt="Logo" class ="logo"></a>
                <li></li>
                <li></li>
                <form action="/search" method="get" class="searchbar">
                    <input type="text" name="q" placeholder="Search..." class="searchbar">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <a href="cart.php"><img src="cart.png" alt="Cart" class="cart"></a>
                <li>
                    <a href="login.php" class="acc"><img src="acc.png" alt="Account" width="33vw" height="33vw" class="icon">
                        <ul>
                        <?php
                    if (isset($_SESSION['username'])) {
                        echo "<li><a href='#'>" . $_SESSION['username'] . "</a></li>";
                        echo "<li><a href='logout.php'>Log out</a></li>";
                    } else {
                        echo "<li><a href='login.php'>Log-in</a></li>";
                        echo "<li><a href='register.php'>Sign-up</a></li>";
                    }
                ?>
                    </ul>
                </a>
    </nav>
    <main class="main">
        <?=$output?>
    </main>
    <footer>
        &copy; ClotheLine sample footer <?=date('Y');?>
    </footer>
</body>

</html>