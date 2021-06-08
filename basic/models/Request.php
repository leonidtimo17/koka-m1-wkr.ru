<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $timestamp
 * @property int $idUser
 * @property int $idCategory
 * @property string $status
 * @property string|null $photoBefore
 * @property string|null $photoAfter
 * @property string|null $reason
 * @property string $address
 * @property int $maxprice
 *
 * @property User $idUser0
 * @property Category $idCategory0
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'idUser', 'idCategory', 'address', 'maxprice'], 'required'],
            [['description', 'status', 'reason'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory', 'maxprice'], 'integer'],
            [['name', 'photoBefore', 'photoAfter', 'address'], 'string', 'max' => 255],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
//            'name' => 'Name',
            'description' => 'Описание',
            'timestamp' => 'Временная метка',
//            'idUser' => 'Id User',
            'idCategory' => 'Категория заявки',
            'status' => 'Статус заявки',
//            'photoBefore' => 'Photo Before',
//            'photoAfter' => 'Photo After',
//            'reason' => 'Reason',
            'address' => 'Адрес помещения',
            'maxprice' => 'Согласованная цена',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
     * Gets query for [[IdCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }
}
