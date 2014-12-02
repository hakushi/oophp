<?php 
function dagensNamnsdag($date)
{ 
    $namnsdagar = array(
    "01-01" => array(" "),
    "02-01" => array("Svea"), 
    "03-01" => array("Alfred", "Alfrida"), 
    "04-01" => array("Rut"), 
    "05-01" => array("Hanna", "Hannele"), 
    "06-01" => array("Melker", "Baltsar", "Kasper"), 
    "07-01" => array("August", "Augusta"), 
    "08-01" => array("Erland"), 
    "09-01" => array("Gunder", "Gunnar"), 
    "10-01" => array("Sigurd", "Sigbritt"), 
    "11-01" => array("Jannike", "Jan"), 
    "12-01" => array("Frideborg", "Fridolf"), 
    "13-01" => array("Knut"), 
    "14-01" => array("Felix", "Felicia"), 
    "15-01" => array("Lorentz", "Laura"), 
    "16-01" => array("Helmer", "Hjalmar", "Valborg"), 
    "17-01" => array("Anton", "Tony"), 
    "18-01" => array("Hilda", "Hildur"), 
    "19-01" => array("Henrik"), 
    "20-01" => array("Fabian", "Sebastian"), 
    "21-01" => array("Agnes", "Agneta"), 
    "22-01" => array("Vincent", "Viktor"), 
    "23-01" => array("Frej", "Freja"), 
    "24-01" => array("Erika"), 
    "25-01" => array("Paul", "Pål"), 
    "26-01" => array("Boel", "Bodil"), 
    "27-01" => array("Göta", "Göte"), 
    "28-01" => array("Karla", "Karl"), 
    "29-01" => array("Diana"), 
    "30-01" => array("Gunhild", "Gunilla"), 
    "31-01" => array("Ivar", "Joar"), 
    "01-02" => array("Maximilian", "Max"), 
    "02-02" => array(" "), 
    "03-02" => array("Hjördis", "Disa"), 
    "04-02" => array("Ansgar", "Anselm"), 
    "05-02" => array("Agda", "Agata"), 
    "06-02" => array("Doris", "Dorotea"), 
    "07-02" => array("Rikard", "Dick"), 
    "08-02" => array("Berta", "Bert"), 
    "09-02" => array("Franciska", "Fanny"), 
    "10-02" => array("Iris"), 
    "11-02" => array("Inge", "Yngve"), 
    "12-02" => array("Evelina", "Evy"), 
    "13-02" => array("Agne", "Ove"), 
    "14-02" => array("Valentin"), 
    "15-02" => array("Sigfrid"), 
    "16-02" => array("Julia", "Julius"), 
    "17-02" => array("Sandra", "Alexandra"), 
    "18-02" => array("Frida", "Fritiof"), 
    "19-02" => array("Ella", "Gabriella"), 
    "20-02" => array("Vivianne"), 
    "21-02" => array("Hilding"), 
    "22-02" => array("Pia"), 
    "23-02" => array("Torun", "Torsten"), 
    "24-02" => array("Mats", "Mattias"), 
    "25-02" => array("Sigvard", "Sivert"), 
    "26-02" => array("Torkel", "Torgny"), 
    "27-02" => array("Lage"), 
    "28-02" => array("Maria"), 
    "29-02" => array(" "), 
    "01-03" => array("Elvira", "Albin"), 
    "02-03" => array("Erna", "Ernst"), 
    "03-03" => array("Gunvor", "Gunborg"), 
    "04-03" => array("Adriana", "Adrian"), 
    "05-03" => array("Tove", "Tora"), 
    "06-03" => array("Ebbe", "Ebba"), 
    "07-03" => array("Camilla"), 
    "08-03" => array("Siv"), 
    "09-03" => array("Torbjörn", "Torleif"), 
    "10-03" => array("Edla", "Ada"), 
    "11-03" => array("Edvin", "Egon"), 
    "12-03" => array("Viktoria"), 
    "13-03" => array("Greger"), 
    "14-03" => array("Maud", "Matilda"), 
    "15-03" => array("Kristoffer", "Christel"), 
    "16-03" => array("Gilbert", "Herbert"), 
    "17-03" => array("Gertrud"), 
    "18-03" => array("Edmund", "Edvard"), 
    "19-03" => array("Josef", "Josefina"), 
    "20-03" => array("Kim", "Joakim"), 
    "21-03" => array("Bengt"), 
    "22-03" => array("Kennet", "Kent"), 
    "23-03" => array("Gerda", "Gerd"), 
    "24-03" => array("Gabriel", "Rafael"), 
    "25-03" => array(" "), 
    "26-03" => array("Emanuel"), 
    "27-03" => array("Rudolf", "Ralf"), 
    "28-03" => array("Malkolm", "Morgan"), 
    "29-03" => array("Jens", "Jonas"), 
    "30-03" => array("Holger", "Holmfrid"), 
    "31-03" => array("Ester"), 
    "01-04" => array("Harald", "Hervor"), 
    "02-04" => array("Ingemund", "Gudmund"), 
    "03-04" => array("Nanna", "Ferdinand"), 
    "04-04" => array("Marianne", "Marlene"), 
    "05-04" => array("Irene", "Irja"), 
    "06-04" => array("Helmi", "Vilhelm"), 
    "07-04" => array("Irma", "Irmelin"), 
    "08-04" => array("Nadja", "Tanja"), 
    "09-04" => array("Otto", "Ottilia"), 
    "10-04" => array("Ingvor", "Ingvar"), 
    "11-04" => array("Ylva", "Ulf"), 
    "12-04" => array("Liv"), 
    "13-04" => array("Douglas", "Artur"), 
    "14-04" => array("Tiburtius"), 
    "15-04" => array("Oliver", "Olivia"), 
    "16-04" => array("Patricia", "Patrik"), 
    "17-04" => array("Elis", "Elias"), 
    "18-04" => array("Volmar", "Valdemar"), 
    "19-04" => array("Olaus", "Ola"), 
    "20-04" => array("Amelie", "Amalia"), 
    "21-04" => array("Anneli", "Annika"), 
    "22-04" => array("Allan"), 
    "23-04" => array("Georg", "Göran"), 
    "24-04" => array("Vega"), 
    "25-04" => array("Markus"), 
    "26-04" => array("Terese", "Teresia"), 
    "27-04" => array("Engelbrekt", "Glenn"), 
    "28-04" => array("Ture", "Tyra"), 
    "29-04" => array("Tyko"), 
    "30-04" => array("Mariana"), 
    "01-05" => array(" "),    
    "02-05" => array("Filippa", "Filip"), 
    "03-05" => array("John", "Jane"), 
    "04-05" => array("Mona", "Monika"), 
    "05-05" => array("Gotthard", "Erhard"), 
    "06-05" => array("Marit", "Rita"), 
    "07-05" => array("Carina", "Carita"), 
    "08-05" => array("Åke"), 
    "09-05" => array("Reidun", "Reidar"), 
    "10-05" => array("Styrbjörn", "Esbjörn"), 
    "11-05" => array("Märit", "Märta"), 
    "12-05" => array("Charlotta", "Lotta"), 
    "13-05" => array("Linnea", "Linn"), 
    "14-05" => array("Halvard", "Halvar"), 
    "15-05" => array("Sofia", "Sonja"), 
    "16-05" => array("Ronald", "Ronny"), 
    "17-05" => array("Ruben", "Rebecka"), 
    "18-05" => array("Erik"), 
    "19-05" => array("Majken", "Maj"), 
    "20-05" => array("Karolina", "Carola"), 
    "21-05" => array("Conny", "Konstantin"), 
    "22-05" => array("Hemming", "Henning"), 
    "23-05" => array("Desirée", "Desideria"), 
    "24-05" => array("Vanja", "Ivan"), 
    "25-05" => array("Urban"), 
    "26-05" => array("Vilma", "Vilhelmina"), 
    "27-05" => array("Blenda", "Beda"), 
    "28-05" => array("Ingeborg", "Borghild"), 
    "29-05" => array("Jeanette", "Yvonne"), 
    "30-05" => array("Vera", "Veronika"), 
    "31-05" => array("Pernilla", "Petronella"), 
    "01-06" => array("Gunnel", "Gun"), 
    "02-06" => array("Rutger", "Roger"), 
    "03-06" => array("Ingemar", "Gudmar"), 
    "04-06" => array("Solbritt", "Solveig"), 
    "05-06" => array("Bo"), 
    "06-06" => array("Gösta", "Gustav"), 
    "07-06" => array("Robin", "Robert"), 
    "08-06" => array("Eivor", "Majvor"), 
    "09-06" => array("Birger", "Börje"), 
    "10-06" => array("Svante", "Boris"), 
    "11-06" => array("Bertil", "Berthold"), 
    "12-06" => array("Eskil"), 
    "13-06" => array("Aina", "Aino"), 
    "14-06" => array("Hakon", "Håkan"), 
    "15-06" => array("Margit", "Margot"), 
    "16-06" => array("Axel", "Axelina"), 
    "17-06" => array("Torvald", "Torborg"), 
    "18-06" => array("Björn", "Bjarne"), 
    "19-06" => array("Görel", "Germund"), 
    "20-06" => array("Linda"), 
    "21-06" => array("Alf", "Alvar"), 
    "22-06" => array("Paula", "Paulina"), 
    "23-06" => array("Adolf", "Alice"), 
    "25-06" => array("Salomon", "David"), 
    "24-06" => array("Någon"),
    "26-06" => array("Rakel", "Lea"), 
    "27-06" => array("Selma", "Fingal"), 
    "28-06" => array("Leo"), 
    "29-06" => array("Petra", "Peter"), 
    "30-06" => array("Leif", "Elof"), 
    "01-07" => array("Aron", "Mirjam"), 
    "02-07" => array("Rosa", "Rosita"), 
    "03-07" => array("Aurora"), 
    "04-07" => array("Ulla", "Ulrika"), 
    "05-07" => array("Laila", "Ritva"), 
    "06-07" => array("Jessika", "Esaias"), 
    "07-07" => array("Klas"), 
    "08-07" => array("Kjell"), 
    "09-07" => array("Jörgen", "Örjan"), 
    "10-07" => array("André", "Andrea"), 
    "11-07" => array("Ellinor", "Eleonora"), 
    "12-07" => array("Herman", "Hermine"), 
    "13-07" => array("Joel", "Judit"), 
    "14-07" => array("Folke"), 
    "15-07" => array("Ragnvald", "Ragnhild"), 
    "16-07" => array("Reine", "Reinhold"), 
    "17-07" => array("Bruno"), 
    "18-07" => array("Fredrik", "Fritz"), 
    "19-07" => array("Sara"), 
    "20-07" => array("Margareta", "Greta"), 
    "21-07" => array("Johanna"), 
    "22-07" => array("Magdalena", "Madeleine"), 
    "23-07" => array("Emma"), 
    "24-07" => array("Kristina", "Kerstin"), 
    "25-07" => array("Jakob"), 
    "26-07" => array("Jesper"), 
    "27-07" => array("Marta"), 
    "28-07" => array("Botvid", "Seved"), 
    "29-07" => array("Olof"), 
    "30-07" => array("Algot"), 
    "31-07" => array("Helena", "Elin"), 
    "01-08" => array("Per"), 
    "02-08" => array("Karin", "Kajsa"), 
    "03-08" => array("Tage"), 
    "04-08" => array("Arnold", "Arne"), 
    "05-08" => array("Ulrik", "Alrik"), 
    "06-08" => array("Alfons", "Inez"), 
    "07-08" => array("Denise", "Dennis"), 
    "08-08" => array("Sylvia", "Silvia"), 
    "09-08" => array("Roland"), 
    "10-08" => array("Lars"), 
    "11-08" => array("Susanna"), 
    "12-08" => array("Klara"), 
    "13-08" => array("Kaj"), 
    "14-08" => array("Uno"), 
    "15-08" => array("Stella", "Estelle"), 
    "16-08" => array("Brynolf"), 
    "17-08" => array("Valter", "Verner"), 
    "18-08" => array("Ellen", "Lena"), 
    "19-08" => array("Magnus", "Måns"), 
    "20-08" => array("Bernt", "Bernhard"), 
    "21-08" => array("Jon", "Jonna"), 
    "22-08" => array("Henrika", "Henrietta"), 
    "23-08" => array("Signe", "Signhild"), 
    "24-08" => array("Bartolomeus"), 
    "25-08" => array("Louise", "Lovisa"), 
    "26-08" => array("Östen"), 
    "27-08" => array("Raoul", "Rolf"), 
    "28-08" => array("Gurli", "Leila"), 
    "29-08" => array("Hans", "Hampus"), 
    "30-08" => array("Albert", "Albertina"), 
    "31-08" => array("Vidar", "Arvid"), 
    "01-09" => array("Samuel"), 
    "02-09" => array("Justina", "Justus"), 
    "03-09" => array("Alva", "Alfhild"), 
    "04-09" => array("Gisela"), 
    "05-09" => array("Adela", "Heidi"), 
    "06-09" => array("Lilian", "Lilly"), 
    "07-09" => array("Roy", "Regina"), 
    "08-09" => array("Alma", "Hulda"), 
    "09-09" => array("Annette", "Anita"), 
    "10-09" => array("Turid", "Tord"), 
    "11-09" => array("Helny", "Dagny"), 
    "12-09" => array("Åsa", "Åslög"), 
    "13-09" => array("Sture"), 
    "14-09" => array("Ida"), 
    "15-09" => array("Siri", "Sigrid"), 
    "16-09" => array("Daga", "Dag"), 
    "17-09" => array("Magnhild", "Hildegard"), 
    "18-09" => array("Orvar"), 
    "19-09" => array("Fredrika"), 
    "20-09" => array("Lisa", "Elise"), 
    "21-09" => array("Matteus"), 
    "22-09" => array("Moritz", "Maurits"), 
    "23-09" => array("Tea", "Tekla"), 
    "24-09" => array("Gerhard", "Gert"), 
    "25-09" => array("Tryggve"), 
    "26-09" => array("Einar", "Enar"), 
    "27-09" => array("Dagmar", "Rigmor"), 
    "28-09" => array("Lennart", "Leonard"), 
    "29-09" => array("Mikaela", "Mikael"), 
    "30-09" => array("Helge"), 
    "01-10" => array("Ragnar", "Ragna"), 
    "02-10" => array("Love", "Ludvig"), 
    "03-10" => array("Evald", "Osvald"), 
    "04-10" => array("Frans", "Frank"), 
    "05-10" => array("Bror"), 
    "06-10" => array("Jennifer", "Jenny"), 
    "07-10" => array("Britta", "Birgitta"), 
    "08-10" => array("Nils"), 
    "09-10" => array("Inger", "Ingrid"), 
    "10-10" => array("Harriet", "Harry"), 
    "11-10" => array("Erling", "Jarl"), 
    "12-10" => array("Manfred", "Valfrid"), 
    "13-10" => array("Berit", "Birgit"), 
    "14-10" => array("Stellan"), 
    "15-10" => array("Hillevi", "Hedvig"), 
    "16-10" => array("Finn"), 
    "17-10" => array("Toini", "Antonia"), 
    "18-10" => array("Lukas"), 
    "19-10" => array("Tor", "Tore"), 
    "20-10" => array("Sibylla"), 
    "21-10" => array("Ursula", "Yrsa"), 
    "22-10" => array("Marita", "Marika"), 
    "23-10" => array("Severin", "Sören"), 
    "24-10" => array("Evert", "Eilert"), 
    "25-10" => array("Ingalill", "Inga"), 
    "26-10" => array("Rasmus", "Amanda"), 
    "27-10" => array("Sabina"), 
    "28-10" => array("Simon", "Simone"), 
    "29-10" => array("Viola"), 
    "30-10" => array("Isabella", "Elsa"), 
    "31-10" => array("Edit", "Edgar"), 
    "01-11" => array("Knut", "Kragballe"),
    "02-11" => array("Tobias"), 
    "03-11" => array("Hugo", "Hubert"), 
    "04-11" => array("Sverker"), 
    "05-11" => array("Eugen", "Eugenia"), 
    "06-11" => array("Petter", "Nicklas"),
    "07-11" => array("Ingela", "Ingegerd"), 
    "08-11" => array("Vendela"), 
    "09-11" => array("Teodora", "Teodor"), 
    "10-11" => array("Martina", "Martin"), 
    "11-11" => array("Mårten"), 
    "12-11" => array("Konrad", "Kurt"), 
    "13-11" => array("Kristian", "Krister"), 
    "14-11" => array("Emil", "Emilia"), 
    "15-11" => array("Leopold"), 
    "16-11" => array("Viveka", "Vibeke"), 
    "17-11" => array("Naima", "Naemi"), 
    "18-11" => array("Lillemor", "Moa"), 
    "19-11" => array("Lisbet", "Elisabet"), 
    "20-11" => array("Marina", "Pontus"), 
    "21-11" => array("Helga", "Olga"), 
    "22-11" => array("Sissela", "Cecilia"), 
    "23-11" => array("Klemens"), 
    "24-11" => array("Gudrun", "Rune"), 
    "25-11" => array("Katja", "Katarina"), 
    "26-11" => array("Linus"), 
    "27-11" => array("Astrid", "Asta"), 
    "28-11" => array("Malte"), 
    "29-11" => array("Sune"), 
    "30-11" => array("Anders", "Andreas"), 
    "01-12" => array("Oskar", "Ossian"), 
    "02-12" => array("Beata", "Beatrice"), 
    "03-12" => array("Lydia"), 
    "04-12" => array("Barbro", "Barbara"), 
    "05-12" => array("Sven"), 
    "06-12" => array("Nikolaus", "Niklas"), 
    "07-12" => array("Angelika", "Angela"), 
    "08-12" => array("Virginia"), 
    "09-12" => array("Anna"), 
    "10-12" => array("Malena", "Malin"), 
    "11-12" => array("Daniela", "Daniel"), 
    "12-12" => array("Alexander", "Alexis"), 
    "13-12" => array("Lucia"), 
    "14-12" => array("Sixten", "Sten"), 
    "15-12" => array("Gottfrid"), 
    "16-12" => array("Assar"), 
    "17-12" => array("Stig"), 
    "18-12" => array("Abraham"), 
    "19-12" => array("Isak"), 
    "20-12" => array("Israel", "Moses"), 
    "21-12" => array("Tomas"), 
    "22-12" => array("Jonatan", "Natanael"), 
    "23-12" => array("Adam"), 
    "24-12" => array("Eva"), 
    "25-12" => array(""),
    "26-12" => array("Stefan", "Staffan"), 
    "27-12" => array("Johan", "Johannes"), 
    "28-12" => array("Benjamin"), 
    "29-12" => array("Natalie", "Natalia"), 
    "30-12" => array("Set", "Abel"), 
    "31-12" => array("Sylvester")); 

    return $namnsdagar[$date];
}  