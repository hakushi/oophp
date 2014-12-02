<?php

function flag_dag($year, $m, $d)
{
    // Flaggdagar
    $nyarsdagen       = $year.'-01-01';
    $kungensnd        = $year.'-01-28';
    $victoriasnd      = $year.'-03-12';
    $kungensfd        = $year.'-04-30';
    $valborg          = $year.'-05-01';
    $nationaldag      = $year.'-06-06';
    $ms               = getdate(mktime(0, 0, 0, 6, 20, $year));
    $msd              = 20 + (6-$ms['wday']);
    $midsommardagen   = $year.'-06-'.$msd;
    $victoriasfd      = $year.'-07-14';
    $drottningnd      = $year.'-08-08';
    $fndag            = $year.'-10-24';
    $gustavadolfsdag  = $year.'-11-06';
    $nobeldagen       = $year.'-12-10';
    $drottningfd      = $year.'-12-23';
    $juldag           = $year.'-12-25';

    $flaggdagar  = array (
              "datum" => array(
                "1" => "$nyarsdagen",
                     "$kungensnd",
                     "$victoriasnd",
                     "$kungensfd",
                     "$valborg",
                     "$nationaldag",
                     "$midsommardagen",
                     "$victoriasfd",
                     "$drottningnd",
                     "$fndag",
                     "$gustavadolfsdag",
                     "$nobeldagen",
                     "$drottningfd",
                     "$juldag"),
            "beskriv" => array(
                "1" => "Nyårsdagen",
                     "Hans Majestäts namnsdag",
                     "Kronprinsessan namnsdag",
                     "Hans Majestäts födelsedag",
                     "Valborgsmässoafton",
                     "Sveriges Nationaldag",
                     "Midsommardagen",
                     "Kronprinsessans födelsedag",
                     "Drottningens namnsdag",
                     "FN dagen",
                     "Gustav Adolfsdagen",
                     "Nobeldagen",
                     "Drottningens födelsedag",
                     "Juldagen")
           );
    if (in_array($year.'-'.$m.'-'.$d, $flaggdagar['datum'])) {
        $key = array_search($year.'-'.$m.'-'.$d, $flaggdagar['datum']);
        $flagday = $flaggdagar['beskriv'][$key];
    } else {
        $flagday = '';
    }
    return $flagday;
}//Slut på funktionen flag_dag
 
function helgdag($year, $m, $d)
{
    //Dessa är variabla helgdagar.. De andra är fasta..
    $pask_dagen             = date("Y-m-d", easter_date($year));
    $lang_fredag            = date("Y-m-d", strtotime("last friday $pask_dagen"));
    $annandag_pask          = date("Y-m-d", strtotime("+1 day $pask_dagen"));
    $kristi_flygare         = date("Y-m-d", strtotime("+5 weeks next Thursday $pask_dagen"));
    $pingstdagen            = date("Y-m-d", strtotime("+6 weeks next Sunday $pask_dagen"));
    $ms                     = getdate(mktime(0, 0, 0, 6, 20, $year));
    $msd                    = 20 + (6-$ms['wday']);
    $midsommardagen         = $year.'-06-'.$msd;
    $ah                     = getdate(mktime(0, 0, 0, 10, 31, $year));
    $ahd                    = 6-$ah['wday'];
    if (preg_match("#^([0-9]{1})$#", $ahd, $m2)) {
        $m2 = '0'.$ahd;
    } else {
        $m2 = $ahd;
    }
    $allahelgonsdag          = $year.'-10-'.$m2;
    //Fasta helgdagar..
    $nyarsdagen      = $year.'-01-01';
    $trettondedagjul = $year.'-01-06';
    $nationaldagen   = $year.'-06-06';
    $juldagen        = $year.'-12-25';
    $annandagjul     = $year.'-12-26';
    $helgdagar   = array (
             "datum"    => array(
                  "1" => "$pask_dagen",
                       "$lang_fredag",
                       "$annandag_pask",
                       "$kristi_flygare",
                       "$pingstdagen",
                       "$midsommardagen",
                       "$allahelgonsdag",
                       "$nyarsdagen",
                       "$trettondedagjul",
                       "$nationaldagen",
                       "$juldagen",
                       "$annandagjul"),
             "beskriv"  => array(
                  "1" => "Påskdagen",
                       "Långfredagen",
                       "Annandag påsk",
                       "Kristi himmelfärds dag",
                       "Pingstdagen",
                       "Midsommardagen",
                       "Alla helgons dag",
                       "Nyårsdagen",
                       "Trettondags afton",
                       "Sveriges Nationaldag",
                       "Juldagen",
                       "Annandag jul")
             );
    if (in_array($year.'-'.$m.'-'.$d, $helgdagar['datum'])) {
        $key = array_search($year.'-'.$m.'-'.$d, $helgdagar['datum']);
        $redday = $helgdagar['beskriv'][$key];
    } else {
        $redday = '';
    }
    return $redday;
}