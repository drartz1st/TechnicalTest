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
    <title>Web Sertifikat UCA</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">UCA Webinar</a>
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
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Integrations
            </a>
          </li> -->
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <!-- <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul> -->
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" id="Dashboard">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>

      <h2>Data Transaksi</h2>
      <div class="table table-bordered">
        <table class="table table-striped table-sm">
       
          <thead class="thead-dark">
            <tr>
            <th scope="col">#No</th>
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
            <tbody>
            <tr>
              <td><?php echo $nomor++; ?></td>
              <td><?php echo $data['nokwitansi']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['tanggal_alokasi']; ?></td>
              <td><?php echo $data['customer']; ?></td>
              <td><?php echo $data['metode_pembayaran']; ?></td>
              <td><?php echo $data['total']; ?></td>
              <td><?php echo $data['biaya_admin']; ?></td>
              <!-- <td><a href="download.php?filename=<?=$data['nama_file']?>" class="btn btn-primary"> Download </a></td> -->
            </tr>
            <?php
                  }
          mysqli_close($con);

          // $limit = 25;
          // $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          // $firstpage = ($page>1) ? ($page * $limit) - $limit : 0;

          // $previous = $page - 1;
          // $next = $page + 1;

          // $result = mysqli_query($con,"SELECT * FROM transaksi");
          // $jumlah_data = mysqli_num_rows($result);
          // $total_page = ceil($jumlah_data/$limit); 
                     
          // $query = mysqli_query($con,"select * from transaksi LIMIT $firstpage, $limit");
          // $nomor =$firstpage+1;
        
          while ($data = mysqli_fetch_assoc($query)) {
          ?>
          <tbody>
            <tr>
              <td><?php echo $nomor++; ?></td>
              <td><?php echo $data['nokwitansi']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['tanggal_alokasi']; ?></td>
              <td><?php echo $data['customer']; ?></td>
              <td><?php echo $data['metode_pembayaran']; ?></td>
              <td><?php echo $data['total']; ?></td>
              <td><?php echo $data['biaya_admin']; ?></td>
              <!-- <td><a href="download.php?filename=<?=$data['nama_file']?>" class="btn btn-primary"> Download </a></td> -->
            </tr>

          <?php               
            } 
          ?>

          </tbody>
        </table>
        <nav>
			<ul class="d-flex align-content-center flex-wrap pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($page > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_page;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($page < $total_page) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
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
