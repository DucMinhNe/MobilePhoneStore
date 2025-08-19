<?php
ini_set('max_execution_time', 3000000);
ini_set('memory_limit', '2048M');
class KiotViet
{
    private $d;
    private $session;
    private $api_link = "https://public.kiotapi.com";
    private $client = "4b63e4ca-59a4-4ded-8588-31fb98d07de1";
    private $secret = "7D2FD28407231EB33BB58843638E338E639D6366";
    private $name = "thanhnhaniphone";

    function __construct($d)
    {
        $this->d = $d;
        $this->check_login();
    }

    function setToken($token, $type)
    {
        @$_SESSION['api']['token']['code'] = $token;
        @$_SESSION['api']['token']['type'] = $type;
        @$_SESSION['api']['token']['time'] = time() + 86400;
    }
    function getToken()
    {
        if (@$_SESSION['api']['token']) {
            if ((@$_SESSION['api']['token']['time']) < time()) {
                unset($_SESSION['api']);
                return false;
            }
            return $_SESSION['api']['token'];
        }
        return false;
    }
    function check_login()
    {
        if (empty($_SESSION['api']['token']) || $_SESSION['api']['token']['time'] < time()) {
            $this->login();
        }
    }

    function login()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://id.kiotviet.vn/connect/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            //CURLOPT_SSLVERSION=> 3,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "client_id=" . $this->client . "&client_secret=" . $this->secret . "&grant_type=client_credentials&scopes=PublicApi.Access",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: 9629546a-7a5e-d645-0b3d-f0dfbf062fa5"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo ("cURL Error #:" . $err);
            die("ERROR");
            return false;
        } else {
            $rs = json_decode($response, true);
            $this->setToken($rs['access_token'], $rs['token_type']);
            return true;
        }
    }
    function init($url, $data = null, $type = "POST")
    {
        $curl = curl_init();
        if (in_array(strtolower($type), array("post", "put"))) {
            $data = json_encode($data);
        } else {
            $data = "";
        }
        if ($data != null) {
        }
        $token = $this->getToken();
        $xheader = array(
            "cache-control: no-cache",
            "retailer:" . $this->name,
            "authorization:" . $token['type'] . " " . $token['code'],
            "content-type: application/json",
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api_link . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            //CURLOPT_SSLVERSION=> 3,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_HTTPHEADER => $xheader
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo $err . $this->api_link . $url;
            die;
            $this->login();
            $this->init($url, $data, $type);
        } else {
            $rs = json_decode($response);
            return $rs;
        }
    }
    function getCustomerByPhone($phone = 0)
    {
        $ar = array();
        $link = "/customers?contactNumber=$phone";
        $ar = $this->init($link, null, "GET");
        return $ar->data;
    }
    function getInvoiceByCode($code = '')
    {
        $ar = array();
        $link = "/invoices/code/$code";
        $ar = $this->init($link, null, "GET");
        return $ar;
    }
    function getProductById($id = '')
    {
        $ar = array();
        $link = "/products/$id";
        $ar = $this->init($link, null, "GET");
        return $ar;
    }
    function setError($er)
    {
        die($er);
    }
}
