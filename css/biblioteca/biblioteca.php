<?php

//autocomplete javascript
function musica(){

echo "<script>
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
    $( '#tags' ).autocomplete({
      source: availableTags
    });
  });
  </script>";
}




?>