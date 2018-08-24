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
     * First group of news for news archive page
     */
	public function getFirstArchiveNews(){

		return News::find()->select(['media_id','shortdesc','date','name','slug'])->limit( News::getNewsPerPage() )->asArray()->all();
	}


    /**
     * Content for news page
     */
	public function getSingleNews($slug){

		return News::find()->select(['name','content'])->where(['slug' => $slug])->asArray()->one();
	}


    /**
     * Select list of news for main page
     */
	public function getNewsForMain(){

		return News::find()->select(['shortdesc','date','name','slug'])->limit(8)->asArray()->all();
	}


}
