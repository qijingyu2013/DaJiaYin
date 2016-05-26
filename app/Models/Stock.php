<?php

namespace DaJiaYin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Stock extends Model
{
    public static $rules_create = array(
        'content' => 'required',
        'module' => 'required',
    );
    public static $rules_update = array(
        'form_text' => 'required',
        'form_module' => 'required',
    );
    public static $rules_aboutme = array(
        'module' => 'aboutme'
    );
    public static $rules_superiority = array(
        'module' => 'superiority'
    );
    public static $rules_contact = array(
        'module' => 'contact'
    );
    protected $table = 'stock';
    protected $fillable = ['content', 'module'];
    protected $dates = ['created_at', 'updated_at'];

    public static function saveData()
    {
        $result = Stock::curl_easy_post('http://www.jme.com/hq/GetHq');
        $resultArr = json_decode($result, TRUE);
        if (count($resultArr) > 0) {
            DB::table('stock')->insert($resultArr);
        }
    }

    public static function curl_easy_post($url)
    {
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        ob_start();
        curl_exec($ch);
        $result = ob_get_contents();
        ob_end_clean();
        //close connection
        curl_close($ch);
        return $result;
    }

    public static function convertData($data)
    {
        $newData = array();
        foreach ($data as $row) {
            $newData[] = array(strtotime($row->UpdateTime), intval($row->LastTrade));
        }
        return $newData;
    }
}
