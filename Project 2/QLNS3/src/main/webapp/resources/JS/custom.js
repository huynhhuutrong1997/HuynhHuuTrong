$(document).ready(function(){
	
	var files = [];
	$("#hinhanh").change(function(event){
		files = event.target.files;
		forms = new FormData();
		forms.append("file",files[0]);
		
			$.ajax({
				url:"/QLNS3/api/uploadfile",
				type:"POST",
				data:forms,
				contentType:false,
				processData:false,
				enctype:"multipart/form-data",
				success:function(value){
					
				}
			})
	})
	
	$("#themnv").click(function(event){
		event.preventDefault();
		var formdata = $("#formnv").serializeArray();
		console.log(formdata);
	})
	
	
})