<?php
include "config.php";

$id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
$suachua = $d->rawQueryOne("select content$lang from #_news where type = 'sua-chua' and id = ? limit 0,1", array($id));
?>
<?php if (!empty($suachua['content' . $lang])) { ?>
    <div class="scroll_content">
        <div class="scroll_content_">
            <div><?= $func->decodeHtmlChars($suachua['content' . $lang]) ?></div>
        </div>
    </div>
<?php } ?>