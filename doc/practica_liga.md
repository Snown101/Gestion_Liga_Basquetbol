# Documentación Técnica - Sistema de Gestión de Liga de Básquetbol

## 1. Descripción general de la arquitectura del sistema

    Este proyecto es un sistema web para administrar una liga de básquetbol. Lo desarrollé con Laravel porque es un framework que ya trae muchas herramientas listas y permite trabajar de forma ordenada.

    La arquitectura que utilicé es el patrón MVC (Modelo-Vista-Controlador):

    - Los Modelos se encargan de representar las tablas de la base de datos y de las relaciones entre ellas.
    - Los Controladores contienen la lógica del sistema (crear, editar, eliminar, listar, etc.).
    - Las Vistas son las páginas que ve el usuario, hechas con Blade.

    La base de datos es MySQL. Para crear las tablas usé migraciones de Laravel, así todo queda versionado. También implementé autenticación de usuarios con Laravel Breeze, para que solo las personas registradas puedan entrar al sistema.

    El sistema permite gestionar equipos, jugadores (asignándolos a un equipo), partidos y ver algunas estadísticas básicas.

## 2. Instalación y configuración del proyecto

    Para poder ejecutar el sistema en otro equipo, se deben seguir los siguientes pasos:

    1. Clonar o copiar el proyecto.
    2. Abrir una terminal en la carpeta del proyecto y ejecutar los siguientes comandos:

        copy .env.example .env
        composer install
        php artisan key:generate

    Configurar el archivo .env con los datos de la base de datos (nombre de la base, usuario y contraseña).
    Crear la base de datos en MySQL (por ejemplo: liga_basquetbol).
    Ejecutar las migraciones:
        php artisan migrate

    Iniciar el servidor:
        php artisan serve

    Abrir el navegador en: http://127.0.0.1:8000

## 3. Listado de clases, controladores y modelos implementados
    Modelos
        Equipo.php: representa a los equipos. Tiene campos como nombre, ciudad, entrenador y año de fundación.
        Jugador.php: representa a los jugadores. Está relacionado con un equipo a través del campo equipo_id.
        Partido.php: representa los partidos. Tiene equipo local, equipo visitante, fecha, hora, puntos y estado.
        User.php: modelo de usuarios que viene con Laravel Breeze.
    Controladores
        EquipoController.php: se encarga del CRUD de equipos.
        JugadorController.php: se encarga del CRUD de jugadores.
        PartidoController.php: se encarga del CRUD de partidos y también de la vista de estadísticas.
        ProfileController.php: viene con Breeze y gestiona el perfil del usuario.
    Relaciones
        Un Equipo tiene muchos Jugadores.
        Un Jugador pertenece a un Equipo.
        Un Partido tiene dos relaciones con Equipo: una como local y otra como visitante.

## 4. Descripción de las principales funcionalidades desarrolladas
    Gestión de Equipos
    Se puede crear, listar, editar, ver detalle y eliminar equipos. Cada equipo puede tener ciudad, entrenador y año de fundación.

    Gestión de Jugadores
    Se pueden registrar jugadores y asignarlos a un equipo. También se puede indicar el número de camiseta y la posición (Base, Escolta, Alero, Ala-Pívot o Pívot). Esto cumple con el requisito de “gestión de jugadores por equipo”.

    Gestión de Partidos
    Se pueden registrar partidos eligiendo el equipo local y el visitante, la fecha y la hora. Después se puede actualizar el resultado y el estado del partido (Programado, En curso o Finalizado).

    Estadísticas
    Hay una página de estadísticas donde se muestra una tabla de posiciones simple (partidos jugados, ganados y perdidos) y los últimos resultados de los partidos finalizados.

    Autenticación
    El sistema tiene registro e inicio de sesión. Todas las rutas de gestión están protegidas con el middleware auth, así que no se puede entrar sin iniciar sesión.

## 5. Explicación de fragmentos de código relevantes
    Relación entre Jugador y Equipo
    En el modelo Jugador definí esta relación:
        public function equipo()
        {
            return $this->belongsTo(Equipo::class);
        }
    Con esto puedo mostrar el nombre del equipo de un jugador fácilmente en las vistas usando $jugador->equipo->nombre.

    Validación de datos
    En los controladores validé los datos antes de guardarlos. Por ejemplo, al crear un jugador:
        $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'equipo_id' => 'required|exists:equipos,id',
        ]);
    Esto evita que se guarden registros incompletos o con datos incorrectos.

    Rutas protegidas
    Todas las rutas principales están protegidas de esta forma:
        Route::resource('equipos', EquipoController::class)->middleware('auth');
        Route::resource('jugadores', JugadorController::class)->middleware('auth');
        Route::resource('partidos', PartidoController::class)->middleware('auth');

## 6. Decisiones técnicas tomadas y justificación
    1. Usar Laravel Breeze para la autenticación
        Lo elegí porque ya trae el login, registro y recuperación de contraseña listos. No tenía sentido hacerlo todo desde cero.

    2. Hacer un CRUD separado para cada entidad
        Aunque se crean más archivos, es más ordenado y fácil de mantener. Cada módulo (Equipos, Jugadores y Partidos) tiene su propio controlador y sus propias vistas.

    3. Usar migraciones
        Preferí crear las tablas con migraciones en vez de hacerlo manualmente en HeidiSQL, porque así queda registrado en el proyecto y es más profesional.

    4. Usar claves foráneas con onDelete('cascade')
        Si se elimina un equipo, también se eliminan sus jugadores y partidos. Esto ayuda a mantener la base de datos limpia.

    5. Mantener Blade + Tailwind
        Como el proyecto se creó con Breeze, decidí seguir usando Blade y Tailwind para no complicarme con otro sistema de estilos.

    6. Separar la vista de estadísticas
        En lugar de meter las estadísticas dentro del listado de partidos, decidí crear una página aparte para que sea más clara y fácil de usar.