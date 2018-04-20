<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sneaker_shopdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = array();

  $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 3";
  $objQuerySQL = $conn->query($sql);

  $i = 1;
  while($info = $objQuerySQL->fetch_assoc()) {
    $sql1 = "SELECT * FROM product_pic";
    $objQuerySQL1 = $conn->query($sql1);
    while($pic = $objQuerySQL1->fetch_assoc()){
      if($info["P_ID"] == $pic["P_ID"]){
        $i = (int )$info["P_ID"];
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
        <div class="block2">
        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
        <img src=" images/Product/pro<?php echo $i; ?>/<?php echo $pic["PIC_PATH"]; ?>" alt="IMG-PRODUCT">

        <div class="block2-overlay trans-0-4">';
        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
        </a>

        <div class="block2-btn-addcart w-size1 trans-0-4">

        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
        Add to Cart
        </button>
        </div>
        </div>
        </div>

        <div class="block2-txt p-t-20">

      <form action="cart.php" method="get">
        <?php $val1 = $info["P_NAME"]; ?>
          <a href="product-detail.php?value_key=<?php echo $info["P_ID"]; ?>" class="block2-name dis-block s-text3 p-b-5">
            <?php echo $info["P_NAME"]; ?>
         </a>
      </form>

      <span class="block2-price m-text6 p-r-5">

      <?php
        echo $info["P_PRICE"];
        ?>
        </span>
        </div>
        </div>
        </div>

      <?php
        $i++;
        break;
      }
    }
  }
$conn->close();
?>
