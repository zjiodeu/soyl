/*$(document).ready(function(){
	
	$("#callback_try_krouching").on("click",function(){
        $('#callback_modal_krouching').modal('hide');
		
		var fio = $('#callback_name_k').val();
		var email = $('#callback_email_k').val();
		var number = $('#callback_number_k').val();
		var goal = $('#callback_goal_k').val();
		
		$.ajax({
			url: "index.php?r=site/krouching",
			type: "POST",
			data: {'fio':fio, 'email':email, 'number':number, 'goal':goal},
			success: function(data){
				if(data == 'Done'){
					$('#callback_thx').modal();
				}
			}
		});

        return false;
    });
});*/