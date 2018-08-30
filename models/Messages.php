<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;

class Messages extends ActiveRecord{


    /**
     * Saving message to database
     */
	public function addMessage($data, $form, $file){

		$message = new Messages;
		$message->form = (int)$form;
		$message->file = $file;
		if (isset($data['name'])) $message->name = $data['name'];
		if (isset($data['phone'])) $message->phone = $data['phone'];
		if (isset($data['message'])) $message->message = $data['message'];

		if ($message->insert()) return $message->getPrimaryKey();
		else return false;
	}


    /**
     * Get count of all massages
     */
	public function getTotalCount()
	{
		return Messages::find()->where([])->count();
	}


    /**
     * New messages for admin panel
     */
	public function getNewMessages()
	{
		return Messages::find()->select(['form','name'])->where(['new' => true])->asArray()->all();
	}


    /**
     * Get messages for admin panel
     */
	public function getMessages($pages)
	{
		Messages::updateAll(['new' => 0], 'new = 1');

		$query = Messages::find()->select(['id','form','name','phone','file','message','date']);
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count()]);
	    return $query->offset($pages->offset)->limit($pages->limit)->orderBy('date DESC')->asArray()->all();
	}


}
