(function ($) {
    // 'use strict'
    var obj = {};
    var $document = $(document);

    obj.InputImage = () => {
        $(document).on('click', '.input-image', function (){})
        let _this = $(this);
        let fileUpload = _this.attr('data-upload');
        obj.BrowseServerInput($(this), fileUpload);
    };

    obj.BrowseServerInput = (object, type) => {
        if (typeof (type) === 'undefined') {
            type = 'Images';
        }

        var finder = new CKFinder();
        finder.resourceType = type;

        finder.selectActionFunction = function (fileUrl, data) {
            console.log(fileUrl);
            fileUrl = fileUrl.replace(BASE_URL, '/');
            object.val(fileUrl);
        }
        finder.popup();
    }

    $document.ready(function () {
        obj.InputImage();
    });
})(jQuery);
