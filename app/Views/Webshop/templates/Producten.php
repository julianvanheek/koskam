<?php
    $counter = 0;

    foreach($records as $product){
        $counter++;
    }
    if($counter == 0){
        $counter = '0 resultaten gevonden';
    }
    else{
        $counter = 'Aantal resultaten: '. $counter;
    }
?>
<div class="col-md-12">
            <div class="alleresultatenheader">
                <div>
                    <h2 class="aantalresultaten"><?= $counter; ?></h2>
                    <input type="hidden" id="aantalresultaten_org" value="1">
                </div>

            </div>
            <div class="alleresultaten omenom">

            <?php 

                foreach($records as $product){

                    $id = $product->p_id;
                    $merk = $product->p_brand;
                    $type = $product->p_type;
                    $titel = $product->p_title;
                    $beschrijving = $product->p_description;
                    $prijsBruto = $product->p_price;
                    $prijsNetto = round($prijsBruto / 1.21 , 2);

                    echo '
                        <div class="artikelregel div_sort levertijdbekend" style="background-color: rgb(249, 248, 248);">
                            
                            <div class="artikelregel-inner row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-8 artikelomschrijving">
                                            <div class="artikelregel-omschrijving-item shop-actie-banner pull-right"></div>
                                            <div class="artikelregel-omschrijving-item artikelregel_omschrijving">
                                                <h4>'. $product->p_brand .' ' . $product->p_type . ' '. $product->p_title .' </h4></div>
                                            <span class="artikelmerk-td">'. $product->p_title .'</span>
                                            <span id="fabriekscode_'. $product->p_id .'">'. $product->p_description .'</span>
                                            <div class="artikelregel-omschrijving-item" style="text-transform: unset !important;">
                                                Artnr. '.$product->p_id.'
                                            </div>
                                        </div>
                                        <div class="col-lg-4 prijs text-right">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="prijs_'.$product->p_price.'"><span shopmode="bruto" style="display: inline;"><div class="bruto"><span class="rood">Bruto</span> € '.$product->p_price.'</div>
                                                    </span><span shopmode="netto" style="color: #E42C2A; display: inline;"><div class="netto"><span class="rood">Netto</span> € '. $prijsNetto .'</div>
                                                </span></div>
                                            
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="artikelregel-bestel-form pull-right">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-default btn-number addProduct" type="button" data-id="'.$id.'">
                                                                    <span class="glyphicon glyphicon-plus"></span>
                                                                </button>
                                                            </span>
                                                        </div>
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