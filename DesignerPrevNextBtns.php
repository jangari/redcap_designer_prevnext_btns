<?php

// Set the namespace defined in your config file
namespace INTERSECT\DesignerPrevNextBtns;

use \REDCap as REDCap;

// Declare your module class, which must extend AbstractExternalModule 
class DesignerPrevNextBtns extends \ExternalModules\AbstractExternalModule {

    public function redcap_every_page_top($project_id = null) {

        if (PAGE === 'Design/online_designer.php' && $_GET["page"]){
            $curInstrument = $_GET["page"];
            $allInstruments = REDCap::getInstrumentNames();
            $allFormNames = array_keys($allInstruments);
            $allFormLabels = array_values($allInstruments);
            $curIndex = array_search($curInstrument, array_keys($allInstruments));
            $prev = 0;
            $next = 0;
            if ($curIndex > 0) {
                // There is a prev
                // Construct it
                $prev = 1;
                $prevFormName = $allFormNames[$curIndex - 1];
                $prevFormLabel = $allInstruments[$prevFormName];
                echo "<script>const prevFormName = '".$prevFormName."';";
                echo "const prevFormLabel = '".$prevFormLabel."';</script>";
            };
            if ($curIndex < count($allInstruments)-1){
                // there is a next
                // construct next link
                $next = 1;
                $nextFormName = $allFormNames[$curIndex + 1];
                $nextFormLabel = $allInstruments[$nextFormName];
                echo "<script>const nextFormName = '".$nextFormName."';";
                echo "const nextFormLabel = '".$nextFormLabel."';</script>";
            };
            if ($prev or $next){
                echo "<script>const next = ".$next."; const prev = ".$prev.";</script>";
                echo "<script src='".$this->getUrl('js/main.js')."'></script>";
                echo "<link rel='stylesheet' href='".$this->getUrl('style.css')."'/>";
            };
        };
    }

}
