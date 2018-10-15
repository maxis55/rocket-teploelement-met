<?php

namespace app\models;

use DirectoryIterator;
use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $phone
 * @property string $type
 * @property string $content
 * @property string $file
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['content'], 'string'],
            [['name', 'file'], 'string', 'max' => 255],
            [['phone', 'type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'date' => 'Дата',
            'phone' => 'Телефон',
            'type' => 'Тип сообщения',
            'content' => 'Содержание сообщения',
            'file' => 'Файл',
        ];
    }



	public function sendMail(){
		$admin_email=Settings::findOne(['key'=>'admin_email']);
		if($this->type=='phone_request'){
			\Yii::$app->mailer->compose()
			                ->setFrom([\Yii::$app->params['adminEmail'] => 'Teploelement'])
			                ->setTo($admin_email->value)
			                ->setTextBody('Новый запрос звонка от '.$this->name.' по телефону '.$this->phone)
			                ->setSubject('Новый запрос звонка' )
			                ->send();
		}else{
			\Yii::$app->mailer->compose()
			                ->setFrom([\Yii::$app->params['adminEmail'] => 'Teploelement'])
			                ->setTo($admin_email->value)
			                ->setTextBody('Новое сообщение:"'.$this->content.'" от '.$this->name.' по телефону '.$this->phone)
			                ->setSubject('Новое сообщение' )
			                ->send();
		}

	}


    public static function getFilePathStatic($name)
    {
        $defaultPath = Yii::getAlias('@web' . '/user_uploads/' . $name);
        $defaultPath2 = Yii::getAlias('@webroot' . '/user_uploads/' . $name);


        if (file_exists($defaultPath2)) {
            return $defaultPath;
        }

        return null;
    }

    /**
     * @param yii\web\UploadedFile $file
     * @return string|bool
     */
    public static function saveFile($file)
    {
        $fileName = $file->name;
        if (!is_dir(Yii::getAlias('@webroot') . '/user_uploads')) {
            mkdir(Yii::getAlias('@webroot') . '/user_uploads', 0777, true);
        }

        $nameOccurences = 0;
        while (is_file(Yii::getAlias('@webroot') . '/user_uploads/' . $fileName)) {
            $fileName = pathinfo($file->name, PATHINFO_FILENAME) . '-' . ++$nameOccurences . '.' . pathinfo($file->name, PATHINFO_EXTENSION);
        }
        if (0 != $nameOccurences) {
            $fileName = pathinfo($file->name, PATHINFO_FILENAME) . '-' . $nameOccurences . '.' . pathinfo($file->name, PATHINFO_EXTENSION);
        }else{
            $fileName = $file->name;
        }

        if ($file->saveAs(Yii::getAlias('@webroot') . '/user_uploads/' . $fileName)) {
            return $fileName;
        }
        return false;
    }


    public function afterDelete()
    {
        parent::afterDelete();
        //delete file physically
        if (!empty($this->file)) {
            $filePath = Yii::getAlias('@webroot' . '/user_uploads/' . $this->file);

            if (is_file($filePath)) {
                unlink($filePath);
            }

        }

    }

}
