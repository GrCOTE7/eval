<?php

function aff($var, $txt = null)
{
	echo '<a title=' . debug_backtrace()[0]['file'] . '&nbsp;-&nbsp;Line&nbsp;' . debug_backtrace()[0]['line'] . '><pre>' . (($txt) ? $txt . ' : ' : '');
	var_dump($var);
	echo '</pre></a>';
}
// aff(debug_backtrace());