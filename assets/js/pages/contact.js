$(document).ready(function () {
	$("#contact-form").submit(function(e){
		e.preventDefault();
		
		var form = $("#contact-form")[0];

		var contactPostData = {
			f_name : $("input[name='f_name']").val(),
			l_name : $("input[name='l_name']").val(),
			email : $("input[name='email']").val(),
			message : $("textarea#contact_message").val(),
			action : 'submit_contact_qry'
		}

		$.ajax({
			type: "POST",
			url: BASE_URL + "contact/processFormRequest",
			data : contactPostData,
			beforeSend : function () {
				$.notify("Processing Request","info",{ 
					autoHide: true,
  					autoHideDelay: 2000
  				});
				$("button[type='submit']").attr('disabled',true);
			},
			success : function (resp){
				var respData = JSON.parse(resp);
				if(respData.status === 1){
					$.notify(respData.msg,"success",{
						autoHide:true,
						autoHideDelay:5000
					});
					form.reset();
				}else{
					if(Array.isArray(respData.msg)){
						(respData.msg.forEach(element => {
							(element.f_name !== 'undefined') ? $.notify(element.f_name,'warning') : '';
							(element.l_name !== 'undefined') ? $.notify(element.l_name,'warning') : '';
							(element.email !== 'undefined') ? $.notify(element.email,'warning') : '';
							(element.message !== 'undefined') ? $.notify(element.message,'warning') : '';
						}));
					}else{
						$.notify(respData.msg,"warning",{
							autoHide:true,
							autoHideDelay:5000
						});
					}
				}
			},
			error: function(err){
				$.notify("xHR Request error.","danger");
				console.log(err);
			},
			complete: function(){
				$("button[type='submit']").attr('disabled',false);
				console.log('Request complete.');
			}
		});
	})
});