<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');

include('inc/header.php'); ?>

<div class="wrap-dashboard">

    <div class="container-dashboard">

        <div id="title-dashboard">
            <button class="btn-title-dashboard" id="btn-log"><i class="fas fa-database"></i>
                <p class="content-button">Logs</p>
            </button>

            <button class="btn-title-dashboard" id="btn-chart"><i class="fas fa-chart-pie"></i>
                <p class="content-button">Graphiques</p>
            </button>
        </div>

        <div class="body-dashboard">
            <!-- CONTAINER DES LOGS display none-->
            <div id="container-log">
               
                    <table>
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>ID</th>
                                <th>Identifiant</th>
                                <th>Version</th>
                                <th>Nom du protocole</th>
                                <th>Flag</th>
                                <th>Checksum header</th>
                                <th>Venant de (port)</th>
                                <th>à destination de (port)</th>
                                <th>Ip arrivant</th>
                                <th>Ip destination</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //foreach ($datas as $data) { ?>
                            <tr>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td> <!-- bold -->
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                                <td><?php echo 'bonjour';//echo $data['text']; ?></td>
                            </tr>
                            <?php //} ?>
                        </tbody>
                    </table>

            </div>

            <div id="container-chart">
                <div class="chart-top">
                    <div class="litte-chart">
                        <canvas id="myChart" width="400" height="300"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="myChart2" width="400" height="300"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="myChart3" width="400" height="300"></canvas>
                    </div>
                </div>

                <div class="chart-bottom">
                    <div class="big-chart">
                        <canvas id="myChart4" width="600" height="550"></canvas>
                    </div>
                    <div class="big-chart">
                        <canvas id="myChart5" width="600" height="550"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
include('inc/footer.php');
