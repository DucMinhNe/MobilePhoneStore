<div class="title-main"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>

<?php if ($level == 2) { ?>
    <div class="box-suachua row-news">
        <?php if (isset($news) && count($news) > 0) { ?>
            <?php foreach ($news as $k => $v) { ?>
                <div class="news d-flex flex-wrap pb-3">
                    <div class="info-suachua">
                        <h3>
                            <a class="name-suachua text-decoration-none text-split" data-id="<?= $v['id'] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                        </h3>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-warning w-100" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            </div>
        <?php } ?>
        <div class="col-12">
            <div class="load_content_suachua"></div>
        </div>
    </div>
<?php }
if ($level == 1) { ?>
    <div class="box-suachua row-news">
        <?php if (isset($news) && count($news) > 0) { ?>
            <?php foreach ($news as $k => $v) { ?>
                <div class="news d-flex flex-wrap pb-3">
                    <div class="info-suachua">
                        <h3>
                            <a class="name-suachua text-decoration-none text-split" data-id="<?= $v['id'] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                        </h3>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-warning w-100" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            </div>
        <?php } ?>
        <div class="col-12">
            <div class="load_content_suachua"></div>
        </div>
    </div>
<?php }
if ($level == 3) { ?>
    <div class="box-suachua-list row-news">
        <?php if (isset($suachuaMenu) && count($suachuaMenu) > 0) { ?>
            <?php foreach ($suachuaMenu as $k => $v) { ?>
                <div class="news d-flex flex-wrap pb-3">
                    <div class="info-suachua">
                        <h3>
                            <a class="name-suachua text-decoration-none text-split" href="<?= $v['slug' . $lang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                        </h3>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <div class="alert alert-warning w-100" role="alert">
                    <strong><?= khongtimthayketqua ?></strong>
                </div>
            </div>
        <?php } ?>
        <div class="col-12">
            <div class="content-static-suachua"><?= htmlspecialchars_decode($contentSuachua['content' . $lang]) ?></div>
        </div>
    </div>
<?php } ?>