<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2019 Power Kernel
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "garages".
 *
 * @property int $garage_id
 * @property string $name
 * @property float $hourly_price
 * @property string $currency
 * @property string $contact_email
 * @property string $country
 * @property string $point
 * @property int $owner_id
 * @property string $garage_owner
 */
class Garage extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'garages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'hourly_price', 'currency', 'contact_email', 'country', 'point', 'owner_id', 'garage_owner'], 'required'],

            [['hourly_price'], 'number', 'min' => 0],
            [['owner_id'], 'integer'],

            [['name', 'contact_email', 'country', 'point', 'garage_owner'], 'string', 'max' => 255],

            [['currency'], 'string', 'max' => 3],

            [['contact_email'], 'email'],
            [['point'], 'match', 'pattern' => '/^(\-?\d+(\.\d+)?) \s*(\-?\d+(\.\d+)?)$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'garage_id' => 'Garage ID',
            'name' => 'Name',
            'hourly_price' => 'Hourly Price',
            'currency' => 'Currency',
            'contact_email' => 'Contact Email',
            'country' => 'Country',
            'point' => 'Point',
            'owner_id' => 'Owner ID',
            'garage_owner' => 'Garage Owner',
        ];
    }
}
