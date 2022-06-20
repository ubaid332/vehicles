<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']['id']) ||(trim ($_SESSION['user']['id']) == '')){
	header('location:index.php');
}

include_once('Vehicle.php');

$vehicle = new Vehicle();

//fetch vehicle data
if(!isset($_GET['id']))
die("Without ID or direct access is not allowed on this spage");

$sql = "SELECT * FROM vehicles WHERE id = $_GET[id]";
$row = $vehicle->fetchSingle($sql);

require_once('includes/header.php');
?> <body> <?php require_once('includes/top-nav.php'); ?> <div class="container-fluid">
    <div class="row"> <?php require_once('includes/sidebar.php'); ?> <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Vehicle Detail</h2>
        <!-- Portfolio Item Heading -->
        <h1 class="my-4">2022 Chevrolet Traverse High Country </h1>
        <!-- Portfolio Item Row -->
        <div class="row">
          <div class="col-md-8">
            <img class="img-fluid" src="
							<?php echo $row['image'] ?>" alt="
							<?php echo $row['title'] ?>">
          </div>
          <div class="col-md-4">
            <h3 class="my-3">Pricing Details</h3>
            <div class="d-flex">
              <div class="p-2">Retail Price</div>
              <div class="p-2">$ <?php echo $row['retail_price'] ?> </div>
            </div>
            <div class="d-flex">
              <div class="p-2">Savings Up To:</div>
              <div class="p-2">$ <?php echo $row['savings'] ?> </div>
            </div>
            <h3 class="my-3">Project Details</h3>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Incentive</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <h4>Chevrolet Consumer Cash Program </h4>
                  </td>
                  <td>
                    <h3>$1,000.00</h3>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Chevrolet Consumer Cash Program </h4>
                  </td>
                  <td>
                    <h3>$1,000.00</h3>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.row -->
        <!-- Related Projects Row -->
        <h3 class="my-4">Related Vehicles</h3>
        <div class="row"> <?php
            //fetch vehicle data
            $sql = "SELECT * FROM vehicles";
            $data = $vehicle->fetchAll($sql);
            foreach($data as $each){
        ?> <div class="col-md-3 col-sm-6 mb-4">
            <a href="vehicle-single.php?id=
								<?php echo $each['id'] ?>">
              <img class="img-fluid" src="
									<?php echo $each['image'] ?>" alt="
									<?php echo $each['title'] ?>">
            </a>
          </div> <?php
            }
        ?> </div>
        <!-- /.row -->
    </div> <?php require_once('includes/footer.php'); ?>