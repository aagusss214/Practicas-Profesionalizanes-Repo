<?php
$mode = $_GET['mode'] ?? 'login';
?>

<div class="w-full max-w-md p-8 bg-zinc-900 border border-zinc-800 rounded-2xl shadow-2xl">


    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-white tracking-tight">
            <?= $mode === 'login' ? 'Bienvenido' : 'Crear cuenta' ?>
        </h1>

        <p class="text-zinc-400 mt-2">
            <?= $mode === 'login' ? 'Ingresa tus credenciales' : 'Regístrate para continuar' ?>
        </p>
    </div>

    <form action="<?= $mode === 'login' ? 'login.php' : 'register.php' ?>" method="post" class="space-y-6">

        <!-- USERNAME -->
        <div>
            <label class="block text-sm mb-2 text-zinc-300">Usuario</label>
            <input type="text" name="username" required
                class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- EMAIL SOLO EN REGISTER -->
        <?php if ($mode === 'register'): ?>
            <div>
                <label class="block text-sm mb-2 text-zinc-300">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>
        <?php endif; ?>

        <!-- PASSWORD -->
        <div>
            <label class="block text-sm mb-2 text-zinc-300">Contraseña</label>
            <input type="password" name="password" required
                class="w-full px-4 py-3 bg-zinc-800 border border-zinc-700 rounded-lg focus:ring-2 focus:ring-indigo-500">
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-500 py-3 rounded-lg font-semibold">
            <?= $mode === 'login' ? 'Iniciar sesión' : 'Registrarse' ?>
        </button>
    </form>

    <p class="mt-8 text-center text-sm text-zinc-500">
        <?php if ($mode === 'login'): ?>
            ¿No tienes cuenta?
            <a href="?mode=register" class="text-indigo-400 hover:underline">Regístrate</a>
        <?php else: ?>
            ¿Ya tienes cuenta?
            <a href="?mode=login" class="text-indigo-400 hover:underline">Inicia sesión</a>
        <?php endif; ?>
    </p>


</div>