    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set the minimum date for the appointment date input to today
        document.getElementById('appointment_date').min = new Date().toISOString().split('T')[0];

        // Validation and form submission
        (function() {
            'use strict';
            
            const form = document.getElementById('formAppointment');
            
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                // Validación adicional de fecha
                const fechaCita = document.getElementById('appointment_date').value;
                const fechaHoy = new Date().toISOString().split('T')[0];
                
                if (fechaCita < fechaHoy) {
                    event.preventDefault();
                    alert('La fecha de la cita no puede ser en el pasado.');
                    return false;
                }
                
                form.classList.add('was-validated');
            });
        })();

        
        function confirmDeletion() {
            return confirm('¿Está seguro de que desea eliminar esta cita?');
        }

        // Clear form after successful registration
        <?php if ($messageType === 'success' && isset($_POST['action']) && $_POST['action'] === 'registrar'): ?>
            document.getElementById('formAppointment').reset();
            document.getElementById('formAppointment').classList.remove('was-validated');
        <?php endif; ?>
    </script>