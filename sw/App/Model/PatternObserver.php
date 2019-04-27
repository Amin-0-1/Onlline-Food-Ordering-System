<?php
include_once 'AbstractObserver.php';
class PatternObserver extends AbstractObserver {
    public function __construct() {
    }
    public function update($item,$user) {
    	//fooditem Object ( [ID] => [Name] => tasdfasdf [Amount] => 50 [Price] => 20 [Description] => asdfasdf [Visibility] => 1 [CATID] => 2 [db] => PDO Object ( ) [tableName] => fooditems ) fooditem Object ( [ID] => [Name] => tasdfasdf [Amount] => 50 [Price] => 20 [Description] => asdfasdf [Visibility] => 1 [CATID] => 2 [db] => PDO Object ( ) [tableName] => fooditems )
    	$email = $user['Email'];
    	$itemName = $item->Name;
    	$itemPrice = $item->Price;
    	include '../../../Global/notification.php';
     	header('location:../../../Global/redirect.php ');
     	
    }
}
?>