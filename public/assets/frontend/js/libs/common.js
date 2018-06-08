(function($) {
    var $document = $(document);
    // prevent multiple loading
    if (typeof $.remoteHandler !== 'undefined') {
        $.error('Remote handler has already been loaded');
    }

    /**
     * automatically handle remote anchor or form
     * @usage
     * - add data-remote="true" to <a> or <form> tag to enable
     * - add data-method="[...]" to <a> tag to customize request type (default: get)
     * - add data-confirm="[...]" to <a> or <form> tag to have confirm box popping up before the request is sent
     * - add data-type="[...]" to <a> or <form> tag to specify desired response type (default: html)
     * - add data-container="[selector-here]" to <a> or <form> tag
     *   to automatically replace the selected element content by the response (default: #main)
     *   if success (only applicable for data-type="html")
     * - add javascript event listeners to further customize the behavior:
     *   + ajax:beforeSend - to add action that should be performed before the request is actually sent,
     *                       return false to cancel the request
     *   + ajax:send - to add action that should be performed immediately after the request is sent
     *   + ajax:success - to add action that should be performed if a response is received with success status code
     *                    if defined, the action will be performed after default content replacement is triggered (see data-container)
     *   + ajax:error - to add action that should be performed if a response is received with error status code
     *   + ajax:complete - to add action that should be performed after a response is received regardless of status code
     */
    var remoteHandler;
    $.remoteHandler = remoteHandler = {
        linkClickSelector: 'a[data-remote]',
        formSubmitSelector: 'form[data-remote]',
        inputClickSelector: 'form[data-remote] input[type=submit], form[data-remote] input[type=image],' +
                'form[data-remote] button[type=submit], form[data-remote] button:not([type])',

        fire: function($obj, name, data) {
            var e = $.Event(name);
            $obj.trigger(e, data);
            return e.result !== false;
        },
        send: function($obj, url, method, data, dataType) {
            $.ajax({
                url: url,
                type: method,
                data: data,
                dataType: dataType,
                beforeSend: function(xhr, settings) {
                    utils.clearFlash();
                    if ($obj.data('confirm') && !confirm($obj.data('confirm'))) {
                        return false;
                    }

                    if (remoteHandler.fire($obj, 'ajax:beforeSend', [xhr, settings])) {
                        $obj.trigger('ajax:send', xhr);
                    } else {
                        return false;
                    }
                    $obj.attr('disabled', 'disabled');
                },
                success: function(data, status, xhr) {
                    switch (dataType) {
                        case 'html':
                            var container = $obj.data('container') || '#main';
                            var $container = $(container);
                            if ($container.length > 0) {
                                $container.html(data);
                                remoteHandler.addHistory(url, xhr);
                                utils.showCkeditor();
                                utils.autoFocus();
                                utils.initCommon();
                            }
                            break;
                        case 'js':
                            $.globalEval(data);
                            break;
                        default:
                    }
                    
                    $obj.trigger('ajax:success', [data, status, xhr]);
                },
                error: function(xhr, status, error) {
                    $obj.trigger('ajax:error', [xhr, status, error]);
                },
                complete: function(xhr, status) {
                    $obj.trigger('ajax:complete', [xhr, status]);
                    $obj.removeAttr('disabled');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //$("#error-modal").modal('show');
                }
            });
        },
        bind: function() {
            $document.on('click.remote', remoteHandler.linkClickSelector, function(e) {
                e.preventDefault();
                var $this = $(this);
                var data = $this.data('params') || null;
                var dataType = $this.data('type') || 'html';
                var method = $this.data('method') || 'get';
                var url = $this.attr('href');
                remoteHandler.send($this, url, method, data, dataType);
            });

            $document.on('submit.remote', remoteHandler.formSubmitSelector, function(e) {
                e.preventDefault();
                var $this = $(this);
                var data = $this.serializeArray();
                var dataType = $this.data('type') || 'html';
                var method = $this.attr('method');
                var url = $this.attr('action');
                
                remoteHandler.send($this, url, method, data, dataType);
            });

            $document.on('click.remote', remoteHandler.inputClickSelector, function(e) {
                
            });
        },
        addHistory: function(url, xhr) {
            if (history && typeof history.replaceState === 'function') {
                var title = xhr.getResponseHeader('X-Page-Title');
                history.replaceState({}, title, url);
                if (title) {
                    document.title = title;
                }
            }
        }
    };
    remoteHandler.bind();

    if (typeof $.utils !== 'undefined') {
        $.error('Utils has already been defined');
    }

    /**
     * misc. utilities for updating page content in common scenarios
     */
    var utils;
    $.utils = utils = {
        focusableSelector: 'input[type=text]:visible, input[type=search]:visible, input[type=email]:visible,' +
                'input[type=password]:visible, input[type=phone]:visible, input[type=radio]:visible, input[type=checkbox]:visible,' +
                'select:visible, textarea:visible',

        /**
         * automatically focus on the first visible input field
         * @param string formId form id to search for (optional)
         * @param string inputFilter additional filter for input (optional)
         */
        autoFocus: function(formId, inputFilter) {
            var $form;
            if (typeof formId === 'string') {
                $form = $('form#' + formId);
            } else {
                $form = $('form:first');
            }
            if ($form.length > 0) {
                var $field = $form.find(utils.focusableSelector);
                if (typeof inputFilter === 'string') {
                    $field = $field.filter(inputFilter);
                }
                $field.eq(0).focus();
            }
        },

        /**
         * clear all errors of the form
         * @param string formId (optional)
         */
        clearFieldError: function(formId) {
            var $form = $('#' + formId);
            $form.find('.form-group').removeClass('has-error');
            $form.find('.input-error').removeClass('input-error');
            $form.find('.text-danger').remove();
        },

        /**
         * clear all flash message
         */
        clearFlash: function() {
            $('.flash').children('.alert').remove();
        },

        /**
         * show form field error that look nice on twbs form structure
         * @param string formId
         * @param string field (input name)
         * @param string msg
         */
        showFieldError: function(formId, field, msg, shower) {
            var $form = $('#' + formId);
            var $field = $form.find('[name=' + field + ']');
            if ($field.length > 0) {
                if ($field.parents('.form-group').length > 0) {
                    console.log(1);
                	$field.parents('.form-group').addClass('has-error');
                    $field.addClass('input-error');
                    if (shower)
                        $field.after('<div class="text-danger">' + msg + '</div>');
                } else {
                    $field.addClass('input-error').after('<div class="text-danger">' + msg + '</div>').parents('.ui-input-text').addClass('has-error');    
                }
                
            }
        },
        

        /**
         * show flash message
         * @param string msg
         * @param string klass Flash class (e.g. alert-danger in twbs)
         */
        showFlash: function(msg, klass) {
            utils.clearFlash();
            $('.flash').html(
                '<div class="alert ' + klass + '">' +
                    msg +
                    '<span class="close-alert"><i class="icon-close"></i></span>' +
                '</div>'
            );
            setTimeout(function() {
                utils.clearFlash();
            }, timeOutNumber);
            
        },
        
        /**
         * show flash message 2 
         * @param string title
         * @param string msg
         */
        showFlashAdmin: function(msg) {
            $('#alert-admin').css('display', 'block');
            $('#alert-admin #content-mgs').text(msg);
            setTimeout(function() {
                $('#alert-admin').css('display', 'none');
            }, 7000);
            
        },
        
        
        showAlertModal: function (title, msg) {
            if (typeof title != 'underfined') {
                $("#alert-modal .modal-title").html(title);
            }
            $("#alert-modal .modal-body").html(msg);
            $("#alert-modal").modal('show');
        },
        
        removeIconErrorTab: function() {
            $('.icon-error-tab').remove();
        },
        focusErrorTab: function(error_fields) { // nav_tabs: is Class, field_error: is ID
            if (error_fields.length > 0) {
                // Remove error icon for tab
                utils.removeIconErrorTab();
                
                // Remove error icon for tab
                for (index_field in error_fields) {
                    var id_tab_parent = $("#" + error_fields[index_field]).parents('.tab-pane').eq(0).attr('id');
                    var $tab = $("a[href='#" + id_tab_parent + "']");
                    if ($tab.find('.icon-error-tab').length == 0) {
                        var old_value = $tab.html();
                        $tab.html("<i class='fa fa-warning icon-error-tab'></i>" + old_value);
                    }
                    
                }
                
                //Focus first error tab
                $(".nav-tabs li").removeClass('active');
                $(".tab-pane").removeClass('active');
                var id_first_tab_parent = $("#" + error_fields[0]).parents('.tab-pane').eq(0).attr('id');
                $("a[href='#" + id_first_tab_parent + "']").parent('li').addClass('active');
                $("#" + id_first_tab_parent).addClass('active');    
            }
        },
        
        setDataTable: function(klass) {
            var $selection = $('.' + klass);
            var defaultSortColumn = $selection.data('defaultsortcolumn');
            var defaultSortType = $selection.data('defaultsorttype');
            if (typeof klass === 'underfined') {
                klass = 'dataTable';
            }
            if (typeof defaultSortColumn == 'undefined') {
                defaultSortColumn = 0;
            }
            if (typeof defaultSortType == 'undefined') {
                defaultSortType = 'asc';
            }
            $.dataTable = $selection.dataTable({
                columnDefs: [{
                    targets: -1,
                    searchable: false,
                    orderable: false
                }],
                order: [[ defaultSortColumn, defaultSortType ]],
                //lengthChange: false,
                retrieve: true,
                //iDisplayLength: 2, //Number of record in page
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "<i class='fa fa-angle-double-left'></i>", // This is the link to the previous page
                        "sNext": "<i class='fa fa-angle-double-right'></i>", // This is the link to the next page
                    },
                    "sEmptyTable": $selection.attr('data-empty'),
                    "sInfo": $selection.attr('data-show-entries'),
                    "sInfoEmpty": "",
                    "sInfoFiltered": $selection.attr('data-infofiltered'),
                    "sZeroRecords": $selection.attr('data-zerorecord'),
                    "sLengthMenu": $selection.attr('data-lengthmenudisplay') + "<select class='form-control display-record-table'>"+
                                                '<option value="10">10</option>'+
                                                '<option value="20">20</option>'+
                                                '<option value="30">30</option>'+
                                                '<option value="40">40</option>'+
                                                '<option value="50">50</option>'+
                                                '<option value="-1">All</option>'+
                                            '</select>' + $selection.attr('data-lengthmenurecord')
                }
                
            });
            return $.dataTable;
        },
        
        setDataTableDynamic: function($selection) {
            var nosorttargets = $selection.data('nosorttargets');
            var getDataUrl = $selection.data('url');
            var defaultSortColumn = $selection.data('defaultsortcolumn');
            var defaultSortType = $selection.data('defaultsorttype');
            var columnMoreClass = $selection.data('columnmoreclass');
            var listMoreClass = $selection.data('listmoreclass');
            if (typeof listMoreClass != 'undefined') {
                listMoreClass = listMoreClass.split(', ');
            }
            if (typeof nosorttargets == 'undefined') {
                nosorttargets = [];
            }
            if (typeof defaultSortColumn == 'undefined') {
                defaultSortColumn = 0;
            }
            if (typeof defaultSortType == 'undefined') {
                defaultSortType = 'asc';
            }
            $.dataTableDynamic = $selection.dataTable({
                "aoColumnDefs": [
                     {"bSortable": false, "aTargets": nosorttargets}
                ],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "<i class='fa fa-angle-double-left'></i>", // This is the link to the previous page
                        "sNext": "<i class='fa fa-angle-double-right'></i>", // This is the link to the next page
                    },
                    
                    "sEmptyTable": $selection.attr('data-empty'),
                    "sInfo": $selection.attr('data-show-entries'),
                    "sInfoEmpty": "",
                    "sInfoFiltered": $selection.attr('data-infofiltered'),
                    "sZeroRecords": $selection.attr('data-zerorecord'),
                    "sLengthMenu": $selection.attr('data-lengthmenudisplay') + "<select class='form-control display-record-table'>"+
                                                '<option value="10">10</option>'+
                                                '<option value="20">20</option>'+
                                                '<option value="30">30</option>'+
                                                '<option value="40">40</option>'+
                                                '<option value="50">50</option>'+
                                                '<option value="-1">All</option>'+
                                            '</select>' + $selection.attr('data-lengthmenurecord')
                },
               "bProcessing": false,
               "bJQueryUI": false,
               "bServerSide": true,
               "aaSorting": [[ defaultSortColumn, defaultSortType ]],
               "bFilter": true,
               "sAjaxSource": getDataUrl,
               "fnServerData": function ( sSource, aoData, fnCallback ) {
                   $.ajax({
                       "dataType": 'json', 
                       "type": "POST", 
                       "url": sSource, 
                       "data": aoData, 
                       "success": function(data) {
                         fnCallback(data);
                         $selection.css('visibility', 'visible');
                         utils.initCommon();
                       },
                       "beforeSend": function() {
                           //ajaxCount++;
                           //if(ajaxCount == 1) //showLoadingAjax();
                           //if(ajaxCount > 5) ajaxCount = 5;
                       },
                       "complete": function() {
                           //ajaxCount--;
                           //if(ajaxCount <= 0) {
                               //ajaxCount = 0;
                               //hideLoadingAjax();
                           //}
                       },
                        error: function (xhr, ajaxOptions, thrownError) {
                            $("#error-modal").modal('show');
                        }
                   });
               },
               "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                   if (typeof columnMoreClass != 'undefined' && typeof listMoreClass != 'undefined') {
                       for (i in columnMoreClass) {
                           $("td:eq(" + columnMoreClass[i] + ")", nRow).addClass(listMoreClass[i]);
                       }
                   }
                   
               }
            });
            return $.dataTableDynamic;
        },
        
        initCommon: function() {
            // Set tooltip
            $('.has-tooltip').tooltip({
                placement: 'top'
            });

            // Set timpicker
            $('.has-timepicker').datetimepicker({
                pickDate: false,
                'format': 'HH:mm',
                'minuteStepping': 30
            });
        },
        convertToMinutes: function(string_time) { // hh:mm
            var totalMinutes = 0;
            var elements = string_time.split(":");
            if (elements.length > 1) {
                totalMinutes = parseInt(elements[0])*60 + parseInt(elements[1]);
            }
            return totalMinutes;
        },
        convertToStringTime: function(totalMinutes) {
            var num_hours = parseInt(totalMinutes / 60);
            var num_minutes = totalMinutes - num_hours*60;
            var string_format = '';
            if (num_hours <= 0) {
                num_hours = '00';
            } else if (num_hours < 10) {
                num_hours = "0" + num_hours;
            }
            if (num_minutes <= 0) {
                num_minutes = '00';
            }
            string_format += num_hours + ":";
            string_format += num_minutes;
            return string_format;
        },
        saveRedirectAfterLogin: function() {
            $.ajax({
                'url': baseUrl  + '/saveRedirectAfterLogin',
                'data': {'redirect_to' : $('#redirect-to').val()},
                'method': 'POST',
                'beforeSend': function(){},
                'complete': function(){},
                'success': function(data) {},
                error: function (xhr, ajaxOptions, thrownError) {
                    $("#error-modal").modal('show');
                }
            });
        }
    };
    
    setTimeout(function() {
        $('.flash').children('.alert').remove();
    }, timeOutNumber);
    
    $('.flash').click(function(){
        $('.flash').children('.alert').remove();
    });
    
})(jQuery);


function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}


function getCookie(cname) {
    
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}


var facebookLoginWindow;
var loginWindowTimer;
function facebookLogin (loginUrl) {
    var popupWidth = 500;
    var popupHeight = 300;
    var xPosition = ($(window).width() - popupWidth) / 2;
    var yPosition = ($(window).height() - popupHeight) / 2;
    var loginUrl = loginUrl; 
 
    facebookLoginWindow=window.open(loginUrl, "LoginWindow",
        "location=1,scrollbars=1,"+
        "width="+popupWidth+",height="+popupHeight+","+
        "left="+xPosition+",top="+yPosition);
 
    loginWindowTimer=setInterval(onTimerCallbackToCheckLoginWindowClosure, 1000);
}
function submit_form(){
    if($('.search_code').val() == ''){
        alert('Bạn chưa nhập Mã vận đơn');
        $('.search_code').focus();
        return false;
    }
    $('.search_order_journey').submit();
}
function format(num) {
    val = num.value;
    val = val.replace(/[^\d.]/g,"");
    arr = val.split('.');
    lftsde = arr[0];
    rghtsde = arr[1];
    result = "";
    lng = lftsde.length;
    j = 0;
    for (i = lng; i > 0; i--){
        j++;
        if (((j % 3) == 1) && (j != 1)){
            result = lftsde.substr(i-1,1) + "," + result;
        }else{
            result = lftsde.substr(i-1,1) + result;
        }
    }
    if(rghtsde==null){
        num.value = result;
    }else{
        num.value = result+'.'+arr[1];
    }
}
function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}