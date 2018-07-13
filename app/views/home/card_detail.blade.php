@section('content')
    <!--section welcome-->
    <div class="section" style="margin-top: 5px;">
        <div class="container">
            <div class="row text-center text-lg-left">
                @if (empty($card))
                    <div class="col-lg-12">
                        <h2 class="h2 text-center" style="color: #DC0000; margin-top: 100px; margin-bottom: 400px;">Không tìm thấy thông tin thẻ bảo hành!</h2>
                    </div>
                @else
                    <div class="col-lg-12">
                        <h2 class="h2 text-center" style="color: #DC0000; margin-top: 20px;">Tra cứu thành công</h2>
                        <h4 class="h4 text-center" style="color: #DC0000; margin-top: 10px;">Cám ơn bạn đã tin tưởng và sử dụng sản phẩm của chúng tôi!</h4>
                    </div>
                    <div class="col-lg-12">
                        <p style="margin-top: 50px;">Vui lòng kiểm tra kỹ thông tin dưới đây với thông tin cá nhân của bạn, để đảm bảo quyền lợi cá nhân cũng như trách nhiệm với chúng tôi. Liên hệ ngay với đơn vị chăm sóc, Lab ủy quyền và phòng khám Jensen nếu không đúng!</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{Asset('assets/frontend/images/Sample-F.png')}}" style="width: 100%">
                    </div>
                    <div class="col-lg-6">
                        <img src="{{Asset('assets/frontend/images/Sample-B.png')}}" style="width: 100%">
                    </div>
                    <div class="col-lg-12" style="margin-top: 20px;">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="font-weight: bold;">Xuất xứ/Origin:</td>
                                    <td>USA</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Số thẻ/Card no:</td>
                                    <td>{{ $card->card_no }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Họ tên/Name:</td>
                                    <td>{{ mb_strtoupper($card->card_name) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Phòng khám/Clinic:</td>
                                    <td>{{ mb_strtoupper($card->doctor) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Labo/Lab:</td>
                                    <td>{{ mb_strtoupper($card->lab) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Vị trí răng/Teeth number:</td>
                                    <td>{{ mb_strtoupper($card->position) }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Giá trị đến/Valid To:</td>
                                    <td>{{ date('d/m/Y', strtotime($card->expire)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12" style="margin-top: 20px;">
                        <h3 class="h3 text-center">Thẻ bảo hành Jensen</h3>
                        <div style="margin-top: 10px; border: 1px #96989A solid; border-radius: 5px; padding: 10px; ">
                            <p>Thẻ bảo hành Jensen của bạn đảm bảo cho bạn sự yên tâm rằng khoản đầu tư của bạn đã thực hiện trong sức khỏe răng miệng và ngoại hình của bạn sử dụng hàng chính hãng Jensen </p>
                            <p>Dưới đây là một số những điều bạn nên biết về thẻ bảo hành Jensen mà bạn được cung cấp</p>
                        </div>
                        <p style="color: #DC0000; margin-top: 20px;">*** Hãy hỏi bất kỳ câu hỏi nào khi bạn có thắc mắc qua hòm thư điện tử về thẻ bảo hành Jensen của bạn.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!--section-->
    <div class="section" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="container">
            
        </div>
    </div>
    <!--//section-->

    <!--section call us-->
@stop

