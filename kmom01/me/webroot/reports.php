<?php 
//Include the main config file
include(__DIR__.'/config.php'); 

$tard['title'] = "Rapporter";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$tard['main'] = <<< EOD
<article>
	<h2>
	Kmom01
	</h2>
	<p>
		I min utvecklingsmiljö har jag valt att använda de verktyg jag använder till vardags - det vill säga 
		<a href="http://www.apachefriends.org" target="_blank">XAMPP</a> och <a href="http://www.sublimetext.com" target="_blank">
		Sublime Text</a>.
		Eftersom jag är nyfrälst Git-användare kunde jag inte hålla mig från att gå händelserna i förväg och lade upp min webbmall på
		<a href="https://github.com/hakushi/tard" target="_blank">GitHub</a> 
		så fort den blev klar. För Git-kommandon använder jag <a href="http://sourceforge.net/projects/conemu/" target="_blank">
		ConEmu</a>, kopplat till <a href="http://msysgit.github.io/" target="_blank">Git Bash</a>. För att FTP:a mot studentservern använder
		jag <a href="http://winscp.net/eng/index.php" target="_blank">WinSCP</a>.
	</p>
	<div class="img_wrapper right img_small">
		<img src="img/tard2.jpg">
		<div class="cap">
			Tard!
		</div>
	</div>		
	<p>
		Jag valde att kalla min webbmall för Tard, efter namnet på min husgud, 
		<a href="http://knowyourmeme.com/memes/grumpy-cat" target="_blank">Grumpy Cat</a>.
	</p>
	<p>
		Eftersom jag jobbar mycket med utveckling i PHP så var guiden “20 steg för att komma igång PHP” 
		i stort sett enbart repetition för min del.
	</p>
	<p>
		I det stora hela tycker jag att Anax-strukturen fungerar bra, med vissa undantag. 
		Bland annat är jag inte helt förtjust i användandet av \$anax['main'] för att lagra allt sidinnehåll. 
		Jag ser fram emot att fortsätta utveckla mallen och justera den efter mina behov och preferenser.
	</p>
	<p>
		Utöver funktionen dump() har jag även lagt till getCurrentURL() som kanske kan komma att bli användbar.
		Det gick bra att inkludera source.php, jag var bara tvungen att göra lite småjusteringar i CSS:en för att det inte skulle
		se helt galet ut. CSource är inkluderad som en modul i webbmallen.
	</p>
	<p>
		Jag gjorde en egen variant med menyn, baserad på den i övningen, och använde data ur \$_SERVER['SCRIPT'] för att hålla reda på vilken sida som är aktuell.
	</p>
	<p>
		I det stora hela är jag nöjd med det första kursmomentet, jag tycker det har gått bra och jag ser fram emot att fortsätta utveckla webbmallen.
	</p>

	</article>
EOD;

include(TARD_THEME_PATH);