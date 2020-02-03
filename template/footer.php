<footer>
	<div class="footer bottom">
		<p class="copyright">copyright &#169; JoinCafe</p>
		<p class="smalladress">神奈川県横浜市中区新港1丁目3−1<br> シーサイド 2F</p>
	</div>
</footer>
</div>
<script type="text/javascript">

//top image change
var img = new Array("/images/drip_coffee.jpg","/images/coffee4.jpg","/images/coofee2.jpg");

var num = -1;

var templateDirectory = '<?php bloginfo('template_directory'); ?>';
var t = document.images;

imgTimer();

function imgTimer() {
if(location.href === 'https://yurikoi.xyz/') {
	if(num == 2) {
		num = 0;
	}else{
		num++;
	}
	t[1].src = templateDirectory + img[num];
}

setTimeout("imgTimer()", 4000);

}

function displayModalWindow() {
	const smallbar = document.getElementById('bar');
	smallbar.classList.toggle('modal');
	const ul = document.getElementById('ulmodal');
	ul.classList.toggle('ulmodal');
}

function formsubmit() {
	var error = 0;
	var regexp = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}$/;

		if(regexp.test(document.form.email.value) == false) {
			error++;
		}
		if(document.form.kokyaku_name.value == ""){
			error++;
		}
		if(document.form.email.value == "") {
			error++;
		}
		if(document.form.text.value == "") {
			error++;
		}
		if(error > 0){
			alert("入力して下さい");
		}else{
			form.submit();
		}
	}

</script>
</body>
</html>