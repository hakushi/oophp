<?php namespace Me;
 
//Include the main config file
include(__DIR__.'/config.php');

$tard['title'] = "Me!";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');


$tard['main'] = <<< EOD
<article>
	<div class="img_wrapper left img_small">
		<img src="img/me.jpg" alt="David"><br>
		<div class="cap">
			Undertecknad.
		</div>
	</div>
	<h2>
		Om mig	
	</h2>
	<p> 
		Jag heter David Edström. Jag är 32 år gammal, bor i Stockholm tillsammans med mina två katter, Kia och Zim.
		Till vardags jobbar jag som webbutvecklare och designer. På min fritid sysslar jag mycket med musik, jag DJ:ar
		och arrangerar <a href="http://www.syntax-error.se" target="_blank">nattklubbar</a>.
	</p>
	<p>
		Nu kommer jag inte på något mer att skriva här. Jag kanske fyller på under kursens gång. Eller inte.
	</p>
	<p><em>/David</em></p>
</article>

EOD;

include(TARD_THEME_PATH);