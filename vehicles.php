<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']['id']) ||(trim ($_SESSION['user']['id']) == '')){
	header('location:index.php');
}

include_once('Vehicle.php');

$vehicle = new Vehicle();

//fetch vehicle data
$sql = "SELECT * FROM vehicles";
$data = $vehicle->fetchAll($sql);
require_once('includes/header.php');
?>

  <body>
  <?php require_once('includes/top-nav.php'); ?>

    <div class="container-fluid">
      <div class="row">
      <?php require_once('includes/sidebar.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
         
        <h2>Vehicles</h2>
      <div class="card-deck">
        
        <?php 
          foreach($data as $each){
        ?>
        <div class="card" style="width: 18rem;">
          <img src="<?php echo $each['image'] ?>" class="card-img-top" alt="2022 Chevrolet Traverse High Country">
          <div class="card-body">
            <h5 class="card-title"><?php echo $each['title'] ?></h5>
            <div class="row">
              <div class="col-lg-6">Condition:</div>
              <div class="col-lg-6"><?php echo $each['v_condition'] ?></div>
            </div>
            <div class="row">
              <div class="col-lg-6">Retail Price:</div>
              <div class="col-lg-6">$<?php echo $each['retail_price'] ?></div>
            </div>
            <div class="row">
              <div class="col-lg-6">Savings Up To:</div>
              <div class="col-lg-6">$<?php echo $each['savings'] ?></div>
            </div>
            <div class="row">
              <div class="col-lg-6">Sales Price:</div>
              <div class="col-lg-6">$<?php echo $each['sale_price'] ?></div>
            </div>
            <div class="row">
              <div class="col-lg-6">Stock #:</div>
              <div class="col-lg-6">$<?php echo $each['stock'] ?></div>
            </div>
            <div class="row">
              <div class="col-lg-6">Mileage:</div>
              <div class="col-lg-6"><?php echo $each['mileage'] ?></div>
            </div>
            <a href="vehicle-single.php?id=<?php echo $each['id'] ?>" class="btn btn-primary">Click for Detail</a>
          </div>
        </div>
        <?php } ?>
       
        </main>
      </div>
    </div>

    <?php require_once('includes/footer.php'); ?>