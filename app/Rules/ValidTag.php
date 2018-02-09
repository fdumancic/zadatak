<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ValidTag implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $db_name = 'tags';
        if(!empty($value)){
            $tags = explode(',', $value);
            foreach ($tags as $tag) {
                $exists = DB::table($db_name)->where('id', $tag)->first();
                if($exists){
                    return true;                         
                }
            }

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
        return 'Wrong tag';
    }
}
