<script type="text/javascript">

	function musica(){
		
	 $(function() {
		var availableTags = [
		  'Sertanejo',
		  'Rock',
		  'Forro',
		  'Samba',
		  'Pagode',
		  'Tango',
		  'Salsa',
		  'Baladão',
		  'Country',
		  'Opera',
		  'PassoDouble',
		  'Rap',
		  'Funk',
		  'Eletronica',
		  'FlashBack',
		  'Religiosa',
		  'Romantica'
		];
		$("#tags").autocomplete({
		  source: availableTags
		});
		});
	}
	
 	//relogio javascript	
		function relogio(){
		  var d = new Date();
		  var a= d.getDate();
		  var n = d.getHours();
		  var mes=d.getMonth();
		  var ano=d.getFullYear();
		  var dia=d.getDay();
		  var semana =["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"];
		  var meses =["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
		  
		  document.getElementById("relogio").innerHTML = semana[dia]+"<br> "+a+" de "+meses[mes]+" de "+ano;
		}
		
</script>