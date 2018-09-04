<?php
namespace app\models;
use yii\db\ActiveRecord;
class News extends ActiveRecord{


    /**
     * First group of news for news archive page
     * @param int $limit
     * @return array|ActiveRecord[]
     */
    public static function getFirstArchiveNews($limit=6){
        return self::find()
            ->select(['news.shortdesc','news.date','news.name','news.slug','news.name'])
           // ->leftJoin('media', 'news.media = media.id')
            ->limit( $limit ) //todo: add page meta for index to know amount of news to show
            ->orderBy(['date' => SORT_DESC])
            ->asArray()
            ->all();
    }

    /**
     * Content for news page
     * @param string $slug
     * @return array|null|ActiveRecord
     */
    public static function getSingleNews($slug){
        return self::find()->select(['name','content'])->where(['slug' => $slug])->asArray()->one();
    }

    /**
     * Select list of news for main page
     * @param int $limit
     * @return array|ActiveRecord[]
     */
    public static function getNewsForMain($limit=8){
        return self::find()->select(['shortdesc','date','name','slug'])->limit($limit)->asArray()->all();
    }
}