<?php include '../view/header.php'; ?>

<main style="top:64;">
<div style="top:64px;">
    <a href="http://localhost/\KHAN/account">
        <button class="button button2"><h3>Log In</h3></button>
    </a>
</div>
<br><br><br><br>

<div>
    <a href="http://localhost/\KHAN/account">
        <button class="button button2"><h3>Select Patient</h3></button>
    </a>
</div>
<br><br>

<div>
    <a href="http://localhost/\KHAN/account">
        <button class="button button2"><h3>Register Patient</h3></button>
    </a>
</div>
<br><br>

<div>
    <a href="http://localhost/\KHAN/account">
        <button class="button button2"><h3>General Graphs</h3></button>
    </a>
</div>
<br>

<div>
    <h1 align="center">My Account</h1>
</div>


<div>

<div class="row" >
	<div class="column" style="display: flex;align-items: center;justify-content: center;">
		<img src="https://localhost/KHAN/images/1.jpg" alt="pully"  style="border-radius:50%;width:50%;height:110%;transform:scaleX(-1)">
	</div>
	<div class="column">


<h2>Personal Info</h2>

<p><?php echo $customer_name; ?></p>
<p><?php echo $email ; ?></p>

<p><?php echo htmlspecialchars($shipping_address['line1']); ?><br>
    <?php if ( strlen($shipping_address['line2']) > 0 ) : ?>
        <?php echo htmlspecialchars($shipping_address['line2']); ?><br>
    <?php endif; ?>
    <?php echo htmlspecialchars($shipping_address['city']); ?>, <?php 
          echo htmlspecialchars($shipping_address['state']); ?>
    <?php echo htmlspecialchars($shipping_address['zipCode']); ?><br>
    <?php echo htmlspecialchars($shipping_address['phone']); ?>
</p>
		
		</div>
		<div class="column">

            <h2>Adjust Personal Info</h2>

            <form action="." method="post">
            <input type="hidden" name="action" value="view_account_edit">
            <input type="submit" value="Edit Account">
            </form>
            <br>
            <form action="." method="post">
             <input type="hidden" name="action" value="view_address_edit">
            <input type="hidden" name="address_type" value="shipping">
            <input type="submit" value="Edit Personal Info">
            </form>

	        <br>
	        <a href="<?php echo '?action=logout'; ?>" > <button>Log out</button></a>

		</div>
		</div>




    
</div>
</main>

<?php include '../view/footer.php'; ?>
