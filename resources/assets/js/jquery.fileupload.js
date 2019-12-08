;
(function ($) {
    $(function () {
        if( $('#ajax_file_upload_input').length > 0){
            $('#ajax_file_upload_input').parents('form').submit( (e) => e.preventDefault() );
            $('#ajax_file_upload_input').change( function(){
                
                if( $(this).val().length === 0){
                    return false;
                }
                    
                const formEl    = $(this).parents('form');
                const loadEl    = $(this).parent().siblings('.loading');
                const uplListEl = $(this).parent().siblings('.file-list');

                let printErrorMsg = (msg) => {
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display', 'block');
                    $.each(msg, function (key, value) {
                        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                    });
                };
                
                $.ajax({
                    url: formEl.attr('action'),
                    method:      'POST',
                    data:        new FormData(formEl[0]),
                    dataType:    'JSON',
                    contentType: false,
                    cache:       false,
                    processData: false,
                    beforeSend: function (){
                        loadEl.show();
                    },
                    complete: function (response){
                        loadEl.hide();
                        
                        if ($.isEmptyObject(response.responseJSON.error)) {
                            const uplElname = formEl.find('input[name="_upl_elem"]').val();
                            let uplEl = $(uplElname);
                            let arr = ( uplEl.val().length > 0) ? uplEl.val().split(';') : [];
                            arr.push(response.responseJSON.file_name+','+response.responseJSON.file_label);
                            uplEl.val( arr.join('|') );
                            
                            uplListEl.show();
                            $('ol',uplListEl).append('<li>'+response.responseJSON.file_name+'</li>');
                        } else {
                            printErrorMsg(response.responseJSON.error);
                        }
                    }                    
                });
                
            });
        }
        
    });
})(jQuery);