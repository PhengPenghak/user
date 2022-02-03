<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string|null $company_name
 * @property string|null $company_email
 * @property string|null $company_address
 * @property string|null $company_created_date
 * @property string|null $company_status
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['company_created_date'], 'safe'],
            ['company_start_date', 'checkDate'],
            [['company_status'], 'string'],
            [['company_name', 'company_email', 'company_address'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    public function checkDate($attribute, $params)
    {
        $today = date('Y-m-d');
        $selectedDate = date($this->company_start_date);
        if ($selectedDate > $today) {
            $this->addError($attribute, 'Company Start Date Must be smaller');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_created_date' => 'Company Created Date',
            'company_status' => 'Company Status',
        ];
    }

    /**
     * Gets query for [[Branches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['companies_company_id' => 'id']);
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['companies_company_id' => 'id']);
    }
}