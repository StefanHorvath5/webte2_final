<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

use App\Models\Log;

class OctaveController extends Controller {

    public function execQuery(Request $request) {
        $preparedQuery = $request->input("query");
        // $query = $preparedQuery;
        
        $query = 'octave-cli --eval "'.$preparedQuery.'"';

        $output = "";
        exec($query, $output);

        // return json_encode($output);

        $resp = [
            "success" => "true",
            "type" => "generalQuery",
            "data" => $output
        ];
        return json_encode($resp);
    }

    public function animationQuery(Request $request) {
        $preparedQuery = $request->input("query");
        $r = $preparedQuery == null ? "0.1": $preparedQuery;

        $query = 'octave-cli --eval "m1 = 2500; m2 = 320;
        k1 = 80000; k2 = 500000;
        b1 = 350; b2 = 15020;
        A=[0 1 0 0;-(b1*b2)/(m1*m2) 0 ((b1/m1)*((b1/m1)+(b1/m2)+(b2/m2)))-(k1/m1) -(b1/m1);b2/m2 0 -((b1/m1)+(b1/m2)+(b2/m2)) 1;k2/m2 0 -((k1/m1)+(k1/m2)+(k2/m2)) 0];
        B=[0 0;1/m1 (b1*b2)/(m1*m2);0 -(b2/m2);(1/m1)+(1/m2) -(k2/m2)];
        C=[0 0 1 0]; D=[0 0];
        Aa = [[A,[0 0 0 0]\'];[C, 0]];
        Ba = [B;[0 0]];
        Ca = [C,0]; Da = D;
        K = [0 2.3e6 5e8 0 8e6];
        pkg load control;
        sys = ss(Aa-Ba(:,1)*K,Ba,Ca,Da);
        t = 0:0.01:5;
        r = '.$r.';
        initX1=0; initX1d=0;
        initX2=0; initX2d=0;
        [y,t,x]=lsim(sys*[0;1],r*ones(size(t)),t,[initX1;initX1d;initX2;initX2d;0]);y"';
        
        $output = [];
        exec($query, $output);
                
        // return json_encode($output);
        

        $data = $output;
        $pattern1 = '/((?:[0-9]+,)*-?[0-9]+(?:\.[0-9]+)?)/';
        $pattern2 = '/((?:[0-9]+,)*-?[0-9]+(?:\.[0-9]+)[e][+-]?\d+)/';
        $arr = [];
        $output = [];
        $count = 0;
        $matched = false;
        $pattern = $pattern2;

        foreach ($data as $row) {
            if(preg_match($pattern2, $row) != 0) {
                $pattern = $pattern2;
            }
            elseif(preg_match($pattern1, $row) != 0) {
                $pattern = $pattern1;
            }
            else {
                $pattern = $pattern1;
            }
            while( preg_match($pattern, $row) != 0 ) {
                $matched = true;
                preg_match($pattern, $row, $out, PREG_OFFSET_CAPTURE);
                array_push($arr, (float)$out[0][0]);
                $row = preg_replace("/".$out[0][0]."/", '', $row, 1);
                $count++;
            }
            
            if($matched) {
                $help = [];
                $index = 0;
                foreach ($arr as $el) {
                    $help["x".$index] = $el;
                    $index++;
                }
                array_push($output, $help);
                $arr = [];
                $help = [];
            }
            $matched = false;
        }

        $resp = [
            "success" => "true",
            "type" => "animationQuery",
            "r" => $r,
            "data" => $output
        ];
        return json_encode($resp);
    }

    
}
