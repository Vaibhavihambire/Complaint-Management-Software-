<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_complaint".
 *
 * @property int $id
 * @property int $comid
 * @property string $NameOfEmployee
 * @property string $EmailOfEmployee
 * @property string $Department
 * @property int $BlockNo
 * @property string $ComplaintCategory
 * @property string $EngineerAssigned
 * @property string $DateOfIncident
 * @property string $SubjectForComplaint
 * @property string $Description
 * @property string $status
 * @property int $sent2eng
 * @property int $created_by
 */
class UserComplaint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_complaint';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NameOfEmployee', 'EmailOfEmployee', 'Department', 'BlockNo', 'ComplaintCategory', 'EngineerAssigned', 'DateOfIncident', 'SubjectForComplaint', 'Description'], 'required'],
            [['comid', 'BlockNo'], 'integer'],
            [['DateOfIncident'], 'safe'],
            [['Description'], 'string'],
            [['NameOfEmployee', 'EmailOfEmployee', 'ComplaintCategory', 'EngineerAssigned'], 'string', 'max' => 50],
            [['Department', 'SubjectForComplaint'], 'string', 'max' => 30],
            [['EmailOfEmployee'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comid' => 'Comid',
            'NameOfEmployee' => 'Name Of Employee',
            'EmailOfEmployee' => 'Email Of Employee',
            'Department' => 'Department',
            'BlockNo' => 'Block No',
            'ComplaintCategory' => 'Complaint Category',
            'EngineerAssigned' => 'Engineer Assigned',
            'DateOfIncident' => 'Date Of Incident',
            'SubjectForComplaint' => 'Subject For Complaint',
            'Description' => 'Description',
            'status' => 'Status',
        ];
    }
}
