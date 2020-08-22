(function($) {


	var counter = 3, // in seconds
		SoliTarget = '.block-soliloquy-target', // target location for soliloquy
		SetupSoliloquyCodes = setup_soliloquy.soli_sc;
//		SetupSoliloquyStyles = setup_soliloquy.soli_styles; 


	$(document).ready(function() {

		setInterval(function() {

		    counter--;

		    // Display 'counter' wherever you want to display it.
		    if( counter === 0 ) {
		    	//LoadSoliloquy();
		    	//alert( 'abion' );
		    }

		}, 1000);

	});


	// LOAD SOLILOQUY SLIDER FUNCTION
	function LoadSoliloquy() {

//		$( SoliTarget ).append( '<style>' + SetupSoliloquyStyles + '</style>' );
		$( SoliTarget ).append( SetupSoliloquyCodes );
		/*var iFrame = $('<iframe id="thepage" style="border:none; width:100%; height:100%; margins:0px;"></iframe>');
    	$( SoliTarget ).html( iFrame );

    	var iFrameDoc = iFrame[0].contentDocument || iFrame[0].contentWindow.document;
		iFrameDoc.write( SetupSoliloquyCodes );
		iFrameDoc.close();*/

	}


})( jQuery );