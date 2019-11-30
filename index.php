<?php
include('service.php');

$RpcTest = new CryptonightV8_RpcClient("spookypool.nl", "12345", "hi");
print_r($RpcTest->getStatus());
?>
