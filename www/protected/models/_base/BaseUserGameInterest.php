<?php

/**
 * This is the model base class for the table "user_game_interest".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserGameInterest".
 *
 * Columns in table "user_game_interest" available as properties of the model,
 * followed by relations of table "user_game_interest" available as properties of the model.
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $game_id
 * @property string $interest
 * @property string $created
 *
 * @property User $user
 * @property Game $game
 */
abstract class BaseUserGameInterest extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_game_interest';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserGameInterest|UserGameInterests', $n);
	}

	public static function representingColumn() {
		return 'interest';
	}

	public function rules() {
		return array(
			array('user_id, game_id, interest, created', 'required'),
			array('user_id, game_id', 'numerical', 'integerOnly'=>true),
			array('interest', 'length', 'max'=>255),
			array('id, user_id, game_id, interest, created', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'user_id' => null,
			'game_id' => null,
			'interest' => Yii::t('app', 'Interest'),
			'created' => Yii::t('app', 'Created'),
			'user' => null,
			'game' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('game_id', $this->game_id);
		$criteria->compare('interest', $this->interest, true);
		$criteria->compare('created', $this->created, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination'=>array(
        'pageSize'=>Yii::app()->fbvStorage->get("settings.pagination_size"),
      ),
		));
	}
}