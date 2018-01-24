<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;
use App\Third_Party\Saber;
use App\Third_Party\SaberRequest ;
use App\Third_Party\SabreParsing ;
class SaberintegrationController extends Controller
{
    //

    public  function index()
    {
        $saber = new Saber();

        $result = $saber->soapOpenSession();

//        dd(($result));

        $body = '<OTA_AirAvailRQ xmlns="http://webservices.sabre.com/sabreXML/2011/10" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" Version="2.4.0">
         <OriginDestinationInformation>
            <FlightSegment DepartureDateTime="01-23T09:00">
               <DestinationLocation LocationCode="CMH" />
               <OriginLocation LocationCode="DFW" />
            </FlightSegment>
         </OriginDestinationInformation>
      </OTA_AirAvailRQ>' ;


        $availability =  new SabreParsing('OTA_AirAvailLLSRQ',$body,$result) ;

        $data = $availability->get_response() ;

        echo '<pre>' ;
        var_dump($data);
        die();

//        $availability =  new SaberRequest($result);
//
//        $data = $availability->airAvailability();
////        dd($data);
////        echo '<pre>' ;
//        $info = [];
//        foreach ($data->OTA_AirAvailRS->OriginDestinationOptions->OriginDestinationOption as $item){
//            $info [] = $item->FlightSegment ;
//        }
//
////        $classes = [];
////        foreach($info->BookingClassAvail as $book){
////            $classes[] =  $book ;
////        }
//
////        dd($info);
//        echo '<pre>' ;
//        var_dump($info[0]->BookingClassAvail)  ;
    }
}
