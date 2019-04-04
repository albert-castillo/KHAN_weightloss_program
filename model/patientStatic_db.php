<?php
function add_static($patient_id, $startDate, $age,
        $gender, $race, $occupation, $height, $weight, 
        $diabetic, $aci, $chol, $startBlood, $smokeHistory, 
        $startBmi, $preExist1, $preExist2, $preExist3, 
        $startCalInt, $startCalBurn) {
    global $db;
    $query = '
        INSERT INTO patientStatic (patientID, patientStrDate, age, gender, 
        race, occupation, height, weight, diabetic, 
        aicLevel, cholesterol, strBloodPre, smokerHis, 
        strBmi, preExistCon1, preExistCon2, preExistCon3, 
        strCalInt, strCalBurn)
        VALUES (:patient_id, :startDate, :age,:gender, 
        :race, :occupation, :height, :weight, :diabetic, :aci, :chol, 
        :startBlood, :smokerHistory, :startBmi, :preExist1, :preExist2, 
        :preExist3, :startCalInt, :startCalBurn)';
    $statement = $db->prepare($query);
    $statement->bindValue(':patient_id', $patient_id);
    $statement->bindValue(':startDate', $startDate);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':race', $race);
    $statement->bindValue(':occupation', $occupation);
    $statement->bindValue(':height', $height);
    $statement->bindValue(':weight', $weight);
    $statement->bindValue(':diabetic', $diabetic);
    $statement->bindValue(':aci', $aci);
    $statement->bindValue(':chol', $chol);
    $statement->bindValue(':startBlood', $startBlood);
    $statement->bindValue(':smokerHistory', $smokerHistory);
    $statement->bindValue(':startBmi', $startBmi);
    $statement->bindValue(':preExist1', $preExist1);
    $statement->bindValue(':preExist2', $preExist2);
    $statement->bindValue(':preExist3', $preExist3);
    $statement->bindValue(':startCalInt', $startCalInt);
    $statement->bindValue(':startCalBurn', $startCalBurn);
    $statement->execute();
    $static_id = $db->lastInsertId();
    $statement->closeCursor();
    return $static_id;
}

function get_static($static_id) {
    global $db;
    $query = 'SELECT * FROM patientStatic WHERE staticID = :static_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':static_id', $static_id);
    $statement->execute();
    $static = $statement->fetch();
    $statement->closeCursor();
    return $static;
}

function update_address ($static_id, $startDate, $age,
$gender, $race, $occupation, $height, $weight, 
$diabetic, $aci, $chol, $startBlood, $smokeHistory, 
$startBmi, $preExist1, $preExist2, $preExist3, 
$startCalInt, $startCalBurn) {
    global $db;
    $query = '
        UPDATE patientStatic
        SET patientStrDate = :startDate,
            age = :age,
            gender = :gender,
            race = :race,
            occupation = :occupation,
            height = :height,
            weight = :weight,
            diabetic = :diabetic,
            aicLevel = :aci,
            cholesterol = :chol,
            strBloodPre = :startBlood,
            smokerHis = :smokerHistory,
            strBmi = :startBmi,
            preExistCon1 = :preExist1,
            preExistCon2 = :preExist2,
            preExistCon3 = :preExist3,
            strCalInt = :startCalInt,
            strCalBurn = :startCalBurn

        WHERE staticID = :static_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':static_id', $static_id);
    $statement->bindValue(':startDate', $startDate);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':race', $race);
    $statement->bindValue(':occupation', $occupation);
    $statement->bindValue(':height', $height);
    $statement->bindValue(':weight', $weight);
    $statement->bindValue(':diabetic', $diabetic);
    $statement->bindValue(':aci', $aci);
    $statement->bindValue(':chol', $chol);
    $statement->bindValue(':startBlood', $startBlood);
    $statement->bindValue(':smokerHistory', $smokerHistory);
    $statement->bindValue(':startBmi', $startBmi);
    $statement->bindValue(':preExist1', $preExist1);
    $statement->bindValue(':preExist2', $preExist2);
    $statement->bindValue(':preExist3', $preExist3);
    $statement->bindValue(':startCalInt', $startCalInt);
    $statement->bindValue(':startCalBurn', $startCalBurn);
    $statement->execute();
    $statement->closeCursor();
}


?>