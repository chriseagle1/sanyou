
<button class="btn btn-default btn-file" type="button">上传文件</button>

<script>
var importFile = new AjaxUpload('.btn-file', {
    action: "url",
    name: "uploadFileName",
    data: {
    	param1: value1
    },
    autoSubmit: false,
    responseType: 'json',
    onChange: function (file, extension) {
        $('#file_name').val(file);
        if (!new RegExp(/(xls)|(xlsx)/i).test(extension)) {
        	$('#import_error').text('只支持EXCEL文件类型！');
            $('#btn_import').prop('disabled', true);
            return false;
        } else {
        	$('#import_error').text('');
            $('#btn_import').prop('disabled', false);
            return true;
        }
    },
    onSubmit: function (file, extension) {
    },
    onComplete: function (file, response) {
    	$('#file_name').val('');
    	$('#btn_import').prop('disabled', true);

        var result = response.data;
        if (result.isSuccess) {
        	

        } else {
        }
    },
    onTimeout: function () {
        alert('上传超时，请重试。');
    }
});
</script>