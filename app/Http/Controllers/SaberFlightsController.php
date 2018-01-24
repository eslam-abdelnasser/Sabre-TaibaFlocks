<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;
class SaberFlightsController extends Controller
{
    //
    public function index(){
        $header[]='Authorization: Bearer T1RLAQJmyt4yXfDaF6x5bG5CU/XV5irNNRBY1pab6B1JvuzYpdujBiB5AADAjZpRIYUzEiJE6HVzP8ACBJapx+UFybAAaKRl9vqKcu4FDBBLF3MNBBPLE9vGPtvxn2pzNmfqvfbDAWwtCHE21XKUlqf4w86J/ZmESrA0njmvTSucq7DPEVqbrFZZ8ADLNq35xuHgPQpAT9PVqRxyDYZImFRfcC6b6a2znrNTcXhnT8ZAvNMRcz5n1ftDbXoF+LVcmhiAPMCXH59eK7H1yVr/B2tG61otU4IGA/z0MQYV/ZfdAfZIUtSrFyyZ3nBd';
        $header[]='Content-Type: application/json';
        $url='https://api.test.sabre.com/v1/shop/flights?origin=JFK&destination=LAX&departuredate=2017-10-07&returndate=2017-10-08&onlineitinerariesonly=N&limit=10&offset=1&eticketsonly=N&sortby=totalfare&order=asc&sortby2=departuretime&order2=asc&pointofsalecountry=US';

//        $response = Curl::to($url)
//            ->withHeader('Authorization: Bearer T1RLAQKUYW3alUibZpl/JoVXEQjGgaGNIBBYgExtSn0TuVUGyDT2DyXrAADAHM+lDJpS2Teq/zMbh6LyiiX09gHaBlVKhTm27jO7aRlPybUrFBrIrQlgK4oxW+AzycSp4KjnJ89XUqIhsFT2g0cnvYbrCoHzGqFTpCHPzSicgxFTYY7JN5/11Ls+NVhDhFUdbctq3ABDVDDUlKa1tXDNCD1o+fRsB1VxpMiXv8xlkDryg9bFzAOxNtWjBiqGqcgvWUvyuiWzERK+3JBxSsFRzWuJFmmsnAuqbwbUmEhOPFfmPjT2pBY9VpgUOr9X')
//            ->withHeader('Content-Type: application/json')
//            ->get();
//        echo '<pre>';
//            var_dump((array) json_decode($response));
//            die();
//        $reffer="https://api.test.sabre.com";
        $agent ="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3";


        $data_string='{
  "EnhancedSeatMapRQ": {
    "SeatMapQueryEnhanced": {
      "RequestType": "Payload",
      "Flight": {
        "destination": "EZE",
        "origin": "DFW",
      "DepartureDate": {
        "content": "2017-10-07"
      },
      "ArrivalDate": {
        "content": "2017-10-08"
      },
      "Operating": {
        "carrier": "AA",
        "content": "997"
      },
      "Marketing": [{
        "carrier": "AA",
        "content": "997"
      }]
      },
    "CabinDefinition": {
      "RBD": "Y"
    }
    }
  }
}';


//        $header[]='Content-Length: ' . strlen($data_string);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//        curl_setopt($ch, CURLOPT_ENCODING,'gzip');
//        curl_setopt($ch, CURLOPT_REFERER, $reffer);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_POST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $content = curl_exec($ch);
        echo "<pre>";
        print_r(json_decode($content));
    }
}
