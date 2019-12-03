<?php

use yii\db\Migration;

/**
 * Class m191203_131441_garages
 */
class m191203_131441_garages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%garages}}', [
            'garage_id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),

            'hourly_price' => $this->decimal()->notNull(),
            'currency' => $this->string(3)->notNull(),
            'contact_email' => $this->string()->notNull(),
            'country' => $this->string()->notNull(), // *
            'point' => $this->string()->notNull(), // *

            'owner_id' => $this->integer()->notNull(), // *
            'garage_owner' => $this->string()->notNull(), // *

        ], $tableOptions);

        // index
        $this->createIndex('garage_name', '{{%garages}}', 'name');
        $this->createIndex('garage_country', '{{%garages}}', 'country');
        $this->createIndex('garage_point', '{{%garages}}', 'point');

        // insert demo data
        $this->insert('{{%garages}}', [
            'name'=>'Tampere Rautatientori',
            'garage_owner'=>'AutoPark',
            'hourly_price'=>2,
            'currency'=>'€',
            'contact_email'=>'test@email.com',
            'country'=>'Finland',
            'point'=>'60.168607847624095 24.932371066131623',
            'owner_id'=>rand(100000, 999999)
        ]);
        $this->insert('{{%garages}}', [
            'name'=>'Punavuori Garage',
            'garage_owner'=>'AutoPark',
            'hourly_price'=>1.5,
            'currency'=>'€',
            'contact_email'=>'test@email.com',
            'country'=>'Finland',
            'point'=>'60.162562 24.939453',
            'owner_id'=>rand(100000, 999999)
        ]);
        $this->insert('{{%garages}}', [
            'name'=>'Unknown',
            'garage_owner'=>'AutoPark',
            'hourly_price'=>3,
            'currency'=>'€',
            'contact_email'=>'test@email.com',
            'country'=>'Finland',
            'point'=>'60.16444996645511 24.938178168200714',
            'owner_id'=>rand(100000, 999999)
        ]);
        $this->insert('{{%garages}}', [
            'name'=>'Fitnesstukku',
            'garage_owner'=>'AutoPark',
            'hourly_price'=>3,
            'currency'=>'€',
            'contact_email'=>'test@email.com',
            'country'=>'Finland',
            'point'=>'60.165219358852795 24.93537425994873',
            'owner_id'=>rand(100000, 999999)
        ]);
        $this->insert('{{%garages}}', [
            'name'=>'Kauppis',
            'garage_owner'=>'AutoPark',
            'hourly_price'=>3,
            'currency'=>'€',
            'contact_email'=>'test@email.com',
            'country'=>'Finland',
            'point'=>'60.17167429490068 24.921585662024363',
            'owner_id'=>rand(100000, 999999)
        ]);
        $this->insert('{{%garages}}', [
            'name'=>'Q-Park1',
            'garage_owner'=>'AutoPark',
            'hourly_price'=>2,
            'currency'=>'€',
            'contact_email'=>'test@email.com',
            'country'=>'Finland',
            'point'=>'60.16867390148751 24.930162952045407',
            'owner_id'=>rand(100000, 999999)
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('garages');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191203_131441_garages cannot be reverted.\n";

        return false;
    }
    */
}
