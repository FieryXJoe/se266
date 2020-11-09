<?php

    include (__DIR__ . '/db.php');
    
    
    function getPatients () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY id"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }
   
    function addPatient($first, $last, $married, $birthDate) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO patients SET patientFirstName = :patientFirstName,
         patientLastName = :patientLastName, patientMarried = :patientMarried, patientBirthDate = :patientBirthDate");
       
        $stmt->bindValue(':patientFirstName', $first);
        $stmt->bindValue(':patientLastName', $last);
        $stmt->bindValue(':patientMarried', $married);
        $stmt->bindValue(':patientBirthDate', $birthDate);
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
       
        $stmt->closeCursor();
       
        return ($results);
    }

    function getPatient($id){
            global $db;
            
            $results = [];
    
            $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate 
            FROM patients WHERE id=:id"); 

            $stmt->bindValue(':id', $id);
            
            if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
             
             return ($results);
    }
    
    function getPatientMeasurements($id){
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT patientMeasurementId, patientId, patientMeasurementDate, patientWeight, patientHeight,
         patientBPSystolic,patientBPDiastolic, patientTemperature
        FROM patientMeasurements WHERE patientId=:id SORTBY patientMeasurementDate"); 

        $stmt->bindValue(':id', $id);
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }
         
         return ($results);
    }

    function addResults ($id, $weight, $height, $systolicBP, $diastolicBP, $temp) {
        global $db;
        $results = 'Data NOT Added';
        $stmt = $db->prepare("INSERT INTO patientMeasurements SET patientID = :id, patientMeasurementDate = :today, patientWeight = :patientWeight, patientHeight = :patientHeight,
         patientBPSystolic = :patientBPSystolic, patientBPDiastolic = : patientBPDiastolic, patientTemperature = :patientTemperature");

        $today = date('Y-m-d');

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':today', $today);
        $stmt->bindValue(':patientWeight', $weight);
        $stmt->bindValue(':patientHeight', $height);
        $stmt->bindValue(':patientBPSystolic', $systolicBP);
        $stmt->bindValue(':patientBPDiastolic', $diastolicBP);
        $stmt->bindValue(':patientTemperature', $temp);
        
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    function updatePatient($id, $first, $last, $married, $birthDate, $weight, $height, $systolicBP, $diastolicBP, $temp) {
        global $db;

        $results = "";
        
        $stmt = $db->prepare("UPDATE patients SET patientFirstName = :patientFirstName,
        patientLastName = :patientLastName, patientMarried = :patientMarried, patientBirthDate = :patientBirthDate WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':patientFirstName', $first);
        $stmt->bindValue(':patientLastName', $last);
        $stmt->bindValue(':patientMarried', $married);
        $stmt->bindValue(':patientBirthDate', $birthDate);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }

        $stmt = $db->prepare("UPDATE patients SET patientID = :id, patientMeasurementDate = :today, patientWeight = :patientWeight, patientHeight = :patientHeight,
        patientBPSystolic = :patientBPSystolic, patientBPDiastolic = : patientBPDiastolic, patientTemperature = :patientTemperature WHERE id=:id");
        
        $today = date('Y-m-d');

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':today', $today);
        $stmt->bindValue(':patientWeight', $weight);
        $stmt->bindValue(':patientHeight', $height);
        $stmt->bindValue(':patientBPSystolic', $systolicBP);
        $stmt->bindValue(':patientBPDiastolic', $diastolicBP);
        $stmt->bindValue(':patientTemperature', $temp);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results .= '<br />Data Updated';
        }
        
        return ($results);
    }
    function deletePatient ($id) {
        global $db;
        
        $results = "Data was not deleted";
    
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }

        $stmt = $db->prepare("DELETE FROM patientMeasurements WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = '<br />Data Deleted';
        }
        
        return ($results);
    }
    