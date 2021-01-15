<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

include('inc/header.php');
include('modal.php'); ?>


<!-- 
1/wrap
2/h1
3/lorem
4/carrousel -->


<div id="abt" class="abt-wrap">
    <!-- h1 -->
    <section>
        <div>
            <h1>Qui sommes nous ?</h1>
        </div>

    </section>

    <!-- lorem -->
    <section>
        <div>
            <p>Nous sommes une équipe motivée de quatre programmeurs web, Safia, notre chef de groupe, Hallan, Clément et jules constituant notre entreprise NetCorp.</p>
        </div>
    </section>
</div>
<!-- carrousel -->
<section>

    <div class="wrap" id="carousel">
        <div class="flexslider carousel">
            <ul class="slides">
                <li>
                    <div class="content-carousel">
                        <div class="box-top"><img src="asset/img/chart-aboutsus.PNG" style="border-radius: 30px;" /></div>
                        <div class="box-bottom text">
                            <p>Grâce à NetCorp, vous pouvez accéder à vos graphiques et surveiller vos données</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text">
                            <p>Ici, vérifiez les infromations de vos différentes trames.</p>
                        </div>
                        <div class="box-bottom"><img src="asset/img/logs-aboutus.PNG" style="border-radius: 30px;" /></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top"> <img src="asset/img/entete-tcp.gif" style="border-radius: 30px;" /></div>
                        <div class="box-bottom text">
                            <p>Transmission Control Protocol, abrégé TCP, est un protocole de transport fiable, en mode connecté, documenté dans la RFC 793 de l’IETF. Dans le modèle Internet, aussi appelé modèle TCP/IP, TCP est situé au-dessus de IP.
                                L’en-tête ne comporte pas uniquement les ports source et destination. Du fait du caractère fiable du protocole TCP, l’en-tête est beaucoup plus important que pour le protocole UDP.L’en-tête TCP comporte au minimum 20 octets (sans les options éventuelles).
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text">
                            <p>Voici la structure de l’entête ICMP basé sur 8 octets.
                                Les deux champs Identifiant et Numéro de séquence ne sont présent que dans le cas d’un paquet de type Ping sinon les champs reste présent mais en tant que bourrage et donc non utilisés.</p>
                        </div>
                        <div class="box-bottom"> <img src="asset/img/entete-icmp-entete-icmp.gif" style="border-radius: 30px;" /></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top"><img src="asset/img/réseau_informatique_wifi_data.jpg" style="border-radius: 30px;" /></div>
                        <div class="box-bottom text">
                            <p>Accessible depuis votre ordinateur, votre tablette ou votre téléphone restez toujours informé de l'évolution de vos analyses.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text">
                            <p>Certains champs d’une trame permettent d’identifier les protocoles présents dans la trame. Les valeurs contenues dans ces champs
                                déterminent ainsi, à chaque niveau, le type de message qui sera encapsulé (une trame ARP n’a pas les mêmes champs qu’une trame de type IP, un paquet TCP n’a pas les mêmes champs qu’un paquet UDP, etc).</p>
                        </div>
                        <div class="box-bottom"><img src="asset/img/Trames.png" style="border-radius: 30px;" /></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top"><img src="asset/img/schema-reseau.jpg" style="border-radius: 30px;" /></div>
                        <div class="box-bottom text">
                            <p>Vous pouvez suivre le départ de vos trames et vous assurez du bon déroulement de vos envois.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text">
                            <p>Avec NetCorp, le stockage de vos trames est sécurisé !</p>
                        </div>
                        <div class="box-bottom"><img src="asset/img/data.png" style="border-radius: 30px;" /></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php
include('inc/footer.php'); ?>