<script type="text/javascript">
// Quando por scroll descerem 80px do topo do doc, mexe no padding e no tamanho da fonte. 
	window.onscroll = function(){
		scrollFunction()
		};

		function scrollFunction() {
		  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
			document.getElementById("nav").style.padding = "10px 10px";
			document.getElementById("logo").style.fontSize = "20px";
		  } else {
			document.getElementById("nav").style.padding = "35px 10px";
			document.getElementById("logo").style.fontSize = "35px";
		  }
		}
</script>