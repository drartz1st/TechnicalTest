<?php 
include '../config.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}
 
// menampilkan pesan selamat datang
echo "Hai, selamat datang ". $_SESSION['username'];
 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Report Data</title>

    <script type="text/javascript" src="package/dist/chart.js"></script>
    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Dharma Project</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#Dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2" id="Dashboard">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div> -->
        
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div style="width: 1000px;margin: 0px auto;">
		    <canvas id="myGrafik1"></canvas>
	      </div>
    </div>
    <div class="carousel-item">
        <div style="width: 1000px;margin: 0px auto;">
		    <canvas id="myGrafik2"></canvas>
	      </div>
    </div>
    <!-- <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        

  <script>
    //GRAFIK 1
		var ctx = document.getElementById("myGrafik1").getContext('2d');
		var myGrafik1 = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Cash", "Cash Admin Coll", "ATM PAYMENT", "Third Party Cash Payment", "Transfer"],
				datasets: [{
					label: 'Grafik Penerimaan Untuk Setiap Metode Pembayaran',
					data: [
					<?php 
					$jumlah_cash = mysqli_query($con,"select * from transaksi where metode_pembayaran='Cash'");
					echo mysqli_num_rows($jumlah_cash);
					?>, 
					<?php 
					$jumlah_cac = mysqli_query($con,"select * from transaksi where metode_pembayaran='Cash Admin Coll'");
					echo mysqli_num_rows($jumlah_cac);
					?>, 
					<?php 
					$jumlah_ap = mysqli_query($con,"select * from transaksi where metode_pembayaran='ATM PAYMENT'");
					echo mysqli_num_rows($jumlah_ap);
					?>, 
					<?php 
					$jumlah_tpcp = mysqli_query($con,"select * from transaksi where metode_pembayaran='Third Party Cash Payment'");
					echo mysqli_num_rows($jumlah_tpcp);
					?>,
          <?php 
					$jumlah_trf = mysqli_query($con,"select * from transaksi where metode_pembayaran='Transfer'");
					echo mysqli_num_rows($jumlah_trf);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(26, 236, 19, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
          'rgba(135, 19, 236, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(26, 236, 19, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
          'rgba(135, 19, 236, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
  //GRAFIK 2
    var ctx = document.getElementById("myGrafik2").getContext('2d');
		var myGrafik2 = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Cash", "Cash Admin Coll", "ATM PAYMENT", "Third Party Cash Payment", "Transfer"],
				datasets: [{
					label: 'Grafik Total Biaya Admin Pada Setiap Metode Pembayaran Rp',
					data: [
					<?php 
					$jumlah_cash = mysqli_query($con,"select SUM(biaya_admin) AS Total_Admin from transaksi where metode_pembayaran='Cash'");
					$total_admin = mysqli_fetch_array($jumlah_cash);
          $total_admin = $total_admin['Total_Admin'];
          echo $total_admin;
					?>, 
					<?php 
					$jumlah_cac = mysqli_query($con,"select SUM(biaya_admin) AS Total_Admin from transaksi where metode_pembayaran='Cash Admin Coll'");
					$total_cac = mysqli_fetch_array($jumlah_cac);
          $total_cac = $total_cac['Total_Admin'];
          echo $total_cac;
					?>, 
					<?php 
					$jumlah_ap = mysqli_query($con,"select SUM(biaya_admin) AS Total_Admin from transaksi where metode_pembayaran='ATM PAYMENT'");
					$total_ap = mysqli_fetch_array($jumlah_ap);
          $total_ap = $total_ap['Total_Admin'];
          echo $total_ap;
					?>, 
					<?php 
					$jumlah_tpcp = mysqli_query($con,"select SUM(biaya_admin) AS Total_Admin from transaksi where metode_pembayaran='Third Party Cash Payment'");
					$total_tpcp = mysqli_fetch_array($jumlah_tpcp);
          $total_tpcp = $total_tpcp['Total_Admin'];
          echo $total_tpcp;
					?>,
          <?php 
					$jumlah_trf = mysqli_query($con,"select SUM(biaya_admin) AS Total_Admin from transaksi where metode_pembayaran='Transfer'");
					$total_trf = mysqli_fetch_array($jumlah_trf);
          $total_trf = $total_trf['Total_Admin'];
          echo $total_trf;
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(26, 236, 19, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
          'rgba(135, 19, 236, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(26, 236, 19, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
          'rgba(135, 19, 236, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
        

      </div>

      <h2>Data Transaksi</h2>
      <div class="table table-bordered">
        <table class="table table-striped table-sm">
       
          <thead class="thead-dark">
            <tr>
              <th scope="col">No Kwitansi</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Tanggal Alokasi</th>
              <th scope="col">Customer</th>
              <th scope="col">Metode Pembayaran</th>
              <th scope="col">Total</th>
              <th scope="col">Biaya Admin</th>
              <th scope="col">Keterangan</th>
            </tr>
          </thead>
          
            <tbody>
            <?php 
          if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
                }
                $limit_display = 20;

                $offset = ($page_no-1) * $limit_display;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2";

            $result = mysqli_query($con,"SELECT COUNT(*) As all_records FROM transaksi");
            $total_records = mysqli_fetch_array($result);
            $total_records = $total_records['all_records'];
            $total_page = ceil($total_records/$limit_display);
            $second_last = $total_page - 1;
            $result = mysqli_query(
              $con,
              "SELECT * FROM transaksi LIMIT $offset, $limit_display"
              );
          while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
              <td><?php echo $data['nokwitansi']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['tanggal_alokasi']; ?></td>
              <td><?php echo $data['customer']; ?></td>
              <td><?php echo $data['metode_pembayaran']; ?></td>
              <td><?php echo $data['total']; ?></td>
              <td><?php echo $data['biaya_admin']; ?></td>
              <td>######</td>
              <!-- <td><a href="download.php?filename=<?=$data['nama_file']?>" class="btn btn-primary"> Download </a></td> -->
            </tr>
            
            <?php
                  }
          mysqli_close($con);
          
          ?>
          

          </tbody>
        </table>
        
        <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
        <strong>Page <?php echo $page_no." of ".$total_page; ?></strong>
        </div>
    <nav>
        <ul class="pagination">
          <?php if($page_no > 1){
          echo "<li><a href='?page_no=1'>First Page</a></li>";
          } ?>
              
          <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
          <a <?php if($page_no > 1){
          echo "href='?page_no=$previous_page'";
          } ?>>Previous</a>
          </li>
              
          <li <?php if($page_no >= $total_page){
          echo "class='disabled'";
          } ?>>
          <a <?php if($page_no < $total_page) {
          echo "href='?page_no=$next_page'";
          } ?>>Next</a>
          </li>

          <?php if($page_no < $total_page){
          echo "<li><a href='?page_no=$total_page'>Last &rsaquo;&rsaquo;</a></li>";
          } 
          if ($total_page <= 10){  	 
            for ($counter = 1; $counter <= $total_page; $counter++){
            if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
                    }else{
                  echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                          }
                  }
          }elseif ($total_page > 10){
            // Here we will add further conditions
            if($page_no <= 4) {			
              for ($counter = 1; $counter < 8; $counter++){		 
               if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";	
                 }else{
                        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                             }
             }
             echo "<li><a>...</a></li>";
             echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
             echo "<li><a href='?page_no=$total_page'>$total_page</a></li>";
             }elseif($page_no > 4 && $page_no < $total_page - 4) {		 
              echo "<li><a href='?page_no=1'>1</a></li>";
              echo "<li><a href='?page_no=2'>2</a></li>";
              echo "<li><a>...</a></li>";
              for (
                   $counter = $page_no - $adjacents;
                   $counter <= $page_no + $adjacents;
                   $counter++
                   ) {		
                   if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";	
                }else{
                      echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }                  
                     }
              echo "<li><a>...</a></li>";
              echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
              echo "<li><a href='?page_no=$total_page'>$total_page</a></li>";
              }else {
                echo "<li><a href='?page_no=1'>1</a></li>";
                echo "<li><a href='?page_no=2'>2</a></li>";
                echo "<li><a>...</a></li>";
                for (
                     $counter = $total_page - 6;
                     $counter <= $total_page;
                     $counter++
                     ) {
                     if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";	
                  }else{
                        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }                   
                     }
                }
            }
          ?>
          </ul>
		  </nav>

      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      
    </body>
</html>
