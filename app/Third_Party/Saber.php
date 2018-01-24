<?php
/**
 * Created by PhpStorm.
 * User: Eslam
 * Date: 7/30/2017
 * Time: 7:09 AM
 */

namespace App\Third_Party;


class Saber
{
    const SOAP_XML_FOLDER = 'soapxml';
    const SOAP_API_URL = 'https://sws-crt.cert.havail.sabre.com';

    protected $_userName = '973158';
    protected $_password = '532437WS';
    protected $_ipcc = '5OTI';

    protected $_soapToken = '';

    protected function _soapSendRequest($action, $xml)
    {
        $headers = [
            'Content-Type: text/xml; charset="utf-8"',
            'Content-Length: ' . strlen($xml),
            'Accept: text/xml',
            'Keep-Alive: 300',
            'Connection: keep-alive',
            'Cache-Control: no-cache',
            'Pragma: no-cache',
            'SOAPAction: "' . $action . '"'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, self::SOAP_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

        $data = curl_exec($ch);

        if(curl_error($ch)) {
            throw new \Exception("Curl error: ".curl_error($ch));
        } else {
            return $this->_parseSoapAnswer($data, $action, $xml);
        }
    }

    public function soapOpenSession()
    {

        $action = 'SessionCreateRQ';
        $soapXML = $this->_getSoapXml($action, [
            'timestamp' => date('Y-m-d\TH:i:s\Z'),
            'userName' => $this->_userName,
            'password' => $this->_password,
            'ipcc' => $this->_ipcc,
        ]);
        $token = $this->_soapSendRequest($action, $soapXML);

        if ($token !== false) {
            $this->_soapToken = $token;
        }

        return $this->_soapToken;
    }

    protected function _getSoapXml($xmlName, $params = [])
    {
//        $filePath = self::SOAP_XML_FOLDER . '/' . $xmlName . '.xml';

//        if (!file_exists($filePath)) {
//            throw new \Exception("\AviaAPI\Sabre\SabreAPI::_getSoapXmlAuth(\'{$xmlName}\') XML file not found");
//        }

        $xml = file_get_contents(storage_path('app/public/soapxml/SessionCreateRQ.xml'));
//        dd($xml);

        foreach ($params as $paramName => $paramVal) {
            $xml = str_replace('%'.$paramName.'%', $paramVal, $xml);
        }
        return $xml;
    }

    /**
     * Parsing SOAP Answer
     * @param string $soapAnswer
     * @return mixed
     */
    protected function _parseSoapAnswer($soapAnswer, $soapAction, $xml)
    {
        //del soap prefix
        $soapAnswer = str_replace(['SOAP-ENV:', 'soap-env:', 'eb:', 'wsse:', 'stl:', 'tir39:'], '', $soapAnswer);
        $soapAnswer = simplexml_load_string($soapAnswer);

        $body = $soapAnswer->Body;
        $header = $soapAnswer->Header;

//        dd($body);
        //check error
        if (isset($body->Fault))
        {
            $faultCode = (string)$body->Fault->faultcode;
            $faultString = (string)$body->Fault->faultstring;

            trigger_error("\AviaAPI\Sabre\SabreAPI SOAP Failed. Server return error: {$faultCode}: {$faultString}", E_USER_NOTICE);
            return false;
        }

        if ($soapAction == "SessionCreateRQ")
        {
            $BinarySecurityToken = (string)$header->Security->BinarySecurityToken;
            return $BinarySecurityToken;
        }

        $answer = '';

        if (isset($body->CompressedResponse))
        {
            //decompress answer
            $decodedAnswer = base64_decode($body->CompressedResponse);
            $answer = simplexml_load_string(gzdecode($decodedAnswer), "SimpleXMLElement", LIBXML_NOCDATA);
        }
        else
        {
            $answer = $body;
        }

        if (isset($answer->Errors->Error))
        {
            $lastError = (string)$answer->Errors->Error[(count($answer->Errors->Error) - 1)]["ShortText"];
            $lastError .= "; " . (string)$answer->Errors->Error[(count($answer->Errors->Error) - 2)]["ShortText"];

            trigger_error("\AviaAPI\Sabre\SabreAPI Server return error: {$lastError}", E_USER_NOTICE);
            return false;
        }

        return $answer;
    }
}