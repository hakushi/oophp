<?php 
//Include the main config file
include(__DIR__.'/config.php'); 

$tard['title'] = "Rapporter";

//Uncomment to include navigation header
include(__DIR__.'/navigation.php');

$tard['main'] = <<< EOD
<article>
    <p>
        <a href="#kmom01">Kmom01</a>
        |
        <a href="#kmom02">Kmom02</a>
        |
        <a href="#kmom03">Kmom03</a>
    </p>
    <a id='kmom01'> </a>
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

    <a id='kmom02'> <a/>
    <h2>
        Kmom02
    </h2>
    <p>
        Innan jag påbörjade kursmomentet var jag bekant med de grundläggande begreppen inom objektorienterad programmering.
        Traits och Interfaces var nyheter för mig, jag har endast hört begreppen nämnas. 
        Jag varvade mellan att göra uppgifterna och att skumläsa i oophp20-guiden, beroende på hur säker jag kände mig på 
        de olika ämnena.
    </p>
    <h3>
        Tärningsspelet 100
    </h3>
    <p>
        Jag valde att dela in spelet i 3 huvudklasser:<br>
        <strong>CDice</strong> innehåller variabler och metoder för en tärning och dess kast.<br>
        <strong>CDiceGame</strong> lagrar gränssnittet för spelaren, i form av vilka meddelanden som ska skrivas ut
        och vilka kontroller som ska göras tillgängliga. Allt lagras i sessionen.<br>
        <strong>CDiceMatch</strong> sköter logiken i en match och de olika spellägena.
    </p>
    <p>
        Jag utgick från att göra en metod åt ett enkelt tärningskast, utvecklade det till ett enspelarläge som gick
        ut på att nå 100 poäng. Efteråt lade jag till 2-spelarläget med funktion för att spara och växla spelare.
        Därifrån var inte steget långt till att göra ett läge för att spela mot datorn, jag gjorde enbart en ny metod
        för tärningskast som slumpar fram datorns beslut när hen ska kasta tärningen.
    </p>
    <p>
        Praktiskt taget all logik ligger i klasserna. Den enda logiken som jag använder i sidkontrollern är för att
        hantera \$_POST-data. Den logiken valde jag att lägga i ett separat script, för att hålla sidkontrolern ren.
    </p>
    <h3>
        Kalendern
    </h3>
    <p>
        Jag började med att göra en klass för en dag, <strong>CCalendarDay</strong>, som huvudsakligen innehåller
        en metod för att hämta data om en given dag. Efter jag gjort klart den klassen gjorde jag detsamma för
        en månad i klassen <strong>CCalendarMonth</strong>. Huvudklassen, <strong>CCalendar</strong> innehåller en
        metod för att skriva ut månaden, med hjälp av de båda andra klasserna. 
    </p>
    <p>
        När detta var klart var det bara att fylla på med uppgifter som vecka, röda dagar, helg- och flaggdagar, 
        samt månfaser. Här tog jag hjälp av några tappra själar på webben, som delat med sig av klasser för att
        hämta flaggdagar, månfaser och namnsdagar för ett givet datum.
    </p>
    <p>
        Som avslut lade jag till en ny metod i <strong>CCalendar</strong> för att skriva ut en minifierad kalender.
        Den är nu implementerad i mitt ramverk och ligger fixerad i vänsterspalten. Mini-kalendern är responsiv,
        så om skärmbredden blir för liten döljs den.
    </p>
    <a id='kmom03'> </a>
    <h2>
        Kmom03
    </h2>
    <p>
        Jag är väl bekant med MySQL och jag använder PHPmyAdmin regelbundet. Därför kändes detta kursmoment inte som
        någon vidare utmaning för min del. MySQL Workbench har jag aldrig använt tidigare, men det tycker jag fungerade bra.
        Medans jag gjorde övningarna växlade jag mellan att använda konsol-kommandon och MySQL Workbench,
        beroende på hur långa queries det rörde sig om.
    </p>
    <p>
        Utvecklingsmiljön verkar funka bra. Jag valde att köra lokalt, istället för att koppla upp mig mot studentservern.
        Dock så såg jag till att allting fungerade ordentligt på servern. Från början kunde jag inte generera MySQL-lösenordet,
        men jag upptäckte i forumet att jag inte var ensam om det problemet, så jag kontaktade helpdesk som rättade till felet.
    </p>
    <p> 
        Nivån på SQL-övningarna kändes ganska lagom. Det var dock inga nyheter för mig eftersom jag är van vid att jobba
        med MySQL-databaser. Även om jag förstår poängen med att lägga till tabellnamnen som suffix på alla kolumner så 
        väljer jag att inte använda den metoden. För min del känner jag att det mest blir omständigt med långa namn på kolumnerna.
        Jag kommer förmodligen att använda mig av PHPmyAdmin eftersom jag är van vid den miljön. Men vem vet,
        det kanske blir ett och annat konsol-kommando också.
    </p>
    </article>
EOD;

include(TARD_THEME_PATH);