<?php

namespace app\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord{


    /**
     * Amount of news on archive page
     */
	public static function getNewsPerPage(){

		return Settings::find()->select(['value'])->where(['key' => 'news_per_page'])->asArray()->one()['value'];
	}


    /**
     * First group of news for news archive page
     */
	public static function getFirstArchiveNews(){

		return News::find()
			->select(['news.shortdesc','news.date','news.name','news.slug','news.name','media.image'])
			->leftJoin('media', 'news.media = media.id')
			->limit( News::getNewsPerPage() )
			->asArray()
			->all();
	}


    /**
     * Content for news page
     */
	public static function getSingleNews($slug){

		return News::find()->select(['name','content'])->where(['slug' => $slug])->asArray()->one();
	}


    /**
     * Select list of news for main page
     */
	public static function getNewsForMain(){

		return News::find()->select(['shortdesc','date','name','slug'])->limit(8)->asArray()->all();
	}


}
