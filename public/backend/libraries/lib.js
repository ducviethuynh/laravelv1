(function ($) {
    // 'use strict'
    var obj = {};
    // var $document = $(document);
    var _token = $('meta[name="csrf-token"]').attr('content');

    obj.switchery = () => {
        $('.js-switch').each(function (){
           var switchery= new Switchery(this, {color: '#1AB394'});
        });
    }

    obj.select2 = () => {
        if ($('.setupSelect2').length) {
            $('.setupSelect2').select2();
        }
    }

    obj.changeStatus = () => {

        $(document).on('change', '.status', function (e) {
            let _this = $(this);
            let option = {
                'value': _this.val(),
                'modelId': _this.attr('data-modelId'),
                'model': _this.attr('data-model'),
                'field': _this.attr('data-field'),
                '_token': _token,
            };

            $.ajax({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('lỗi:' + textStatus + ' ' + errorThrown);
                }
            });
            e.preventDefault();
        });

    }

    obj.checkAll = () => {
        if ($('#checkAll').length) {
            $(document).on('click', '#checkAll', function() {
              let isChecked = $(this).prop('checked');

              $('.checkBoxItem').prop('checked', isChecked);
              $('.checkBoxItem').each(function() {
                  let _this = $(this);
                  obj.changeBackground(_this);
              });
            });
        }
    }

    obj.checkBoxItem = () => {
        if ($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem', function () {
               let _this = $(this);
                obj.changeBackground(_this);
                obj.allChecked();
            });
        }
    }

    obj.allChecked = () => {
        let allChecked = $('.checkBoxItem:checked').length === $('.checkBoxItem').length;
        $('#checkAll').prop('checked', allChecked);
    }

    obj.changeBackground = (object) => {
        let isChecked = object.prop('checked');
        if (isChecked) {
            object.closest('tr').addClass('active-bg');
        }
        else {
            object.closest('tr').removeClass('active-bg');
        }
    }

    obj.changeStatusAll = () => {
       $(document).on('click', '.changeStatusAll', function (e) {
           let _this = $(this);
           let id = [];
           $('.checkBoxItem').each(function() {
               let checkBox = $(this);
               if (checkBox.prop('checked')) {
                   id.push(checkBox.val());
               }
           });

           console.log(id);

           let option = {
               'value': _this.val(),
               'modelId': _this.attr('data-modelId'),
               'model': _this.attr('data-model'),
               'field': _this.attr('data-field'),
               'id': id,
               '_token': _token,
           };

           $.ajax({
               url: 'ajax/dashboard/changeStatusAll',
               type: 'POST',
               data: option,
               dataType: 'json',
               success: function (res) {
                   console.log(res);
                   if (res.flag === true ) {
                       let cssActive1 = 'box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; border-color: rgb(223, 223, 223); background-color: rgb(255, 255, 255); transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;';
                       let cssActive2 = 'left: 20px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;';
                        if (option.value === 1) {
                            for (let i = 0; i < id.length; i++) {
                                $('.js-switch-' + id[i]).find('span.switchery').attr('style', cssActive1).find('small').attr('style', cssActive2);
                            }
                        }
                   }
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   console.log('lỗi:' + textStatus + ' ' + errorThrown);
               }
           });

           e.preventDefault();
       });
    }

    $(document).ready(function () {
        obj.switchery();
        obj.select2();
        obj.changeStatus();
        obj.checkAll();
        obj.checkBoxItem();
        obj.allChecked();
        obj.changeStatusAll();
    });
})(jQuery);
