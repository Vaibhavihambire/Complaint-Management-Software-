<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserComplaint;

/**
 * UserComplaintSearch represents the model behind the search form of `app\models\UserComplaint`.
 */
class UserComplaintSearch extends UserComplaint
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'comid', 'BlockNo', 'sent2eng', 'created_by'], 'integer'],
            [['NameOfEmployee', 'EmailOfEmployee', 'Department', 'ComplaintCategory', 'EngineerAssigned', 'DateOfIncident', 'SubjectForComplaint', 'Description', 'status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserComplaint::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'comid' => $this->comid,
            'BlockNo' => $this->BlockNo,
            'DateOfIncident' => $this->DateOfIncident,
            'sent2eng' => $this->sent2eng,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'NameOfEmployee', $this->NameOfEmployee])
            ->andFilterWhere(['like', 'EmailOfEmployee', $this->EmailOfEmployee])
            ->andFilterWhere(['like', 'Department', $this->Department])
            ->andFilterWhere(['like', 'ComplaintCategory', $this->ComplaintCategory])
            ->andFilterWhere(['like', 'EngineerAssigned', $this->EngineerAssigned])
            ->andFilterWhere(['like', 'SubjectForComplaint', $this->SubjectForComplaint])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
