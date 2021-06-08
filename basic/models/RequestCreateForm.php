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
class RequestCreateForm extends Request
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'idUser', 'idCategory', 'address', 'maxprice', 'photoBefore'], 'required', 'message' => 'Нужно заполнить поля'],
            [['description', 'status', 'reason'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory', 'maxprice'], 'integer'],
            ['photoBefore', 'file', 'extensions' => 'png, jpg, jpeg, bmp', 'maxSize' => 2 * 1024 * 1024, 'message' => 'Только png, jpg, jpeg, bmp с размером 2 МБ'],
            [['name', 'photoBefore', 'photoAfter', 'address'], 'string', 'max' => 255],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
        ];
    }
}
