## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)















# Tareas
FE:
- 

BE:
- https://www.sitepoint.com/crud-create-read-update-delete-laravel-app/

# Pendiente Short Term
- Controladores:
-- cursos **
-- sede**
-- index **
-- usuarios **
-- personas
-- profesores **
-- materias **

1 Sede - M users
N personas - M cursos
M prof - N MATERIAS
n materia -  1 curso




- unique emails en profesores
- Mostrar nombre de sedes y no ID
- Mostrar en principal solo cursos con estado iniciado y correspondientes a la sede del usuario
- Mostrar en cada vista de cada tipo de curso solo cursos de su tipo
- Al elegir un curso (de principal o de las vistas de cada curso) abrir una nueva vista con info de ese curso
- Crear/editar/eliminar alumnos con Ajax

# Pendiente Mid Term
- Establecer sesiones
- Enviar correo de reestablecimiento de contraseña en lugar de editar contraseña manualmente por el admin
- Delimitar las rutas y evitar navegar entre sesiones arbitrariamente


# Importante
- Se deben crear primero las tablas base antes que las que dependen de ellas
- La tabla "migrations" lleva registro de las migraciones
- Para algunas cosas deben usarse "nullableTimestamp"
- http://stackoverflow.com/questions/28214499/laravel-5-not-finding-css-files
- Instalar componentes para formularios https://laravelcollective.com/docs/5.0/html
- Info en modales http://www.easylaravelbook.com/blog/2016/04/11/integrating-a-bootstrap-modal-into-your-laravel-application/
- Un modal por elemento de BD http://stackoverflow.com/questions/32469873/show-bootstrap-modal-when-click-on-href-laravel
- Select actualizandose con datos de la BD http://stackoverflow.com/questions/28801664/formselect-from-database-model-in-laravel
- Many2many relations
http://www.easylaravelbook.com/blog/2016/04/06/introducing-laravel-many-to-many-relations/
- Videos interesantes
https://laracasts.com/series/laravel-5-fundamentals/episodes/14