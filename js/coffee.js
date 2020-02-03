
var img = new Array("/images/drip_coffee.jpg","/images/coffee4.jpg","/images/coofee2.jpg");
var num = -1;
var templateDirectory = '<?php bloginfo('template_directory'); ?>';
imgTimer();

function imgTimer() {
  var t = document.getElementsByClassName('topImage');

  if(num == 2) {
   num = 0;
  }else{
  num++;
  }

t.innerHTML = "<img src=" + templateDirectory + img[num]+">";
console.log(t.innerHTML);

setTimeout("imgTimer()", 3000);
}


// form error check=============================================
	var error = 0;
	var regexp = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}$/;
	function formsubmit() {
		if(regexp.test(document.form.email.value) == false) {
			error ++;
		}
		if(document.form.email == "") {
			error++;
		}
		if(document.form.name.value == "") {
			error++;
		}
		if(document.form.text.value == ""){
			error++;
		}
		if(error > 0) {
			alert("正しく入力して下さい");
		}else{
			form.submit();
		}
	}
	// mordal============================================

	function displayModalWindow() {
		const smallbar = document.getElementById('bar');
		smallbar.classList.toggle('modal');
		const ul = document.getElementById('ulmodal');
		ul.classList.toggle('ulmodal');
	}