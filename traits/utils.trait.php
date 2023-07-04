<?php

trait Utils
{

    public function sanitizeInputs($data)
    {
        // remove white spaces
        $output = trim($data);
        // convert special characters to HTML entities
        $output = htmlspecialchars($data);
        // convert tags into strings
        $output = strip_tags($data);

        return $output;
    }
}
