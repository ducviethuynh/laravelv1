(function ($) {
    // 'use strict'
    var obj = {};
    var $document = $(document);

    obj.switchery = () => {
        $('.js-switch').each(function (){
           var switchery= new Switchery(this, {color: '#1AB394'});
        });
    }

    obj.select2 = () => {
        $('.setupSelect2').select2();
    }

    $document.ready(function () {
        obj.switchery();
        obj.select2();
    });
})(jQuery);
