function getVal() {
    var date = $("#datepicker").datepicker(getDate());
    alert(date);
}
$(function () { 

    /*$('#phone').blur(function(){
        var datein = $(this).val();
        if (datein!= '') {
            alert(datein);
        }
    });*/

    $(window).scroll(function(){
        if ($('html,body').scrollTop() > 40) {
            $('.navbar-fixed-top').addClass('level');
        }else
            $('.navbar-fixed-top').removeClass('level');
    });

	//date picker
	$(function () {   
	    $("#datepicker").datepicker({   
	    autoclose: true,         
	    //startDate: new Date(),
	    todayHighlight: true });
    }); 
    $(function () {  
	    $("#datepicker2").datepicker({   
	    autoclose: true,         
	    //startDate: new Date(), 
	    todayHighlight: true });
    }); 

    // scroll top
    $('#backtotop').click(function() {
        $('html, body').animate({scrollTop:0},1000);
    });
    $(window).scroll(function(){
        if ($(window).scrollTop()>300) {
            $('#backtotop').fadeIn();
        }else{
            $('#backtotop').fadeOut();
        }
    });
})  
 