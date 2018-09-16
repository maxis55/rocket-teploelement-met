<?php
namespace app\models;
use yii\db\ActiveRecord;
class News extends ActiveRecord{

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
     * @param array $params
     * @return array|ActiveRecord[]
     */
    public static function getFirstArchiveNews($limit=6,$params=['news.shortdesc','news.date','news.name','news.slug','news.name','media.name media_name']){
        return self::find()
            ->select($params)
            ->leftJoin('media', 'news.media_id = media.id')
            ->limit( $limit )
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }
}