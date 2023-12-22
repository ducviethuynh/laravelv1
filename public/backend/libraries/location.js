(function ($) {
    'use strict'
    var obj = {};

    obj.provice = () => {
        $(document).on('change', '.province', function () {
            let _this = $(this);
            let province_id = _this.val();

            $.ajax({
                url: 'ajax/location/getLocation',
                type: 'GET',
                data: {
                    'province_id': province_id,
                },
                dataType: function (res) {
                    console.log(res)
                },
                success: function (rest) {
                    $('.district').html(res.html)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Error:' + textStatus + ' ' + errorThrown);
                }
            });
        });
    }

    $(document).ready(function () {
        obj.provice();
    });
})(jQuery);
