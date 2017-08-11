<?php

class ProtectedProperties
{
	function addAttribute($att_name, $att_value)
	{
		$this->{$att_name} = $att_value;
	}

	function getAttribute($string_len, $filter)
	{
		foreach($this as $key => $value)
		{
			if(is_numeric($value))
			{
				if(is_float($value))
				{
					$this->$key = number_format((float)$value,2,'.','');
				}
			}

			if(is_string($value))
			{
				if($string_len)
				{
					$string_len = $string_len;
				}
				else
				{
					$string_len = 10;
				}

				$this->$key = mb_strimwidth($value, 0, $string_len, "...");
			}

			if(is_array($value))
			{
				if($filter)
				{
					$$value = array_values(array_filter($value));
				}

				$this->$key = ksort($value);
			}
		}

		return $this;
	}
}

$a = new ProtectedProperties();
$a->addAttribute('test', 'testtesttesttesttest');
$b = $a->getAttribute(15);

print_r($b);
?>