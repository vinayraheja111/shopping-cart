<!DOCTYPE html>

<html>

<head>

  <title>Shopping Cart</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="cart.css">

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css');?>">

</head>

<body>


<div class="container">

<a href="<?php echo base_url('cart');?>" class="cart-link" title="view cart">
  <i class="fa fa-shopping-cart" style="font-size:30px;color:red;float:right;margin-top: 5px;"><span>(<?php echo $this->cart->total_items();?>)</span></i>
 
</a>

  <h1>Shopping Cart</h1>


  

  <div class="cart">

    <div class="products">

       <!-- <?php print_r($pro);?> --> 
      <?php
                  if(count($pro)):
                  
                  foreach($pro as $row):
                  ?>

      <div class="product">

        <img src="<?php echo base_url('assets/images/' .$row->image);?>">

        <div class="product-info">

          <h3 class="product-name"><?php echo $row->name;?></h3>

          <h4 class="product-price">₹<?php echo $row->price ."/-";?> </h4>

          <h4 class="product-offer">50%</h4>

          <p class="product-quantity">Qnt: <input value="1" name="">

            <a href="<?php echo base_url('products/addtocart/'.$row->id); ?>" style="">add to cart</a>

          <p class="product-remove">

            <i class="fa fa-trash" aria-hidden="true"></i>

            <span class="remove">Remove</span>

          </p>

        </div>


      </div>
      <?php 
                    //$cnt=$cnt+1;
                    endforeach;
                    else:
                    ?>
                    <!-- <tr> -->
                    <!-- <td colspan="5" style="color:red; text-align:center">No Record found</td> -->
                    <!-- </tr> -->
                    <?php endif;?>


    </div>   



    <div class="cart-total">

      <p>

        <span>Total Price</span>

        <span>₹ 3,000</span>

      </p>

      <p>

        <span>Number of Items</span>

        <span>2</span>

      </p>

      <p>

        <span>You Save</span>

        <span>₹ 1,000</span>

      </p>

      <a href="#">Proceed to Checkout</a>

    </div>



  </div>
 
 

</div>



</body>

</html>


