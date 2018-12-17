/**
 * Created by admin on 10/5/2017.
 */
$(document).ready(function(){
    $(".delete").on('click',function(){
        $checkDelete = confirm('Bạn Chắc Chứ');
        return $checkDelete;
    });

    $(".sort").on('click',function(){
        var name = $(this).attr('name');
        var url = $(this).attr('url');
        window.location.assign(url+name);
    });

    $(".detail").on('click',function(){
        var url = $(this).attr('url');
        window.location.assign(url);
    });

    $(".detail-blank").on('click',function(){
        var url = $(this).attr('url');
        window.open(url);
    });

    $("#document_type_add_attribute").fadeToggle();
    $("#btn_show_form_attr").on('click',function(){
        $("#document_type_add_attribute").fadeToggle("slow");
    });

    $("#accept_add_document_attribute").on('click',function(){
        var code = $('#code_doc_attr').val();
        var name = $('#name_doc_attr').val();
        var input_type = $('#input_type_doc_attr').val();
        var input_data = $('#input_data_doc_attr').val();
        var id_doc = $(this).attr('id_doc');
        var url = $(this).attr('url');
        var _token = $(this).attr('token');

        $.ajax({
            url : url,
            type : "post",
            dataType:"text",
            data : {
                _token      : _token,
                id_doc      : id_doc,
                code        : code,
                name        : name,
                input_type  :input_type,
                input_data  :input_data
            },
            success : function (result){
                var data_result = JSON.parse(result);
                if(data_result.status == 1)
                {
                    alert(data_result.message);
                    $('.data_doc_attr').append(data_result.data);
                }
                else
                {
                    alert(data_result.message);
                }
            }
        });
    });

    $("#reset_add_document_attribute").on('click',function(){
        $('#code_doc_attr').val('');
        $('#name_doc_attr').val('');
        $('#position_doc_attr').val('');
        $('#input_data_doc_attr').val('');
    });

    $('.myImg').on('click',function(){
        var src_img = $(this).attr('src');
        $('#img01').attr('src',src_img);
        $('#myModal').show();
    });

    $('.close').on('click',function(){
        $('#myModal').hide();
    });

});