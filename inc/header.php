<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ceee3d5b7f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">

    <title>NetCorp</title>
</head>

<body>

    <header>
        <div class="wrap-header">
            <nav class="navbar navbar-expand-md navbar-light bg-dark">
                <a href="#"><img src="asset/img/tardis_1.jpg" alt="tardis nasa"></a>
                <a href="#" class="navbar-brand">NetCorp<a>

                        <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <p><a class="nav-link" href="aboutus.php">Qui sommes-nous ?</a></p>
                                </li>
                                <li class="nav-item">
                                    <p><a class="nav-link" href="contact.php">Contact</a></p>
                                </li>
                                <!-- dropdown -->
                                <li class="nav-icon">
                                    <i class="far fa-user-circle"></i>
                                </li>
                            </ul>
                        </div>
            </nav>
        </div>

        <div id="logged" class="menu">
            <?php if (isLogged()) { ?>
                <h3>Mon profil</h3>
            <?php } else { ?>
                <h3>Bienvenue</h3>
            <?php } ?>
            <ul class="ul">
                <?php if (isLogged()) { ?>
                    <li class="li"><a class="a" href="">Mon espace client</a></li>
                    <li class="li"><a class="a" href="">Déconnexion</a></li>
                    <li class="li"><a class="a" href="">Autre chose jsp</a></li>
                <?php } else { ?>

                    <li class="li"><a class="a" href="#">Inscription</a></li>
                    <li class="li"><a class="a" href="#">Connexion</a></li>
                    <li class="li"><a class="a" href="">Autre chose jsp</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php if (isLogged()) { ?>
            <div class="Bonjour">
                <p class="hello">Bonjour <?php echo ucfirst($_SESSION['user']['name']); ?></p>
            </div>
        <?php } ?>
    </header>