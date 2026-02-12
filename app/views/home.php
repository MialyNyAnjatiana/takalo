<?php
session_start();
$user = $_SESSION['user']['nom'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takalo | Accueil</title>

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/custom-style.css" type="text/css">
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
    <section class="hero">
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

    <!-- Random objects Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Liste des objets</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($objets as $objet): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic">
                                <?php if (!empty($objet['lien_photo'])): ?>
                                    <img src="/assets/img/<?= htmlspecialchars($objet['lien_photo']) ?>"
                                        alt="<?= htmlspecialchars($objet['description']) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="featured__item__text">
                                <h3><?= htmlspecialchars($objet['description']) ?></h3>
                                <p>Prix : <?= htmlspecialchars($objet['prix']) ?> Ar</p>
                                <p>Propriétaire : <?= htmlspecialchars($objet['nomUser']) ?></p>
                                <p>Catégorie : <?= htmlspecialchars($objet['nomCategorie']) ?></p>
                            </div>
                            <div class="featured__item__actions">
                                <a href="/objet/<?= $objet['id'] ?>">Voir détail</a>
                                <a href="/objet/edit/<?= $objet['id'] ?>">Modifier</a>
                                <a href="/objet/delete/<?= $objet['id'] ?>" onclick="return confirm('Supprimer cet objet ?');">Supprimer</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Random objects End -->

    <!-- Utilisateurs Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="latest-product__text">
                    <h4>Utilisateurs</h4>
                    <div class="latest-product__grid">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>John Doe</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>John Doe</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>John Doe</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>John Doe</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>John Doe</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>John Doe</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Utilisateurs End -->

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