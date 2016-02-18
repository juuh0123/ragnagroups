  //alert('chamou o js geral');
var foto  = document.getElementById("divupload");
  
foto.onclick = function(){
	myFunction();
};
function myFunction(){
	alert('teste');
}
   
 $(document).ready(function(){
 	
		$('#divupload').click(function(){
			alert('chamou a funcao');
		
		});
		
		
		$("input").addClass('radius5');
		$("textarea").addClass('radius5');
		$("fieldset").addClass('radius5');
		$("#sidebar li").addClass('radius5');
		
		//accordion
		$('#accordion a.item').click(function(){
			$('#accordion li').children('ul').slideUp('fast');
			$('#accordion li').each(function(){
				$(this).removeClass('active');
			});
			$(this).siblings('ul').slideDown('fast');
			$(this).parent().addClass('active');
			return false;
		});

	


});
