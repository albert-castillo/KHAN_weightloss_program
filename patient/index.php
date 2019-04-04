<?php
require_once('../util/main.php');
require_once('util/secure_conn.php');

require_once('model/patient_db.php'); //changed to patient
require_once('model/patientAddress_db.php'); //changed to patient's address
require_once('model/patientStatic_db.php'); //added patient's non changing info

require_once('model/fields.php');
require_once('model/validate.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'view_login';
        if (isset($_SESSION['user'])) {
            $action = 'view_account';
        }
    }
}

// Set up all possible fields to validate
$validate = new Validate();
$fields = $validate->getFields();

// for the Registration page and other pages
$fields->addField('email', 'Must be valid email.');
$fields->addField('password_1');
$fields->addField('password_2');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('ship_line1');
$fields->addField('ship_line2');
$fields->addField('ship_city');
$fields->addField('ship_state');
$fields->addField('ship_zip');
$fields->addField('ship_phone');

$fields->addField('startDate');
$fields->addField('age');
$fields->addField('gender');
$fields->addField('race');
$fields->addField('occupation');
$fields->addField('height');
$fields->addField('weight');
$fields->addField('diabetic');
$fields->addField('aci');
$fields->addField('chol');
$fields->addField('startBlood');
$fields->addField('smokerHistory');
$fields->addField('startBmi');
$fields->addField('preExist1');
$fields->addField('preExist2');
$fields->addField('preExist3');
$fields->addField('startCalInt');
$fields->addField('startCalBurn');




// for the Login page
$fields->addField('password');

// for the Edit Address page
$fields->addField('line1');
$fields->addField('line2');
$fields->addField('city');
$fields->addField('state');
$fields->addField('zip');
$fields->addField('phone');

switch ($action) {
    case 'view_register':
        // Clear user data
        $email = '';
        $first_name = '';
        $last_name = '';
        $ship_line1 = '';
        $ship_line2 = '';
        $ship_city = '';
        $ship_state = '';
        $ship_zip = '';
        $ship_phone = '';


        $startDate
        $age
        $gender
        $race
        $occupation
        $height
        $weight
        $diabetic
        $aci
        $chol
        $startBlood
        $smokerHistory
        $startBmi
        $preExist1
        $preExist2
        $preExist3
        $startCalInt
        $startCalBurn


        
        
        include 'patient_register.php';
        break;
    case 'register':
        // Store user data in local variables
        $email = filter_input(INPUT_POST, 'email');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $ship_line1 = filter_input(INPUT_POST, 'ship_line1');
        $ship_line2 = filter_input(INPUT_POST, 'ship_line2');
        $ship_city = filter_input(INPUT_POST, 'ship_city');
        $ship_state = filter_input(INPUT_POST, 'ship_state');
        $ship_zip = filter_input(INPUT_POST, 'ship_zip');
        $ship_phone = filter_input(INPUT_POST, 'ship_phone');
        
        
        // Validate user data       
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, true, 6, 30);
        $validate->text('password_2', $password_2, true, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);
        $validate->text('ship_line1', $ship_line1);        
        $validate->text('ship_line2', $ship_line2, false);        
        $validate->text('ship_city', $ship_city);        
        $validate->text('ship_state', $ship_state);        
        $validate->text('ship_zip', $ship_zip);        
        $validate->text('ship_phone', $ship_phone, false);        
        
        
        

        // If validation errors, redisplay Register page and exit controller
        if ($fields->hasErrors()) {
            include 'patient/patient_register.php';
            break;
        }

        // If passwords don't match, redisplay Register page and exit controller
        if ($password_1 !== $password_2) {
            $password_message = 'Passwords do not match.';
            include 'patient/patient_register.php';
            break;
        }

        // Validate the data for the customer
        if (is_valid_customer_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        
        // Add the customer data to the database
        $customer_id = add_customer($email, $first_name,
                                    $last_name, $password_1);

        // Add the shipping address
        $shipping_id = add_address($customer_id, $ship_line1, $ship_line2,
                                   $ship_city, $ship_state, $ship_zip,
                                   $ship_phone);
        customer_change_shipping_id($customer_id, $shipping_id);

        

        // Store user data in session
        $_SESSION['user'] = get_customer($customer_id);
        
               
        break;
    case 'view_login':
        // Clear login data
        $email = '';
        $password = '';
        $password_message = '';
        
        include 'patient_login_register.php';
        break;
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        
        // Validate user data
        $validate->email('email', $email);
        $validate->text('password', $password, true, 6, 30);        

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'patient/patient_login_register.php';
            break;
        }
        
        // Check email and password in database
        if (is_valid_customer_login($email, $password)) {
            $_SESSION['user'] = get_customer_by_email($email);
        } else {
            $password_message = 'Login failed. Invalid email or password.';
            include 'patient/patient_login_register.php';
            break;
        }

           
        break;
    case 'view_account':
        $customer_name = $_SESSION['user']['firstName'] . ' ' .
                         $_SESSION['user']['lastName'];
        $email = $_SESSION['user']['emailAddress'];        

        $shipping_address = get_address($_SESSION['user']['shipAddressID']);
        $billing_address = get_address($_SESSION['user']['billingAddressID']);        

               
        include 'patient_view.php';
        break;
    case 'view_order':
        $order_id = filter_input(INPUT_GET, 'order_id', FILTER_VALIDATE_INT);
        $order = get_order($order_id);
        $order_date = strtotime($order['orderDate']);
        $order_date = date('M j, Y', $order_date);
        $order_items = get_order_items($order_id);

        $shipping_address = get_address($order['shipAddressID']);
        $billing_address = get_address($order['billingAddressID']);
        
        include 'patient_view_order.php';
        break;
    case 'view_account_edit':
        $email = $_SESSION['user']['emailAddress'];
        $first_name = $_SESSION['user']['firstName'];
        $last_name = $_SESSION['user']['lastName'];
        $shipping_id = $_SESSION['user']['shipAddressID'];
        $billing_id = $_SESSION['user']['billingAddressID'];

        $password_message = '';        

        include 'patient_edit.php';
        break;
    case 'update_account':
        // Get the customer data
        $customer_id = $_SESSION['user']['customerID'];
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $password_message = '';

        // Get the old data for the customer
        $old_customer = get_customer($customer_id);

        // Validate user data
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, false, 6, 30);
        $validate->text('password_2', $password_2, false, 6, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);        
        
        // Check email change and display message if necessary
        if ($email != $old_customer['emailAddress']) {
            display_error('You can\'t change the email address for an account.');
        }

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'patient/patient_edit.php';
            break;
        }
        
        // Only validate the passwords if they are NOT empty
        if (!empty($password_1) && !empty($password_2)) {            
            if ($password_1 !== $password_2) {
                $password_message = 'Passwords do not match.';
                include 'patient/patient_edit.php';
                break;
            }
        }

        // Update the customer data
        update_customer($customer_id, $email, $first_name, $last_name,
            $password_1, $password_2);

        // Set the new customer data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
    case 'view_address_edit':
        // Set up variables for address type
        
            $address_id = $_SESSION['user']['shipAddressID'];
            $heading = 'Update Shipping Address';
        

        // Get the data for the address
        $address = get_address($address_id);
        $line1 = $address['line1'];
        $line2 = $address['line2'];
        $city = $address['city'];
        $state = $address['state'];
        $zip = $address['zipCode'];
        $phone = $address['phone'];

        // Display the data on the page
        include 'address_edit.php';
        break;
    case 'update_address':
        $customer_id = $_SESSION['user']['customerID'];
    
        // Set up variables for address type
        
            $address_id = $_SESSION['user']['shipAddressID'];
            $heading = 'Update Shipping Address';
        

        // Get the post data
        $line1 = filter_input(INPUT_POST, 'line1');
        $line2 = filter_input(INPUT_POST, 'line2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone = filter_input(INPUT_POST, 'phone');

        // Validate the data
        $validate->text('line1', $line1);        
        $validate->text('line2', $line2, false);        
        $validate->text('city', $city);        
        $validate->text('state', $state);        
        $validate->text('zip', $zip);        
        $validate->text('phone', $phone, false);        

        // If validation errors, redisplay Login page and exit controller
        if ($fields->hasErrors()) {
            include 'patient/address_edit.php';
            break;
        }
        
        
        // Add the new address
        $address_id = add_address($customer_id, $line1, $line2, $city,
                                   $state, $zip, $phone);

        // Relate the address to the customer account
        
            customer_change_shipping_id($customer_id, $address_id);
        

        // Set the user data in the session
        $_SESSION['user'] = get_customer($customer_id);

        redirect('.');
        break;
    case 'logout':
        unset($_SESSION['user']);
        redirect('../');
        break;
    default:
        display_error("Unknown account action: " . $action);
        break;
}
?>