<!DOCTYPE html>
<html lang="pt-br" id="site1">
	<head>
	  <!-- links pedro -->
	  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
	  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
	  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>  
	  <!-- fimlinks -->
	  
		<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Adicionando JQuery -->
		<script src="js/jquery.mask.js"></script>
		<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header("location:login.php");
		}
		if(isset($_GET['editor'])){
						//verificar se houve a informacao via get do id do evento para redirecionar caso nao houver
						if(!isset($_GET['id'])){header('location:eventos.php');}
						include("action/conn/conexao.php");
						//filtro de eventos com get id e depois select
						$id = htmlspecialchars(addslashes($_GET['id']));
						$id_post = $_SESSION['id_postador'];
						$sql= $conn->query("SELECT * FROM tb_eventos where id_evento = $id and id_postador =$id_post");
						//trazer os dados para a variavel $eventos para echo nos devidos campos do formulario
						$evento = mysqli_fetch_assoc($sql);
		}
		?>
	</head>
	<body id="site1">
	 <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {
			//mascara
			$('#telefone').mask('(00) 0000-0000');
			$('#celular').mask('(00) 00000-0000');
			$('#ingressoh').mask('0000');
			$('#ingressom').mask('0000');
			$('#data').mask('99-99-9999');
			$('#horario').mask('00:00');
            
			function limpa_formul??rio_cep() {
                // Limpa valores do formul??rio de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova vari??vel "cep" somente com d??gitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Express??o regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado n??o foi encontrado.
                                limpa_formul??rio_cep();
                                alert("CEP n??o encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep ?? inv??lido.
                        limpa_formul??rio_cep();
                        alert("Formato de CEP inv??lido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formul??rio.
                    limpa_formul??rio_cep();
                }

            });
        });

	</script>

					<main role="main" id="mained" class="inner cover text-center container">
						<div class="shadow-sm p-3 mb-5 bg-white rounded">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<a href="meus_eventos.php"><button class="btn btn-primary d-flex"><i class="fas fa-chevron-left pr-2 pl-1 ml-1"></i></button></a>
									<li class="breadcrumb-item active ml-2 pt-1 mr-1 " aria-current="page">Meus eventos</li>
									<div class='pl-3 row'>
										<a href="eventos.php"><button class="btn btn-primary d-flex"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a>
										<li class="breadcrumb-item active ml-2 pt-1 mr-1 " aria-current="page">Eventos</li>
									
									
										<a href="tipo_evento.php"><button class="btn btn-primary d-flex"><i class="fas fa-chevron-left mr-1 pl-1 ml-1 pr-1"></i></button></a>
										<li class="breadcrumb-item active ml-2 pt-1 " aria-current="page">Tipos</li>
									</div>
									
								</ol>
							</nav>
						<span class=" border-bottom mt-2 d-flex p-left"></span><br>
							<form method="POST" action="<?php if(!isset($_GET["editor"])){
								echo "action/insert_evento.php";
							}else{echo "action/update_evento.php";}
								?>" data-toggle="validator">
								<div class="form-row">
									<div class="col-md-5 mb-3">
									  <label for="nome">Nome do evento</label>
									  <input type="text" class="form-control" id="nome" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['nome_evento']."'";
									  } ?>  placeholder="Ex: Sextou" name="nome_evento" required>
									  <div class="valid-feedback">
										Looks good!
									  </div>
									</div>
									<div class="col-md-3 mb-3">
									  <label for="nome2">Data do evento</label>
									  <input type="text" class="form-control" id="data" name="dia_evento" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".date('d-m-Y', strtotime($evento['dia_evento']))."'";
									  } ?> placeholder="dd-mm-aaaa" required>
									<div class="text-danger">
										<?php if(isset($_GET['erro'])){
										echo htmlspecialchars($_GET['erro']);}
										?>
									</div>
									</div>

									<div class="col-md-2 mb-3">
										<label for="nome2">In??cio</label>
										<input type="time" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['inicio_evento']."'";
									  } ?> class="form-control"  id="horario" name="inicio_evento"  required>
									</div>						
									<div class="col-md-2 mb-3">
										<label for="nome2">T??rmino</label>
										<input type="time" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['termino_evento']."'";
									  } ?> class="form-control"  id="horario" name="termino_evento"  required>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-3 mb-3">
										<label for="ddi" >DDI</label>
										<select name="countryCode" class="custom-select custom-select mb-3" id="ddi">
											<option data-countryCode="DZ" value="213">Algeria (+213)</option>
											<option data-countryCode="AD" value="376">Andorra (+376)</option>
											<option data-countryCode="AO" value="244">Angola (+244)</option>
											<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
											<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
											<option data-countryCode="AR" value="54">Argentina (+54)</option>
											<option data-countryCode="AM" value="374">Armenia (+374)</option>
											<option data-countryCode="AW" value="297">Aruba (+297)</option>
											<option data-countryCode="AU" value="61">Australia (+61)</option>
											<option data-countryCode="AT" value="43">Austria (+43)</option>
											<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
											<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
											<option data-countryCode="BH" value="973">Bahrain (+973)</option>
											<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
											<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
											<option data-countryCode="BY" value="375">Belarus (+375)</option>
											<option data-countryCode="BE" value="32">Belgium (+32)</option>
											<option data-countryCode="BZ" value="501">Belize (+501)</option>
											<option data-countryCode="BJ" value="229">Benin (+229)</option>
											<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
											<option data-countryCode="BT" value="975">Bhutan (+975)</option>
											<option data-countryCode="BO" value="591">Bolivia (+591)</option>
											<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
											<option data-countryCode="BW" value="267">Botswana (+267)</option>
											<option data-countryCode="BR" value="55" Selected>Brazil (+55)</option>
											<option data-countryCode="BN" value="673">Brunei (+673)</option>
											<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
											<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
											<option data-countryCode="BI" value="257">Burundi (+257)</option>
											<option data-countryCode="KH" value="855">Cambodia (+855)</option>
											<option data-countryCode="CM" value="237">Cameroon (+237)</option>
											<option data-countryCode="CA" value="1">Canada (+1)</option>
											<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
											<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
											<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
											<option data-countryCode="CL" value="56">Chile (+56)</option>
											<option data-countryCode="CN" value="86">China (+86)</option>
											<option data-countryCode="CO" value="57">Colombia (+57)</option>
											<option data-countryCode="KM" value="269">Comoros (+269)</option>
											<option data-countryCode="CG" value="242">Congo (+242)</option>
											<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
											<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
											<option data-countryCode="HR" value="385">Croatia (+385)</option>
											<option data-countryCode="CU" value="53">Cuba (+53)</option>
											<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
											<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
											<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
											<option data-countryCode="DK" value="45">Denmark (+45)</option>
											<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
											<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
											<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
											<option data-countryCode="EC" value="593">Ecuador (+593)</option>
											<option data-countryCode="EG" value="20">Egypt (+20)</option>
											<option data-countryCode="SV" value="503">El Salvador (+503)</option>
											<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
											<option data-countryCode="ER" value="291">Eritrea (+291)</option>
											<option data-countryCode="EE" value="372">Estonia (+372)</option>
											<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
											<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
											<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
											<option data-countryCode="FJ" value="679">Fiji (+679)</option>
											<option data-countryCode="FI" value="358">Finland (+358)</option>
											<option data-countryCode="FR" value="33">France (+33)</option>
											<option data-countryCode="GF" value="594">French Guiana (+594)</option>
											<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
											<option data-countryCode="GA" value="241">Gabon (+241)</option>
											<option data-countryCode="GM" value="220">Gambia (+220)</option>
											<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
											<option data-countryCode="DE" value="49">Germany (+49)</option>
											<option data-countryCode="GH" value="233">Ghana (+233)</option>
											<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
											<option data-countryCode="GR" value="30">Greece (+30)</option>
											<option data-countryCode="GL" value="299">Greenland (+299)</option>
											<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
											<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
											<option data-countryCode="GU" value="671">Guam (+671)</option>
											<option data-countryCode="GT" value="502">Guatemala (+502)</option>
											<option data-countryCode="GN" value="224">Guinea (+224)</option>
											<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
											<option data-countryCode="GY" value="592">Guyana (+592)</option>
											<option data-countryCode="HT" value="509">Haiti (+509)</option>
											<option data-countryCode="HN" value="504">Honduras (+504)</option>
											<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
											<option data-countryCode="HU" value="36">Hungary (+36)</option>
											<option data-countryCode="IS" value="354">Iceland (+354)</option>
											<option data-countryCode="IN" value="91">India (+91)</option>
											<option data-countryCode="ID" value="62">Indonesia (+62)</option>
											<option data-countryCode="IR" value="98">Iran (+98)</option>
											<option data-countryCode="IQ" value="964">Iraq (+964)</option>
											<option data-countryCode="IE" value="353">Ireland (+353)</option>
											<option data-countryCode="IL" value="972">Israel (+972)</option>
											<option data-countryCode="IT" value="39">Italy (+39)</option>
											<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
											<option data-countryCode="JP" value="81">Japan (+81)</option>
											<option data-countryCode="JO" value="962">Jordan (+962)</option>
											<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
											<option data-countryCode="KE" value="254">Kenya (+254)</option>
											<option data-countryCode="KI" value="686">Kiribati (+686)</option>
											<option data-countryCode="KP" value="850">Korea North (+850)</option>
											<option data-countryCode="KR" value="82">Korea South (+82)</option>
											<option data-countryCode="KW" value="965">Kuwait (+965)</option>
											<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
											<option data-countryCode="LA" value="856">Laos (+856)</option>
											<option data-countryCode="LV" value="371">Latvia (+371)</option>
											<option data-countryCode="LB" value="961">Lebanon (+961)</option>
											<option data-countryCode="LS" value="266">Lesotho (+266)</option>
											<option data-countryCode="LR" value="231">Liberia (+231)</option>
											<option data-countryCode="LY" value="218">Libya (+218)</option>
											<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
											<option data-countryCode="LT" value="370">Lithuania (+370)</option>
											<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
											<option data-countryCode="MO" value="853">Macao (+853)</option>
											<option data-countryCode="MK" value="389">Macedonia (+389)</option>
											<option data-countryCode="MG" value="261">Madagascar (+261)</option>
											<option data-countryCode="MW" value="265">Malawi (+265)</option>
											<option data-countryCode="MY" value="60">Malaysia (+60)</option>
											<option data-countryCode="MV" value="960">Maldives (+960)</option>
											<option data-countryCode="ML" value="223">Mali (+223)</option>
											<option data-countryCode="MT" value="356">Malta (+356)</option>
											<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
											<option data-countryCode="MQ" value="596">Martinique (+596)</option>
											<option data-countryCode="MR" value="222">Mauritania (+222)</option>
											<option data-countryCode="YT" value="269">Mayotte (+269)</option>
											<option data-countryCode="MX" value="52">Mexico (+52)</option>
											<option data-countryCode="FM" value="691">Micronesia (+691)</option>
											<option data-countryCode="MD" value="373">Moldova (+373)</option>
											<option data-countryCode="MC" value="377">Monaco (+377)</option>
											<option data-countryCode="MN" value="976">Mongolia (+976)</option>
											<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
											<option data-countryCode="MA" value="212">Morocco (+212)</option>
											<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
											<option data-countryCode="MN" value="95">Myanmar (+95)</option>
											<option data-countryCode="NA" value="264">Namibia (+264)</option>
											<option data-countryCode="NR" value="674">Nauru (+674)</option>
											<option data-countryCode="NP" value="977">Nepal (+977)</option>
											<option data-countryCode="NL" value="31">Netherlands (+31)</option>
											<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
											<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
											<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
											<option data-countryCode="NE" value="227">Niger (+227)</option>
											<option data-countryCode="NG" value="234">Nigeria (+234)</option>
											<option data-countryCode="NU" value="683">Niue (+683)</option>
											<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
											<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
											<option data-countryCode="NO" value="47">Norway (+47)</option>
											<option data-countryCode="OM" value="968">Oman (+968)</option>
											<option data-countryCode="PW" value="680">Palau (+680)</option>
											<option data-countryCode="PA" value="507">Panama (+507)</option>
											<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
											<option data-countryCode="PY" value="595">Paraguay (+595)</option>
											<option data-countryCode="PE" value="51">Peru (+51)</option>
											<option data-countryCode="PH" value="63">Philippines (+63)</option>
											<option data-countryCode="PL" value="48">Poland (+48)</option>
											<option data-countryCode="PT" value="351">Portugal (+351)</option>
											<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
											<option data-countryCode="QA" value="974">Qatar (+974)</option>
											<option data-countryCode="RE" value="262">Reunion (+262)</option>
											<option data-countryCode="RO" value="40">Romania (+40)</option>
											<option data-countryCode="RU" value="7">Russia (+7)</option>
											<option data-countryCode="RW" value="250">Rwanda (+250)</option>
											<option data-countryCode="SM" value="378">San Marino (+378)</option>
											<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
											<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
											<option data-countryCode="SN" value="221">Senegal (+221)</option>
											<option data-countryCode="CS" value="381">Serbia (+381)</option>
											<option data-countryCode="SC" value="248">Seychelles (+248)</option>
											<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
											<option data-countryCode="SG" value="65">Singapore (+65)</option>
											<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
											<option data-countryCode="SI" value="386">Slovenia (+386)</option>
											<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
											<option data-countryCode="SO" value="252">Somalia (+252)</option>
											<option data-countryCode="ZA" value="27">South Africa (+27)</option>
											<option data-countryCode="ES" value="34">Spain (+34)</option>
											<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
											<option data-countryCode="SH" value="290">St. Helena (+290)</option>
											<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
											<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
											<option data-countryCode="SD" value="249">Sudan (+249)</option>
											<option data-countryCode="SR" value="597">Suriname (+597)</option>
											<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
											<option data-countryCode="SE" value="46">Sweden (+46)</option>
											<option data-countryCode="CH" value="41">Switzerland (+41)</option>
											<option data-countryCode="SI" value="963">Syria (+963)</option>
											<option data-countryCode="TW" value="886">Taiwan (+886)</option>
											<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
											<option data-countryCode="TH" value="66">Thailand (+66)</option>
											<option data-countryCode="TG" value="228">Togo (+228)</option>
											<option data-countryCode="TO" value="676">Tonga (+676)</option>
											<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
											<option data-countryCode="TN" value="216">Tunisia (+216)</option>
											<option data-countryCode="TR" value="90">Turkey (+90)</option>
											<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
											<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
											<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
											<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
											<option data-countryCode="UG" value="256">Uganda (+256)</option>
											<option data-countryCode="GB" value="44">UK (+44)</option>
											<option data-countryCode="UA" value="380">Ukraine (+380)</option>
											<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
											<option data-countryCode="UY" value="598">Uruguay (+598)</option>
											<option data-countryCode="US" value="1">USA (+1)</option>
											<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
											<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
											<option data-countryCode="VA" value="379">Vatican City (+379)</option>
											<option data-countryCode="VE" value="58">Venezuela (+58)</option>
											<option data-countryCode="VN" value="84">Vietnam (+84)</option>
											<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
											<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
											<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
											<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
											<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
											<option data-countryCode="ZM" value="260">Zambia (+260)</option>
											<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
										</optgroup>
									</select>
								</div>
									<div class="col-md-2 mb-3">
									  <label for="nome2">Celular</label>
									  <input type="text" class="form-control" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['celular_evento']."'";
									  } ?>  id="celular" placeholder="(99) 12345-6789"  name="celular_evento" required>
									</div>
									<div class="col-md-2 mb-3">
									  <label for="nome2">Telefone</label>
									  <input type="text" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['telefone_evento']."'";
									  } ?> class="form-control"  id="telefone" placeholder="(99) 1234-5678"  name="telefone_evento" required>
									</div>
									<div class="col-md-5 mb-3">
										  <label for="email">Email</label>
										  <div class="input-group">
											<div class="input-group-prepend">
											  <span class="input-group-text" id="inputGroupPrepend3">@</span>
											</div>
											<input type="email" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['email_evento']."'";
									  } ?> class="form-control" id="email" placeholder="Ex: email@email.com" aria-describedby="inputGroupPrepend3" name="email" required>
										  </div>
									</div>
									<div class="col-md-4 mb-3 text-center justify-content-center">
									  <label for="ingressoh">Ingresso</label>
									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text" id="inputGroupPrepend3"><img src="https://img.icons8.com/color/50/000000/ticket-purchase.png"></span>
										</div>
											<div>
												<span class="input-group-text" id="inputGroupPrepend3">Homens</span>
												<input type="text" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['ingressoh']."'";
									  } ?> class="form-control" id="ingressoh" placeholder="Ex: 10.00" aria-describedby="inputGroupPrepend3" name="ingressoh" required>
												<span class="input-group-text"  id="inputGroupPrepend3">Mulheres</span>
												<input type="text" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['ingressom']."'";
									  } ?> class="form-control" id="ingressom" placeholder="Ex: 10.00" aria-describedby="inputGroupPrepend3" name="ingressom" required>
											</div>
										</div>
									</div>
									<div class="col-md-4 mb-3 row">
										 <div class="col mb-2">
											<label for="nome2">Observa????es</label>
											<textarea class="form-control" id="exampleFormControlTextarea1" name="obs" maxlength="150" rows="6" placeholder="Coloque aqui informa????es adicionais, como... open bar limitado, participa????es do dia, etc. "><?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo $evento['obs_evento'];
									  } ?></textarea>
										</div>
									</div>
									<div class="col-md-3 ml-4 mr-3">
										<label for="info">Informa????es adicionais</label>
										<div class="container border">
											<div class="custom-control custom-checkbox">
											 <input type="radio" class="custom-control-input"  value="Com open-bar" name="check" id="customCheck2">
											  <label class="custom-control-label" for="customCheck2">Com open-bar</label>
											</div>
											<div class="custom-control custom-checkbox">
											  <input type="radio" class="custom-control-input"  value="Sem open-bar" name="check" id="Check1" checked>
											  <label class="custom-control-label" for="Check1">Sem open-bar</label>
											</div>
											
											
											<span class="text-success">
												<?php if(isset($_GET['editor']) && isset($_GET['id'])){
														echo "Confirme as op????es:'<br>".$evento['chek_evento']."<br>".$evento['musicas'];
												} ?>
											</span>
											
											<div class="row border">
												<select class="custom-select" name="msc1" required>
												  <option value='' selected>Estilos musicais</option>
												  <option value="Funk">Funk</option>
												  <option value="Rock">Rock</option>
												  <option value="Rap">Rap</option>
												  <option value="Eletronica">Eletronica</option>
												  <option value="Trap">Trap</option>
												  <option value="Reggae">Reggae</option>
												  <option value="Sertanejo">Sertanejo</option>
												  <option value="Forro">Forro</option>
												  <option value="Gospel">Gospel</option>
												  <option value="MPB">MPB</option>
												  <option value="">Nda</option>
												</select>
											</div>
											<div class="row border">
												<select class="custom-select" name="msc2" required>
												  <option value='' selected>Estilos musicais</option>
												  <option value="Funk">Funk</option>
												  <option value="Rock">Rock</option>
												  <option value="Rap">Rap</option>
												  <option value="Eletronica">Eletronica</option>
												  <option value="Trap">Trap</option>
												  <option value="Reggae">Reggae</option>
												  <option value="Sertanejo">Sertanejo</option>
												  <option value="Forro">Forro</option>
												  <option value="Gospel">Gospel</option>
												  <option value="MPB">MPB</option>
												  <option value="">Nda</option>
												</select>
											</div>
											<div class="row border">
											<select class="custom-select" name="msc3" required>
												  <option value='' selected>Estilos musicais</option>
												  <option value="Funk">Funk</option>
												  <option value="Rock">Rock</option>
												  <option value="Rap">Rap</option>
												  <option value="Eletronica">Eletronica</option>
												  <option value="Trap">Trap</option>
												  <option value="Reggae">Reggae</option>
												  <option value="Sertanejo">Sertanejo</option>
												  <option value="Forro">Forro</option>
												  <option value="Gospel">Gospel</option>
												  <option value="MPB">MPB</option>
												  <option value="">Nda</option>
												</select>
											</div>
											<div class="row border"><span class="col-4 pt-2 ">Outro?</span>
												<input type="text" class="form-control col-8" placeholder="Qual?" name="outro">
											</div>
										</div>
									</div>
								</div>
								  <div class="form-row">
									<div class="col-md-3 mb-3">
										<span class="text-success"><?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "Confirme o cep:'".$evento['cep_evento']."'";
									  } ?></span>
									  <label for="validationServer05" class="pt-4">Cep do local</label>
									  <input type="text"  class="form-control" id="cep" placeholder="Cep" name="cep" maxlength="10" required>
									</div>
									<div class="col-md-3 mb-3 pt-4">
									  <label for="estado">UF</label>
									  <input type="text"   type="text" readonly class="form-control disabled" id="uf" name="uf">
									</div>
									<div class="col-md-4 mb-3 pt-4">
									  <label for="cidade">Cidade</label>
									  <input type="text"  type="text" readonly class="form-control disabled" id="cidade" name="cidade">
									</div>
									<div class="col-md-2 mb-3 pt-4">
									  <label for="cidade">N??</label>
									  <input type="text" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['numero_evento']."'";
									  } ?> class="form-control" id="numero" placeholder="Numero" name="numero" maxlength="10" required>
									</div>
								  </div>
								  <div class="form-row">
									<div class="col-md-5 mb-3">
									  <label for="rua">Rua</label>
									  <input type="text" type="text" readonly class="form-control disabled" id="rua" name="rua">
									</div>
									<div class="col-md-4 mb-3">
									  <label for="bairro">Bairro</label>
									  <input type="text"  type="text" readonly class="form-control disabled" id="bairro" name="bairro">
									</div>
									<div class="col-md-3 mb-3">
									  <label for="bairro">Complemento</label>
									  <input type="text" <?php if(isset($_GET['editor']) && isset($_GET['id'])){
										  echo "value='".$evento['complemento_evento']."'";
									  } ?> class="form-control" id="complemento" placeholder="Complemento" maxlength="80" name="complemento">
									</div>
								  </div>
								  <div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="invalidCheck3" required>
										<label class="form-check-label" for="invalidCheck3">
											Concordo com os termos e condi????es.
										</label>
									</div>
								  </div>
								  <input class="btn btn-primary new-btn2" value="Enviar" name="save" type="submit">
								  <input type="hidden" value="" name="datav" id="dataa">
								  <input type="hidden" value="<?php echo $evento['id_evento'];?>" name="id">
							</form>
						</div>
					</main>


		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script src="js/validator.min.js"></script>
	</body>
</html>
<script type="text/javascript">
		function myFunction() {
		  var d = new Date();
		  var a= d.getDate();
		  var n = d.getHours();
		  var m = d.getMinutes();
		  var mes=d.getMonth()+1;
		  var ano=d.getFullYear();
		  var dia=d.getDay();
		  
		  relogio = a+"-"+mes+"-"+ano+" "+n+":"+m;
		  
		  document.getElementById("dataa").value = relogio;
}
	myFunction();
	
</script>
