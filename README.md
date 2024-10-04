# Documentación Técnica

## Nombre del Proyecto

**Descripción breve del proyecto.** Explica qué hace el proyecto y su propósito.

---

## Instalación

Para instalar y ejecutar el proyecto en tu entorno local, sigue estos pasos:

### Requisitos previos

- [PHP](https://www.php.net/downloads.php) (versión 7.4 o superior)
- [Composer](https://getcomposer.org/download/)
- [CodeIgniter 4](https://codeigniter4.github.io/userguide/intro/installation.html) (verifica que tengas la última versión)
- Un servidor web (como Apache o Nginx) y un servidor de base de datos (como MySQL)
- 
En el caso específico del proyecto, se ha usado XAMPP, que ya trae PHP y un servidor Apache

### Pasos de instalación

1. Clona el repositorio:

   ```
   bash
   git clone https://github.com/tu_usuario/tu_proyecto.git
   cd tu_proyecto
2.Instala las dependencias:

    bash
    composer install
    
3.Configura el entorno:

La configuración de .env:

    bash

    CI_ENVIRONMENT = development

      SMTP_HOST=smtp.gmail.com
      SMTP_USER= Aquí va un correo de Gmail
      SMTP_PASSWORD= Aquí iria la contraseña de aplicación de Gmail
      SMTP_PORT=587
      SMTP_CRYPTO=tls
      
      APP_BASE_URL=http://localhost
      APP_PORT=8080



4.Inicia el servidor:

Puedes usar el servidor incorporado de CodeIgniter para ejecutar la aplicación:

    bash
    php spark serve

Luego, abre tu navegador y visita http://localhost:8080.

## Decisiones en el desarrollo

A continuación se detallan algunas decisiones arquitectónicas clave tomadas durante el desarrollo del proyecto:

1. **Sistema de Plantillas o Layouts:**
   - Se implementó un sistema de plantillas utilizando la funcionalidad de vistas de CodeIgniter. Esto permite la creación de un diseño coherente y reutilizable en toda la aplicación, facilitando la gestión de la interfaz de usuario. Al separar el contenido específico de cada página de la estructura general, como la barra de navegación y el pie de página, se logra una mayor claridad en el código y una más fácil mantenibilidad. Además, este enfoque permite cambios rápidos en el diseño general sin tener que modificar cada vista individualmente.

2. **Separación de Archivos JavaScript:**
   - Se tomó la decisión de organizar el código JavaScript en archivos separados según su funcionalidad. Esto incluye dividir los scripts en componentes o módulos específicos en lugar de tener todo el código en un solo archivo. Esta práctica mejora la legibilidad del código y facilita la depuración. También se ha implementado un sistema de módulos, lo que permite cargar solo los scripts necesarios para cada vista, optimizando así el rendimiento de la aplicación.

3. **Uso de AJAX:**
   - Se incorporó AJAX para manejar interacciones asincrónicas entre el cliente y el servidor. Esto permite actualizaciones dinámicas de la interfaz de usuario sin necesidad de recargar toda la página. Por ejemplo, al cambiar el idioma de la aplicación, se envía una solicitud AJAX al servidor para actualizar la configuración de idioma del usuario, lo que mejora la experiencia del usuario al ofrecer una transición más fluida y rápida. AJAX también se utiliza para otras funcionalidades como la búsqueda y el filtrado de datos.

4. **Uso de XAMPP:**
   - Para el desarrollo local y la prueba del proyecto, se eligió XAMPP como entorno de servidor. XAMPP es un paquete que incluye Apache, MySQL y PHP, lo que facilita la configuración de un entorno de desarrollo. Esta elección permite a los desarrolladores instalar y configurar rápidamente un servidor web y una base de datos sin complicaciones adicionales. Además, XAMPP es compatible con sistemas operativos Windows, macOS y Linux, lo que lo convierte en una herramienta versátil para el desarrollo de aplicaciones web.

---

## Cosas Pendientes

A pesar de que se entrega una primera versión de la prueba, hay varios aspectos que aún necesitan ser mejorados. La entrega se realiza debido a que han surgido diversos problemas durante el desarrollo y, además, ya ha pasado una semana desde que se envió el proyecto. Ha penalizado mucho el hecho de querer hacer demasiadas cosas que al final he tenido que recortar
Sin embargo, tengo la intención de continuar trabajando en las siguientes mejoras:

1. **Optimizar y estandarizar código:**
   - Debido a que CodeIgniter4 es relativamente nuevo para mi(he usado Laravel), hay cosas que me gustaría optimizar

2. **Soporte Multilenguaje Funcional:**
   - El soporte multilenguaje está sin terminar.

3. **Mejorar Vistas de las Habitaciones, con Más Detalles e Imágenes:**
   - Mejorar el detalle de las reservas, para que se puedan ver todas las fotos de las habitaciones

4. **Mejorar la Pasarela de Pago:**
   - Falta mejorar el aspecto de la pasarela de pago y validación de datos.

5. **Mejorar el Contenido de los Emails:**
   - Los correos electrónicos enviados a los usuarios necesitan revisiones para asegurar que sean claros, informativos y visualmente atractivos. Se busca crear plantillas de correo que reflejen mejor la marca y que incluyan información esencial de forma estructurada.

6. **Automatizar Envío de Emails y Actualización de Estados de Reservas:**
   - Se planea implementar un sistema automatizado para el envío de correos electrónicos relacionados con la confirmación de reservas y actualizaciones de estado. Esto mejorará la eficiencia y la comunicación con los usuarios.

7. **Añadir la Posibilidad de Loguearte con Google y Añadir Autenticación de 2 Factores:**
   - Para mejorar la seguridad y la facilidad de uso, se considerará la integración de opciones de inicio de sesión con Google. También se explorará la posibilidad de implementar autenticación de dos factores para ofrecer un nivel adicional de seguridad a los usuarios al acceder a sus cuentas.

---
