<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

include('inc/header.php');
include('modal.php'); ?>



<div class="wrap-contact">
    <div class="container-contact">
        <div class="content-contact"><a href="#"><img src="asset/img/work-1.jpg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Medjahed Safia</h3>
                <p><a href="#">contact: safia.medjahed@gmail.com</p>
            </div>
        </div>
        <div class="content-contact"><a href="#"><img src="asset/img/work-3.jpg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Leblond Allan</h3>
                <p><a href="#">contact: allanstm76@gmail.com</a></p>
            </div>
        </div>
        <div class="content-contact"><a href="#"><img src="asset/img/work-2.jpg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Blin Clément</h3>
                <p><a href="#">contact: clement.blin76@gmail.com</a></p>
            </div>
        </div>
        <div class="content-contact"> <a href="#"><img src="asset/img/work-4.jpg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Giraud Jules</h3>
                <p><a href="#">contact: jules.giraud@outlook.fr</a></p>
            </div>
        </div>
    </div>
</div>


<?php
include('inc/footer.php');
