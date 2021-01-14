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
                        <div class="box-top"><img src="asset/img/what-is-icmp.png" style="border-radius: 30px;" /></div>
                        <div class="box-bottom text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, unde itaque recusandae voluptate amet inventore dolore ducimus quae, sequi voluptates voluptas quas consequuntur soluta consectetur eum voluptatum non maiores cum.</p></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, unde itaque recusandae voluptate amet inventore dolore ducimus quae, sequi voluptates voluptas quas consequuntur soluta consectetur eum voluptatum non maiores cum.</p></div>
                        <div class="box-bottom"><img src="asset/img/reseau.png"style="border-radius: 30px;" /></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top"> <img src="asset/img/entete-tcp.gif"style="border-radius: 30px;" /></div>
                        <div class="box-bottom text"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident saepe odit qui aut atque voluptatum necessitatibus doloribus cum ad? Nostrum, dolor nulla!</p></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero quae culpa distinctio nisi in ab unde, debitis delectus itaque doloribus voluptatibus modi esse iusto. Provident doloribus minima consequatur sapiente aut. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda eum dolorem eligendi iusto rerum! Quidem eum amet, officia libero nesciunt nobis ex porro eaque mollitia tenetur fugiat rerum dignissimos esse.</p></div>
                        <div class="box-bottom"> <img src="asset/img/entete-icmp-entete-icmp.gif"style="border-radius: 30px;" /></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top"><img src="asset/img/réseau_informatique_wifi_data.jpg"style="border-radius: 30px;" /></div>
                        <div class="box-bottom text"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus nobis similique asperiores praesentium architecto maxime corrupti beatae exercitationem totam quidem eligendi eveniet ratione corporis in, fugiat ad repudiandae eos enim.</p></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente culpa tenetur quod quisquam unde distinctio vel vitore, quas consequuntur porro neque voluptatem nisi at ipsa aspernatur!</p></div>
                        <div class="box-bottom"><img src="asset/img/Trames.png"style="border-radius: 30px;" /></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top"><img src="asset/img/schema-reseau.jpg"style="border-radius: 30px;" /></div>
                        <div class="box-bottom text"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid vero quidem cupiditate. Exercitationem qui, aperiam sunt vitae eius unde non voluptates iure doloremque, minima ad veritatis dignissimos! Repellendus, voluptatum laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit. </p></div>
                    </div>
                </li>
                <li>
                    <div class="content-carousel">
                        <div class="box-top text"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit doloribus rem totam sapiente libero? Rem debitis repellat officia autem, eaque quisquam? Incidunt qui, quas velit temporibus non consequatur harum libero.</p></div>
                        <div class="box-bottom"><img src="asset/img/data.png" style="border-radius: 30px;"/></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php
include('inc/footer.php'); ?>
