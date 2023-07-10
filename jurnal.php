<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>jurnal </title>
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

    

    <section class="section">
      <div class="row">
      

      
        

        <div class="col-xxl-2 col-md-2"></div>
        <div class="col-xxl-8 col-md-8">
              <div class="card info-card revenue-card">

                <div class="card-body titlex">
                <center><h4><b>JURNAL</b></h4>  </center>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-2"></div>
             <center><div class="col-8">
                <br>
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">date</th>
                     
                      
                      <th scope="col">Account</th>
                      <th scope="col">debit</th>
                      <th scope="col">credits</th>
                    
                     
                    </tr>
                  </thead> 
                  <tbody>

              
                        
                          
                           <?php
                    include './connection1.php';
                    $sqlx = "SELECT sum(credit) as total FROM `jurnal`,`accounts` WHERE accounts.aid=jurnal.aid";
                    $resultx = $conn->query($sqlx);
                    while($rowx = mysqli_fetch_array($resultx)) {
                      $total= $rowx["0"];
                    }

	
                    $sql = "SELECT date,name,debit,credit FROM `jurnal`,`accounts` WHERE accounts.aid=jurnal.aid";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       $d=$row["2"];
                       $c=$row["3"];
                       if($d=='0')
                       {
                        $d='';
                       }
                       if($c=='0')
                       {
                        $c='';
                       }

                       ?>
                          <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                        
                              <td><?php echo $row["0"];?></td>
                              <td><?php echo $row["1"];?></td>
                              
                              <td><?php echo $d;?></td>
                              <td><?php echo $c;?></td>
                             
     
                              
                    </tr>
                       <?php
                      }
                    } else {
                      // echo "0 results";
                    }
                  ?>
                 
                          

                           <tr style="border-top:4px solid black">
                              <th colspan='2' style="text-align:center;background-color:lightgray"> <b>TOTAL</b></th>
                             
                              <td><?php echo $total; ?></td> <td><?php echo $total; ?></td>
                             
                           </tr>  
                           
                           
              
                    
               
              
               
                  </tbody>
                </table>

  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->
  
              </center> 

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

