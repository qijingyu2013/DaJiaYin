<?php

namespace DaJiaYin\Http\Controllers\Sites;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\Notice;
use DaJiaYin\Models\Stock;

class HomeController extends Controller
{
    //index
    public function index(){
        $today = date("Y-m-d", time());
        $tomorrow = date("Y-m-d", strtotime("+1 day"));


        $rlt = Stock::where("Symbol", "=", 'JSAG3')->whereBetween('UpdateTime', array($today . " 06:00:00", $tomorrow . " 05:30:00"))->get();
        $newRlt = Stock::convertData($rlt);
        $newRlt = json_encode($newRlt);
        $marketinformations = Notice::where("module", "=", 'marketinformation')->orderBy('id', 'desc')->paginate(6);
        $actives = Notice::where("module", "=", 'active')->orderBy('id', 'desc')->paginate(6);
        $teams = Notice::where("module", "=", 'team')->orderBy('id', 'desc')->get();

        return view('sites.home.home', compact('marketinformations', 'teams', 'actives', 'newRlt'));
    }

    public function about(){
    	$name = 'text';
    	return view('sites.about')->with('name', $name);
    }

    public function getActiveDataToJson()
    {
        $result = $this->getActiveData();
        return response()->json($result);
    }

    public function getActiveData()
    {
        $result = $this->curl_easy_post('http://www.jme.com/hq/GetHq');
        $resultArr = json_decode($result);
        $arr = array();
        foreach ($resultArr as $row) {
            if ($row->Symbol == 'JSAG3' || $row->Symbol == 'JSBU3') {
                $obj = new \stdClass();
                $obj->name = $row->Symbol;
                $obj->price = intval($row->LastTrade);
                $obj->time = date('H:i');//intval($row->UpdateTime);
                $arr[] = $obj;
            }
        }
        return $arr;
    }

    public function curl_easy_post($url)
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
}
