<?php
/**
 * Created by yang
 * User: bonzaphp@gmail.com
 * Date: 2019-06-27
 * Time: 11:43
 */

namespace bonza\fdd;

use bonza\fdd\api\FddApi3;

/**
 * @method accountRegister(...$string): array 用户或企业 获取客户编码
 * @method getCompanyVerifyUrl(...$string): array 获取企业实名认证地址
 * @method getPersonVerifyUrl(...$string): array 获取个人实名认证地址
 * @method applyCert(...$string): array 实名证书申请
 * @method applyNumCert(...$string): array 编号证书申请
 * @method addSignature(...$string): array 印章 新增用户签章图片
 * @method customSignature(...$string): array 新增用户签章 自定义印章
 * @method uploadDocs(...$string): array 合同上传
 * @method uploadTemplate(...$string): array 模板上传
 * @method viewTemplate(...$string): array 查看模版
 * @method templateDownload(...$string): array 下载模版
 * @method templateDelete(...$string): array 模版删除
 * @method generateContract(...$string): array 模板填充
 * @method extSignAuto(...$string): array 自动签署
 * @method extSign(...$string): array 手动签署接口
 * @method viewContract(...$string): string 此接口将打开 合同查看
 * @method downLoadContract(...$string): array 合同下载
 * @method contractFiling(...$string): array 合同归档
 * @method findPersonCertInfo(...$string): array 查询个人实名认证信息
 * @method findCompanyCertInfo(...$string): array 查询企业实名认证信息
 * @method getFile(...$string): array 通过 uuid 下载文件
 * @method hashDeposit(...$string): array 实名信息哈希存证
 * @method personDeposit(...$string): array 个人实名信息存证
 * @method threeElementVerifyMobile(...$string): array 三要素身份验证
 * @method companyDeposit(...$string): array 对企业信息实名存证
 * @method applyClientNumCert(...$string): array 编号证书申请
 * @method verifySign(array $data): bool 回调验签
 * @method authorization($companyId, $personId, $operateType = 1) 授权/取消授权
 * @method contractCallBackVerifySign(array  $data): bool 合同签署回调验签
 * @method contractStatus($contractId): array 合同状态查询
 * @method getTemplateKeys($templateId): array 查看合同模板可用keys
 *
 */
class Fdd
{

    private $fdd = null;

    public function __construct($options)
    {
        $this->fdd = new FddApi3($options);
    }

    /**
     * 代理接口请求到具体的实例“
     * @param $name
     * @param $arguments
     * @return mixed
     * @author bonzaphp@gmail.com
     */
    public function __call($name, $arguments)
    {
        return $this->fdd->$name(...$arguments);
    }


}