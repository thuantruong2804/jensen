@section('title')
    Quản lý ticket
@stop

@section('style')
@stop

@section('content')
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="widget-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                    </div>
                </div>
                <div style="max-width: 800px; margin-left: 100px;">
                    <h2 style="font-size: 24px; text-align: center;">{{{ $ticket->issue_summary }}}</h2>
                    <div class="row">
                        <div class="col-sm-2" style="text-align: center;">
                            <?php $currentAccount = Account::find($ticket->account_id); ?>
                            <img src="../../../assets/avatar/{{ $currentAccount->Model }}.png" alt="" class="img-circle" style="border: 1px #dadada solid; width: 60px; height: 60px;">
                            <p>{{ $currentAccount->UserName }}</p>
                        </div>
                        <div class="col-sm-10 issue">
                            <div style="border: 1px #dadada solid; border-radius: 5px 5px 5px 5px; text-align: left !important; padding: 5px; background-color: #dadada;">
                                <b style="color: rgb(217, 43, 76)">Topic: {{{ $ticket->topic }}}</b><br>
                                <b style="color: rgb(217, 43, 76)">Forum Profile Link: <a href="{{{ $ticket->forum_profile_link }}}">Bấm vào đây</a></b><br>
                                <b style="color: rgb(217, 43, 76)">Ngày khởi tạo: {{{ date('d-m-Y H:i:s', strtotime($ticket->created_at)) }}}</b><br>
                                <p>{{ $ticket->issue_detail }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    @foreach($comments as $comment)
                        @if ($comment->account_type == 1)
                            <div class="row">
                                <div class="col-sm-2" style="text-align: center;">
                                    <?php $currentAccount = Account::find($comment->account_id); ?>
                                    <img src="../../../assets/avatar/{{ $currentAccount->Model }}.png" alt="" class="img-circle" style="border: 1px #dadada solid; width: 60px; height: 60px;">
                                    <p>{{ $currentAccount->UserName }}</p>
                                </div>
                                <div class="col-sm-10 issue">
                                    <span style="font-size: 12px;">{{ date('d-m-Y H:i:s', strtotime($comment->created_at)) }}</span>
                                    <div style="border: 1px #dadada solid; border-radius: 5px 5px 5px 5px; text-align: left !important; padding: 5px; background-color: #dadada;">
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-10 issue">
                                    <span style="font-size: 12px;">{{ date('d-m-Y H:i:s', strtotime($comment->created_at)) }}</span>
                                    <div style="border: 1px #fff solid; border-radius: 5px 5px 5px 5px; text-align: left !important; padding: 5px; background-color: rgb(66, 169, 240);">
                                        <p style="color: #fff;">{{ $comment->content }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-2" style="text-align: center;">
                                    <?php $currentAccount = Account::find($comment->account_id); ?>
                                    <img src="../../../assets/avatar/{{ $currentAccount->Model }}.png" alt="" class="img-circle" style="border: 1px #fff solid; width: 60px; height: 60px;">
                                    <p>{{ $currentAccount->UserName }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                    @if ($ticket->status != 2)
                    {{
                        Form::open(array(
                            'action' => 'TicketController@adminconfirm',
                            'class' => '',
                            'id' => 'form-ticket-save',
                            'method' => 'post',
                            'novalidate'
                        ))
                    }}
                        <div class="">
                            <p id="login-error">
                            </p>
                        </div>
                        <div class="row" >
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10 form-group" style="margin-top: 100px;">
                                <textarea name="content" rows="3" placeholder="Nhập trả lời" class="form-control" id="ckeditor"></textarea>
                                <button class="btn btn-default db pull-right" type="submit" style="width: 200px; margin-top: 10px;">Gửi phản hồi</button>
                            </div>
                            <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}"/>
                        </div>
                    {{Form::close()}}
                    @endif
                </div>
                
                <style>
                    .issue img {
                        max-width: 100%;
                    }
                </style>
            </div>
        </article>
    </div>
    
@stop

@section('scripts')
    {{ HTML::script('assets/js/elements/new.js') }}
    <script>
        CKEDITOR.replace( 'ckeditor', {
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                //{"name":"basicstyles","groups":["basicstyles"]},
                //{"name":"links","groups":["links"]},
                //{"name":"paragraph","groups":["list","blocks"]},
                {"name":"document","groups":["mode"]},
                {"name":"insert","groups":["insert"]},
                //{"name":"styles","groups":["styles"]},
                //{"name":"about","groups":["about"]}
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar',
            height: '200px',
        });
    </script>
@stop
