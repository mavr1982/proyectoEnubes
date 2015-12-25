
$(document).ready(function(){
	
	$('#sidebar').affix({
      offset: {
        top: 230,
        bottom: 100
      }
	});

	$('#midCol').affix({
      offset: {
        top: 230,
        bottom: 100
      }
	});

	$("input#submit").click(function(){
        $.ajax({
            type: "POST",
            url: "process.php", //process to mail
            data: $('form.contact').serialize(),
            success: function(msg){
                $("#thanks").html(msg) //hide button and show thank you
                $("#form-content").modal('hide'); //hide popup  
            },
            error: function(){
                alert("failure");
            }
        });
    });

});