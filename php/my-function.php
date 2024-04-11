require_once(__DIR__.'/vendor/autoload.php');

use Aws\EventBridge\EventBridgeClient;
use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;

$credentials = new Credentials('YOUR_ACCESS_KEY_ID', 'YOUR_SECRET_ACCESS_KEY');

$evClient = new EventBridgeClient([
'region' => 'us-east-1',
'version' => 'latest',
'signature' => new SignatureV4('eventbridge', 'us-east-1'),
'credentials' => $credentials
]);


$endpointId = 'my-endpoint.veo';  
$eventBusName = 'my-bus-name';    

$event =  [
    'Source' => 'cybertechtalk',
    'DetailType' => 'test',
    'Detail' => json_encode(['foo' => 'bar']),
    'Time' => new DateTime(),
    'Resources' => ['php-script'],
    'EventBusName' => $eventBusName,
    'TraceHeader' => 'test'
];

$result = $evClient->putEvents([
    'EndpointId' => $endpointId,
    'Entries' => [$event]
]);