<?php
//reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

//chamando ele pelo autoload do vendor
require '../../../vendor/autoload.php';

/*CORPO DO PDF*/

//Logo do documento
/* $image = "../img/logo.png";

$html = "<img src='data:image/png;base64," .  base64_encode(file_get_contents(@$image)) . "' ...>"; */

$html = '
<html>
    <head><!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <main id="main" class="main">
            <section class="section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista de preço</h5>
                                <p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
                                <!-- Bordered Table -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="capitalize">#</th>
                                        <th scope="col" class="capitalize">Name</th>
                                        <th scope="col" class="capitalize">Position</th>
                                        <th scope="col" class="capitalize">Age</th>
                                        <th scope="col" class="capitalize">Start Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Brandon Jacob</td>
                                        <td>Designer</td>
                                        <td>28</td>
                                        <td>2016-05-25</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Bridie Kessler</td>
                                        <td>Developer</td>
                                        <td>35</td>
                                        <td>2014-12-05</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Ashleigh Langosh</td>
                                        <td>Finance</td>
                                        <td>45</td>
                                        <td>2011-08-12</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">4</th>
                                        <td>Angus Grady</td>
                                        <td>HR</td>
                                        <td>34</td>
                                        <td>2012-06-11</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">5</th>
                                        <td>Raheem Lehner</td>
                                        <td>Dynamic Division Officer</td>
                                        <td>47</td>
                                        <td>2011-04-19</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End Bordered Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
'; /* 
echo $html;
exit; */
// instantiate and use the dompdf class
$dompdf = new Dompdf();

//habilitado o acesso ao download de assets remotos - Para funcionar o Bootstrap
$options = new Options();

//habilitado o acesso ao download de assets remotos - Para funcionar o Bootstrap
$options->set('isRemoteEnabled', TRUE);

$options->setIsHtml5ParserEnabled(true);

//habilitado o acesso ao download de assets remotos - Para funcionar o Bootstrap
$dompdf = new Dompdf($options);

//load body PDF
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // portrait = retrato, landscape = paisagem

// Render the HTML as PDF
$dompdf->render();


$dompdf->stream('listaPreco.pdf', array("Attachment" => false));//true - Download false - Previa


$conn->close();
