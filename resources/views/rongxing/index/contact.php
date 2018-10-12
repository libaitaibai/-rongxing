

<!--<header>-->
<!--    <div class="top all clear-fix">-->
<!--        <div class="pbtn-back"><a href="javascript:history.go(-1)"><img src="/rongxing/images/back.png"></a></div>-->
<!--        <div class="cbtn-inav">导航<span class="traangle"></span></div>-->
<!--        <div class="si-tl"><h1>联系我们</h1></div>-->
<!--    </div>-->
<!--</header>-->

<section class="c-section">
    <div class="all">
        <div class="cdtl-border b-r5">
            <div class="cdtl-txt">
                <div class="page-title">联系我们</div>
                <div class="clear"></div>
                <div class="page-content">

                    <p style="TEXT-ALIGN: left">
                        <img src="/rongxing/upfile/201408/2014082249858313.jpg" width="690"/>
                    </p>

                    <p style="TEXT-ALIGN: center">
                        <br/><strong>荣兴制冷设备经营有限公司联系方式</strong>
                    </p>

                    <br>

                    <p style="TEXT-ALIGN: center">
                    <div id="container" style=" HEIGHT: 232px"></div>
                    </p>
                    <br>
                    <p style="TEXT-ALIGN: left">
                        <strong>联系人：</strong>兰经理
                    </p>
                    <p style="TEXT-ALIGN: left">
                        <strong>电　话：</strong>0371-63881142
                    </p>
                    <p style="TEXT-ALIGN: left">
                        <strong>传　真：</strong>0371-63881142
                    </p>
                    <p style="TEXT-ALIGN: left">
                        <strong>手　机：</strong>137-0088-2923
                    </p>
                    <p style="TEXT-ALIGN: left">
                        <strong>Ｑ　Ｑ：</strong>496713192
                    </p>
                    <p style="TEXT-ALIGN: left">
                        <strong>邮　箱：</strong>496713192@qq.com
                    </p>
                    <p style="TEXT-ALIGN: left">
                        <strong>地　址：</strong>河南省 郑州市 索凌路博颂路丰乐五金机电城
                        25号楼1单元1层东荣兴制冷
                        <span style="LINE-HEIGHT: 0px; DISPLAY: none" id="_baidu_bookmark_start_39"></span>
                    </p>

                </div>
                <div class="clear"></div>
                <div class="pages"></div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.3&key=f5ca1c43faf305b9c8f837e93c917f2d"></script>
<script type="text/javascript">
    var map = new AMap.Map('container', {
        resizeEnable: true,
        zoom: 12,
        center: [113.6338019371, 34.8068870483]
    });
    var marker = new AMap.Marker({
        position: [113.6338019371, 34.8068870483],
    });
    marker.setMap(map);

    marker.setLabel({
        //修改label相对于maker的位置
        offset: new AMap.Pixel(-56, -22),
        content: "河南荣兴制冷设备有限公司"
    });

</script>
<script type="text/javascript" src="https://webapi.amap.com/demos/js/liteToolbar.js"></script>
<script>
    $(".nav li a").each(function(){
        var status = $(".nav li a").hasClass('active');
        if(status){
            $(this).removeClass('active');
        }
        if($(this).text() == '联系我们'){
            $(this).addClass('active');
        }
    });
</script>


