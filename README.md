
Español

Versiones utilizadas:
- Laravel 11.
- PHP 8.3.4.
- Node 20.3.0.
- Npm 9.6.7.
- Tailwindcss 3.4.1.
- Vite 5.0.
- Vue 3.4.0.

Pasos a seguir para crear el proyecto:<br>
1 - Instalar Visual Studio Code.
2 - Instalar extensiones necesarias como prettier o laravel snippets.
3 - Instalar Laragon.
4 - Descargar la versión 8.3.4 de PHP non-thread-safe, descomprimir el contenido en C:/laragon/bin/php/ y añadir la ruta con la carpeta en las variables de entorno de Windows.
5 - Instalar Laravel 11.x, seleccionar laravel breeze con vue y base de datos MySQL.
6 - Crear modelos, seeders , factories y migrations.
7 - Crear controladores y rutas en el fichero web.php.
8 - Crear vistas y componentes.

Pasos a seguir para ejecutar el proyecto:<br>
1 - Git clone con la URL del proyecto.
2 - Abrir visual studio code.
3 - Ejecutar en la consola del visual studio "npm run dev".
4 - Ejecutar en la consola del visual studio "php artisan serv".

Defensa del proyecto:<br>
Se ha creado dicho proyecto utilizando Laravel 11 con la última versión disponible de PHP. Al principio decidí almacenar los municipios en la base de datos, pero por tema de escalabilidad al final opté por recargar el select2 mediante la API de AEMET.

Una vez seleccionado el municipio, se lanzará otra petición get a la API de AEMET para solicitar la información meteorológica del municipio.

A continuación utilizando JQuery Confirm se monta un modal con la información básica.

En este proyecto he creado dos componentes Vue y los he importado en la clase app.js. Son dos componentes básicos.

Problemas encontrados durante la prueba:<br>
Laravel ha sacado la versión 11 el día 12 de marzo, el problema es que no hay mucha documentación sobre rendimiento/cambios a nivel de importación de dependencias, la cual cosa ha provocado un pequeño retraso durante la programación.

Posibles futuras mejoras:<br>
- Parte privada con control de la aplicación.
- Mapa interactivo con los iconos meteorológicos.
- Responsive más variado.
- Mayor uso de Vue.

Inglés

Versions used:<br>
- Laravel 11.
-PHP 8.3.4.
- Node 20.3.0.
- Npm 9.6.7.
- Tailwindcss 3.4.1.
- Vite 5.0.
-Vue 3.4.0.

Steps to follow to create the project:<br>
1 - Install Visual Studio Code.
2 - Install necessary extensions such as prettier or laravel snippets.
3 - Install Laragon.
4 - Download version 8.3.4 of PHP non-thread-safe, unzip the contents in C:/laragon/bin/php/ and add the path with the folder in the Windows environment variables.
5 - Install Laravel 11.x, select Laravel breeze with vue and MySQL database.
6 - Create models, seeders, factories and migrations.
7 - Create controllers and routes in the web.php file.
8 - Create views and components.

Steps to follow to execute the project:<br>
1 - Git clone with the project URL.
2 - Open visual studio code.
3 - Run "npm run dev" in the visual studio console.
4 - Run "php artisan serv" in the visual studio console.

Project defense:<br>
This project has been created using Laravel 11 with the latest available version of PHP. At first I decided to store the municipalities in the database, but for scalability reasons I ultimately chose to reload select2 using the AEMET API.

Once the municipality is selected, another get request will be launched to the AEMET API to request the meteorological information of the municipality.

Next, using JQuery Confirm, a modal is assembled with the basic information.

In this project I have created two Vue components and imported them in the app.js class. They are two basic components.

Problems encountered during testing:<br>
Laravel released version 11 on March 12, the problem is that there is not much documentation about performance/changes at the dependency import level, which has caused a small delay during programming.

Possible future improvements:<br>
- Private part with application control.
- Interactive map with weather icons.
- More varied responsive.
- Greater use of Vue.
