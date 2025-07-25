<?php

class AppointmentService {
    private $pdo;

    public function __construct($database) {
        $this->pdo = $database->getConnection();
    }

    
    public function save($patientName, $specialty, $appointmentDate) {
        $sql = "INSERT INTO appointments (patient_name, specialty, appointment_date) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$patientName, $specialty, $appointmentDate]);
    }

    
    public function getAll() {
        $sql = "SELECT * FROM appointments";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

   
    public function delete($id) {
        $sql = "DELETE FROM appointments WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    
    public function validateDate($date) {
        $currentDate = date('Y-m-d');
        return $date >= $currentDate;
    }

}