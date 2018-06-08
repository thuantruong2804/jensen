@section('content')

    @include('elements/menu_profile')

    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Nạp</span>
            thẻ cào
        </span>
    </h3>

    <div class="row" style="margin-bottom: 300px;">
        <div class="col-xs-4">
            <div class='gvc-box' style="margin-top: 20px;">
                <h3 class="color-white" style="text-align: center; font-size: 18px; font-family: RobotoMedium;">TIN TỨC KHUYẾN MẠI</h3>
                @if (empty($discount))
                    <p class="color-white" >Không có sự kiện khuyến mại nào được áp dụng</p>
                @else
                    <p class="color-white" >{{ $discount->Discount_Name }}</p>
                    <p class="color-white" >Khuyến mại: {{ $discount->Discount_Percent }}%</p>
                    <p class="color-white" >
                        Áp dụng:
                        <?php $strCards = str_replace(['MGC', 'ONC', 'ZING', 'FPT', 'VTT', 'VMS', 'VNP'], [' Megacard', ' Oncash', ' Zing', ' Gate', ' Viettel', ' Mobifone', ' Vinaphone'], $discount->Discount_Card_Apply) ?>
                        {{ $strCards }}
                    </p>
                    <p class="color-white" >Thời gian kết thúc: {{ date('d/m/Y', strtotime($discount->Discount_Exprire_Date)) }}</p>
                @endif
            </div>
            <div class='gvc-box' style="margin-top: 20px;">
                <h3 class="color-white" style="text-align: center; font-size: 18px; font-family: RobotoMedium;">BẢNG GIÁ QUY ĐỔI</h3>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2">
                        <p class="color-white" >VNĐ</p>
                        <p class="color-white" >10.000</p>
                        <p class="color-white" >20.000</p>
                        <p class="color-white" >50.000</p>
                        <p class="color-white" >100.000</p>
                        <p class="color-white" >200.000</p>
                        <p class="color-white" >500.000</p>
                    </div>
                    <div class="col-xs-4 col-xs-offset-1">
                        <p class="color-white" >G-Coin</p>
                        <p class="color-white" >100</p>
                        <p class="color-white" >200</p>
                        <p class="color-white" >500</p>
                        <p class="color-white" >1.000</p>
                        <p class="color-white" >2.000</p>
                        <p class="color-white" >5.000</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-xs-offset-1" style="margin-top: 20px;">
            {{
                Form::open(array(
                    'action' => 'TransactionController@chargingapi',
                    'class' => 'form-horizontal',
                    'id' => 'form-charging',
                    'method' => 'post',
                    'data-remote' => 'true',
                    'data-type' => 'json',
                    'novalidate'
                ))
            }}
                <div class="form-group">
                    <label for="" class="col-xs-4 control-label">Chọn loại thẻ cào *:</label>
                    <div class="col-xs-8">
                        <select name="telcoCode" class="form-control">
                            <option value="">Chọn loại thẻ</option>
                            <option value="MGC">Thẻ Megacard</option>
                            <option value="FPT">Thẻ Gate</option>
                            <option value="ZING">Thẻ ZING</option>
                            <option value="ONC">Thẻ Oncash</option>
                            <option value="VTT">Thẻ Viettel</option>
                            <option value="VMS">Thẻ Mobifone</option>
                            <option value="VNP">Thẻ Vinaphone</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-xs-4 control-label">Số serial *:</label>
                    <div class="col-xs-8">
                        <input type="text" name="cardSerial" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-4 control-label">Mã thẻ cào *:</label>
                    <div class="col-xs-8">
                        <input type="text" name="cardPin" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-xs-4 control-label">Mã khuyến mại:</label>
                    <div class="col-xs-8">
                        <input type="text" name="voucher" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8 col-xs-offset-4">
                        <div class="g-recaptcha" data-sitekey="{{ $recaptchaPublickey }}" style="transform:scale(1.075);-webkit-transform:scale(1.075);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8 col-xs-offset-4">
                        <div class="">
                            <p id="charging-error" style="color: red; font-size: 16px;">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8 col-xs-offset-4">
                        <button class="btn btn-default db" type="submit">Nạp tiền</button>
                    </div>
                </div>
            {{Form::close()}}
        </div>
    </div>

@stop

@section('scripts')
    <script>
        (function($) {
            var $document = $(document);
            
            /**
             * login (normal)
             */
            $document.on({
                'ajax:beforeSend': function() {
                    $.utils.clearFieldError('form-charging');
                    $(this).find('.btn').attr('disabled', 'disabled');
                    $('#charging-error').text('');
                    $('.alert').css('display', 'none');
                    $('.ajax-loading').css('display', 'block');
                },
                'ajax:success': function(e, data) {
                    console.log(data);
                    if (data.status) {
                        if (typeof data.redirect != '') {
                            window.location.href = data.redirect;
                        } else {
                            window.location.reload();
                        }
                        
                    } else {
                        if (data.code == 'invalid_data') {
                            for (var field in data.messages) {
                                $.utils.showFieldError('form-charging', field, data.messages[field][0], 1);
                            }
                            $.utils.autoFocus('form-charging', '.input-error');
                            $('.ajax-loading').css('display', 'none');
                        }
                        else {
                            $('#charging-error').text(data.message);
                            $('.alert').css('display', 'block');
                            $('.ajax-loading').css('display', 'none');
                        }
                        grecaptcha.reset();
                    }
                },
                'ajax:complete': function() {
                    $(this).find('.btn').removeAttr('disabled');
                }
        
            }, '#form-charging');
            
         })(jQuery);
    </script>
@stop