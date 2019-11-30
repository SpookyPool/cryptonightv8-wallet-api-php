<?php
/* This is a fork of https://github.com/Karbovanets/karbo-api-php/ 
 * For the wiki, refer to this url: https://github.com/FandomGold/fandomgold/wiki/RPC-wallet-API-methods
 * I've added all possible requests to the library and made it more easy to use.
 * 
 * Created by MunchieHigh */

class CryptonightV8_RpcClient {
  public $host = "";
  public $port = "";
  public $id = "";

  public function __construct($hostl, $portl, $idl){
    $this->host = $hostl;
    $this->port = $portl;
    $this->id = $idl;
  }

  public function apiCall($req){
    static $ch = null;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_URL, "http://".$this->host.":".$this->port."/json_rpc");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    usleep(50000);
    $res = curl_exec($ch);
    if(curl_errno($ch) > 0){
      curl_close($ch);
      return false;
      } else {
      curl_close($ch);
      $result = json_decode($res, true);

      if($result != NULL){
        if(!isset($result['error'])){
          return $result['result'];
        } else {
          return $result['error'];
        }
      }
      return false;
    }
  }
      
  public function getStatus() {
    $args = array();
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getStatus';
    
    return $this->apiCall($args);
  }
  
  public function reset() {
    $args = array();
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'reset';
    
    return $this->apiCall($args);
  }

  public function save() {
    $args = array();
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'save';
    
    return $this->apiCall($args);
  }
  
  public function getViewKey() {
    $args = array();
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getViewKey';
    
    return $this->apiCall($args);
  }
  
  public function getSpendKeys($address) {
    $params = array();
    $params['address'] = $address;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getSpendKeys';
    
    return $this->apiCall($args);
  }

  public function getAddresses() {
    $args = array();
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getAddresses';
    
    return $this->apiCall($args);
  }

  public function createAddress() {
    $args = array();
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'createAddress';
    
    return $this->apiCall($args);
  }

  public function deleteAddress($address) {
    $params = array();
    $params['address'] = $address;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'deleteAddress';
    
    return $this->apiCall($args);
  }

  public function getBalance($address) {
    $params = array();
    $params['address'] = $address;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getBalance';
    
    return $this->apiCall($args);
  }

  public function getBlockHashes($blockCount, $firstBlockIndex) {
    $params = array();
    $params['blockCount'] = $blockCount;
    $params['firstBlockIndex'] = $firstBlockIndex;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getBlockHashes';
    
    return $this->apiCall($args);
  }

  public function getTransactionHashes($addresses, $blockHash, $firstBlockIndex, $blockCount, $paymentId) {
    $params = array();
    if(!$addresses == "") { $params['addresses'] = $addresses; }
    if(!$blockHash == "") { $params['blockHash'] = $blockHash; }
    if(!$firstBlockIndex == "") { $params['firstBlockIndex'] = $firstBlockIndex; }
    $params['blockCount'] = $blockCount;
    if(!$paymentId == "") { $params['paymentId'] = $paymentId; }
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getTransactionHashes';
    
    return $this->apiCall($args);
  }

  public function getTransactions($addresses, $blockHash, $firstBlockIndex, $blockCount, $paymentId) {
    $params = array();
    if(!$addresses == "") { $params['addresses'] = $addresses; }
    if(!$blockHash == "") { $params['blockHash'] = $blockHash; }
    if(!$firstBlockIndex == "") { $params['firstBlockIndex'] = $firstBlockIndex; }
    $params['blockCount'] = $blockCount;
    if(!$paymentId == "") { $params['paymentId'] = $paymentId; }
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getTransactions';
    
    return $this->apiCall($args);
  }

  public function getUnconfirmedTransactionHashes($addresses) {
    $params = array();
    if(!$addresses == "") { $params['addresses'] = $addresses; }
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getUnconfirmedTransactionHashes';
    
    return $this->apiCall($args);
  }

  public function getTransaction($transactionHash) {
    $params = array();
    $params['transactionHash'] = $transactionHash;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'getTransaction';
    
    return $this->apiCall($args);
  }
  
  public function sendTransaction($addresses, $transfer, $fee, $unlockTime, $anonymity,$extra, $paymentId, $changeAddress) {
    $params = array();
    if(!$addresses == "") { $params['addresses'] = $addresses; }
    $params['transfer'] = $transfer;
    $params['fee'] = $fee;
    if(!$unlockTime == "") { $params['unlockTime'] = $unlockTime; }
    $params['anonymity'] = $anonymity;
    if(!$extra == "") { $params['extra'] = $extra; }
    if(!$paymentId == "") { $params['paymentId'] = $paymentId; }
    if(!$changeAddress == "") { $params['changeAddress'] = $changeAddress; }
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'sendTransaction';
    
    return $this->apiCall($args);
  }
  
  public function estimateFusion($addresses, $threshold) {
    $params = array();
    if(!$addresses == "") { $params['addresses'] = $addresses; }
    $params['threshold'] = $threshold;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'estimateFusion';
    
    return $this->apiCall($args);
  }
  
  public function sendFusionTransaction($threshold, $anonymity, $addresses, $destinationAddress) {
    $params = array();
    $params['threshold'] = $threshold;
    $params['anonymity'] = $anonymity;
    if(!$addresses == "") { $params['addresses'] = $addresses; }
    if(!$destinationAddress == "") { $params['destinationAddress'] = $destinationAddress; }
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'sendFusionTransaction';
    
    return $this->apiCall($args);
  }
  
  public function validateAddress($addresses) {
    $params = array();
    $params['addresses'] = $addresses;
    
    $args = array();
    $args['params'] = $params;
    $args['jsonrpc'] = '2.0';
    $args['id'] = $this->id;
    $args['method'] = 'validateAddress';
    
    return $this->apiCall($args);
  }
}