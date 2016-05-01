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
