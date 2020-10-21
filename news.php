<section class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 pl-0">
    <?php foreach ($posts as $post) :  ?>
        <article class="post col-12 p-0">
            <div class="card">
                <div class="card-header text-center p-0">
                    <img class="img-fluid" src="<?= $post['img']; ?>" />
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="card-title"><?= $post['title']; ?></h5>
                    </div>
                    <div class="card-content" words="<?= str_word_count($post['content']); ?>">
                        <?php
                        echo $post['content'];
                        ?>
                    </div>
                    <p>Läs hela nyheten</p>
                </div>
                <span>
                    <h6 class="small float-left mb-0 m-2" style="margin-left: 20px !important;">
                        <span class="fa-stack fa-1x like-post">
                            <span class="far fa-thumbs-up fa-2x"></span>
                            <span class="fa-stack-1x" likes="<?= $post['likes']; ?>" style="font-size: 0.65rem; margin-top: 3px; padding-right: 5px;">
                                <?= $post['likes']; ?>
                            </span>
                        </span>
                    </h6>
                    <h6 class="small float-right mb-0 m-2">

                        <?= $post['published_date']; ?>
                        <a href="/<?= getAuthor($authors, $post['author'], 'name'); ?>">
                            <?= getAuthor($authors, $post['author'], 'name'); ?>
                        </a>
                        <img class="rounded-circle" style="width: 40px; height: 40px;" src="<?= getAuthor($authors, $post['author'], 'img'); ?>" />
                    </h6>
                </span>
            </div>
        </article>
    <?php endforeach; ?>
</section>