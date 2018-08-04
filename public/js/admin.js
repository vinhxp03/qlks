$(function(){
	$('.nav.purchase').click(function(){
		$('.nav.nav-second.collapse.purchase').toggleClass('in');
		return false;
	});
	$('.nav.product').click(function(){
		$('.nav.nav-second.collapse.product').toggleClass('in');
		return false;
	});
	$('.nav.account').click(function(){
		$('.nav.nav-second.collapse.account').toggleClass('in');
		return false;
	});
	$('.nav.support').click(function(){
		$('.nav.nav-second.collapse.support').toggleClass('in');
		return false;
	});
	$('.nav.content').click(function(){
		$('.nav.nav-second.collapse.content').toggleClass('in');
		return false;
	});
	$('.select_all').change(function(){
		var checkbox = $(this).closest('form').find(':checkbox');
		checkboxes.prop('checked', $(this).is(':checked'));
	});
});