<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string|null $receiver_name
 * @property string|null $receiver_email
 * @property string|null $content
 * @property string|null $attachment
 * @property string|null $subject
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['content'], 'string'],
            [['receiver_name', 'receiver_email', 'attachment', 'subject'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'content' => 'Content',
            'attachment' => 'Attachment',
            'subject' => 'Subject',
        ];
    }
}
