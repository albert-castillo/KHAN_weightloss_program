<?php
function add_daily($patient_id, $patientDate, $distance,
                     $sleep, $calBurn, $active, $calIntake,
                     $bloodPre, $activeSmoker, $bmi) {
    global $db;
    $query = '
        INSERT INTO patientDaily (patientID, patientDate, distance,
                               sleep, calBurn, active, calIntake, 
                               bloodPre, actSmoker, bmi)
        VALUES (:patient_id, :patientDate, :distance,
                :sleep, :calBurn, :active, :calIntake, 
                :bloodPre, :activeSmoker, :bmi)';
    $statement = $db->prepare($query);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->bindValue(':patientDate', $patientDate);
    $statement->bindValue(':distance', $distance);
    $statement->bindValue(':sleep', $sleep);
    $statement->bindValue(':calBurn', $calBurn);
    $statement->bindValue(':active', $active);
    $statement->bindValue(':calIntake', $calIntake);
    $statement->bindValue(':bloodPre', $bloodPre);
    $statement->bindValue(':activeSmoker', $activeSmoker);
    $statement->bindValue(':bmi', $bmi);
    $statement->execute();
    $daily_id = $db->lastInsertId();
    $statement->closeCursor();
    return $daily_id;
}

function get_daily($daily_id) {
    global $db;
    $query = 'SELECT * FROM patientDaily WHERE dailyID = :daily_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':daily_id', $daily_id);
    $statement->execute();
    $daily = $statement->fetch();
    $statement->closeCursor();
    return $daily;
}

function update_daily ($daily_id, $patientDate, $distance,
                        $sleep, $calBurn, $active, $calIntake,
                        $bloodPre, $activeSmoker, $bmi) {
    global $db;
    $query = '
        UPDATE patientDaily
        SET patientDate = :patientDate,
            distance = :distance,
            sleep = :sleep,
            calBurn = :calBurn,
            active = :active,
            calIntake = :calIntake,
            bloodPre = :bloodPre,
            actSmoker = :activeSmoker,
            bmi = :bmi
        WHERE dailyID = :daily_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':daily_id', $daily_id);
    $statement->bindValue(':patientDate', $patientDate);
    $statement->bindValue(':distance', $distance);
    $statement->bindValue(':sleep', $sleep);
    $statement->bindValue(':calBurn', $calBurn);
    $statement->bindValue(':active', $active);
    $statement->bindValue(':calIntake', $calIntake);
    $statement->bindValue(':bloodPre', $bloodPre);
    $statement->bindValue(':activeSmoker', $activeSmoker);
    $statement->bindValue(':bmi', $bmi);
    $statement->execute();
    $statement->closeCursor();
}


?>