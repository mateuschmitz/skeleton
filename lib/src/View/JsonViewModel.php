<?php

namespace M2S\View;

class JsonViewModel
{
	function __construct($data)
	{
		echo json_encode($data);
	}
}