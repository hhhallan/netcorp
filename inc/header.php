<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">

    <title>NetCorp</title>
</head>


<body>

    <header>
        <div class="wrap-header">
            <?php if (isLogged()) { ?>
                <nav id="connect" class="navbar navbar-expand-md navbar-light bg-dark">
                    <a href="index.php" class="navbar-brand">NetCorp<a>
                            <?php if (isLogged()) { ?>
                                <!-- <div class="Bonjour"> -->
                                <p class="hello">Bonjour <span class="hello-user"><?php echo ucfirst($_SESSION['user']['prenom']); ?></span></p>
                                <!-- </div> -->
                            <?php } ?>
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
                                        <i class="far fa-user-circle" id="test"></i>
                                    </li>
                                </ul>
                            </div>
                            <div id="hide" class="menu">
                                <h3>Mon profil</h3>
                                <ul class="ul">
                                    <li class="li"><a class="a" href="dashboard.php">Mon espace client</a></li>
                                    <li class="li"><a class="a" href="deconnexion.php">Déconnexion</a></li>
                                </ul>
                            </div>

                </nav>
            <?php } else { ?>
                <nav id="notconnect" class="navbar navbar-expand-md navbar-light bg-dark">
                    <!-- <a href="#"><img src="asset/img/chart.svg" alt="tardis nasa"></a> -->
                    <a href="index.php" class="navbar-brand">NetCorp<a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <p><a class="nav-link" href="aboutus.php">Qui sommes-nous ?</a></p>
                                    </li>
                                    <li class="nav-item">
                                        <p><a class="nav-link" href="contact.php">Contact</a></p>
                                    </li>
                                    <!-- dropdown -->
                                    <li class="nav-icon" id="test">
                                        <i class="far fa-user-circle"></i>
                                    </li>
                                </ul>
                            </div>
                            <div  class="menu">
                                <h3>Bienvenue</h3>
                                <ul>
                                    <li class="li"><a class="a" data-toggle="modal" data-target="#exampleModalCenter" href="">Inscription/connexion</a></li>
                                </ul>
                            </div>

                </nav>

            <?php } ?>
        </div>
    </header>


    <div id="content-body">
