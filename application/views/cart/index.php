<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// Update item quantity
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
	<title>Shopping Cart</title>
</head>
<body>

<h1>SHOPPING CART</h1>
<table class="table table-striped">
<thead>
    <tr>
        <th width="10%"></th>
        <th width="30%">Product</th>
        <th width="15%">Price</th>
        <th width="13%">Quantity</th>
        <th width="20%" class="text-center">Subtotal</th>
        <th width="12%" class="text-center">Action</th>
    </tr>
</thead>
  <tbody>
  	<?php if($this->cart->total_items() > 0 ){foreach($cartitem as $item){?>
  		<tr>
  			<td>
  				<?php $imageurl = !empty($item['image'])?base_url('assets/images/'.$item['image']):base_url('assets/image/demo.jpg');?>
  				<img src ="<?php echo $imageurl;?>" width="50">
  			</td>
  			<td><?php echo $item['name'];?></td>
  			<td><?php echo $item['price'];?></td>
  			<td><input type="number" name="" class="form-control text-center" value="<?php echo $item['qty'];?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
  			<td class="text-center"><?php echo $item['subtotal'];?></td>
  			        <td class="text-center"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;"><i class="glyphicon glyphicon-trash"></i> </button> </td>
  			   </tr>
    <?php } }else{ ?>
    <tr><td colspan="6"><p>Your cart is empty.....</p></td>
    <?php } ?>
    <?php if($this->cart->total_items() > 0){ ?>
    	<tr>
        <td><a href="<?php echo base_url('Products/');?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Continoue shopping</a></td>
        <td></td>
        <td></td>
        <td><strong>Cart Total</strong></td>
        <td class="text-center"><strong><?php echo '$'.$this->cart->total().' USD'; ?></strong></td>
        <td><a href="<?php echo base_url('Checkout/');?>" class="btn btn-success">Checkout<i class="glyphicon glyphicon-menu-right"></i></a></td>
    </tr>
    <?php } ?>

</body>
</html>