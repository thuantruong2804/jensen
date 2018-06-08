(function($) {
    if(typeof youplay !== 'undefined') {
        // add parallax for sections
        var oldParallax = youplay.constructor.prototype.initJarallax;
        youplay.constructor.prototype.initJarallax = function() {
            oldParallax.apply(youplay);

            if(!youplay.options.parallax || youplay.isMobile) {
                return;
            }

            // banners
            $('.youplay-section-parallax .image').jarallax({
                speed: 0.4
            });
        };

        // countdown
        var oldCountdown = youplay.constructor.prototype.initCountdown;
        youplay.constructor.prototype.initCountdown = function() {
            if(oldCountdown) {
                oldCountdown.apply(youplay);
            }

            $(".countdown.style-1:not(.countdown-inited)").each(function() {
                $(this).addClass('countdown-inited').countdown($(this).attr('data-end'), function(event) {
                    $(this).html(
                        event.strftime([
                            '<div class="row">',
                            '<div class="col-xs-6 col-sm-3">',
                            '<span>Days</span>',
                            '<span><span>%D</span></span>',
                            '</div>',
                            '<div class="col-xs-6 col-sm-3">',
                            '<span>Hours</span>',
                            '<span><span>%H</span></span>',
                            '</div>',
                            '<div class="col-xs-6 col-sm-3">',
                            '<span>Minutes</span>',
                            '<span><span>%M</span></span>',
                            '</div>',
                            '<div class="col-xs-6 col-sm-3">',
                            '<span>Seconds</span>',
                            '<span><span>%S</span></span>',
                            '</div>',
                            '</div>'
                        ].join(''))
                    );
                });
            });

            $(".countdown:not(.style-1):not(.countdown-inited)").each(function() {
                $(this).countdown($(this).attr('data-end'), function(event) {
                    $(this).text(
                        event.strftime('%D days %H:%M:%S')
                    );
                });
            });
        }


        // init youplay on startup
        youplay.init({
            fadeBetweenPages: false
        });
        youplay.initCountdown();
    }
}(jQuery));
