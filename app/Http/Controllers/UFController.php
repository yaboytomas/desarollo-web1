<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UFController extends Controller
{
    /**
     * Get the current UF value from an external API
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUFValue()
    {
        try {
            // API de SBIF (Sistema Bancario de Información Financiera)
            // Desactivar verificación SSL para entornos de desarrollo
            $response = Http::withOptions([
                'verify' => false, // Esto deshabilita la verificación SSL
            ])->timeout(10)->get('https://mindicador.cl/api/uf');
            
            if ($response->successful()) {
                $data = $response->json();
                
                // Log the response data for debugging
                Log::info('UF API Response:', ['data' => $data]);
                
                // Check if the response has the expected structure
                if (isset($data['serie']) && !empty($data['serie'])) {
                    return response()->json([
                        'success' => true,
                        'value' => $data['serie'][0]['valor'] ?? 'N/A',
                        'date' => $data['serie'][0]['fecha'] ?? date('Y-m-d')
                    ]);
                } else {
                    Log::error('UF API: Response missing expected data structure', ['data' => $data]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Error en la estructura de datos recibidos'
                    ], 500);
                }
            }
            
            // Log the error response
            Log::error('UF API: Unsuccessful response', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el valor de la UF: ' . $response->status()
            ], 500);
            
        } catch (\Exception $e) {
            Log::error('UF API: Exception caught', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error al conectar con el servicio: ' . $e->getMessage()
            ], 500);
        }
    }
}
