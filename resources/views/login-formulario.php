<?php
include __DIR__ . "/includes/header.php";
?>
<main class="flex justify-center items-center h-screen px-4 py-8 bg-gradient-to-br from-indigo-400 via-indigo-600 to-indigo-800">
    <div class="container flex justify-center flex-col items-center">
        <form id="login" class="max-w-xl min-h-[28rem] flex justify-center flex-col items-center gap-5 w-full border rounded-md px-4 py-7 bg-white shadow-2xl" action="/index.php?action=login" method="post">
            <div>
                <h2 class="font-bold text-3xl uppercase text-gray-700">Login</h2>
            </div>
            <div class="w-full">
                <label class="text-gray-700" for="email">Email</label>
                <input class="w-full border-2 rounded p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:shadow focus:shadow-indigo-950 focus:border-indigo-500 focus:transition-colors focus:duration-200" type="text" name="email" id="email">
            </div>
            <div class="w-full">
                <label class="text-gray-700" for="password">Senha</label>
                <input  class="w-full border-2 rounded p-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:shadow focus:shadow-indigo-950 focus:border-indigo-500 focus:transition-colors focus:duration-200" type="password" name="password" id="password">
            </div>
            <div class="text-center">
                <div class="my-4">
                    <p>Ainda não tem login? Clique aqui para <a class="font-bold text-indigo-700 hover:text-indigo-800 " href="cadastro.php">cadastrar-se</a></p>
                </div>
                <button class="px-5 py-2 text-white rounded-md bg-indigo-500 hover:bg-indigo-600 hover:transition-colors duration-300" type="submit">Login</button>
            </div>
        </form>
    </div>
</main>
<?php include __DIR__ . "/includes/footer.php";

