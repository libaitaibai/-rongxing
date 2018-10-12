<section class="c-section">
    <div class="all">
        <div class="cdtl-border b-r5">
            <div class="cdtl-txt">
                <div class="page-title">产品展示</div>
                <div class="clear"></div>
                <div class="item">
                    <div class="item-loop prolist clear-fix">

                        <?php foreach ($data as $detail): ?>
                            <div class="loop metro-b"><a href="../hssy/63.html"><span class="pic"><img src="https://www.rongxingzhileng.cn<?= $detail['showImage']?>"                      width="100%"></span><span class="text"><?= $detail['title']?></span></a></div>
                        <?php endforeach; ?>

                        <!--                        <div class="loop metro-b"><a href="../hssy/63.html"><span class="pic"><img src="https://www.rongxingzhileng.cn/Upload/image/20180624/20180624162511_10130.jpg" width="100%"></span><span class="text">摄影照片</span></a></div>-->

                    </div>
                </div>
                <div class="clear"></div>
                <?= $page?>
                <!--                <div class="page-more"><a href="../list.asp_root=products&page=2index.html"><i class="fa fa-spinner fa-pulse"></i> 正在玩命加载中...</a></div>-->
            </div>
        </div>
    </div>
</section>
<style>
    .prolist .metro-b .text {
        font:0.9em/2 "Microsoft Yahei";
    }
</style>