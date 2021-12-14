<?php 
namespace View\Class;
/**
 * 
 */
class exampleCommands 
{
	public static function create($page_number)
	{
        $dv =  "
        GraphType->x,y<br/>
        Eg 1 :<br/>
        Line->x(integer),y(integer)<br/>
        
        use '&' while using multiple set of features.<br/>
        Eg 2:<br/>
          Line->x(integer),y(integer) & x_1(integer),y_1(integer)
        ";
        $st =  "
        mean->x(integer)<br/>
        median->x(integer)<br/>
        mode->x(integer)<br/>
        std_deviation->x(integer)<br/>
        variance->x(integer)<br/>
        ";
        $lr_pr =  "
        feature_x,feature_y->value,?<br/>
        feature_x,feature_y->?,value
        ";
		$page = array("data visualization","statistics","linear regression","polynomial regression");
		$func = array($dv,$st,$lr_pr,$lr_pr);
		return $func[$page_number];
	} 
}
