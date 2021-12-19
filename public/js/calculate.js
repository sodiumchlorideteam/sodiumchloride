$(document).ready(function(){
    // File upload via Ajax
    $("#calc-linear").on('submit', function(e){
        e.preventDefault();
    
    var file = document.getElementById('file_name').value;
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["pdf" , "doc", "docx", "xls", "csv","txt","xlsx","json","sql","zip"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $('#uploadStatus').html('<p style="color:#EA4335;font-family:"Source Sans Pro", sans-serif;">Please select a valid file</p>');
    }
    else{
$('#uploadStatus').empty();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100).toFixed(0);
                        $(".progress-bar").width(percentComplete + '%');
                        
        
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: './calculate',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('.progress').css('display','flex');
                
            },
            error:function(){
                $('#uploadStatus').html('<p style="color:#EA4335;">failed to retrieve the file, please refresh or tey again .</p>');
            },
            success: function(resp){
             $('#output').html(resp);
             $('.progress').css('display','none');
            }
        });
    }
    });

});

