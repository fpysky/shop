<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Exceptions\InvalidRequestException;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * @api {get} /api/payment/{id}/alipay 04.订单支付
     * @apiName payByAlipay
     * @apiGroup 04Order
     *
     * @apiParam {Number}  id    M 订单ID
     */
    public function payByAlipay($id, Request $request)
    {
        $order = Order::where('id','=',$id)->first();
        if(empty($order)){
            return response(['status_code' => 1,'message' => '找不到此订单']);
        }
        // 判断订单是否属于当前用户
        // $this->authorize('own', $order);
        // 订单已支付或者已关闭
        if ($order->paid_at || $order->closed) {
            throw new InvalidRequestException('订单状态不正确');
        }

        // 调用支付宝的网页支付
        return app('alipay')->web([
            'out_trade_no' => $order->no, // 订单编号，需保证在商户端不重复
            'total_amount' => $order->total_amount, // 订单金额，单位元，支持小数点后两位
            'subject'      => '支付 Shop 的订单：'.$order->no, // 订单标题
        ]);
    }

    /**
     * @api {get} /api/payment/alipay/return 05.支付成功前端回调
     * @apiName return
     * @apiGroup 04Order
     *
     * @apiSuccessExample {json} 成功返回
     *     HTTP/1.1 200
     *     {
                'status_code':0,
     *          'message':'付款成功'
     *     }
     */
    public function alipayReturn()
    {
        try {
            app('alipay')->verify();
        } catch (\Exception $e) {
            return response(['status_code' => 1,'message' => '数据不正确']);
        }
        return response(['status_code' => 0,'message' => '付款成功']);
    }

    // 服务器端回调
    public function alipayNotify()
    {
        // 校验输入参数
        $data  = app('alipay')->verify();
        // $data->out_trade_no 拿到订单流水号，并在数据库中查询
        $order = Order::where('no', $data->out_trade_no)->first();
        // 正常来说不太可能出现支付了一笔不存在的订单，这个判断只是加强系统健壮性。
        if (!$order) {
            return 'fail';
        }
        // 如果这笔订单的状态已经是已支付
        if ($order->paid_at) {
            // 返回数据给支付宝
            return app('alipay')->success();
        }

        $order->update([
            'paid_at'        => Carbon::now(), // 支付时间
            'payment_method' => 'alipay', // 支付方式
            'payment_no'     => $data->trade_no, // 支付宝订单号
        ]);

        return app('alipay')->success();
    }
}
