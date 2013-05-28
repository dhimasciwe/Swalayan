<?php

function validateUrl($str3)
{
if (!preg_match('#^http\\:\\/\\/[a-z0-9\-]+\.([a-z0-9\-]+\.)?[a-z]+#i', $str3)) 
{
	return false;
}
else
{

	$fp = @fopen($str3,"r"); 
    if ($fp) { 
        fclose($fp); 
        return true; 
    } else { 
        return false; 
    } 
}
}

function validateEmail($str2) 
{
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!ereg("[^@]{1,64}@[^@]{1,255}", $str2)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $str2);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      return false;
    }
  }  
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1]))  // Check if domain is IP. If not, it should be valid domain name
{    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}

function validateHtml($str)
{
	// Don't do anything if there's no difference or if the original string is empty
	$oldstr = "";
	while($str != $oldstr) // Loop until it got no more effect
	{
		$oldstr = $str;
		//nuke script and header tags and anything inbetween
		$str = preg_replace("'<script[^>]*?>.*?</script>'si", "&nbsp;&nbsp;comments modified&nbsp;&nbsp;\n", $str);
		$str = preg_replace("'<head[^>]*?>.*?</head>'si", "&nbsp;&nbsp;comments modified&nbsp;&nbsp;\n", $str);

		//listed of tags that will not be striped but whose attributes will be
		$allowed = "b|i|p|u|a|center|hr";
		//start nuking those suckers. don you just love MS Word's HTML?
		$str = preg_replace("/<((?!\/?($allowed)\b)[^>]*>)/xis", "&nbsp;*X*&nbsp;\n", $str);
		$str = preg_replace("/<($allowed).*?>/i", "<\\1>", $str);
	}
return $str;
}
?>