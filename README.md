# cryptonightv8-wallet-api-php
This is the API library for the Cryptonight V8 wallets in PHP.
For the wiki, refer to this url: https://github.com/FandomGold/fandomgold/wiki/RPC-wallet-API-methods

How to use it?  
Look into the `index.php` file to see an example.  
  
What to do with empty value's?  
We're going to use `getTransactionHashes` for an example. Click [here](https://github.com/FandomGold/fandomgold/wiki/RPC-wallet-API-methods#getBlockHashes) to see the arguments.
~~~php
<?php
include('service.php');

/* For every value that needs to be empty u just fill in '' */
$RpcTest = new CryptonightV8_RpcClient("spookypool.nl", "12345", "hi");
print_r($RpcTest->getTransactionHashes(
  'dRGLbfa8qaHZLKAuENnjtxAsahDWAmoFJXf9GpR9J78Jji6uBAwLzXM8ynT9ALZ5q8SGV86d162RLdhZRvuTbKsq8Mhys1aVgd',
  '',
  1,
  10,
  ''
));
?>
~~~
