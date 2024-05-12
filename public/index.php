<?php

# require config
require_once "../src/includes/config.php";

# include header
include $basePath . "src/includes/header.php";

?>

<main class="w-screen h-screen grid place-items-center">
    <div class="flex flex-col items-center gap-6">
        <div class="flex items-center gap-4">
            <a href="https://github.com/germondai/php-starter/" target="_blank" class="flex items-center gap-4 [font-size:var(--font-h1)] font-bold underline">
                <span>PHP Starter</span>
                <img src="assets/img/favicon.ico" alt="Rocket" class="size-8">
            </a>
        </div>
        <div class="flex flex-col items-center gap-2">
            <b>Features</b>
            <ul class="list-disc">
                <li>Own API System</li>
                <li>Security</li>
                <ul class="list-disc pl-5">
                    <li>Routing</li>
                    <li>File and Dir access</li>
                </ul>
                <li>Custom Utils</li>
                <li>Organized Structure</li>
                <li>Nette</li>
                <ul class="list-disc pl-5">
                    <li>Database Explorer</li>
                    <li>Tracy</li>
                </ul>
                <li>Environment (.env)</li>
            </ul>
        </div>
    </div>
</main>

<?php

# include footer
include $basePath . "src/includes/footer.php";

?>
