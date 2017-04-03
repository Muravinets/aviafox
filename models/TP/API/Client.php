<?php
namespace TP\API;

class Client
{
    
    /**
     * @var string
     */
    private $token = '9de08b81ed456dcaa65416aad35de826';
    
    /**
     * @param string $url
     * @return mixed
     */
    public function get($url)
    {
        // create curl resource
        $ch = curl_init();
        
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        $headers = [
//            'X-Access-Token: ' . $this->token,
			'Accept-Encoding: gzip, deflate',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        // $output contains the output string
        $output = curl_exec($ch);
        
        // close curl resource to free up system resources
        curl_close($ch);

	    $json = json_decode($output, true);
        
        return $json['data'];
    }
    
    /**
     * Debug helper function.  This is a wrapper for var_dump() that adds
     * the <pre /> tags, cleans up newlines and indents, and runs
     * htmlentities() before output.
     *
     * @param  mixed  $var   The variable to dump.
     * @param  string $label OPTIONAL Label to prepend to output.
     * @param  bool   $echo  OPTIONAL Echo output if true.
     * @return string
     */
    public function dump($var, $label = null, $echo = true)
    {
        // format the label
        $label = ($label===null) ? '' : rtrim($label) . ' ';
    
        // var_dump the variable into a buffer and keep the output
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
    
        // neaten the newlines and indents
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre>'
            . $label
            . $output
            . '</pre>';
    
            if ($echo) {
                echo $output;
            }
            return $output;
    }
    
    
}