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
/*Pass validate force*/
function validPass(){
	senha = document.getElementById("exampleInputPassword1").value;
	forca = 0;
	mostra = document.getElementById("mostra");
	if((senha.length >= 4) && (senha.length <= 7)){
		forca += 10;
	}else if(senha.length>7){
		forca += 25;
	}
	if(senha.match(/[a-z]+/)){
		forca += 10;
	}
	if(senha.match(/[A-Z]+/)){
		forca += 20;
	}
	if(senha.match(/\d+/)){
		forca += 20;
	}
	if(senha.match(/\W+/)){
		forca += 25;
	}
	return mostra_res();
}/*validPass*/
function mostra_res(){
	if(forca < 30){
		mostra.innerHTML = '<tr class="valid"><td class="valid" bgcolor="#ff3333" width="'+forca+'"></td><td>1~25 </td></tr>';
	}else if((forca >= 30) && (forca < 60)){
		mostra.innerHTML = '<tr class="valid"><td class="valid" bgcolor="#ffff33" width="'+forca+'"></td><td>25~50 </td></tr>';;
	}else if((forca >= 60) && (forca < 85)){
		mostra.innerHTML = '<tr class="valid"><td class="valid" bgcolor="#3366ff" width="'+forca+'"></td><td>50~75 </td></tr>';
	}else{
		mostra.innerHTML = '<tr class="valid"><td class="valid" bgcolor="#47d147" width="'+forca+'"></td><td>75~99 </td></tr>';
	}
}/*mostra_res*/
function exit(){
	var mostra = document.getElementById("mostra");
	var valid = document.getElementsByClassName("valid");
	mostra.style.visibility = "hidden";
	valid.style.visibility = "hidden";
}
