<!-- jquery 2.2.4 js-->
<script src="<?= base_url() ?>assets/public/assets/js/jquery-2.2.4.min.js"></script>
<!-- popper js-->
<script src="<?= base_url() ?>assets/public/assets/js/popper.js"></script>
<!-- carousel js-->
<script src="<?= base_url() ?>assets/public/assets/js/owl.carousel.min.js"></script>
<!-- wow js-->
<script src="<?= base_url() ?>assets/public/assets/js/wow.min.js"></script>
<!-- bootstrap js-->
<script src="<?= base_url() ?>assets/public/assets/js/bootstrap.min.js"></script>\
<!--skroller js-->
<script src="<?= base_url() ?>assets/public/assets/js/skrollr.min.js"></script>
<!--mobile menu js-->
<script src="<?= base_url() ?>assets/public/assets/js/jquery.slicknav.min.js"></script>
<!--particle s-->
<script src="<?= base_url() ?>assets/public/assets/js/particles.min.js"></script>
<!-- main js-->
<script src="<?= base_url() ?>assets/public/assets/js/main.js"></script>
	
<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
		return true;
	}
				window.addEventListener('load', function() {
					// setTimeout(function() {
						window.requestCloseWelcomeScreen();

						var i=0,text;
						text = "Publish Your Music Worldwide"
						var isAnimating = true;

						function typing() {
							if(i<text.length){
								document.getElementById("text").innerHTML += text.charAt(i);
								i++;
								setTimeout(typing,90);
							}else{
								isAnimating = false;
								setTimeout(looping, 1000);
							}
						}

						function looping() {
							isAnimating = true;
							i = 0;
							document.getElementById("text").innerHTML = "";
							setTimeout(typing, 0); 
						}
						
						typing();

						setTimeout(function() {
							if (!isAnimating) {
								looping();
							}
						}, 1000);
					// }, 2000); // 2 detik
				});

</script>
