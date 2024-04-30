        <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
        <script src="<?= $linkPath . "assets/js/main.js" ?>"></script>
        <?php foreach ($_GET["page"]["js"] ?? [] as $js) {
            echo '<script src="' . $linkPath . $js . '"></script>';
        } ?>
    </body>
</html>