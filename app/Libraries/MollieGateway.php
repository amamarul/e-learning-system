<?php

namespace App\Libraries;

use App\User;
use Mollie_API_Client;

class MollieGateway
{

    public static function get($id)
    {
        $mollie = self::getApiClient();
        $payment = $mollie->payments->get($id);

        return $payment;
    }

    private static function getApiClient()
    {
        $mollie = new Mollie_API_Client;
        $mollie->setApiKey('test_QR6GeyvjRQnaKeDTtMJ8sBQGFwv8WM');
        return $mollie;
    }

    public static function create($user)
    {
        $mollie = self::getApiClient();

        try
        {
            $payment = $mollie->payments->create(
                array(
                    'amount'      => 19.95,
                    'description' => 'Betaling aan psychoeducatieleren.nl',
                    'redirectUrl' => 'https://psychoeducatieleren.nl/process-payment',
                    'metadata'    => array(
                        'order_id' => ''
                    )
                )
            );

            $user = User::find($user->id);
            $user->payment_token = $payment->id;
            $user->save();

            header("Location: " . $payment->getPaymentUrl());
            exit;
        }
        catch (Mollie_API_Exception $e)
        {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
            echo " on field " . htmlspecialchars($e->getField());
        }
    }


}