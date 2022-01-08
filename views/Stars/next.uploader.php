<style type="text/css">
.loader {
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #03070A;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#root-upload-upload{
	position:fixed;
	width:100%;
	height:100%;
	background-color:#fff;
	background-color:rgba(0, 0, 0,.7);
}
.upload-upload-input{
	position:fixed;
	display:flex;
	justify-content: space-around;
	background-color:#fff;
	border:solid 1px #E1E4EC;
	width:50%;
	padding:2%;
  margin:15% 25% 10% 25% ;
  

}
.upload-upload-input form{
	width:100%;
}
.upload-upload-input input[type="text"]{
	border-radius:0px;
}
.upload-actions{
	display:flex;
	justify-content: space-around;
	width:100%;
	margin-left:auto;
}
.upload-actions a {
  width:50%;
  border-radius:0px;
}
.upload-upload-input input[type="submit"]{
	margin-left:2%;
	border-radius:0px;
	background-color:#282360;
	border-color:#282360;
	width:50%;
}
@media screen and (max-width: 661px){
	.upload-upload-input{
	width:80%;
	padding:2%;
  margin:25% 10% 10% 10%  ;
}
@media screen and (max-width: 539px){
	.upload-upload-input{
	width:95%;
	padding:2%;
  margin:35% 2.5% 10% 2.5%  ;
}
}
@media screen and (max-width: 392px){
	.upload-upload-input{
	width:95%;
	padding:2%;
  margin:45% 2.5% 10% 2.5%  ;
}
}
@media screen and (max-width: 392px){
	.upload-upload-input{
  margin:55% 2.5% 10% 2.5%  ;
}
}

@media screen and (max-width: 238px){
.upload-upload-input form{
	font-size:11px;
}
}
</style>
<script>
$(document).ready(function(){
    // File upload via Ajax
    $("#uploadForm").on('submit', function(e){
        e.preventDefault();
    
    var file = document.getElementById('file').value;
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["pdf" , "doc", "docx", "xls", "csv","txt","xlsx","json","sql","zip"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $('#uploadStatus').html('<p style="color:#EA4335;font-family:sans-serif;">Please select a valid file</p>');
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
                        $(".percent").html(percentComplete+'%');

                        var bar_value = document.getElementById('progress-bar').style.width;
                        if (bar_value == "100%") {
                        	$('#uploadStatus').html('<p style="color:#000;">Please wait ...</p>');
                        }
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: './uploadIt',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
                $('.progress').css('display','flex');
                
            },
            error:function(){
                $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
            success: function(resp){
                if(resp != 'ok'){
                $('#uploadStatus').html('<p style="color:red;">'+resp+'</p>');
                }
                else{
                	$('#uploadForm')[0].reset();
                    $(location).attr('href','./');
                }
            }
        });
    }
    });

});

function validate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();      
    var arrayExtensions = ["pdf" , "doc", "docx", "xls", "csv","txt","xlsx","json","sql","zip"];
 
    if (arrayExtensions.lastIndexOf(ext) == -1) {
        $('#uploadStatus').html('<p style="color:#EA4335;font-family:sans-serif;">Please select a valid file</p>');
    }
    else{
$('#uploadStatus').empty();
    }
}
    </script>
<div id="root-upload-upload">
	<ul class="upload-upload-input">
	<form id="uploadForm" enctype="multipart/form-data">
		<input type="file" name="file" id="file"   onChange="validate(this.value)">
		<br/>
		<br/>
		<div class="percent"></div>
<div class="progress" style="display:none ;height:5px;border-radius:0px;">
    <div class="progress-bar" id='progress-bar'></div>
</div>
<br/>
<div id="uploadStatus"></div>
		<div class="upload-actions">
			<a  class="btn btn-light" onclick="window.location.href='<?php echo $directory ->uploads;  ?>';">
						cancel
		   </a>
		<input type="submit" class="btn btn-primary" value="upload">
	   </div>
	</form>
	<br/>
	<br/>
</ul>
</div>