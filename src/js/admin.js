// JavaScript functions
;(function (global, $) {
    'use strict';

    var $ThemeOptions = (function () {
        var $form,
            $useCarouselCheckbox,
            $blogIndexCarouselOptions,
            publicApi;

        var init = function (selector) {
            $form = $(selector);
            $useCarouselCheckbox = $form.find('input[name=useBlogIndexCarousel]');
            $blogIndexCarouselOptions = $form.find('div.blogIndexCarouselOptions');

            $useCarouselCheckbox.on('click', function () {
                if ($(this).prop('checked')) {
                    $blogIndexCarouselOptions.show();
                } else {
                    $blogIndexCarouselOptions.hide();
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
