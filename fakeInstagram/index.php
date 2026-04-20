<?php
session_start();
include("db.php");

// NOTE[😢]: Estilos de tailwind generado con IA por falta de experiencia

// NOTE: Porfavor, no me hagan usar php nunca mas en la vida 🥀

// TODO[☑]: Implementar tailwind css para mejores estilos

// TODO[❌]: Aprender tailwind (Fallido)

// NOTE: Gracias a ChatGPT por elegir el nombre de la red social

// TODO: usamos STMT como gestor de Querys para evitar inyeccion SQL

// ¿este usuario esta logueado?
$logged = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FakeSocial</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

</head>

<body class="bg-black text-white">

    <!-- APPBAR -->
    <header class="sticky top-0 z-50 bg-zinc-900/80 backdrop-blur border-b border-zinc-800">
        <div class="max-w-4xl mx-auto px-4 py-3 flex justify-between items-center">

            <span class="text-xl font-bold tracking-tight">
                Fake<span class="text-indigo-500">Social</span>
            </span>

            <div class="flex items-center gap-3">
                <?php if ($logged): ?>
                    <span class="text-xs text-green-400 hidden sm:block">
                        Conectado
                    </span>

                    <a href="logout.php"
                        class="bg-zinc-800 hover:bg-red-600/80 px-3 py-1.5 rounded-lg text-sm transition">
                        Salir
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </header>

    <!-- TODO[☑]: Añadir un appbar estetico, en lo posible que sea estilo instagram -->
    <!-- TODO[☑]: Pensar un buen nombre para este proyecto -->
    <div class="max-w-4xl mx-auto p-4 space-y-6">

        <!-- si el usuario esta loggeado este puede ver el boton de cerrar sesion -->
        <?php if (isset($_SESSION['user_id'])): ?>

            <!-- 📝 Crear post -->
            <!-- 📝 TODO[☑]: Mejorar la tarjeta visual de los posts -->
            <!-- 📝 TODO[⌛]: Agregar mas informacion a los posts (base de datos y html) -->
            <form action="create_post.php" method="POST">

                <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-4 shadow hover:border-zinc-700 transition">
                    <!-- textarea -->
                    <textarea
                        name="content"
                        placeholder="¿Qué estás pensando?"
                        class="w-full bg-transparent text-white placeholder-zinc-500 resize-none focus:outline-none text-sm"
                        rows="3"></textarea>

                    <!-- footer -->
                    <div class="flex justify-between items-center mt-3">

                        <span class="text-xs text-zinc-500">
                            Comparte algo con la comunidad
                        </span>

                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-all shadow-md shadow-indigo-500/20">
                            Publicar
                        </button>
                    </div>
                </div>

            </form>

        <?php else: ?>

            <!-- 🔐 Inciar Sesion/Registrar -->
            <!-- 🔐 TODO[⌛]: Mejorar la validacion de los campos de entrada -->
            <!-- 🔐 TODO[⌛]: Hacer Mas extensa el registro del usuario -->
            <?php include("forms.php"); ?>

        <?php endif; ?>


        <!-- 📰 Feed o Publicaciones Solo visibles si el usuario incio session -->
        <!-- 📰 TODO[⌛]: hacer que se pueda ver bien la informacion del ususario que publico el post -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php include("feed.php"); ?>
        <?php endif; ?>

    </div>

</body>

</html>