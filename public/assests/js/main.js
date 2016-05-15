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
    $(".delete").on("click", function() {
        var agree = confirm("Are you sure?");
        if (agree) {
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
        }

        return false;
    });

    $(".edit").on("click", function() {
        $id = $(this).attr('data-target');
        $edit_id = "edit-" + $id;
        $show_id = "show-" + $id;
        $("#" + $edit_id).css('display', 'block');
        $("#" + $show_id).css('display', 'none');
    });

    $(".exit").on("click", function() {
        $id = $(this).attr('data-target');
        $edit_id = "edit-" + $id;
        $show_id = "show-" + $id;
        $("#" + $edit_id).css('display', 'none');
        $("#" + $show_id).css('display', 'block');
    });    
});