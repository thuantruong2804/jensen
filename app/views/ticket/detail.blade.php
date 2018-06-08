@section('content')
    <div class="full youplay-login">
        <div class="youplay-banner banner-top">
            <div class="info">
                <div>
                    <div class="container align-center">
                        <div class="youplay-form" style="max-width: 780px !important;">
                            
                            
                            <h2 style="font-size: 24px;">{{{ $ticket->issue_summary }}}</h2>
                            <div class="row">
                                <div class="col-sm-2" style="text-align: center;">
                                    <?php $currentAccount = Account::find($ticket->account_id); ?>
                                    <img src="../../assets/avatar/{{ $currentAccount->Model }}.png" alt="" class="img-circle" style="border: 1px #fff solid; width: 60px; height: 60px;">
                                    <p>{{ $currentAccount->UserName }}</p>
                                </div>
                                <div class="col-sm-10 issue">
                                    <div style="border: 1px #ddd solid; border-radius: 5px 5px 5px 5px; text-align: left !important; padding: 5px; background-color: rgb(25, 21, 52);">
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
                                            <img src="../../../assets/avatar/{{ $currentAccount->Model }}.png" alt="" class="img-circle" style="border: 1px #fff solid; width: 60px; height: 60px;">
                                            <p>{{ $currentAccount->UserName }}</p>
                                        </div>
                                        <div class="col-sm-10 issue">
                                            <p style="font-size: 12px; text-align: left !important; margin-bottom: 0px;">{{ date('d-m-Y H:i:s', strtotime($comment->created_at)) }}</p>
                                            <div style="border: 1px #ddd solid; border-radius: 5px 5px 5px 5px; text-align: left !important; padding: 5px; background-color: rgb(25, 21, 52);">
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-sm-10 issue">
                                            <p style="font-size: 12px; text-align: left !important; margin-bottom: 0px;">{{ date('d-m-Y H:i:s', strtotime($comment->created_at)) }}</p>
                                            <div style="border: 1px #fff solid; border-radius: 5px 5px 5px 5px; text-align: left !important; padding: 5px;background-color: rgb(66, 169, 240)">
                                                <p>{{ $comment->content }}</p>
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
                                    'action' => 'TicketController@confirm',
                                    'class' => 'smart-form client-form',
                                    'id' => 'form-ticket-save',
                                    'method' => 'post',
                                    'novalidate'
                                ))
                            }}
                                <div class="">
                                    <p id="login-error">
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <div class="" style="margin-bottom: 10px;">
                                            <textarea name="content" rows="3" placeholder="Nhập yêu cầu" style="margin-top: 50px;" id="ckeditor"></textarea>
                                        </div>
                                        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}"/>
                                        <button class="btn btn-default db pull-right" type="submit" style="width: 200px;">Gửi phản hồi</button>
                                    </div>
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
                </div>
            </div>
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
                    $.utils.clearFieldError('form-ticket-save');
                    $(this).find('.btn').attr('disabled', 'disabled');
                    $('#login-error').text('');
                    $('.alert').css('display', 'none');
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
                                //$.utils.showFieldError('form-admin-login', field, data.messages[field][0]);
                                
                                $('#login-error').text(data.messages[field][0]);
                                break;
                            }
                            $.utils.autoFocus('form-ticket-save', '.input-error');
                        }
                        else {
                            $('#login-error').text(data.message);
                            $('.alert').css('display', 'block');
                        }
                        
                    }
                },
                'ajax:complete': function() {
                    $(this).find('.btn').removeAttr('disabled');
                }
        
            }, '#form-ticket-save');
            
         })(jQuery);
         
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
        } );
    </script>
@stop