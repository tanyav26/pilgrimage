
<form action="<?php echo $this->link('/system/admin/index!#summary') ?>">
    <fieldset>
        <div id="placeholder" class="row-fluid" style="height: 300px; margin-bottom: 10px"></div>
    </fieldset>
    <fieldset>
        <hr />
        <div class="row-fluid top-pad">
            <div class="span12">
                
                <div class="">
                    <h4 class="bottom-pad">Welcome your newest members</h4>
                    <ul class="thumbnails">
                        <?php for ($i = 0; $i < 14; $i++): ?>
                            <li>
                                <a href="#" class="thumbnail">
                                    <img src="http://placehold.it/64x64" alt=""/>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <h4>Welcome your newest members</h4>
                <div class="top-pad">
                    <ul class="thumbnails">
                        <?php for ($i = 0; $i < 14; $i++): ?>
                            <li>
                                <a href="#" class="thumbnail">
                                    <img src="http://placehold.it/64x64" alt=""/>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>

        </div>
    </fieldset>
</form>


<script type="text/javascript" src="/~livingstonefultang/<?php echo $this->getTemplateName() ?>/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript">
    $(function () {
        var a = [],
        b=[[1.3242528e+12,90],[1.3243392e+12,102],[1.3244256e+12,57],[1.324512e+12,40],[1.3245984e+12,0],[1.3246848e+12,0],[1.3247712e+12,0],[1.3248576e+12,0],[1.324944e+12,1],[1.3250304e+12,89],[1.3251168e+12,99],[1.3252032e+12,108],[1.3252896e+12,150],[1.325376e+12,170],[1.3254624e+12,190],[1.3255488e+12,185],[1.3256352e+12,187],[1.3257216e+12,197],[1.325808e+12,200],[1.3258944e+12,225],[1.3259808e+12,209],[1.3260672e+12,227],[1.3261536e+12,231],[1.32624e+12,235],[1.3263264e+12,237],[1.3264128e+12,242],[1.3264992e+12,230],[1.3265856e+12,229]],
        c=[],
        d = [[1.3242528e+12,2],[1.3243392e+12,2],[1.3244256e+12,2],[1.324512e+12,3],[1.3245984e+12,0],[1.3246848e+12,0],[1.3247712e+12,0],[1.3248576e+12,0],[1.324944e+12,1],[1.3250304e+12,2],[1.3251168e+12,0],[1.3252032e+12,0],[1.3252896e+12,0],[1.325376e+12,0],[1.3254624e+12,0],[1.3255488e+12,0],[1.3256352e+12,0],[1.3257216e+12,0],[1.325808e+12,0],[1.3258944e+12,45],[1.3259808e+12,100],[1.3260672e+12,197],[1.3261536e+12,201],[1.32624e+12,225],[1.3263264e+12,207],[1.3264128e+12,172],[1.3264992e+12,150],[1.3265856e+12,189]];
        // first correct the timestamps - they are recorded as the daily
        // midnights in UTC+0100, but Flot always displays dates in UTC
        // so we have to add one hour to hit the midnights in the plot
        for (var i = 0; i < d.length; ++i)
            d[i][0] += 60 * 60 * 1000;
    
        for (var i = 0; i < a.length; ++i)
            a[i][0] += 60 * 60 * 1000;
  

        // helper for returning the weekends in a period
        function weekendAreas(axes) {
            var markings = [];
            var d = new Date(axes.xaxis.min);
            // go to the first Saturday
            d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
            d.setUTCSeconds(0);
            d.setUTCMinutes(0);
            d.setUTCHours(0);
            var i = d.getTime();
            do {
                // when we don't set yaxis, the rectangle automatically
                // extends to infinity upwards and downwards
                markings.push({ xaxis: { from: i, to: i + 2 * 24 * 60 * 60 * 1000 } });
                i += 7 * 24 * 60 * 60 * 1000;
            } while (i < axes.xaxis.max);

            return markings;
        }
    
        var options = {
            xaxis: { mode: "time" },
            selection: { mode: "x" },
            crosshair: { mode: "x" },
            lines: {steps: false},
            legend: {position: "nw" },
            grid: { hoverable: true, clickable: true ,borderWidth: 0, borderColor: null},
            series:{ lines: { show: true,  fill: 0.1, lineWidth: 3 },points: { show: false , radius:4, symbol:"circle" } },
            colors: [ "green", "rgb(94, 134, 231)", "rgb(87, 147, 189)", "rgb(0, 136, 204)" ]
        };
    
        var plot = $.plot($("#placeholder"), [{data:d,color:3},{data:b,color:0}], options);
    
        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y + 5,
                left: x + 5,
                border: '1px solid #fdd',
                padding: '2px',
                'background-color': '#fee',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#placeholder").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.datapoint) {
                    previousPoint = item.datapoint;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(0),
                    y = item.datapoint[1].toFixed(0),
                    date = new Date(x/1000),
                    day  = date.getDay(),
                    month = date.getMonth(),
                    year  = date.getYear(),
                    hours = date.getHours(),
                    minutes = date.getMinutes(),
                    seconds = date.getSeconds(),
                    formattedTime = day+'/'+month+'/'+year+' at '+hours + ' hours : ' + minutes + ' mins : ' + seconds+' sec';
                    
                    showTooltip(item.pageX, item.pageY,
                    y + " "+ item.series.label );
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
        
        });

        $("#placeholder").bind("plotclick", function (event, pos, item) {
            if (item) {
                //alert("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
                plot.highlight(item.series, item.datapoint);
            }
        });

        // now connect the two
    
        $("#placeholder").bind("plotselected", function (event, ranges) {
            // do the zooming
            plot = $.plot($("#placeholder"), [{data:a,label: "page views",color:0},{data:b,label: "new members", color:1},{data:c,label: "time on site",color:2},{data:d,label: "status updates",color:3}],
            $.extend(true, {}, options, {
                xaxis: { min: ranges.xaxis.from, max: ranges.xaxis.to }
            }));

            // don't fire event on the overview to prevent eternal loop
            //overview.setSelection(ranges, true);
        });
    });
</script>