REQUISITOS DEL PROYECTO
-----------------------

Para ejecutar correctamente este proyecto se requiere:

- PHP versión 8.3.22
- Base de datos MySQL 8.0
- (Opcional) Docker para levantar la base de datos mediante docker-compose

PASOS PARA INICIAR EL PROYECTO
------------------------------

Dependiendo del sistema operativo que utilices, sigue uno de los siguientes pasos:

1. En macOS (con PHP instalado vía Homebrew):
   - Ejecuta el siguiente comando desde la raíz del proyecto:
     php -S localhost:8000

2. En Windows o Linux (con XAMPP, Laragon u otro stack local):
   - Inicia tu servidor local (Apache y MySQL)
   - Coloca el proyecto en la carpeta correspondiente (por ejemplo, htdocs)
   - Accede desde el navegador a:
     http://localhost/nombre-del-proyecto

USO DE DOCKER (OPCIONAL)
------------------------

Si prefieres utilizar Docker para levantar la base de datos, ejecuta:

    docker-compose up -d

Asegúrate de tener Docker y Docker Compose instalados en tu máquina.

NOTAS IMPORTANTES
-----------------

- SOBRE EL USO DEL INGLÉS EN EL CÓDIGO:

  El código está escrito en inglés. Esto se debe a que, en experiencias laborales anteriores, se promovía el uso del inglés incluso con ayuda de traductores. Me pareció una práctica útil y alineada con estándares comunes del desarrollo de software, por lo que la he adoptado como costumbre.

  Sin embargo, estoy completamente abierto a seguir las convenciones que utilice el equipo o empresa, incluyendo el idioma que se prefiera para el código.

- SOBRE EL USO DE INTELIGENCIA ARTIFICIAL:

  Tanto la interfaz como este archivo README han sido redactados con el apoyo de herramientas de inteligencia artificial. Estas herramientas ayudan a estructurar mejor las ideas, mejorar la redacción y reducir errores ortográficos, especialmente en documentación técnica.
