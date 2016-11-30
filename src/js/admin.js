// JavaScript functions
;(function (global, $) {
    'use strict';

    var $ThemeOptions = (function(){
        var $form,
            $useCarouselCheckbox,
            $options,
            publicApi;

        var init = function(selector) {
            $form = $(selector);
            $useCarouselCheckbox = $form.find( 'input[name=useBlogIndexCarousel]');
            $options = $form.find('div.options' );

            $useCarouselCheckbox.on('click', function () {
                if ($(this).prop('checked')) {
                    $options.removeClass('hidden');
                } else {
                    $options.addClass('hidden');
                }
            });
        };

        publicApi = {
            init: init
        };
        return publicApi;
    })();

    $(function () {
        $ThemeOptions.init('form[name=optionsForm]');
        console.log('Coffee-Coffee admin script loaded');
    });

})(this, jQuery);
