

<div class="container homeblocks">

    <div class="row featurette contentheading">
        <div class="col-lg-12">
            <div id="systeembericht"></div>
        </div>
        <div class="col-lg-12">
            <h1>Uw winkelwagen</h1>
            <p></p>
            <div class="tecdoc winkelwagen">
                <div id="jupjup" class="omenom">
                    <div class="th">
                        <div class="col-lg-10">
                            <div class="col-lg-8 artikelomschrijving">Omschrijving</div>
                            <div class="col-lg-4 omschrijving-td text-right">Prijs</div>
                        </div>
                    </div>

                    <?php 

                        if($records === "Nog geen producten in uw winkelwagen"){
                            echo '<h1>Uw winkelwagen is nog leeg</h1>';
                            return;
                        }

                    	$totaalBedragBruto = 0;
                    	$totaalBedragNetto = 0;

                    	foreach($records as $cartItem){

                    		$id = $cartItem[0]->p_id;
                    		$brand = $cartItem[0]->p_brand;
                    		$type = $cartItem[0]->p_type;
                    		$title = $cartItem[0]->p_title;
                    		$description = $cartItem[0]->p_description;
                    		$prijsBruto = $cartItem[0]->p_price;
                    		$prijsNetto = round($prijsBruto / 1.21 , 2);
                    		$totaalBedragBruto += $prijsBruto;
                    		$totaalBedragNetto = round($totaalBedragBruto / 1.21 , 2);

                    		echo '

                    			<div class="artikelregel div_sort article" style="background-color: rgb(249, 248, 248);">

			                        <div class="artikelregel-inner row">
			                            <div class="col-lg-10">
			                                <div class="row">
			                                    <div class="col-lg-8 artikelomschrijving">
			                                        <div class="artikelregel-omschrijving-item artikelregel_omschrijving" id="omschrijving_25900059">
			                                            <h4>'. $brand .' ' . $title .'</h4>
			                                        </div>
			                                        <span class="artikelmerk-td">' . $brand .' ' . $type . '</span> &nbsp; - &nbsp; '. $title .'
			                                    </div>
			                                    <div class="col-lg-4 prijs text-right">
			                                        <div class="row">
			                                            <div class="col-md-3">
			                                            </div>
			                                            <div class="col-md-9">
			                                                <div id="prijs_25900059">
			                                                    <button class="pull-right btn btn-danger padding-left-lg deleteProduct" data-id="'. $id .'" style="margin-left: 10px;">
			                                                        <div class="glyphicon glyphicon-remove"></div>
			                                                    </button>
			                                                    <span shopmode="bruto" style="display: inline;">
			                                        		<div class="bruto">
			                                                </div>
			                                                </span>
			                                                    <span shopmode="netto" style="color: #E42C2A; display: inline;">
				                                        			<div class="netto">
				                                            			<span shopmode="netto" style="display: inline;">Bruto € '. $prijsBruto .'<br></span>
				                                                    	<span shopmode="netto" style="color: #E42C2A; display: inline;">Netto € '. $prijsNetto .'</span>
				                                                    	<br>
				                                                	</div>
			                                                	</span>
			                                                	<span shopmode="netto" style="display: inline;"></span>
				                                			</div>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>

				                    </div>
			                	</div>

                    		';
                    	}
                    ?>

                    

            </div>
        </div>
        <p>&nbsp;</p>
        <div class="text-right">
            <strong>
    <span class="rood">Totaalbedrag:</span><br>
    </strong>
            <span shopmode="netto" style="clear: both; display: inline;">Bruto: € <?= $totaalBedragBruto ?><br><strong>Netto: € <?= $totaalBedragNetto ?></strong></span>
        </div>
        <div class="cart-footer">
            <div class="autogegevens">

            </div>
            <div class="pull-right">
                <a class="btn btn-success bestelWagen">Verder met bestellen
            </a>
            </div>
            <a class="btn btn-primary verwijderWagen" >
                <div class="glyphicon glyphicon-remove"></div>&nbsp;&nbsp;Legen
            </a>
        </div>
        <p></p>
        <!-- Add code here that should appear in the content block of all new pages -->
    </div>
</div>

<hr class="featurette-divider">
</div>