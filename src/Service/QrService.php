<?php


namespace App\Service;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\Response\QrCodeResponse;

class QrService
{

    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

  public function CreateQr() {
      $page = $this->router->generate('qr', [], UrlGeneratorInterface::ABSOLUTE_URL);
      $qrCode = new QrCode($page);

// Set advanced options


// Directly output the QR code
      header('Content-Type: '.$qrCode->getContentType());
      echo $qrCode->writeString();

// Save it to a file
      $qrCode->writeFile(__DIR__.'/qrcode.png');

// Create a response object
      $response = new QrCodeResponse($qrCode);

  }

}
