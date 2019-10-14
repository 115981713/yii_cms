<?php
    namespace common\models;
    use yii\base\Model;
    use Yii;
    
    class Test extends Model{
        public static function test(){

        }

        /**
         * 事务
         * @param 
         * @return 
         */
        public static function transaction(){
            $transaction = Yii::$app->db->beginTransaction();

            try {
                a;@
                $transaction->commit();
            } catch (\Exception $e) {
                echo 1;
                $transaction->rollBack();
                $this->lastError = $e->getMessage();
            }
        }

    }