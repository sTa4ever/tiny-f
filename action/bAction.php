<?php
/**
 * bAction.php
 * 
 * @package	bae-test
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */
class bAction extends BaseAction
{
    public function execute()
    {
        $db = dbProxy::getInstance('eNOCPlztKslnWPEPKktG');
        #$sql = 'select * from t_user';
        #$ret = $db->queryAllRows($sql);
        #$sql = 'select * from t_user';
        #$ret = $db->queryAllRows($sql);
        $sql = 'select count(*) from t_user';
        $ret = $db->querySpecifiedField($sql, true);
        echo json_encode($ret);
    }
    
    
}