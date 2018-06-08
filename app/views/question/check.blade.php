@section('content')
    <h3 class="nk-decorated-h-2">
        <span>
            <span class="text-main-1">Đăng ký</span>
            Tài khoản
        </span>
    </h3>
    <ul class="wizard">
        <li class="selected">Bước 1 - Trả lời câu hỏi</li>
        <li>Bước 2 - GvC Terms</li>
        <li>Bước 3 - SAMP Terms</li>
        <li>Bước 4 - Điền thông tin</li>
        <li>Bước 5 - Hoàn tất đăng ký</li>
    </ul>
    <div class='gvc-box' style="margin-top: 20px;">
        <h3 style="color: #fff; font-family: RobotoMedium; text-align: center; font-size: 17px; margin-bottom: 20px;">Chào mừng bạn đã đến với <span class="color-red">GvC - Grand Theft Auto Vietnamese Community</span></h3>
        <p class="color-white"> Để tham gia cộng đồng của chúng tôi, bạn cần phải hoàn tất các bước đăng ký phía dưới, việc đăng ký tài khoản sẽ cho phép bạn khởi tạo một tài khoản quản lý tại GvC. Bạn có thể sử dụng nó để sử dụng các dịch vụ mà chúng tôi cung cấp và nó có thể sử dụng để quản lý nhiều nhân vật trong máy chủ của GvC, điều đó cho phép bạn có nhiều hơn một nhân vật trong môi trường Roleplay của GvC. Xin lưu ý, bạn sẽ không thể truy cập vào máy chủ cho tới khi bạn khởi tạo một nhân vật trong tài khoản quản lý của mình. </p>
        <p class="color-white"> * Để trả lời câu hỏi, bạn cần phải đọc những <a href="http://forum.gvc.vn/index.php?/topic/10-noi-quy-tai-gvc-cap-nhat-07052017/" class="color-red">quy tắc</a> của GvC.</p>
    </div>

    <div class="question-box">
        <h4 style="text-align: center; margin-top: 30px;" class="color-white">Danh sách câu hỏi</h4>
        <p style="color: #D01D34; font-size: 20px; text-align: center;">{{ $errorMessage }}</p>
        {{ Form::open(array(
                'url' => URL::to('/cau-hoi-dang-ky'),
                'id' => 'form-question-answer',
                'class' => '',
                'method' => 'post',
        )) }}
            <?php $countQuestions = 0; ?>
            <div class="row">
                <div class="col-xs-6">
                    @foreach ($questions as $question)
                        <?php if ($countQuestions == 5) break; ?>
                        <input type="hidden" name="questions[]" value="{{ $question->question_id }}">
                        <?php $countQuestions ++; ?>
                        <h3 class="question">{{ $countQuestions }}. {{ $question->content }}</h3>
                        <?php $answers = Answers::whereRaw('question_id = ?', [$question->question_id])->get(); ?>
                        @foreach ($answers as $answer)
                            <div class="radio-answers">
                                <label>
                                    <input type="radio" name="answer_question_{{ $question->question_id }}" value="{{ $answer->answer_id }}">
                                    {{ $answer->content }}
                                </label>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="col-xs-6">
                    <?php $countQuestions2 = 0; ?>
                    @foreach ($questions as $question)
                        <?php $countQuestions2 ++; ?>
                        <?php if ($countQuestions2 < 6) continue; ?>
                        <input type="hidden" name="questions[]" value="{{ $question->question_id }}">
                        <?php $countQuestions ++; ?>
                        <h3 class="question">{{ $countQuestions }}. {{ $question->content }}</h3>
                        <?php $answers = Answers::whereRaw('question_id = ?', [$question->question_id])->get(); ?>
                        @foreach ($answers as $answer)
                            <div class="radio-answers">
                                <label>
                                    <input type="radio" name="answer_question_{{ $question->question_id }}" value="{{ $answer->answer_id }}">
                                    {{ $answer->content }}
                                </label>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12" style="text-align: center">
                <button class="btn btn-default" type="submit" style="margin: 30px 30px;"> Gửi câu trả lời</button>
            </div>
        {{ Form::close() }}
    </div>
@stop