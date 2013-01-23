<?php
class Y
{

	public static function declOfNum($number, $titles)
		{
    		$cases = array (2, 0, 1, 1, 1, 2);
    		$number=abs($number);
    		return trim($number."&nbsp;".$titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ], '&nbsp;');
		}

	public function declOfNumArr($number, $titles)
		{
    		$cases = array (2, 0, 1, 1, 1, 2);
    		$number=abs($number);
    		return Array($number,$titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ]);
		}
		
	public static function dateFromTime($time)
		{
    		return Yii::app()->dateFormatter->formatDateTime($time, 'long', false);
		}
	public static function dateFromTimeShort($time)
		{
    		return Yii::app()->dateFormatter->formatDateTime($time,'short','short');
		}		
	
}
?>