<?php

require_once 'config/database.php';
require_once 'services/appointment_services.php';


$database = new Database();
$database->createTable();
$appointmentService = new AppointmentService($database);

$message = '';
$messageType = '';


if ($_POST && isset($_POST['action']) && $_POST['action'] === 'register') {
    $patientName = trim($_POST['patient_name']);
    $specialty = $_POST['specialty'];
    $appointmentDate = $_POST['appointment_date'];

    // Validaciones del servidor
    if (empty($patientName)) {
        $message = "El nombre del paciente es obligatorio.";
        $messageType = "error";
    } elseif (!$appointmentService->validateDate($appointmentDate)) {
        $message = "La fecha de la cita no puede ser en el pasado.";
        $messageType = "error";
    } else {
        if ($appointmentService->save($patientName, $specialty, $appointmentDate)) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        } else {
            $message = "Error al registrar la cita.";
            $messageType = "error";
        }
    }
}


if ($_POST && isset($_POST['action']) && $_POST['action'] === 'remove') {
    $id = $_POST['id'];
    if ($appointmentService->delete($id)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?deleted=1");
        exit();
    } else {
        $message = "Error al eliminar la cita.";
        $messageType = "error";
    }
}

if (isset($_GET['success'])) {
    $message = "Cita registrada exitosamente.";
    $messageType = "success";
}

if (isset($_GET['deleted'])) {
    $message = "Cita eliminada exitosamente.";
    $messageType = "success";
}


$appointments = $appointmentService->getAll();