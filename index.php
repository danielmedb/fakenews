<?php
require __DIR__ . "/config.php";
require __DIR__ . "/header.php";
?>


<body>
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 pl-0 mb-0">
                <a class="navbar-brand" href="#">Fake News Factory</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item <?php echo (!isset($_GET['page']) ? 'active' : ''); ?>">
                            <a class="nav-link" href="/">Nyheter</a>
                        </li>
                        <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'sport' ? 'active' : ''); ?>">
                            <a class="nav-link" href="?page=sport">Sport</a>
                        </li>
                        <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'ekonomi' ? 'active' : ''); ?>">
                            <a class="nav-link" href="?page=ekonomi">Ekonomi</a>
                        </li>
                        <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] == 'kultur' ? 'active' : ''); ?>">
                            <a class="nav-link" href="?page=kultur">Kultur</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <div class="row justify-content-center" style="margin-top: 20px;">
            <?php

            if (isset($_GET['page']) && $_GET['page'] != '') {
                $page = $_GET['page'];
                switch ($page) {

                    case $page:
                        $build = array('value' => ucfirst($page), 'column' => 'categori');
                        $posts = buildPosts($build, $posts);
                        include 'news.php';
                        break;
                }
            } else {
                $build = array('value' => 'all', 'column' => 'categori');
                $posts = buildPosts($build, $posts);
                include 'news.php';
            }

            ?>
            <!-- <div class="col-lg-4 col-xl-4">
                <?php //require 'sidebar_right.php'; 
                ?>
            </div> -->
        </div>
    </div>
</body>

</html>