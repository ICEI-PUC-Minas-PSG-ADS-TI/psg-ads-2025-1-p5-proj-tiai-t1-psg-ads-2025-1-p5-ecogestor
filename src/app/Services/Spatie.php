<?php
namespace App\Services;

require_once __DIR__ . '/../../vendor/autoload.php';


use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;

class Spatie
{
    function TakeScreenshot(string $url): array
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return ['error' => 'URL fornecida inválida.'];
        }

        try {
            $screenshotBase64 = Browsershot::url($url)
                ->noSandbox() 
                ->windowSize(1920, 1080) 
                ->fullPage() 
                ->waitUntilNetworkIdle() 
                ->timeout(120) 
                ->setScreenshotType('png') 
                ->base64Screenshot(); 

            if (empty($screenshotBase64)) {
                 throw new \Exception("Browsershot retornou uma string Base64 vazia.");
            }

            $screenshotBase64 = 'data:image/png;base64,' . $screenshotBase64;

            return ['screenshotBase64' => $screenshotBase64];
        } catch (CouldNotTakeBrowsershot $exception) {
            error_log("Erro do Browsershot ao capturar '$url': " . $exception->getMessage());
            return ['error' => 'Falha ao gerar o screenshot da página. (Detalhes: ' . $exception->getMessage() . ')'];
        
        } catch (\Throwable $th) {
            error_log("Erro genérico ao capturar screenshot de '$url': " . $th->getMessage());
            return ['error' => 'Ocorreu um erro inesperado ao processar o screenshot.'];
        }
    }
}
?>