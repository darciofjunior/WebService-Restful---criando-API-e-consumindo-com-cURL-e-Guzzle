<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientExpection;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\Throwable;

class AuthApi extends Model
{
    use HasFactory;

    private $token;

    /************************************************************************/
    /********URL para estudo https://gorest.co.in/public-api/products********/
    /************************************************************************/

    public function __construct()
    {
        try {
            $guzzle     = new Guzzle(['base_uri' => env('URL_API'), 
                'timeout'   => 60,
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ],
            ]);

            $response   = $guzzle->post('/api/v1/auth', 
                                        [
                                            'form_params' => [
                                                'email'     => env('EMAIL_API'),
                                                'password'  => env('PASSWORD_API'),
                                            ]
                                        ]);

            $this->token  = json_decode($response->getBody())->token;

        }catch (ClientException $e) {
            $result = [
                'body'      => $e->getMessage(),
                'url'       => $e->getRequest()->getUri(),
                'headers'   => $e->getRequest()->getHeaders(),
                'status'    => $e->getCode(),
                'error'     => $e->getTraceAsString(),  
            ];
            dd($result);
        }catch (RequestException $e) {
            $result = [
                'body'      => $e->getMessage(),
                'url'       => $e->getRequest()->getUri(),
                'headers'   => $e->getRequest()->getHeaders(),
                'status'    => $e->getCode(),
                'error'     => $e->getTraceAsString(),  
            ];
            dd($result);
        }catch (ConnectException $e) {
            $result = [
                'body'      => $e->getMessage(),
                'url'       => $e->getRequest()->getUri(),
                'headers'   => $e->getRequest()->getHeaders(),
                'status'    => $e->getCode(),
                'error'     => $e->getTraceAsString(),  
            ];
            dd($result);
        }catch (Throwable $e) {
            $result = [
                'body'      => $e->getMessage(),
                'url'       => $e->getRequest()->getUri(),
                'headers'   => $e->getRequest()->getHeaders(),
                'status'    => $e->getCode(),
                'error'     => $e->getTraceAsString(),  
            ];
            dd($result);
        }
    }

    public function getToken()
    {
        return $this->token;
    }
}
