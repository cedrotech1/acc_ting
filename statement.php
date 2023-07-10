<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
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



  <!-- ======= Sidebar ======= -->
<?php
include './includes/header.php';
include './includes/aside.php';
?>

  <main id="main" class="main">

    <div class="row">
    <div class="col-xxl-2 col-md-2"></div>
  <div class="col-xxl-8 col-md-8">
              <div class="card info-card revenue-card">

                <div class="card-body titlex">
                <center><h4><b>INCAME STATEMENT</b></h4>  </center>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">





 <div class="col-xxl-2 col-md-2"></div>
          <div class="col-xxl-8 col-md-8">
         
              <div class="card info-card revenue-card">

                <div class="card-body">
                <center> <h5 class="card-title" style="margin-top:0.3cm"><b> INCAME STATEMENT </h5></b></center> 

                  <div class="d-flex align-items-center">
                   
                   
                    
                    <table class="table">
                  <thead>
                   
                  </thead> 
                  <tbody>

              
                        
                           <tr>
                          
                              <td style="border-left:4px solid gray">
                                    <table class='table'>
                                    <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td> <h4>REVENUES</h4></td>
                             
                              <td></td>
                              
         
                        </tr>
                                    <?php
                    include './connection1.php';
                    $sqlx = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='incame'";

                    $resultx = $conn->query($sqlx);
                    while($rowx = mysqli_fetch_array($resultx)) {
                      $totali= $rowx["0"];
                      if($totali==NULL)
                      {
                        $totali= 0;
                      }
                    }


                    $sqly = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='liability' OR  accounts.type='equity'";

                    $resulty = $conn->query($sqly);
                    while($rowy = mysqli_fetch_array($resulty)) {
                      $totall= $rowy["0"];
                    }

	
                    $sql = "SELECT name,balance,type FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                     
                        if($row['type']=="incame")
                        {
                           ?>
                          <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td><?php echo $row["0"];?></td>
                             
                              <td style="text-align:right"><?php echo $row["1"];?></td>
                              
         
                        </tr>
                       <?php
                        }
                     
                        
                      
                      }
                      ?>
                      <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td style="padding-top:1cm;"><b> TOTAL REVENUES</b></td>
                             
                              <td style="text-align:right;padding-top:1cm;border-top:4px solid black"><?php echo $totali;?></td>
                              
         
                        </tr>
                      <?php
                    } else {
                     // echo "0 results";
                    }
                  ?>
    <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td> <h4>EXPENSES</h4></td>
                             
                              <td></td>
                              
         
                        </tr>

<!-- ------------------------------------------------------------------------------------------------------- -->
<?php
                    include './connection1.php';
                    $sqlx = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='incame'";

                    $resultx = $conn->query($sqlx);
                    while($rowx = mysqli_fetch_array($resultx)) {
                      $totali= $rowx["0"];
                    }


                    $sqly = "SELECT sum(balance) as total FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid 
                    and accounts.type='expense'";

                    $resulty = $conn->query($sqly);
                    while($rowy = mysqli_fetch_array($resulty)) {
                      $totale= $rowy["0"];
                    }
                    $prof=$totali-$totale;

	
                    $sql = "SELECT name,balance,type FROM `ledger`,`accounts` WHERE accounts.aid=ledger.aid";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                     
                        if($row['type']=="expense")
                        {
                           ?>
                          <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td><?php echo $row["0"];?></td>
                             
                              <td style="text-align:right"><?php echo $row["1"];?></td>
                              
         
                        </tr>
                       <?php
                        }
                     
                        
                      
                      }
                      ?>
                      <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td style="padding-top:1cm;"><b> TOTAL EXPENSE</b></td>
                             
                              <td style="text-align:right;padding-top:1cm;border-top:4px solid black"><?php echo $totale;?></td>
                              
         
                        </tr>
                      <?php
                    } else {
                      // echo "0 results";
                    }
                  ?>
                   
                   <?php
                   if($prof>0)
                   {
                    ?>
                            <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td style="padding-top:1cm;"><b> PROFITE </b></td>
                             
                              <td style="text-align:right;padding-top:1cm;border-top:4px solid black"><?php echo $prof;?></td>
                              
         
                        </tr>
                    <?php
                   }
                   else if($prof<0)
                   {
                    ?>
                            <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td style="padding-top:1cm;"><b> Loss </b></td>
                             
                              <td style="text-align:right;padding-top:1cm;border-top:4px solid black"><?php echo $prof;?></td>
                              
         
                        </tr>
                    <?php
                   }else{
                    ?>
                    <tr>
                  <!-- `id`, `names`, `email`, `subject`, `message` -->
                
                      <td style="padding-top:1cm;"><b> profite/loss(we make neither profit nor loss) </b></td>
                     
                      <td style="text-align:right;padding-top:1cm;border-top:4px solid black"><?php echo $prof;?></td>
                      
 
                </tr>
            <?php

                   }

                   ?>
                   
                   
                                    </table>
                                    







                            
                            </td>
                           
                           </tr>  
                           <!-- <tr>
                             
                              <td style="border-right:4px solid black"></td>
                              <td>100000</td>
                           </tr>  

                           <tr>
                            
                              <td style="border-right:4px solid black">5000</td>
                              <td></td>
                           </tr>  
                           <tr>
                              
                              <td style="border-right:4px solid black"></td>
                              <td>5000</td>
                           </tr>   -->

                           
                           
                           
              
                    
               
              
               
                  </tbody>
                </table>
                      

                    
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

   















      















   
        </div><!-- End Left side columns -->

     
      </div>
    </section>

  </main><!-- End #main -->


  <?php
        
        //include './includes/footer.php';
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