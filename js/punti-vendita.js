//use strict;

/* Variabili Globali ==================================================================================== */
var punto_vendita_corrente = 0;
var punti_vendita_data = [];
var conferma_modifiche = false;

/* ======================================== *
 * Definizione dell'Oggetto "Punto Vendita" *
 * ======================================== */
function PuntoVendita(list_index, titolo, fk_id_provincia, nome_provincia, html_provincia, fk_id_citta, nome_citta, html_citta, indirizzo_utente, cap_utente, orari_utente, latitudine_utente, longitudine_utente) {

/* Proprietà  ============================================================================================= */
    this.list_index         = list_index            || 0;
    this.titolo             = titolo                || "";
    this.fk_id_provincia    = fk_id_provincia       || "0";
    this.nome_provincia     = nome_provincia        || "Seleziona Provincia...";
    this.html_provincia     = html_provincia        || "<option value=\"0\">Seleziona Provincia...</option>";
    this.fk_id_citta        = fk_id_citta           || "0";
    this.nome_citta         = nome_citta            || "Seleziona Citt&agrave;...";
    this.html_citta         = html_citta            || "<option value=\"0\">Seleziona Citt&agrave;...</option>";
    this.indirizzo_utente   = indirizzo_utente      || "";
    this.cap_utente         = cap_utente            || "";
    this.orari_utente       = orari_utente          || "";
    this.latitudine_utente  = latitudine_utente     || 0;
    this.longitudine_utente = longitudine_utente    || 0;


/* Metodi =============================================================================================== */
    // Gestione dei DATI e dei CAMPI DI INPUT
    this.setInputValues = function () {
    	
		$("#TitoloPuntoVenditaHeading").val(this.titolo);
        
		// Set "Provincia"
        if ( $("#fk_id_provincia [value='0']").length == 0 ){ 
			$("#fk_id_provincia").prepend("<option value=\"0\">Seleziona Provincia...</option>"); 
		}
        $("#fk_id_provincia").select2("val", this.fk_id_provincia) || $("#fk_id_provincia").val(this.fk_id_provincia);
        
		// Set "CittÃ "
        $("#fk_id_citta").html(this.html_citta);
        if ($("#fk_id_provincia [value='0']").length == 0){ 
			$("#fk_id_citta").prepend("<option value=\"0\">Seleziona Citt&agrave;...</option>");
		}        
        $("#fk_id_citta").select2("val", this.fk_id_citta) || $("#fk_id_citta").val(this.fk_id_citta);
        
		// Set dei campi testuali
        $("#indirizzo_utente").val(this.indirizzo_utente);
        $("#cap_utente").val(this.cap_utente);
        $("#orari_utente").val(this.orari_utente);
        $("#latitudine_utente").val(this.latitudine_utente);
        $("#longitudine_utente").val(this.longitudine_utente);
        
        return true;
    }
    
    
    this.getInputValues = function(){
        // Get "Provincia" field values
        this.fk_id_provincia    = $("#fk_id_provincia option:selected").val();
        this.nome_provincia     = $("#fk_id_provincia option:selected").text();
        this.html_provincia     = $("#fk_id_provincia").html();
        // Get "Citta" field values
        this.fk_id_citta        = $("#fk_id_citta option:selected").val();
        this.nome_citta         = $("#fk_id_citta option:selected").text();
        this.html_citta         = $("#fk_id_citta").html();
        // Get Dei Valori dei campi testuali
        this.indirizzo_utente   = $("#indirizzo_utente").val();
        this.cap_utente         = $("#cap_utente").val();
        this.orari_utente       = $("#orari_utente").val();
        this.latitudine_utente  = $("#latitudine_utente").val();
        this.longitudine_utente = $("#longitudine_utente").val();
        
        return true;
    }
    
    
    this.resetInputValues = function(){
        // Reset "Provincia" input
        if( $("#fk_id_provincia [value='0']").length == 0 ){ $("#fk_id_provincia").prepend("<option value=\"0\">Seleziona Provincia...</option>"); }
        $("#fk_id_provincia").select2("val","0");
        if( $("#fk_id_citta [value='0']").length == 0 ){ $("#fk_id_citta").prepend("<option value=\"0\">Seleziona Citt&agrave;...</option>"); }        
        $("#fk_id_citta").select2("val","0");
        $("#indirizzo_utente").val("");
        $("#cap_utente").val("");
        $("#orari_utente").val("");
        $("#latitudine_utente").val(0);
        $("#longitudine_utente").val(0);
        
        return true;
    }
    
    
    this.resetObjData = function(){
    	this.list_index 		= 0;
        this.fk_id_provincia    = "0";
        this.nome_provincia     = "Seleziona Provincia...";
        this.html_provincia     = "<option value=\"0\">Seleziona Provincia...</option>";
        this.fk_id_citta        = "0";
        this.nome_citta         = "Seleziona Citt&agrave;...";
        this.html_citta         = "<option value=\"0\">Seleziona Citt&agrave;...</option>";
        this.indirizzo_utente   = "";
        this.cap_utente         = "";
        this.orari_utente       = "";
        this.latitudine_utente  = 0;
        this.longitudine_utente = 0;
        
        return true;
    }
    
    
    this.addMe = function(){
        $(".punto_vendita").removeClass('active');

        if(this.list_index==0){
        	this.titolo = "Punto Vendita Principale";
        }else{
        	this.titolo = this.list_index+"&deg; Punto Vendita Aggiuntivo";
        }
        
        var punto_vendita_html = 
        '<div class="panel panel-default punto_vendita active" id="punto_vendita_'+this.list_index+'">' +
            '<div style="height:26px;"><a class="remove_me pull-right" data-list_index="'+this.list_index+'"><i class="glyphicon glyphicon-remove"></i></a></div>' +
            '<div class="panel-body">' +
                '<h3 class="push-up-0 titolo_punto_vendita">'+ this.titolo +'</h3>' +
                '<label><i class="fa fa-map-marker"></i> Indirizzo</label><br/>' +
                '<div class="stampa_indirizzo_attivita">' +
                	this.indirizzo_utente + 
                '<p>' + this.cap_utente + ' ' + this.nome_citta + ' ' + this.nome_provincia + '</p>' +    
                '</div>' +
                '<button class="select_me btn btn-default" data-list_index="'+this.list_index+'">' +
                    '<i class="fa fa-edit"></i>Modifica' +
                '</button>'+
                '<button class="save_me btn btn-default hidden" data-list_index="'+this.list_index+'">' +
                    '<i class="fa fa-save"></i>Conferma Modifiche' +
                '</button>'+
            '</div>' +
        '</div>';
        
        $('#PuntiVendita').append(punto_vendita_html);
        
        return true;
    }
    
    
    this.removeMe = function( list_length ){
    	
        $("#punto_vendita_"+this.list_index).remove();
        $(".punto_vendita").removeClass('active');
        
        if(this.list_index == 1){
        	$("#TitoloPuntoVenditaHeading").html('Punto Vendita Principale');
       	}else{
        	$("#TitoloPuntoVenditaHeading").html(this.list_index+'&deg; Punto Vendita Aggiuntivo');
		}
		
		return true;
    }
    
    
    this.selectMe = function(){
        
        if( this.setInputValues() )
        {
        	if(this.list_index == 0){
	        	$("#TitoloPuntoVenditaHeading").html('Punto Vendita Principale');
	       	}else{
	        	$("#TitoloPuntoVenditaHeading").html(this.list_index+'&deg; Punto Vendita Aggiuntivo');
	       	}
	       	
	        $(".punto_vendita").removeClass('active');
	        $("#punto_vendita_"+this.list_index).addClass('active');
	
			if( this.writeMeFromData() ){
				return true;	
			}else{
				alert("errore writeMeFromData")
			}
				
        }else{
        	alert("errore selectMe");
        }
    }
    
    
    this.saveMe = function(){
    	if(this.getInputValues())
    	{
			if(this.writeMeFromData())
			{
    			return true;	
    		}else{
    			alert("errore: writeMeFromData");	
    		}
		
    	}else{
    		alert("error: getInputValues");
    	}
    }
    
    
    this.writeMeFromData = function(){
    	$("#punto_vendita_"+this.list_index+" .stampa_indirizzo_attivita").html
    	(
    		this.indirizzo_utente + 
    		'<p>' + 
    			this.cap_utente + ' ' + 
    			this.nome_citta + ' ' + 
    			this.nome_provincia + 
    		'</p>'
       	);
        return true;
    }
    
    
    this.writeMeFromInputs = function(){
    	$("#punto_vendita_"+this.list_index+" .stampa_indirizzo_attivita").html
    	(
    		$("#indirizzo_utente").val() + 
    		'<p>' + 
    			$("#cap_utente").val() + ' ' + 
    			$("#fk_id_citta option:selected").text() + ' ' + 
    			$("#fk_id_provincia option:selected").text() + 
    		'</p>'
    	);
    	return true;
    }
    
};


$(document).ready(function(){
	
/* ============================================================ 
 * Inizializza dell'oggetto 0, il "Punto Vendita Principale" 
 * ========================================================= */
console.log("Versione nuova");
//if (punti_vendita_json != "")
if (punti_vendita_json[0].fk_id_citta !=undefined) 
{
	console.log(punti_vendita_json);
        console.log(punti_vendita_data.length);
        console.log("sono dentro al core dei punti vendita");
        // Ricarico i dati salvati
	for( var i=0; i<punti_vendita_json.length; i++)
	{
		punti_vendita_data[i] = new PuntoVendita(
			punti_vendita_json[i].list_index, 
			punti_vendita_json[i].titolo, 
			punti_vendita_json[i].fk_id_provincia, 
			punti_vendita_json[i].nome_provincia, 
			punti_vendita_json[i].html_provincia, 
			punti_vendita_json[i].fk_id_citta, 
			punti_vendita_json[i].nome_citta, 
			punti_vendita_json[i].html_citta, 
			punti_vendita_json[i].indirizzo_utente, 
			punti_vendita_json[i].cap_utente, 
			punti_vendita_json[i].orari_utente, 
			punti_vendita_json[i].latitudine_utente, 
			punti_vendita_json[i].longitudine_utente
		);
		
		punti_vendita_data[i].setInputValues();
		punti_vendita_data[i].addMe();
		$('.select2').select2();
	}
	
	// Preseleziono il punto vendita principale
	punti_vendita_data[0].selectMe();
}else{
	// Load The Default Object Data
	punti_vendita_data[0] = new PuntoVendita(0);
	punti_vendita_data[0].titolo = "Punto Vendita Principale";
	punti_vendita_data[0].getInputValues();
	punti_vendita_data[0].addMe();
	punti_vendita_data[0].selectMe();
	$('.select2').select2();
}


/* ================================================================
 * Eventi Vari
 * ============================================================== */
$("#fk_id_provincia, #fk_id_citta").change(function(){
	punti_vendita_data[ punto_vendita_corrente ].writeMeFromInputs();
});  

$("#indirizzo_utente, #cap_utente, #orari_utente, #latitudine_utente, #longitudine_utente").keyup(function(){
	punti_vendita_data[ punto_vendita_corrente ].writeMeFromInputs();
});

 
/* **********************************************
 * Aggiungi PV =============================== 
 */
    $('.aggiungiPuntoVendita').click(function(){
		if(conferma_modifiche==true)
		{
			if( punti_vendita_data[ punto_vendita_corrente ].getInputValues() )
			{
				punto_vendita_corrente++;
				punti_vendita_data[ punto_vendita_corrente ] = new PuntoVendita(punto_vendita_corrente);
				punti_vendita_data[ punto_vendita_corrente ].titolo = punto_vendita_corrente + "&deg; Punto Vendita Aggiuntivo";
				punti_vendita_data[ punto_vendita_corrente ].resetInputValues();
				punti_vendita_data[ punto_vendita_corrente ].addMe();
				punti_vendita_data[ punto_vendita_corrente ].selectMe();
				$("#TitoloPuntoVendita").html(punto_vendita_corrente+'&deg; Punto Vendita Aggiuntivo');
				
				conferma_modifiche = false;
			}
		}else{
			swal({
				title: 'Avviso Importante!',
				text: '<strong>Conferma le modifiche</strong> effettuate prima di continuare',
				type:'warning',
				html:true
			});
		}
    	
    });
    

    
/* ************************************************************
 * Seleziona PV ============================================ */

    $("#PuntiVendita").on("click", "button.select_me", function(){
    	
    	if( punti_vendita_data[ punto_vendita_corrente ].getInputValues() )
    	{
    		punto_vendita_corrente = $(this).attr("data-list_index");
        	punti_vendita_data[ punto_vendita_corrente ].selectMe();
        	conferma_modifiche = false;
			$('.select2').select2();
    	}
    });

	
/* ************************************************************ 
 * Salva PV ================================================ */
    
    $("#PuntiVendita").on("click", "button.save_me", function()
    {
		if(
			$("#fk_id_provincia").val()		== 0  || $("#fk_id_provincia").val()==null ||
			$("#fk_id_citta").val()			== 0  || $("#fk_id_citta").val()==null 	   || 
			$("#indirizzo_utente").val()	== "" ||
			$("#cap_utente").val()			== "" //||
			//$("#orari_utente").val()		== ""
		){
			swal({
				title:'Attenzione!',
				text:'Compila tutti i campi prima di proseguire',
				type:'warning',
				html:true
			});
			
		}else{
			
			$("#preloader").show();
 
		    	if( punti_vendita_data[ punto_vendita_corrente ].getInputValues() ){
		    		
		    		var data_to_save = [];
		    		
		    		for(var i=0; i<punti_vendita_data.length; i++)
		    		{
						// TODO: da ottimizzazzare automatizzando il salvataggio delle sole proprietÃ  escludendo i metodi
					/* var objProps = Object.getOwnPropertyNames( punti_vendita_json[i] )
					for(var x=0; x<objProps.length; x++){
						console.log( punti_vendita_json[i].objProps[x] );
					} */
	    			data_to_save[i] = new Object();
	    			data_to_save[i].list_index 			= punti_vendita_data[i].list_index;
					data_to_save[i].titolo 				= punti_vendita_data[i].titolo;
					data_to_save[i].fk_id_provincia 	= punti_vendita_data[i].fk_id_provincia; 
					data_to_save[i].nome_provincia 		= punti_vendita_data[i].nome_provincia;
					data_to_save[i].html_provincia 		= punti_vendita_data[i].html_provincia; 
					data_to_save[i].fk_id_citta 		= punti_vendita_data[i].fk_id_citta;
					data_to_save[i].nome_citta 			= punti_vendita_data[i].nome_citta;
					data_to_save[i].html_citta 			= punti_vendita_data[i].html_citta; 
					data_to_save[i].indirizzo_utente 	= punti_vendita_data[i].indirizzo_utente; 
					data_to_save[i].cap_utente 			= punti_vendita_data[i].cap_utente;
					data_to_save[i].orari_utente 		= punti_vendita_data[i].orari_utente; 
					data_to_save[i].latitudine_utente 	= punti_vendita_data[i].latitudine_utente; 
					data_to_save[i].longitudine_utente 	= punti_vendita_data[i].longitudine_utente; 
	    		}
	    		
	    		if( $("#punti_vendita_json").val(JSON.stringify(data_to_save)) )
	    		{
					swal({
						title: 'Modifiche Confermate',
						text: 'Clicca su "OK" per proseguire.',
						type: 'success',
						html: true
					}, function(){
						//punto_vendita_corrente=0;
						//punti_vendita_data[0].selectMe();
						$(".punto_vendita").removeClass('active');
					});
					
					conferma_modifiche = true;
					
					$("#preloader").hide();	
	    		}else{
	    			alert("errore JSON.stringify");	
	    		}
				
	    	}else{
	    		alert("errore getInputValues");
	    	}
		}
		
    });

    
    
/* ******************************************************
 * Rimuovi PV ======================================== */
    
    $("#PuntiVendita").on("click", "a.remove_me", function(){
    	var list_index = $(this).attr("data-list_index");
    	
    	// (1) Sovrascrivo con valore NULL la posizione corrente
        // (2) Rimuovo la posizione dall'array
        // (3) Decremento di 1 il valore dell'oggetto selezionato (settandolo a quello precedente)
        punti_vendita_data[ list_index ] = null; 
        punti_vendita_data.splice(list_index, 1); // Rimuovo il punto vendita corrente dall'array
        punto_vendita_corrente = (list_index-1);
        
    	// Rimuovo gli elementi dal DOM
        $(".punto_vendita").remove();
	    
        // (1) Riordino l'array dopo la rimozione di un oggetto secondo l'indice rele dell'array 
     	// (2) Riaggiungo gli oggetti rimasti e riordinati al DOM.
     	// (3) Imposto come tale l'oggetto attualmente selezionato. 
        for(var i=0; i<punti_vendita_data.length; i++){
        	console.log(i);
            punti_vendita_data[i].list_index = i;
            punti_vendita_data[i].addMe();
            if(i == punto_vendita_corrente){
        		punti_vendita_data[ punto_vendita_corrente ].selectMe();    	
            }
        }
        
    });
      
}); // << (document).ready() END