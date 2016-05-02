$(function(){
	$(".title").typed({
		strings: [
			"Hey,^1000 buddy!", 
			"Welcome to Taskbuster!!!", 
			"Here you can ^500create and ^500manage tasks"],
		typeSpeed: 50,
		backDelay: 500,
		loop: true,
		callback: function() { //calls after iteration is completed 
		}
	});
});

$(document).ready(function() {
    $(".close").on("click", function() {
        var button = $(this);
        var id = button.attr("data-target");
        var token = button.data('token');

        $.ajax({
            url: '/delete/' + id,
            data: {'_token': token},
            type: 'DELETE',
            cache: false,
            async: true,
            success: function(result) {
                button.parent().parent().remove();
            }
        });
    });
});