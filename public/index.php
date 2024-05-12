<?php

# require config
require_once "../src/includes/config.php";

# include header
include $basePath . "src/includes/header.php";

?>

<main class="w-screen h-screen grid place-items-center">
    <div class="flex flex-col items-center gap-4">
        <div class="flex items-center gap-4">
            <img src="assets/img/favicon.ico" alt="Rocket" class="size-8">
            <h1 class="font-bold">PHP Starter</h1>
        </div>
        <div class="flex flex-col items-center">
            <b>Features</b>
            <ul class="list-disc">
                <li>Security features</li>
                <li>Own API system</li>
                <li>Tailwind CSS</li>
                <li>jQuery</li>
                <li>Nette</li>
                <ul class="list-disc pl-5">
                    <li>DB Explorer</li>
                    <li>Tracy</li>
                </ul>
                <li>Environment (.env)</li>
                <li>Clean Interface 🤩</li>
            </ul>
        </div>
    </div>
</main>

<?php

# include footer
include $basePath . "src/includes/footer.php";

?>
