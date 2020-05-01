<?php
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump($var = '', $label = 'Dump', $return = false)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
        $output = '<pre style="background-color: rgba(45, 45, 45, 0.9); border: 1px solid #FF4B4B !important; color: #FF4B4B; font-size: 14px;">' . $label . ' => ' . $output . '</pre>';
        // Output
        if ($return) {
            return $output;
        }
        echo $output;
    }
}

if (!function_exists('dump_exit')) {
    function dd($var = '', $label = 'Dump', $return = false)
    {
        dump($var, $label, $return);
        exit;
    }
}
