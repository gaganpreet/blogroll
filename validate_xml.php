<?php
    libxml_use_internal_errors(true);

    function display_xml_error($error, $xml)
    {
    
		$return = '';
        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $return .= "Warning $error->code: ";
                break;
             case LIBXML_ERR_ERROR:
                $return .= "Error $error->code: ";
                break;
            case LIBXML_ERR_FATAL:
                $return .= "Fatal Error $error->code: ";
                break;
        }
    
        $return .= trim($error->message) .
                   "(Line $error->line," .
                   " Column: $error->column)";
    
        return htmlentities($return) . "<br />";
    }
    
    function load_and_verify_xml($url)
    {
        $return = Array();

        $return["errors"] = "";
        $return["not_fatal"] = true;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $xml = curl_exec ($ch);
        if (!simplexml_load_string($xml))
        {
            $errors = libxml_get_errors();
			$error = $errors[0];
            if ($error->level != LIBXML_ERR_WARNING)
                $return["not_fatal"] = false;
            $return["errors"] .= display_xml_error($error, $xml);
         }

        libxml_clear_errors();
		curl_close($ch);
        return $return;
    }


?>
