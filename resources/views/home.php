<?php
include __DIR__ . "/includes/header.php";
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}
$user = $_SESSION['user'];
?>
<div class="grid h-screen grid-rows-[auto_1fr]">
    <header class="w-screen p-5 bg-indigo-700 text-white font-bold">
        <nav class="flex justify-between items-center w-full">
            <p> Olá, <?php echo $user->name_user?></p>
            <div>
                <form id="logout" action="">
                    <button>Sair</button>
                </form>
            </div>
        </nav>
    </header>
    <main class="flex justify-center items-center w-screen mx-auto p-5 bg-black/5">
        <div class="bg-white h-96 flex border-2 border-collapse shadow-md flex-col gap-5 justify-center items-center p-5 rounded-md text-center text-gray-700 font-bold">
            <h1 class="line-clamp-1">Informações do usuário logado:</h1>
            <p class="line-clamp-1">Email: <?php echo $user->email_user ?></p>
            <p class="line-clamp-1">Título: <?php echo $user->title_user ?></p>
            <p class="line-clamp-1">Código/Nome do usuário: <?php echo $user->code_user ?></p>
        </div>
    </main>
</div>
<?php include __DIR__ . "/includes/footer.php";
