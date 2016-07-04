<?php

namespace App\Helpers;

class BMR
{
	public static function get($age, $weight, $height, $gender, $metric = 1)
	{
		if($metric)
    		return $gender == "male" ? 
	        	round(66.5 + 13.75*$weight + 5.003*$height - 6.755*$age) : // metric male
	        	round(655.1 + 9.563*$weight + 1.850*$height - 4.676*$age); // metric female

		return $gender == "male" ? 
		        round(66 + 6.2*$weight + 12.7*$height - 6.76*$age) : // imperial male
		        round(655.1 + 4.35*$weight + 4.7*$height - 4.7*$age); // imperial female
	}
}
