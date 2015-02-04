<?php
/*--------------------------------------------------------------------------------------------
|    @desc:         pagination 
|    @author:       Aravind Buddha
|    @url:          http://www.techumber.com
|    @date:         12 August 2012
|    @email         aravind@techumber.com
|    @license:      Free!, to Share,copy, distribute and transmit , 
|                   but i'll be glad if i my name listed in the credits'
---------------------------------------------------------------------------------------------*/
function paginate($reload, $page, $tpages) {
    $adjacents = 2;
    $prevlabel = "";
    $nextlabel = "";
    $out = "";
    // previous
    // if ($page < 1) {
        // $out.= "<span class='prev>" . $prevlabel . "</span>\n";  
    // }
    if ($page == 1) {
        // $out.= "<span class='prev>" . $prevlabel . "</span>\n";  
		 $out.= "<a class='prev'  href=\"" . $reload . "\">" . $prevlabel . "</a>";
    } elseif ($page == 2) {
        $out.= "<a class='prev'  href=\"" . $reload . "\">" . $prevlabel . "</a>";
    } else {
        $out.= "<a  class='prev' href=\"" . $reload . "&amp;page=" . ($page - 1) . "\">" . $prevlabel . "</a>";
    }
  
    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= "<a href='' class=\"active\">" . $i . "</a>";
        } elseif ($i == 1) {
            $out.= "<a  href=\"" . $reload .$page. "\">" . $i . "</a>";
        } else {
            $out.= "<a  href=\"" . $reload .$page. "&amp;page=" . $i . "\">" . $i . "</a>";
        }
    }
    
    if ($page < ($tpages - $adjacents)) {
        $out.= "<a style='font-size:11px' href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $tpages . "</a>";
    }
    // next
    if ($page < $tpages) {
        $out.= "<a  class='next' href=\"" . $reload . "&amp;page=" . ($page + 2) . "\">" . $nextlabel . "</a>";
    } else {
        $out.= "<span  class='next' style='font-size:11px'>" . $nextlabel . "</span>\n";
    }
    $out.= "";
    return $out;
}
