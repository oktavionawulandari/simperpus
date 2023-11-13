<?php require_once('.\koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta -->
    <?php include('.\parts\inc_meta.php'); ?>
    <title>Document</title>
</head>

<body>
    <!-- header -->
    <header>
        <?php include('.\parts\inc_header.php'); ?>
    </header>
    <!-- body -->
    <main>
        <div class="m-5">
            <?php include('.\pages.php'); ?>
        </div>
    </main>
    <!-- footer -->
    <footer class="py-5 text-light" style="background-color:#2383b6;">
        <?php include('.\parts\inc_footer.php'); ?>
    </footer>
    <!-- js -->
    <?php require_once('.\parts\inc_js.php'); ?>

</body>

</html>