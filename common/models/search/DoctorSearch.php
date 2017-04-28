<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Doctor;

/**
 * DoctorSearch represents the model behind the search form about `common\models\Doctor`.
 */
class DoctorSearch extends Doctor
{
    /**
     * @inheritdoc
     */
    public $dep_name;
    public function rules()
    {
        return [
            [['id', 'sex', 'department_id', 'add_time', 'verify_time', 'status', 'show_index', 'mobile', 'age', 'province_id', 'city_id', 'area_id'], 'integer'],
            [['username', 'email', 'id_card', 'bank_card', 'bank_name', 'open_bank', 'skill_disease', 'id_card_front', 'id_card_back', 'doc_certification', 'practicing_certificate', 'highest_professional', 'address', 'practice_experience', 'academic_post'], 'safe'],
            [['dep_name'], 'safe'],
            ];
    }

    /**
     * @inheritdoc
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
        $query = Doctor::find();
        $query->joinWith(['department']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'pagination' => [
            'pageSize' => 10,
            ],
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
            'sex' => $this->sex,
            'department_id' => $this->department_id,
            'add_time' => $this->add_time,
            'verify_time' => $this->verify_time,
            'status' => $this->status,
            'show_index' => $this->show_index,
            'mobile' => $this->mobile,
            'age' => $this->age,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'area_id' => $this->area_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'id_card', $this->id_card])
            ->andFilterWhere(['like', 'bank_card', $this->bank_card])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'open_bank', $this->open_bank])
            ->andFilterWhere(['like', 'skill_disease', $this->skill_disease])
            ->andFilterWhere(['like', 'id_card_front', $this->id_card_front])
            ->andFilterWhere(['like', 'id_card_back', $this->id_card_back])
            ->andFilterWhere(['like', 'doc_certification', $this->doc_certification])
            ->andFilterWhere(['like', 'practicing_certificate', $this->practicing_certificate])
            ->andFilterWhere(['like', 'highest_professional', $this->highest_professional])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'practice_experience', $this->practice_experience])
            ->andFilterWhere(['like', 'academic_post', $this->academic_post]);
         $query->andFilterWhere(['like', '{{%department}}.dep_name', $this->dep_name]) ;
        return $dataProvider;
    }
}
