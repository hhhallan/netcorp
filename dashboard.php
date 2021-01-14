<?php
session_start();
require('inc/pdo.php');
require('inc/function.php');




$sql = "SELECT * FROM res_trames ORDER BY date DESC";
$var = $pdo->prepare($sql);
$var->execute();
$trames = $var->fetchAll();
//debug($trames);






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
                                <th>Date</th>
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
                            <?php foreach ($trames as $trame) { 
                                if($trame['status'] == 'success'){
                                    echo '<tr class="tr-good">';
                                } elseif($trame['status'] == 'timeout') {echo '<tr class="tr-notgood">';} ?>
                                <td><?php echo $trame['date']; ?></td> <!-- bold -->
                                <td><?php echo $trame['identifiant']; ?></td>
                                <td><?php echo $trame['version']; ?></td>
                                <td><?php echo $trame['protocol_name']; ?></td>
                                <td><?php echo $trame['flags']; ?></td>
                                <td><?php echo $trame['header_checksum']; ?></td>
                                <td><?php echo $trame['port_from']; ?></td>
                                <td><?php echo $trame['port_dest']; ?></td>
                                <td><?php echo $trame['ip_from']; ?></td>
                                <td><?php echo $trame['ip_dest']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

            </div>

            <div id="container-chart">
                <div class="chart-top">
                    <div class="litte-chart">
                        <canvas id="ttlLost" width="400" height="300"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="tramDay" width="400" height="300"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="myChart3" width="400" height="300"></canvas>
                    </div>
                </div>

                <div class="chart-bottom">
                    <div class="big-chart">
                        <canvas id="tramType" width="600" height="550"></canvas>
                    </div>
                    <div class="big-chart">
                        <canvas id="requestFail" width="600" height="550"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
include('inc/footerDash.php'); ?>
