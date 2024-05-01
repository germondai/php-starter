<?php
require_once "includes/config.php";
header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
$_GET['page']['title'] = '404 - Page Not Found!';
include $basePath . "includes/header.php";
?>

<main class="w-screen h-screen grid place-items-center">
    <div class="flex flex-col items-center gap-4">
        <span class="text-[64px]">😥</span>
        <h1 class="font-bold">Page Not Found!</h1>
    </div>
</main>

<?php include $basePath . "includes/footer.php"; ?>
