<? require_once PATH_SYSTEM . '/view/layout/block/css.php' ?>

<body>
    <?


    require_once PATH_SYSTEM . '/view/layout/block/header.php';
    require_once PATH_SYSTEM . '/view/layout/block/sidebar.php';

    require_once PATH_SYSTEM . '/view/layout/block/player.php';
    ?>
    <!-- main content -->
    <main class="main">
        <div class="container-fluid">
            <? if ($controller != 'home') { ?>
            <div class="row row--grid">
                <!-- breadcrumb -->
                <? require_once PATH_SYSTEM . '/view/layout/block/breadcrumb.php'; ?>

                <!-- end breadcrumb -->

            </div>
            <? require_once PATH_SYSTEM . '/view/' . $content  . '.php'; ?>

            <? } else {
                require_once PATH_SYSTEM . '/view/' . $content  . '.php';
            }
            ?>


        </div>
    </main>
    <!-- end main content -->
    <!-- JS -->
    <?
    require_once PATH_SYSTEM . '/view/layout/block/footer.php';
    require_once PATH_SYSTEM . '/view/layout/block/js.php' ?>

</body>

</html>