<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css"/>
    <link rel="icon shortcut" type="image/icon" href="ClotheLineBW.ico">
    <script src="/scripts/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?=$title?></title>
</head>

<body id="clicked" class="home">
    <nav class="navigation">
        <ul>
            <li>
                <a href="category.html" class="All">All</a>
            </li>
            <li>
                <a href="#" class="Womens">Women's</a>
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
                        <a href="category.html" class="Dresses">Dresses</a>
                    </li>
                    <li>
                        <a href="category.html" class="Skirts">Skirts</a>
                    </li>
                    <li>
                        <a href="category.html" class="Jackets">Jackets</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="Mens">Men's</a>
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
                    <a href="#" class="Baby">Baby</a>
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
                <a href="index.php"><img src="ClotheLineLogoColour.jpeg" alt="Logo" class ="logo"></a>
                <form action="/search" method="get" class="searchbar">
                    <input type="text" name="q" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <a href="cart.php"><img src="cart.png" alt="Cart" class="cart"></a>
                <li><a href="#" class="acc"><img src="acc.png" alt="Account" width="33vw" height="33vw" class="icon"><ul>
                <li><a href="login.php">Log-in</a></li>
                <li><a href="register.php">Sign-up</a></li>
                </ul>
    </nav>
    <main class="main">
        <?=$output?>
    </main>
    <footer class="footerclass">
        <section class="p1">
        <h1 class="socials">OUR SOCIALS</h1>
        <a href="#"><img src="fb.png" alt="FaceBook" class ="facebook"></a>
        <a href="#"><img src="twt.png" alt="Twitter" class ="twitter"></a>
        <a href="#"><img src="pin.png" alt="Pinterest" class ="pinterest"></a>
        <a href="#"><img src="insta.png" alt="Instagram" class ="instagram"></a>
        </section>

        <section class="p2">
        <h1 class="newsletters">NEWSLETTERS</h1>
        <div class="newsletter">
		<form>
			<input type="email" id="email" name="email" placeholder="Email Address" required>
			<button type="submit">Subscribe Now</button>
		</form>
    </div>
    <p>&copy; by ClotheLine Ltd <?php echo date('Y'); ?></p>
        </section>

        <section class="p3">
        <h1 class="contacts">NEED MORE HELP?</h1>
        <p>01504123456</p>
        <p>info@clotheline.com</p>
        </section>
    </footer>
</body>

</html>