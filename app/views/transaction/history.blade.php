@section('content')
    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Lịch sử</span>
            nạp thẻ
        </span>
    </h3>

    <div class="row" style=" margin-bottom: 500px;">
        <div class="col-xs-12">
            <table id="functions" class="table dataTable"/>
                <thead>
                    <tr>
                        <th class="fix-width-80">Loại thẻ</th>
                        <th class="fix-width-100">Serial</th>
                        <th class="fix-width-80">Mệnh giá</th>
                        <th class="fix-width-80">G-Coin</th>
                        <th class="fix-width-100">Megacard (+)</th>
                        <th class="fix-width-100">Khuyến mại (+)</th>
                        <th class="fix-width-170">Voucher (+)</th>
                        <th class="fix-width-50">Tổng</th>
                        <th class="fix-width-120">Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trans as $tran)
                        <tr>
                            <?php $strCards = str_replace(['MGC', 'ONC', 'ZING', 'FPT', 'VTT', 'VMS', 'VNP'], [' Megacard', ' Oncash', ' Zing', ' Gate', ' Viettel', ' Mobifone', ' Vinaphone'], $tran->telco_code) ?>
                            <td>{{ $strCards }}</td>
                            <td>{{ $tran->card_serial }}</td>
                            <td class="money-format">{{ (int)$tran->real_amount }}</td>
                            <td class="money-format">{{ (int)$tran->real_amount/100 }}</td>
                            <td> <span class="money-format">{{ !empty($tran->discount_card_amount) ? (int)$tran->discount_card_amount/100 : 0 }}</span></td>
                            <td> <span class="money-format">{{ !empty($tran->discount_saleoff_amount) ? (int)$tran->discount_saleoff_amount/100 : 0 }}</span></td>
                            <td><span class="money-format">{{ (int)$tran->discount_voucher_amount/100 }}</span> - [{{ !empty($tran->voucher_code) ? $tran->voucher_code : 'Không sử dụng' }}] </td>
                            <td class="money-format">{{ (int)$tran->total_amount/100 }}</td>
                            <td>{{ date('H:i - d/m/Y', strtotime($tran->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: center;">
                {{ $trans->links() }}
            </div>
        </div>
    </div>

@stop