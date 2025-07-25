<?php include_once 'controllers/appointment_controller.php'; ?>

<!DOCTYPE html>
<html lang="es">
<?php include_once 'partial/head.php'; ?>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center header-title mb-4">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Sistema de Citas Médicas
                </h1>
            </div>
        </div>

        <!-- Mensajes de estado -->
        <?php if (!empty($message)): ?>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-<?php echo $messageType === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                        <i class="fas fa-<?php echo $messageType === 'success' ? 'check-circle' : 'exclamation-triangle'; ?> me-2"></i>
                        <?php echo htmlspecialchars($message); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Formulario de registro -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-plus-circle me-2"></i>
                            Registrar Nueva Cita
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="formAppointment" method="POST" novalidate>
                            <input type="hidden" name="action" value="register">
                            
                            <div class="mb-3">
                                <label for="patient_name" class="form-label">
                                    <i class="fas fa-user me-1"></i>
                                    Nombre del Paciente
                                </label>
                                <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese el nombre del paciente.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="specialty" class="form-label">
                                    <i class="fas fa-stethoscope me-1"></i>
                                    Especialidad
                                </label>
                                <select class="form-select" id="specialty" name="specialty" required>
                                    <option value="">Seleccionar especialidad</option>
                                    <option value="Medicina General">Medicina General</option>
                                    <option value="Pediatría">Pediatría</option>
                                    <option value="Dermatología">Dermatología</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, seleccione una especialidad.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="appointment_date" class="form-label">
                                    <i class="fas fa-calendar me-1"></i>
                                    Fecha de la Cita
                                </label>
                                <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                                <div class="invalid-feedback">
                                    Por favor, seleccione una fecha válida.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-floppy-fill"></i>
                                Registrar Cita
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Lista de citas -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-list me-2"></i>
                            Citas Registradas (<?php echo count($appointments); ?>)
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($appointments)): ?>
                            <div class="text-center py-4">
                                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No hay citas registradas aún.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                            <th><i class="fas fa-user me-1"></i>Paciente</th>
                                            <th><i class="fas fa-stethoscope me-1"></i>Especialidad</th>
                                            <th><i class="fas fa-calendar me-1"></i>Fecha</th>
                                            <th><i class="fas fa-cogs me-1"></i>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($appointments as $appointment): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($appointment['id']); ?></td>
                                                <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                                                <td>
                                                    <span class="badge bg-info">
                                                        <?php echo htmlspecialchars($appointment['specialty']); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo date('d/m/Y', strtotime($appointment['appointment_date'])); ?></td>
                                                <td>
                                                    <form method="POST" style="display: inline;" onsubmit="return confirmDeletion()">
                                                        <input type="hidden" name="action" value="remove">
                                                        <input type="hidden" name="id" value="<?php echo $appointment['id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'partial/footer.php'; ?>
</body>
</html>