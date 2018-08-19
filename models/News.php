<?php

namespace app\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord{


    /**
     * Amount of news on archive page
     */
	public function getNewsPerPage(){

		return Settings::find()->select(['value'])->where(['key' => 'news_per_page'])->asArray()->one()['value'];
	}


    /**
     * Cross pages data, header footer and others
     */
	public function getFirstArchiveNews(){

		return News::find()->select(['media_id','shortdesc','date','name','slug'])->limit( News::getNewsPerPage() )->asArray()->all();
	}


}
