<?php
    // moves data from the products table to the website
    $category_id = $product['categoryID'];
    $product_code = $product['productCode'];
    $product_name = $product['productName'];
    $description = $product['productDesc'];
    $list_price = $product['listPrice'];
    $discount_percent = $product['discountPercent'];


    // Calculate discounts
    $discount_amount = round($list_price * ($discount_percent / 100), 2);
    $unit_price = $list_price - $discount_amount;

    // Format discounts
    $discount_percent_f = number_format($discount_percent, 0);
    $discount_amount_f = number_format($discount_amount, 2);
    $unit_price_f = number_format($unit_price, 2);

    // add image path
    $image_filename = $product_code . '.png';
    $image_path = 'https://localhost/rock/image/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>


<div >
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" style="width: 300px; height: auto;margin: 50px 0px 0px 0px;" /></p>
</div>


<div >
	<h1 style="margin: 0px;"><?php echo $product_name; ?></h1>
    <p><b>List Price:</b>
        <?php echo '$' . $list_price; ?></p>
    <p><b>Discount:</b>
        <?php echo $discount_percent_f . '%'; ?></p>
    <p><b>Your Price:</b>
        <?php echo '$' . $unit_price_f; ?>
        (You save
        <?php echo '$' . $discount_amount_f; ?>)</p>
    <form action="<?php echo $app_path . 'cart' ?>" method="get" 
          id="add_to_cart_form">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="product_id"
               value="<?php echo $product_id; ?>" />
        <b>Quantity:</b>&nbsp;
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>
    <h2 class="no_bottom_margin">Description</h2>
    <?php echo $description; ?>
</div>
