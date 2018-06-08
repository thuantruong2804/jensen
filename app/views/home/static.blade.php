@section('content')
    <h3 class="nk-decorated-h-2">
        <span>
            Thống <span class="text-main-1"> kê</span>
        </span>
    </h3>

    <div class="row" style="margin-bottom: 300px;">
        <div class="col-xs-12">
            {{ Form::open(array(
                'url' => URL::to('/thong-ke'),
                'class' => '',
                'method' => 'get',
            )) }}
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label class="color-white">Từ ngày</label>
                        <div class="input-group timepicker">
                            <?php
                            $start_date = date('d-m-Y');
                            if (!isset($input['start_date']) && !isset($input['end_date'])) {
                                $start_date = date('d-m-Y');
                            } elseif (isset($input['start_date'])) {
                                $start_date = $input['start_date'];
                            }
                            ?>
                            <input id="search-time-to-date" type="text" readonly="readonly" name="start_date" class="form-control has-datepicker" value="{{ $start_date }}" />
                            <label class="input-group-addon" for="search-time-to-date"><i class="glyphicon glyphicon-calendar"></i></label>
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <label class="color-white">Đến ngày</label>
                        <div class="input-group timepicker">
                            <input id="search-time-end-date" type="text" readonly="readonly" name="end_date" class="form-control has-datepicker" value="{{ isset($input['end_date']) ? $input['end_date'] : date('d-m-Y') }}" />
                            <label class="input-group-addon" for="search-time-end-date"><i class="glyphicon glyphicon-calendar"></i></label>
                        </div>
                    </div>
                    <div class="col-sm-1 form-group">
                        <button class="btn btn-default pull-right" type="submit" style="margin-top: 25px; padding: 6px 8px;"> Tìm kiếm</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-xs-8">
            <div id="line_bottom_x" style="width: 100%; height: 400px; margin-bottom: 50px;"></div>
        </div>
        <div class="col-xs-4">
            <div id="donutchart" style="width: 100%; height: 300px; margin-bottom: 10px; margin-top: 30px;"></div>
            <p class="color-white" style="text-align: center;">Thống kê về giới tính</p>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Day');
            data.addColumn('number', 'Online đông nhất');
            data.addColumn('number', 'Lượt truy cập');
            data.addColumn('number', 'Tài khoản đăng ký');
            data.addColumn('number', 'Nhân vật khởi tạo');

            data.addRows([
                <?php $counts = sizeof($statics); ?>
                <?php while($counts) { ?>
                    <?php $counts --; ?>
                    [ '<?php echo date('d/m', strtotime($statics[$counts]->Date)); ?>',  <?php echo $statics[$counts]->Highest_Online; ?>, <?php echo $statics[$counts]->Count_Access; ?>, <?php echo $statics[$counts]->Count_Account; ?>, <?php echo $statics[$counts]->Count_Character; ?>],
                <?php } ?>
            ]);

            var options = {
                chart: {
                    //title: 'Box Office Earnings in First Two Weeks of Opening',
                    //subtitle: 'in millions of dollars (USD)'
                },
                //height: 400,
                //width: 1050,
                axes: {
                    x: {
                        0: {
                            side: 'bottom',
                            textStyle: {color: '#fff'},
                            baselineColor: '#fff'
                        }
                    }
                },

                backgroundColor: 'transparent',
                backgroundColor: {
                    fill: 'transparent',
                },
                chartArea: {
                    backgroundColor: 'transparent',
                    left: 30,top: 70,width:'100%',height: 250
                },

                legend: {
                    position: 'top',
                    textStyle: {color: '#fff'}
                },
                pointsVisible: true,
                curveType: 'function',
                pointSize: 4,
                vAxis: {
                    textStyle: {color: '#fff'},
                    baselineColor: '#eee'
                },
                hAxis: {
                    textStyle: {color: '#fff'},
                    baselineColor: '#eee'
                },

            };
            var chart = new google.visualization.LineChart(document.getElementById('line_bottom_x'));
            chart.draw(data, options);
        }


        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Money'],
                ['Nam',     <?php echo $male; ?>],
                ['Nữ',       <?php echo $female; ?>],
            ]);

            var options = {
                pieHole: 1,
                backgroundColor: 'transparent',
                legend: 'none',
                pieSliceText: 'label',
                chartArea: {
                    left:10,top:50,width:'100%',height:'68%'
                },
                tooltip: {
                    ignoreBounds: true
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
@stop