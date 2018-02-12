<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ValidTag implements Rule
{
    protected $db_name;
    protected $field_name;

    public function __construct($db_name)
    {
        $this->db_name = $db_name;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(!empty($value)){
            $tags = explode(',', $value);
            foreach ($tags as $tag) {
                $exists = DB::table($this->db_name)->where('id', $tag)->first();
                if(!$exists){
                    return false;                         
                }
            }
            return true;

        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid tag id';
    }

}
