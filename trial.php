<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>trial balance</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .titlex{
      padding:0.3cm
    }
    </style>
 
</head>

<body>

   <?php
        include './includes/header.php';
        include './includes/aside.php';
?>

  <main id="main" class="main">
    <div class="row">
  <div class="col-lg-2"></div>
  <br>
  <div class="col-lg-8 col-md-8">
              <div class="card info-card revenue-card">
              
                <div class="card-body titlex">
                <center><h4><b>TRIAL BALANCE</b></h4>  </center>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            </div>

    <section class="section">
      <div class="row">
      
      <div class="col-lg-2"></div>
        <div class="col-lg-8">


              <br>
       
              <div class="col-12">
                <br>
                <div class="card recent-sales overflow-auto">
  
                    <!-- Disabled Animation Modal -->
            
  
                  <div class="card-body">
                    
  
                


                  <table class="table">
                  <thead>
                    <tr style="color:black">
                 
                      <th scope="col">ACCOUNT</th>
                      <th scope="col">DEBIT</th>
                      <th scope="col">CREDIT</th>
                    
                     
                    </tr>
                  </thead> 
                  <tbody>

              
                        
                  <?php
                    include './connection1.php';
                    $sqlx = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='asset'";

                    $resultx = $conn->query($sqlx);
                    while($rowx = mysqli_fetch_array($resultx)) {
                      $totald= $rowx["0"];
                    }

                    $sqls = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='expense'";

                    $results = $conn->query($sqls);
                    while($rows = mysqli_fetch_array($results)) {
                       $totalex= $rows["0"];
                    }
                    $all=$totald+$totalex;

                    // OR accounts.type='incame' OR accounts.type='equity'
                    $sqly = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='liability'";

                    $resulty = $conn->query($sqly);
                    while($rowy = mysqli_fetch_array($resulty)) {
                      $li= $rowy["0"];
                    }

                    $sqly = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='incame'";

                    $resulty = $conn->query($sqly);
                    while($rowy = mysqli_fetch_array($resulty)) {
                      $e= $rowy["0"];
                    }

                    $sqly = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='equity'";

                    $resulty = $conn->query($sqly);
                    while($rowy = mysqli_fetch_array($resulty)) {
                      $eq= $rowy["0"];
                    }
                    $ta=$e+$li+$eq;



	
                    $sql = "SELECT name,balance,type FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                        $b=$row["1"];
                      
                        if($b=='0')
                        {
                         $b=0;
                        }
                       
 
                     
                        if($row['type']=="asset" || $row['type']=="expense")
                        {
                           ?>
                          <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td><?php echo $row["0"];?></td>
                              <td><?php echo $b;?></td>
                              <td></td>
         
                    </tr>
                       <?php
                        }
                        else if($row['type']=="liability" || $row['type']=="incame" || $row['type']=="equity")
                        {
                          ?>
                          <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td><?php echo $row["0"];?></td>
                              <td></td>
                              <td><?php echo $row["1"];?></td>
         
                         </tr>
                       <?php
                        }
                        
                      
                      }
                    } else {
                      //echo "0 results";
                    }
                  ?>

                           <tr style="border-top:4px solid black">
                              <th colspan='1' style="text-align:center;background-color:lightgray"> <b>TOTAL</b></th>
                             
                              <td><?php  echo $all ?></td>
                              <td><?php  echo $ta ?></td>
                           </tr>  
                           
                           
              
                    
               
              
               
                  </tbody>
                </table>

  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->
  
            

            </div>
          </div>

       
    </section>

  </main><!-- End #main -->

  

  <?php
        
        include './includes/footer.php';
?>




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

