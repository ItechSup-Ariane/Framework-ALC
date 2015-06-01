<?php

namespace FrameworkWidget;

 class ArrayDeclare {
    
    public static function CPCity()
    {
        $tab = array();
        $tab[01000] = "Bourg-en-Bresse";
        $tab[44000] = "Nantes";
        $tab[56000] = "Vannes";
        $tab[85000] = "La Roche-Sur-Yon";


        return $tab;
    }
}
