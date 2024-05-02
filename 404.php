<?php

#imports
use Utils\PageHelper;

# require config
require_once "includes/config.php";

# set error header (404)
header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");

# set page title (must be set before header.php inclusion)
PageHelper::setTitle('404 - Page Not Found!');

# include header
include $basePath . "includes/header.php";

?>

<main class="w-screen h-screen grid place-items-center">
    <div class="flex flex-col items-center gap-4">
        <span class="text-[64px]">😥</span>
        <h1 class="font-bold">Page Not Found!</h1>
    </div>
</main>

<?php include $basePath . "includes/footer.php"; ?>
