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

    
  <div class="col-xxl-12 col-md-12">
              <div class="card info-card revenue-card">

                <div class="card-body titlex">
                <center><h4><b>LEDGERS</b></h4>  </center>
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


          <?php
include './connection1.php';
$sqlx = "SELECT accounts.aid,balance,name FROM `accounts`,`ledger` where accounts.aid=ledger.aid";
$resultx = $conn->query($sqlx);
while ($rowx = mysqli_fetch_array($resultx)) {
    $aid = $rowx["0"];
    $balance = $rowx["1"];
    $name = $rowx["2"];
?>

<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">
    <div class="card-body">
      <center>
        <h5 class="card-title" style="margin-top:0.3cm">
          <b><?php echo $name; ?></b>
        </h5>
      </center>
      <div class="d-flex align-items-center">
        <table class="table">
          <thead>
            <tr style="border-bottom:4px solid black">
              <th scope="col">DR</th>
              <th scope="col" style="text-align:right">CR</th>
            </tr>
          </thead>
          <tbody>
            <?php
          // for ($i=0; $i < 10; $i++) { 
          //   echo $i;
          // }
          $sql = "SELECT debit,credit FROM `jurnal`,`accounts` WHERE accounts.aid=jurnal.aid and accounts.aid=$aid ";

          $result = $conn->query($sql);

          while($row = mysqli_fetch_array($result)) {

            $d=$row["0"];
            $c=$row["1"];
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
              <td style="border-right:4px solid black;text-align:left"><?php echo $d; ?></td>
              <td style="text-align:right"><?php echo $c; ?></td>
            </tr>
          <?php
          }
            ?>
            <tr style="border-top:4px solid whitesmoke">
              <th colspan='2' style="text-align:center;background-color:#e5e5e5">
                <b>BALANCE : <?php  echo $balance ?></b>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div><!-- End Revenue Card -->

<?php
}
?>

















   
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