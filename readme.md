





# Tareas

BE:
- https://www.sitepoint.com/crud-create-read-update-delete-laravel-app/

# Pendiente Short Term
- borrar persona solo de cursoy no de la tabla persona
- buscar/crear usuarios con ajax
- personalizar las vistas dependiendo del tipo de curso
- Vista Para unir profesor con materia
- materias debe terner tipo de curso
- Vista para editar y borrar personas
- Mostrar en principal solo cursos con estado iniciado y correspondientes a la sede del usuario


# Pendiente Mid Term
- Establecer sesiones
- Permisos del admin para un usuario que pueda ver todos los cursos
- readonly tipo y sede (SIEMPRE)
- una vez finalizado solo se puede editar el nombre
- una vez iniciado no deberia poder cambiarse la fecha inicio
- solo la coordinadora puede borrar cursos
- Coordinadora crea materias y ve todas las sedes
- Enviar correo de reestablecimiento de contraseña en lugar de editar contraseña manualmente por el admin
- Delimitar las rutas y evitar navegar entre sesiones arbitrariamente


1 Sede(has many) - M users *
1 Sede (has many) - N Cursos*
1 usuario(has many) - N cursos*
1 usuario(has many) - N prof*
1 usuario(has many) - N materias*

M persona(has many) - N materias *
M curso(has many) - n materia(belong)*
M prof(belong) - N MATERIAS(has many)*
N personas(belong) - M cursos(has many) *






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
- relaciones paso a paso
https://scotch.io/tutorials/a-guide-to-using-eloquent-orm-in-laravel
- rutas nombradas y pase de parametros
http://stackoverflow.com/questions/29564167/laravel-5-sending-a-variable-through-an-href-with-a-route-inside
http://laravel.io/forum/04-01-2014-pass-variable-in-blade-view-to-route
