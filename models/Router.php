<?php
/**
 * @author		Jesse Boyer <contact@jream.com>
 * @copyright	Copyright (C), 2011-12 Jesse Boyer
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *				Refer to the LICENSE file distributed within the package.
 *
 * @link        https://github.com/amin007/route
 * @link		http://jream.com
 *
 * @internal	Inspired by Klein @ https://github.com/chriso/klein.php
 */
class Router
{
    /**
     * @var array $_listUri List of URI's to match against
     */
    private $_listUri = array();

    /**
     * @var array $_listCall List of closures to call
     */
    private $_listCall = array();

    /**
     * @var string $_trim Class-wide items to clean
     */
    private $_trim = '/\^$';

    /**
     * add - Adds a URI and Function to the two lists
     *
     * @param string $uri A path such as about/system
     * @param object $function An anonymous function
     */
    public function add($uri, $function)
    {
        $uri = trim($uri, $this->_trim);
        $this->_listUri[] = $uri;
        $this->_listCall[] = $function;
    }

    /**
     * submit - Looks for a match for the URI and runs the related function
     */
    public function submit()
    {
        $uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '/';
        $uri = trim($uri, $this->_trim);
        $replacementValues = array();
        # List through the stored URI's
        foreach ($this->_listUri as $listKey => $listUri)
        {
            # See if there is a match
            if (preg_match("#^$listUri$#", $uri))
            {
                # Replace the values
                $realUri = explode('/', $uri);
                $fakeUri = explode('/', $listUri);
                # Gather the .+ values with the real values in the URI
                foreach ($fakeUri as $key => $value)
                {
                    if ($value == '.+')
                    {
                        $replacementValues[] = $realUri[$key];
                    }
                }

                # Pass an array for arguments
                call_user_func_array($this->_listCall[$listKey], $replacementValues);
            } # end - if (preg_match("#^$listUri$#", $uri))

        } # end - foreach ($this->_listUri as $listKey => $listUri)

    } # end - public function submit()

}