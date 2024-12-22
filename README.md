# Documentación

## 1. Introducción
### Objetivo
Desarrollar una aplicación web educativa y divertida para niños de entre 7 y 12 años con discalculia verbal, con el objetivo de mejorar sus habilidades matemáticas a través de ejercicios personalizados y gamificados.

### Alcance
Esta aplicación se enfoca en proporcionar un entorno de aprendizaje interactivo y personalizado para niños con discalculia. A través de ejercicios adaptados a sus necesidades individuales, la aplicación busca fortalecer sus habilidades matemáticas básicas y fomentar un enfoque positivo hacia el aprendizaje.

### Público Objetivo
* **Niños:** Estudiantes/Pacientes de entre 7 y 12 años con diagnóstico de discalculia verbal.
* **Profesionales:** Terapeutas ocupacionales, psicopedagogos y profesores especializados en dificultades de aprendizaje.

## 2. Requerimientos Funcionales
* **Registro y Autenticación:** Implementar un sistema de registro seguro para profesionales y permitir el ingreso con credenciales únicas, siendo además responsable de crear la cuenta para sus hijos, teniendo en cuenta que estos deben estar supervisados.
* **Creación de perfiles completos para profesionales:** Desarrollar formularios para que los profesionales tengan la mayor seguridad posible de su cuenta, teniendo en cuenta la opción de eliminarla, y cambiar contraseñas.
* **Generación de Ejercicios Personalizados:** Crear una selección de niveles de acceso para adaptar la dificultad y tipo de ejercicio a las necesidades de su hijo.
* **Interfaz Interactiva:** Diseñar una interfaz intuitiva y atractiva utilizando elementos visuales como imágenes, animaciones y juegos para mantener la atención de los niños.
* **Sistema de Seguimiento de Progreso:** Implementar un sistema para observar el historial de los niños dentro de la plataforma de aprendizaje, calcular su desempeño y generar reportes detallados para los profesionales.

### 3. Requisitos no funcionales:
* **Seguridad:** Proteger la información personal de los usuarios.
* **Accesibilidad:** Garantizar que sea accesible para cualquier niño de entre 7 y 12 años.
* **Compatibilidad:** Funcionamiento en distintos dispositivos (ordenadores, tablets, smartphones).
* **Rendimiento:** Carga rápida y respuesta eficiente a las acciones del usuario final.

### 4. Requisitos técnicos
* **Frontend:** HTML, CSS, JAVASCRIPT, BOOTSTRAP para generar todos los aspectos visuales de la aplicación.
* **Backend:** PHP para la gestión del servidor, utilizando el gestor de bases de datos MySql para almacenar datos de usuarios, ejercicios y resultados, y utilizando composer para generar informes personalizados

**Avisos importantes:** Se requiere composer, se recomienda tener la última versión, teniendo en cuenta php superior a 8.2 y Xampp para tener el mini servidor local
