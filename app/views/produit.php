<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takalo | Détails de l'objet</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    
    <!-- Mobile wrapper Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="/home">Accueil</a></li>
                <li><a href="/demandes-recues">Demandes reçues</a></li>
                <li><a href="/demandes-envoyees">Demandes envoyées</a></li>
                <li><a href="/objet/add">Ajouter un objet</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Mobile wrapper End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/home">Accueil</a></li>
                            <li><a href="/demandes-recues">Demandes reçues</a></li>
                            <li><a href="/demandes-envoyees">Demandes envoyées</a></li>
                            <li><a href="/objet/add">Ajouter un objet</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero__search" style="margin:0 auto;max-width:980px;">
                        <div class="hero__search__form">
                            <form action="#">
                                <select class="">
                                    <option value="#">Toutes catégories</option>
                                    <span class="arrow_carrot-down"></span>
                                </select>
                                <input type="text" placeholder="Que cherchez-vous?">
                                <button type="submit" class="site-btn">CHERCHER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <?php if (!empty($objet)): ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?php if (!empty($photos)): ?>
                            <div class="product__details__pic">
                                <div class="product__details__pic__item">
                                    <img class="product__details__pic__item--large"
                                        src="/assets/img/<?= htmlspecialchars($photos[0]) ?>" alt="<?= htmlspecialchars($objet['description']) ?>">
                                </div>
                                <div class="product__details__pic__slider owl-carousel">
                                    <?php foreach ($photos as $photo): ?>
                                        <img src="/assets/img/<?= htmlspecialchars($photo) ?>" alt="<?= htmlspecialchars($objet['description']) ?>">
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3>Détail de l'objet</h3>

                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="img/blog/details/details-author.jpg" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6><?= htmlspecialchars($objet['nomUser']) ?></h6>
                                    <span>Admin</span>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="product__details__price"><?= htmlspecialchars($objet['prix']) ?> Ar</div>

                            <!-- Short description -->
                            <p>
                                <?= htmlspecialchars($objet['nomCategorie']) ?>
                            </p>

                            <!-- Buttons -->
                            <a href="#" class="primary-btn">Demander un échanger</a>
                        </div>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>Objet introuvable.</p>
        <?php endif; ?>
    </section>
    <!-- Product Details Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>ETU + NOM</li>
                            <li>ETU + NOM</li>
                            <li>ETU + NOM</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liens</h6>
                        <ul>
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">Demande d'échange</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>