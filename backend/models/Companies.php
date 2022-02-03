<?php

namespace backend\models;

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
 * @property string|null $company_start_date
 * @property string|null $logo
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    /**
     * {@inheritdoc}
     * 
     * 
     */
    public static function tableName()
    {
        return 'companies';
    }
    public function rules()
    {
        return [
            [['company_created_date', 'company_start_date'], 'safe'],
            [['company_status'], 'string'],
            [['file'], 'file'],
            [['company_name', 'logo', 'company_email', 'company_address', ], 'string', 'max' => 255],
        ];
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
            'company_start_date' => 'Company Start Date',
            'file' => 'Logo',
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