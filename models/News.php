<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class News extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function rules()
    {
        return [
            [['name', 'content', 'shortdesc', 'slug'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['media_id'], 'integer'],
            [['name', 'shortdesc'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 20],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'content' => 'Контент',
            'date' => 'Дата',
            'shortdesc' => 'Краткое описание',
            'slug' => 'Slug',
            'media_id' => 'Изображение',
        ];
    }

    /**
     * First group of news for news archive page
     * @param int $limit
     * @param bool $viewed
     * @param int $offset
     * @return array
     */
    public static function getArchiveNews($limit = 6, $viewed = false,$offset=0)
    {
        if ($viewed) {
            $cookiesRead = Yii::$app->request->cookies;
            $read_news_ids = array();

            if (($cookie = $cookiesRead->get('read_news')) !== null) {
                $read_news_ids = json_decode($cookie->value, true);
            }

            $news_to_return = self::find()
                ->select(['news.id','news.shortdesc', 'news.date', 'news.name', 'news.slug', 'news.name', 'media.name media_name'])
                ->leftJoin('media', 'news.media_id = media.id')
                ->where(['in', 'news.id', $read_news_ids])
                ->limit($limit)
                ->offset($offset*$limit)
                ->asArray()
                ->all();

            $news_in_cookie_total=sizeof($read_news_ids);
            if(!empty($news_to_return)){
                //all of this to keep order of viewed news that is in cookie
                $read_news_ids = array_combine($read_news_ids, $read_news_ids);
                $news_to_return=ArrayHelper::index($news_to_return, 'id');
                $news_to_return=array_replace($read_news_ids, $news_to_return);
                $news_to_return=array_reverse($news_to_return,true);
            }


//var_dump($news_to_return);
//die();
            //if amount of news in cookie is less than amount per page
            if (sizeof($news_to_return) < $limit) {
                $second_news_arr = self::find()
                    ->select(['news.id','news.shortdesc', 'news.date', 'news.name', 'news.slug', 'news.name', 'media.name media_name'])
                    ->leftJoin('media', 'news.media_id = media.id')
                    ->where(['not in', 'news.id', $read_news_ids])
                    ->limit($limit - sizeof($news_to_return))
                    ->offset((($offset*$limit-$news_in_cookie_total)<0)?0:($offset*$limit-$news_in_cookie_total))
                    ->orderBy([
                        'date' => SORT_DESC,
                        'news.id' => SORT_DESC
                    ])
                    ->asArray()
                    ->all();
                $news_to_return = array_merge($news_to_return, $second_news_arr);
            }
//            else {
//                $news_to_return = array_slice($news_to_return, 0, $limit, true);
//            }
            return $news_to_return;

        }

        return self::find()
            ->select(['news.id','news.shortdesc', 'news.date', 'news.name', 'news.slug', 'news.name', 'media.name media_name'])
            ->leftJoin('media', 'news.media_id = media.id')
            ->limit($limit)
            ->orderBy([
                'date' => SORT_DESC,
                'news.id' => SORT_DESC
            ])
            ->offset($offset*$limit)
            ->asArray()
            ->all();


    }

    /**
     * Content for news page
     * @param string $slug
     * @param array $params
     * @return array|null|ActiveRecord
     */
    public static function getSingleNews($slug, $params = ['id', 'name', 'content'])
    {
        return self::find()
            ->select($params)
            ->where(['slug' => $slug])
            ->asArray()
            ->one();
    }

    /**
     * Select list of news for main page
     * @param int $limit
     * @return array|ActiveRecord[]
     */
    public static function getNewsForMain($limit = 8)
    {
        return self::find()->select(['shortdesc', 'date', 'name', 'slug'])->limit($limit)->asArray()->all();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }
}