(function ($) {
    'use strict'
    var obj = {};
    var $document = $(document);

    obj.switchery = () => {
        $('.js-switch').each(function (){
           var switchery= new Switchery(this, {color: '#1AB394'});
        });
    }


    $document.ready(function () {
        obj.switchery();
    });
})(jQuery);
