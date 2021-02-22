    <section class="content-header">
      <h1>
        <?php echo $title;?>
        <small>Statistic</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>
    <section class="content">
        <div class="box"  style="border-top: 3px solid #605ca8">
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"> <?php print_r($pengunjung[0]->count);?></h5>
                        <span>Pengunjung</span><br/>
                        <span class="description-percentage text-gray"> 
                          <i class="fa fa-date"></i> Today
                        </span>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"><?php print_r($pages[0]->count);?></h5>
                        <span >Pages</span><br/>
                        <span class="description-percentage text-gray">Total</span>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"><?php print_r($posting[0]->count);?></h5>
                        <span >Posting</span><br/>
                        <span class="description-percentage text-gray">Total</span>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"><?php print_r($album[0]->count);?></h5>
                        <span >Album</span><br/>
                        <span class="description-percentage text-gray">Total</span>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block">
                        <h5 class="description-header"><?php print_r($video[0]->count);?></h5>
                        <span >Video</span><br/>
                        <span class="description-percentage text-gray">Total</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                  <div class="box" style="border-top: 3px solid #605ca8">
                    <div class="box-header with-border">
                      <h3 class="box-title">Chart Report</h3>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="chart">
                            <div id="container" style="min-width: 100%; height: 100%; margin: 0 auto; padding: 20px 80px 20px 70px"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
  Highcharts.chart('container', {

    chart: {
        scrollablePlotArea: {
            minWidth: 700
        }
    },

    data: {
        csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
        beforeParse: function (csv) {
            return csv.replace(/\n\n/g, '\n');
        }
    },

    title: {
        text: 'Daily sessions at www.highcharts.com'
    },

    subtitle: {
        text: 'Source: Google Analytics'
    },

    xAxis: {
        tickInterval: 7 * 24 * 3600 * 1000, // one week
        tickWidth: 0,
        gridLineWidth: 1,
        labels: {
            align: 'left',
            x: 3,
            y: -3
        }
    },

    yAxis: [{ // left y axis
        title: {
            text: null
        },
        labels: {
            align: 'left',
            x: 3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }, { // right y axis
        linkedTo: 0,
        gridLineWidth: 0,
        opposite: true,
        title: {
            text: null
        },
        labels: {
            align: 'right',
            x: -3,
            y: 16,
            format: '{value:.,0f}'
        },
        showFirstLabel: false
    }],

    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },

    tooltip: {
        shared: true,
        crosshairs: true
    },

    plotOptions: {
        series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function (e) {
                        hs.htmlExpand(null, {
                            pageOrigin: {
                                x: e.pageX || e.clientX,
                                y: e.pageY || e.clientY
                            },
                            headingText: this.series.name,
                            maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
                                this.y + ' sessions',
                            width: 200
                        });
                    }
                }
            },
            marker: {
                lineWidth: 1
            }
        }
    },

    series: [{
        name: 'All sessions',
        lineWidth: 4,
        marker: {
            radius: 4
        }
    }, {
        name: 'New users'
    }]
});
</script>