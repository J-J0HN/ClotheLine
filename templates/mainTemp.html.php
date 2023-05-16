<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css"/>
    <link rel="icon shortcut" type="image/icon" href="ClotheLineBW.ico">
    <script src="https://kit.fontawesome.com/4b2b408c99.js" crossorigin="anonymous"></script>
    <script src="/scripts/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?=$title?></title>
</head>

<body id="clicked" class="home">
<nav class="navigation">
        <ul class="nav">
            <?php
            require '../pdo.php';
            $stmt = $pdo->prepare('SELECT * FROM category');
            $stmt->execute();
            while($cat = $stmt->fetch()){
                    ?>
                <li><a href="category.php?f=<?=$cat['catid']?>"><?=$cat['name']?></a>
<?php
                    $subcatq = $pdo->prepare('SELECT * FROM subcategory');
                    $subcatq->execute();
                    echo '<ul>';
                    while($subcat = $subcatq->fetch()){
                        echo'<li><a href="category.php?f='.$cat['catid'].'&subcatid='.$subcat['subcatid'].'">'.$subcat['name'].'</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';



                
?>
                <li></li>
                <li></li>
                <a href="index.php"class="logolink"><img src="ClotheLineLogoColour.jpeg" alt="Logo" class ="logo"></a>
                <li></li>
                <li></li>
                <form action="category.php" method="get" class="searchbar">
                    <input type="text" name="q" placeholder="Search..." class="searchbar">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <a href="bag.php"><img src="cart.png" alt="Cart" class="cart"></a>
                <li>
                    <a href="login.php" class="acc"><img src="acc.png" alt="Account" width="33vw" height="33vw" class="icon"></a>
                        <ul>
                        <?php
                    if (isset($_SESSION['login'])) {
                        echo '<li>' . $_SESSION['username'] . '</li>';
                        echo '<li><a href="logout.php">Log out</a></li>';
                        if($_SESSION['admin']>0){
                            echo '<li><a href="adminDash.php">Admin</a></li>';
                        }
                        echo '<li><a href="Account.php">Account</a></li>';

                    } else {
                        echo '<li><a href="login.php">Log-in</a></li>';
                        echo '<li><a href="register.php">Sign-up</a></li>';
                    }
                ?>
                    </ul>
                </li>
    </nav>
    <main class="<?=$mainClass?>">
        <?=$output?>
    </main>
    <footer class="footerclass">
        <section class="p1">
        <h1 class="socials">OUR SOCIALS</h1>
        <div class="social-links">
            <a href="#"><img src="fb.png" alt="FaceBook" class ="facebook"></a>
            <a href="#"><img src="twt.png" alt="Twitter" class ="twitter"></a>
            <a href="#"><img src="pin.png" alt="Pinterest" class ="pinterest"></a>
            <a href="#"><img src="insta.png" alt="Instagram" class ="instagram"></a>
        </div>
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
        <div>
            <p>01504123456</p>
            <p>info@clotheline.com</p>
        </div>
        </section>
    </footer>
</body>

</html>