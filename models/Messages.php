<?php

namespace app\models;

use yii\db\ActiveRecord;

class Messages extends ActiveRecord{


    /**
     * Saving message to database
     */
	public function addMessage($data, $form){

		$message = new Messages;
		$message->form = (int)$form;
		if (isset($data['name'])) $message->name = $data['name'];
		if (isset($data['phone'])) $message->phone = $data['phone'];
		if (isset($data['message'])) $message->message = $data['message'];

		if ($message->insert()) return true;
		else return false;
	}


}
