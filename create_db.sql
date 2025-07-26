-- Create database
CREATE DATABASE IF NOT EXISTS medical_appointments CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


-- Create table for appointments
USE citas_medicas;

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(255) NOT NULL,
    specialty ENUM('Medicina General', 'Pediatría', 'Dermatología') NOT NULL,
    appointment_date DATE NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_appointment_date (appointment_date),
    INDEX idx_specialty (specialty)
)

-- Insert sample data into the appointments table
INSERT INTO appointments (patient_name, specialty, appointment_date) VALUES
('Juan Pérez', 'Medicina General', '2025-07-30'),
('María González', 'Pediatría', '2025-08-01'),
('Carlos Rodríguez', 'Dermatología', '2025-08-05');
