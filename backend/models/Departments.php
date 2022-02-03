<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property int|null $branches_branch_id
 * @property string|null $departments_name
 * @property int|null $companies_company_id
 * @property string|null $departments_created_dat
 * @property string|null $departments_status
 *
 * @property Branches $branchesBranch
 * @property Companies $companiesCompany
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'branches_branch_id', 'companies_company_id'], 'integer'],
            [['departments_created_dat'], 'safe'],
            [['departments_status'], 'string'],
            [['departments_name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['branches_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branches_branch_id' => 'id']],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branches_branch_id' => 'Branches Branch ID',
            'departments_name' => 'Departments Name',
            'companies_company_id' => 'Companies Company ID',
            'departments_created_dat' => 'Departments Created Dat',
            'departments_status' => 'Departments Status',
        ];
    }

    /**
     * Gets query for [[BranchesBranch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branches_branch_id']);
    }

    /**
     * Gets query for [[CompaniesCompany]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'companies_company_id']);
    }
}
