<?php
function add_address($patient_id, $line1, $line2,
                     $city, $state, $zip_code, $phone) {
    global $db;
    $query = '
        INSERT INTO patientAddresses (patientID, line1, line2,
                               city, state, zipCode, phone)
        VALUES (:patient_id, :line1, :line2,
                :city, :state, :zip_code, :phone)';
    $statement = $db->prepare($query);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->bindValue(':line1', $line1);
    $statement->bindValue(':line2', $line2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip_code', $zip_code);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $address_id = $db->lastInsertId();
    $statement->closeCursor();
    return $address_id;
}

function get_address($address_id) {
    global $db;
    $query = 'SELECT * FROM patientAddresses WHERE addressID = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->execute();
    $address = $statement->fetch();
    $statement->closeCursor();
    return $address;
}

function update_address ($address_id, $line1, $line2,
                         $city, $state, $zip_code, $phone) {
    global $db;
    $query = '
        UPDATE patientAddresses
        SET line1 = :line1,
            line2 = :line2,
            city = :city,
            state = :state,
            zipCode = :zip_code,
            phone = :phone
        WHERE addressID = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':line1', $line1);
    $statement->bindValue(':line2', $line2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip_code', $zip_code);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $statement->closeCursor();
}


?>