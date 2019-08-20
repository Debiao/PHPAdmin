<?php /*a:2:{s:72:"/Users/mac/Desktop/ThinkAdmin-5/application/wechat/view/index/index.html";i:1564341490;s:64:"/Users/mac/Desktop/ThinkAdmin-5/application/admin/view/main.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><style>    .store-total-container {
        font-size: 14px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    .store-total-container .store-total-icon {
        top: 45%;
        right: 8%;
        font-size: 65px;
        position: absolute;
        color: rgba(255, 255, 255, 0.4);
    }

    .store-total-container .store-total-item {
        color: #fff;
        line-height: 4em;
        padding: 15px 25px;
        position: relative;
    }

    .store-total-container .store-total-item > div:nth-child(2) {
        font-size: 46px;
        line-height: 46px;
    }

</style><div class="think-box-shadow store-total-container notselect"><div class="margin-bottom-15">微信统计</div><div class="layui-row layui-col-space15"><div class="layui-col-sm6 layui-col-md3"><div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)"><div>粉丝数量</div><div><?php echo htmlentities((isset($totalFans) && ($totalFans !== '')?$totalFans:'0')); ?></div><div>关注的粉丝数量</div></div><i class="store-total-icon layui-icon layui-icon-user"></i></div><div class="layui-col-sm6 layui-col-md3"><div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)"><div>黑粉数量</div><div><?php echo htmlentities((isset($totalBlack) && ($totalBlack !== '')?$totalBlack:'0')); ?></div><div>拉黑的粉丝数量</div></div><i class="store-total-icon layui-icon layui-icon-auz"></i></div><div class="layui-col-sm6 layui-col-md3"><div class="store-total-item nowrap" style="background:linear-gradient(-113deg,#c543d8,#925cc3)"><div>图文总数</div><div><?php echo htmlentities((isset($totalNews) && ($totalNews !== '')?$totalNews:'0')); ?></div><div>图文素材数量</div></div><i class="store-total-icon layui-icon layui-icon-read"></i></div><div class="layui-col-sm6 layui-col-md3"><div class="store-total-item nowrap" style="background:linear-gradient(-141deg,#ecca1b,#f39526)"><div>回复数量</div><div><?php echo htmlentities((isset($totalRule) && ($totalRule !== '')?$totalRule:'0')); ?></div><div>回复规则数量</div></div><i class="store-total-icon layui-icon layui-icon-survey"></i></div></div></div><div class="think-box-shadow store-total-container"><div class="margin-bottom-15">近六月粉丝趋势</div><div id="main" style="height:390px"></div></div><script>
    require(['echarts'], function (echarts, chart) {
        chart = echarts.init(document.getElementById('main'));
        window.onresize = chart.resize;
        chart.setOption({
            tooltip: {trigger: 'axis'},
            grid: {top: '10%', left: '3%', right: '8%', bottom: '3%', containLabel: true},
            xAxis: [{
                type: 'category', scale: false,
                boundaryGap: false,
                axisLabel: {
                    color: '#2f9de2',
                },
                data: eval('<?php echo json_encode($totalJson['xs']); ?>')
            }],
            yAxis: [{
                type: 'value',
                scale: true,
                max: function (value) {
                    return Math.ceil(value.max / 50) * 50 + 100;
                },
                axisLabel: {
                    color: '#2f9de2',
                    formatter: "{value}人"
                },
                splitLine: {
                    lineStyle: {
                        type: 'dashed',
                        color: '#cccccc'
                    }
                }
            }],
            legend: {data: ['粉丝数量', '拉黑粉丝']},
            series: [
                {
                    type: 'line',
                    name: '粉丝数量',
                    label: {normal: {show: true, position: ['30%', '-100%'], offset: [10, -10], formatter: "粉丝{c}人"}},
                    data: eval('<?php echo json_encode($totalJson['ys']['_0']); ?>')
                },
                {
                    type: 'line',
                    name: '拉黑粉丝',
                    label: {normal: {show: true, position: ['30%', '-100%'], offset: [10, -10], formatter: "拉黑{c}人"}},
                    data: eval('<?php echo json_encode($totalJson['ys']['_1']); ?>')
                }
            ]
        });
    });
</script></div></div>