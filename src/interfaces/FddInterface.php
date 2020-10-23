<?php
/**
 * Created by yang
 * User: bonzaphp@gmail.com
 * Date: 2019-07-01
 * Time: 15:47
 */

namespace bonza\fdd\interfaces;


Interface FddInterface
{
    public function accountRegister(string $open_id, int $account_type = 1): array;/*用户或企业账号 获取客户编码*/
    public function getCompanyVerifyUrl($customer_id, $notify_url, $legal_info, $page_modify = 1, $company_principal_type = 1): array;/*获取企业实名认证地址*/
    public function getPersonVerifyUrl($customer_id, $notify_url, $verified_way = 2, $page_modify = 1, $cert_flag = 0): array;/*获取个人实名认证地址*/
    public function applyCert($customer_id, $verified_serialno): array;/*实名证书申请*/
    public function applyNumCert($customer_id, $verified_serialno): array;/*编号证书申请*/
    public function addSignature($customer_id, $signature_img_base64): array;/*印章上传 新增用户签章图片*/
    public function customSignature($customer_id, $content): array;/*新增用户签章图片 自定义印章*/
    public function uploadDocs($contract_id, $doc_title, $file, $doc_url, $doc_type = '.pdf'): array;/*合同上传*/
    public function uploadTemplate($template_id, $file, $doc_url, $doc_type = '.pdf'): array;/*模板上传*/
    public function viewTemplate(string $template_id): string;/*查看合同模版*/
    public function templateDownload($template_id);/*下载合同模板*/
    public function templateDelete($template_id): array;/*模板删除*/
    public function generateContract($doc_title, $template_id, $contract_id, $parameter_map, $extra_param = []): array;/*模板填充*/
    public function extSignAuto($transaction_id, $contract_id, $customer_id, $client_role, $doc_title, $position_type, $sign_keyword, $keyword_strategy): array;/*自动签署*/
    public function extSign(string $transaction_id, string $contract_id, string $customer_id, string $doc_title, $return_url = '', $sign_keyword = ''): string;/*手动签署接口*/
    public function viewContract(string $contract_id): string;/*此接口将打开页面 合同查看*/
    public function downLoadContract(string $contract_id);/* 合同下载 */
    public function contractFiling($contract_id): array;/*合同归档*/
    public function findPersonCertInfo($verified_serialno): array;/*查询个人实名认证信息*/
    public function findCompanyCertInfo($verified_serialno): array;/*查询企业实名认证信息*/
    public function getFile($uuid): array;/*通过 uuid 下载文件*/
    /*实名信息哈希存证*/
    public function hashDeposit(string $customer_id, string $transaction_id, string $preservation_name, string $file_name, string $noper_time, string $file_size, string $original_sha25, int $cert_flag = 0): array;

    public function personDeposit(string $customer_id, string $name, string $idcard, string $mobile, string $preservation_name, string $preservation_data_provider, string $mobile_essential_factor, int $document_type = 0, int $cert_flag = 1, int $verified_type = 2): array;/*个人实名信息存证*/
    public function threeElementVerifyMobile(string $name, string $idcard, string $mobile): array;/*三要素身份验证*/
    public function companyDeposit($transaction_id, $company_customer_id, $company_preservation_name, $company_preservation_data_provider, $company_name, $credit_code, $credit_code_file, $company_principal_verifie_msg, $applyNum, $power_attorney_file, $document_type = 1, $verified_mode = 1, $company_principal_type = 1): array;/*对企业信息实名存证*/
    public function applyClientNumCert($customer_id, $evidence_no): array;/*编号证书申请*/
}