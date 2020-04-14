$(document).ready(function () {
    if ($('div#dropzone-upload').length) {
        $("div#dropzone-upload").dropzone({
            url: baseUrl + "admin/configs/upload_ajax",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            autoProcessQueue: true,
            parallelUploads: 5,
            addRemoveLinks: true,
            removedfile: function (file) {
                var filePath = '';
                if (file.xhr) {
                    var obj = jQuery.parseJSON(file.xhr.response);
                    filePath = obj.image;
                } else {
                    filePath = $(file.previewElement).data('path');
                }
                $.ajax({
                    type: 'POST',
                    url: baseUrl + "admin/configs/delete_image_ajax",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        filePath: filePath
                    },
                    dataType: 'html',
                    success: function (data) {
                        $("#msg").html(data);
                        updateOrder();
                    }
                });
                var _ref;
                if (file.previewElement) {
                    if ((_ref = file.previewElement) != null) {
                        _ref.parentNode.removeChild(file.previewElement);
                    }
                }
                return this._updateMaxFilesReachedClass();
            },
            previewsContainer: null,
            hiddenInputContainer: "body",
            success: function (file) {
                console.log(file);
                var extension = file.name.split('.').pop();
                if (extension == 'doc' || extension == 'docx') {
                    var imgUrl = baseUrl + 'backend/img/word.png';
                } else if (extension == 'xlsx' || extension == 'xlsm' || extension == 'xls' || extension == 'csv') {
                    var imgUrl = baseUrl + 'backend/img/excel.png';
                } else if (extension == 'pptx' || extension == 'ppt') {
                    var imgUrl = baseUrl + 'backend/img/powerpoint.png';
                } else if (extension == 'pdf') {
                    var imgUrl = baseUrl + 'backend/img/pdf.png';
                }
                thisDropzone.createThumbnailFromUrl(file, imgUrl, function () {
                    thisDropzone.emit("complete", file);
                });
                var obj = jQuery.parseJSON(file.xhr.response);
                $(file.previewElement).attr('data-path', obj.image);
                updateOrder();
            },
            init: function () {
                thisDropzone = this;
                if ($('input[name=list_files]').length) {
                    var images = $('input[name=list_files]').val();
                    $('input[name=tmp_files]').val(images);
                    var data = jQuery.parseJSON(images);
                    $.each(data, function (key, value) {
                        if (value.name) {
                            var mockFile = {name: value.name, size: value.size};
                            thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, baseUrl + "files/uploads/" + value.name);
                            thisDropzone.createThumbnailFromUrl(mockFile, baseUrl + "files/uploads/" + value.name, function () {
                                thisDropzone.emit("complete", mockFile);
                            });
//                thisDropzone.emit("complete", mockFile);
                            $(thisDropzone.element).children('.dz-preview').eq(key).attr('data-path', "files/uploads/" + value.name);
                        } else {
                            var mockFile = {name: value};
                            var file = thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, baseUrl + value);
                            var extension = value.split('.').pop();
                            if (extension == 'doc' || extension == 'docx') {
                                var imgUrl = baseUrl + 'backend/img/word.png';
                            } else if (extension == 'xlsx' || extension == 'xlsm' || extension == 'xls' || extension == 'csv') {
                                var imgUrl = baseUrl + 'backend/img/excel.png';
                            } else if (extension == 'pptx' || extension == 'ppt') {
                                var imgUrl = baseUrl + 'backend/img/powerpoint.png';
                            } else if (extension == 'pdf') {
                                var imgUrl = baseUrl + 'backend/img/pdf.png';
                            }

                            thisDropzone.createThumbnailFromUrl(mockFile, imgUrl, function () {
                                thisDropzone.emit("complete", mockFile);
                            });
//                thisDropzone.emit("complete", mockFile);
                            $(thisDropzone.element).children('.dz-preview').eq(key).attr('data-path', value);
                        }
                    });
                }
            }
        });

        // $("div#dropzone-upload").sortable({
        //     items: '.dz-preview',
        //     cursor: 'move',
        //     opacity: 0.5,
        //     containment: "parent",
        //     distance: 20,
        //     tolerance: 'pointer',
        //     update: function (e, ui) {
        //         updateOrder();
        //     }
        // });
    }
    if ($('div#dropzone-upload-image').length) {
        $("div#dropzone-upload-image").dropzone({
            url: baseUrl + "admin/configs/upload_ajax",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            autoProcessQueue: true,
            parallelUploads: 5,
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            removedfile: function (file) {
                var filePath = '';
                if (file.xhr) {
                    var obj = jQuery.parseJSON(file.xhr.response);
                    filePath = obj.image;
                } else {
                    filePath = $(file.previewElement).data('path');
                }
                $.ajax({
                    type: 'POST',
                    url: baseUrl + "admin/configs/delete_image_ajax",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        filePath: filePath
                    },
                    dataType: 'html',
                    success: function (data) {
                        $("#msg").html(data);
                        updateOrder();
                    }
                });
                var _ref;
                if (file.previewElement) {
                    if ((_ref = file.previewElement) != null) {
                        _ref.parentNode.removeChild(file.previewElement);
                    }
                }
                return this._updateMaxFilesReachedClass();
            },
            previewsContainer: null,
            hiddenInputContainer: "body",
            success: function (file) {
                console.log(file);
                var extension = file.name.split('.').pop();
                if (extension == 'doc' || extension == 'docx') {
                    var imgUrl = baseUrl + 'backend/img/word.png';
                } else if (extension == 'xlsx' || extension == 'xlsm' || extension == 'xls' || extension == 'csv') {
                    var imgUrl = baseUrl + 'backend/img/excel.png';
                } else if (extension == 'pptx' || extension == 'ppt') {
                    var imgUrl = baseUrl + 'backend/img/powerpoint.png';
                } else if (extension == 'pdf') {
                    var imgUrl = baseUrl + 'backend/img/pdf.png';
                }
                thisDropzone.createThumbnailFromUrl(file, imgUrl, function () {
                    thisDropzone.emit("complete", file);
                });
                var obj = jQuery.parseJSON(file.xhr.response);
                $(file.previewElement).attr('data-path', obj.image);
                updateOrderImage();
            },
            init: function () {
                thisDropzone = this;
                if ($('input[name=list_files]').length) {
                    var images = $('input[name=list_files]').val();
                    $('input[name=tmp_files]').val(images);
                    var data = jQuery.parseJSON(images);
                    $.each(data, function (key, value) {
                        if (value.name) {
                            var mockFile = {name: value.name, size: value.size};
                            thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, baseUrl + "files/uploads/" + value.name);
                            thisDropzone.createThumbnailFromUrl(mockFile, baseUrl + "files/uploads/" + value.name, function () {
                                thisDropzone.emit("complete", mockFile);
                            });
//                thisDropzone.emit("complete", mockFile);
                            $(thisDropzone.element).children('.dz-preview').eq(key).attr('data-path', "files/uploads/" + value.name);
                        } else {
                            var mockFile = {name: value};
                            var file = thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, baseUrl + value);
                            var extension = value.split('.').pop();
                            if (extension == 'doc' || extension == 'docx') {
                                var imgUrl = baseUrl + 'backend/img/word.png';
                            } else if (extension == 'xlsx' || extension == 'xlsm' || extension == 'xls' || extension == 'csv') {
                                var imgUrl = baseUrl + 'backend/img/excel.png';
                            } else if (extension == 'pptx' || extension == 'ppt') {
                                var imgUrl = baseUrl + 'backend/img/powerpoint.png';
                            } else if (extension == 'pdf') {
                                var imgUrl = baseUrl + 'backend/img/pdf.png';
                            }

                            thisDropzone.createThumbnailFromUrl(mockFile, imgUrl, function () {
                                thisDropzone.emit("complete", mockFile);
                            });
//                thisDropzone.emit("complete", mockFile);
                            $(thisDropzone.element).children('.dz-preview').eq(key).attr('data-path', value);
                        }
                    });
                }
            }
        });

        // $("div#dropzone-upload").sortable({
        //     items: '.dz-preview',
        //     cursor: 'move',
        //     opacity: 0.5,
        //     containment: "parent",
        //     distance: 20,
        //     tolerance: 'pointer',
        //     update: function (e, ui) {
        //         updateOrder();
        //     }
        // });
    }
    $('.select2').select2({
        theme: "classic"
    });
});


