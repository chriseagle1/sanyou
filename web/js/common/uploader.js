/**
 * 
 */

var uploadType = $('.btn-file').data('type');

var importFile = new AjaxUpload('.btn-file', {
    action: "/ajax/common/upload-file/ajax-uploader",
    name: "uploadFileName",
    data: {
    	uploadType: uploadType
    },
    autoSubmit: true,
    responseType: 'json',
    onChange: function (file, extension) {
//        $('#file_name').val(file);
//        if (!new RegExp(/(xls)|(xlsx)/i).test(extension)) {
//        	$('#import_error').text('只支持EXCEL文件类型！');
//            $('#btn_import').prop('disabled', true);
//            return false;
//        } else {
//        	$('#import_error').text('');
//            $('#btn_import').prop('disabled', false);
//            return true;
//        }
    },
    onSubmit: function (file, extension) {
    },
    onComplete: function (file, response) {
//    	$('#file_name').val('');
//    	$('#btn_import').prop('disabled', true);

        var result = response.data;
        if (result.isSuccess) {
        	layer.msg('导入成功', {time:1000});
        } else {

        }
    },
    onTimeout: function () {
        alert('上传超时，请重试。');
    }
});