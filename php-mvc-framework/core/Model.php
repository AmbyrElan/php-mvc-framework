<?php 

namespace app\core;
/** 
 * Class Model
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\core
 */
abstract class Model 
{ 
    public function loadData($data)
    {
        // iterate over received data
        foreach ($data as $key => $value) {
            //check if given key exists inside model
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
    }
}
