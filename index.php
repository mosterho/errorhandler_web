<?php

class cls_errorlog{
  public $wrk_cls_error_handler;
  public $row;
  public $logfile_data;
  public $logfile_data_explode;

  function __construct(){
    $this->fct_load_errorhandler();  // Load the error handler/logging subsystem.
    $this->fct_html_header();   // Write HTML header information.
    $this->fct_load_tracking_log();  // Load and display tracking log details.
    $this->fct_html_footer();   // Write HTML footer information.
  }


  function fct_load_errorhandler(){
    $includestr = '/home/ESIS/errorhandler/error_handler.php';
    if(file_exists($includestr)){
      include $includestr;
      $this->wrk_cls_error_handler = new cls_error_handler();
    }
  }


  function fct_load_tracking_log(){
    $this->wrk_cls_error_handler->readmessage(true);
    // fct_explode_all will create an array of all logfile data elements (keys not included, data only).
    $this->logfile_data_explode = $this->wrk_cls_error_handler->fct_explode_all();
    foreach($this->logfile_data_explode as $this->row){
      $this->fct_html_detail();
    }
  }


  function fct_html_header(){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Tracking Log Viewer" content="">
    <meta name="Marty Osterhoudt / ESIS" content="Tracking Log Viewer">
    <title>Tracking Log Viewer</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <h1>Tracking Log Audit</h1>
    <table class="table">
    <thead>
    <tr class="table-info">
    <th scope="col">Priority</th>
    <th scope="col">Version</th>
    <th scope="col">Date/Time</th>
    <th scope="col">Server/Web Site</th>
    <th scope="col">Program</th>
    <th scope="col">White Listed?</th>
    <th scope="col">IP</th>
    <th scope="col">Country Code</th>
    <th scope="col">Country Name</th>
    <th scope="col">Region Name</th>
    <th scope="col">City Name</th>
    <th scope="col">Latitude</th>
    <th scope="col">Longitude</th>
    <th scope="col">Zip Code</th>
    <th scope="col">Time Zone</th>
    <th scope="col">ASN</th>
    <th scope="col">AS</th>
    <th scope="col">Proxy</th>
    </tr>
    </thead>
    <tbody>
    ';
  }


  function fct_html_detail(){
    echo '
    <tr>
    <td scope="col">'.$this->row[0].'</td>
    <td scope="col">'.$this->row[1].'</td>
    <td scope="col">'.$this->row[2].'</td>
    <td scope="col">'.$this->row[3].'</td>
    <td scope="col">'.$this->row[4].'</td>
    <td scope="col">'.$this->row[5].'</td>
    <td scope="col">'.$this->row[6].'</td>
    <td scope="col">'.$this->row[7].'</td>
    <td scope="col">'.$this->row[8].'</td>
    <td scope="col">'.$this->row[9].'</td>
    <td scope="col">'.$this->row[10].'</td>
    <td scope="col">'.$this->row[11].'</td>
    <td scope="col">'.$this->row[12].'</td>
    <td scope="col">'.$this->row[13].'</td>
    <td scope="col">'.$this->row[14].'</td>
    <td scope="col">'.$this->row[15].'</td>
    <td scope="col">'.$this->row[16].'</td>
    <td scope="col">'.$this->row[17].'</td>
    </tr>
    ';
  }


  function fct_html_footer(){
    echo '
    </tbody>
    </table>
    <script src="assets/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
    </html>
    ';
  }
  // End of class definition
}

/*-------------------------------------------------------------------------------*/
/*   mainline...
/*-------------------------------------------------------------------------------*/

$wrk_cls_errorlog = new cls_errorlog;


?>
