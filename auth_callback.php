<?php
$config = require_once("config.php");
if($_REQUEST['state'] == 'code'){
    $code = $_REQUEST['code'];
    $url = "https://github.com/login/oauth/access_token";
    $redirect_uri = "http://auth.siburuxue.com/auth_callback.php";
    $url = $url."?client_id=".$config['github']['app_id']."&client_secret=".$config['github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($redirect_uri)."&state=token";
    //��ʼ��
    $curl = curl_init();
    //����ץȡ��url
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_HEADER,['Accept:application/json']);
    //����ͷ�ļ�����Ϣ��Ϊ���������
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //���û�ȡ����Ϣ���ļ�������ʽ���أ�������ֱ�������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //ִ������
    $data = curl_exec($curl);
    //�ر�URL����
    curl_close($curl);
    //��ʾ��õ�����
    echo $data;
}
