<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Cache;
use App\Notifications\EmailVerificationNotification;

class EmailVerificationController extends Controller
{
    /**
     * @api {post} /api/email_verification/send 06.发送验证邮件
     * @apiName email_verificationSend
     * @apiGroup 02Auth
     *
     * @apiParam {String} id              M   用户ID
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "message": "邮件发送成功",
     *       "status_code":0,
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 400
     *     {
     *          "message": "你已经验证过邮箱了",
     *          "status_code": 400
     *      }
     */
    public function send(Request $request)
    {
        $id = intval($request->input('id',0));
        if($id == 0){
            return response(['status_code' => 1,'message' => '用户ID不能为空'],422);
        }
        $user = User::find($id);
        if(empty($user)){
            return response(['status_code' => 1,'message' => '找不到此用户'],422);
        }
        // 判断用户是否已经激活
        if ($user->email_verified) {
            return response(['status_code' => 400,'message' => '你已经验证过邮箱了'],400);
        }
        // 调用 notify() 方法用来发送我们定义好的通知类
        $user->notify(new EmailVerificationNotification());

        return response(['status_code' => 0,'message' => '邮件发送成功']);
    }

    /**
     * @api {get} /api/email_verification/verify 07.验证邮箱
     * @apiName email_verificationVerify
     * @apiGroup 02Auth
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
     *       "message": "邮箱验证成功",
     *       "status_code":0,
     *     }
     * @apiErrorExample {json} 错误返回
     *     HTTP/1.1 400
     *     {
     *          "message": "验证链接不正确或已过期",
     *          "status_code": 1
     *      }
     */
    public function verify(Request $request)
    {
        // 从 url 中获取 `email` 和 `token` 两个参数
        $email = $request->input('email');
        $token = $request->input('token');
        // 如果有一个为空说明不是一个合法的验证链接，直接抛出异常。
        if (!$email || !$token) {
            return response(['status_code' => 1,'message' => '验证链接不正确'],400);
        }
        // 从缓存中读取数据，我们把从 url 中获取的 `token` 与缓存中的值做对比
        // 如果缓存不存在或者返回的值与 url 中的 `token` 不一致就抛出异常。
        if ($token != Cache::get('email_verification_'.$email)) {
            return response(['status_code' => 1,'message' => '验证链接不正确或已过期'],400);
        }

        // 根据邮箱从数据库中获取对应的用户
        // 通常来说能通过 token 校验的情况下不可能出现用户不存在
        // 但是为了代码的健壮性我们还是需要做这个判断
        if (!$user = User::where('email', $email)->first()) {
            return response(['status_code' => 1,'message' => '用户不存在'],400);
        }
        // 将指定的 key 从缓存中删除，由于已经完成了验证，这个缓存就没有必要继续保留。
        Cache::forget('email_verification_'.$email);
        // 最关键的，要把对应用户的 `email_verified` 字段改为 `true`。
        $user->update(['email_verified' => true]);

        // 最后告知用户邮箱验证成功。
        return response(['status_code' => 0,'message' => '邮箱验证成功']);
    }
}
