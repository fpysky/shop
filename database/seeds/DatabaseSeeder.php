<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //商品分类
        DB::table('product_classifies')->insert([[
            'id' => 1,
            'name' => '手机',
            'pid' => 0,
        ],[
            'id' => 2,
            'name' => '魅族手机',
            'pid' => 1,
        ],[
            'id' => 3,
            'name' => '魅蓝手机',
            'pid' => 1,
        ],[
            'id' => 4,
            'name' => '智能设备',
            'pid' => 0,
        ],[
            'id' => 5,
            'name' => '智能手环',
            'pid' => 4,
        ],[
            'id' => 6,
            'name' => '智能生活',
            'pid' => 4,
        ],[
            'id' => 7,
            'name' => '智能VR',
            'pid' => 4,
        ],[
            'id' => 8,
            'name' => '智能家电',
            'pid' => 4,
        ],[
            'id' => 9,
            'name' => '游戏设备',
            'pid' => 0,
        ],[
            'id' => 10,
            'name' => '游戏手柄',
            'pid' => 9,
        ],[
            'id' => 11,
            'name' => '散热器',
            'pid' => 9,
        ],[
            'id' => 12,
            'name' => '游戏耳机',
            'pid' => 9,
        ],[
            'id' => 13,
            'name' => '游戏键鼠',
            'pid' => 9,
        ],[
            'id' => 14,
            'name' => '按键',
            'pid' => 9,
        ],[
            'id' => 15,
            'name' => '数码影音',
            'pid' => 0,
        ],[
            'id' => 16,
            'name' => '魅族耳机',
            'pid' => 15,
        ],[
            'id' => 17,
            'name' => '魅族推荐',
            'pid' => 15,
        ],[
            'id' => 18,
            'name' => '音响',
            'pid' => 15,
        ],[
            'id' => 19,
            'name' => '手机周边',
            'pid' => 0,
        ],[
            'id' => 20,
            'name' => '数据线',
            'pid' => 19,
        ],[
            'id' => 21,
            'name' => '保护套 / 后盖 / 贴膜',
            'pid' => 19,
        ],[
            'id' => 22,
            'name' => '移动电源',
            'pid' => 19,
        ],[
            'id' => 23,
            'name' => '电话卡',
            'pid' => 19,
        ],[
            'id' => 24,
            'name' => '存储卡',
            'pid' => 19,
        ],[
            'id' => 25,
            'name' => '自拍杆',
            'pid' => 19,
        ],[
            'id' => 26,
            'name' => '生活周边',
            'pid' => 0,
        ],[
            'id' => 27,
            'name' => '背包',
            'pid' => 26,
        ],[
            'id' => 28,
            'name' => '趣味零食',
            'pid' => 26,
        ],[
            'id' => 29,
            'name' => '枕头',
            'pid' => 26,
        ],[
            'id' => 30,
            'name' => '垃圾桶',
            'pid' => 26,
        ],[
            'id' => 31,
            'name' => '挂钩',
            'pid' => 26,
        ],[
            'id' => 32,
            'name' => '眼镜 / 眼罩',
            'pid' => 26,
        ],[
            'id' => 33,
            'name' => '毛球修剪器',
            'pid' => 26,
        ],[
            'id' => 34,
            'name' => '个护健康',
            'pid' => 0,
        ],[
            'id' => 35,
            'name' => '剃须刀 / 刀头',
            'pid' => 34,
        ],[
            'id' => 36,
            'name' => '美发工具',
            'pid' => 34,
        ],[
            'id' => 37,
            'name' => '电动牙刷',
            'pid' => 34,
        ],[
            'id' => 38,
            'name' => '体重秤',
            'pid' => 34,
        ],[
            'id' => 39,
            'name' => '清洁美容',
            'pid' => 34,
        ],[
            'id' => 40,
            'name' => '居家用品',
            'pid' => 0,
        ],[
            'id' => 41,
            'name' => '水杯',
            'pid' => 40,
        ],[
            'id' => 42,
            'name' => '清洁用品',
            'pid' => 40,
        ],[
            'id' => 43,
            'name' => '收纳用品',
            'pid' => 40,
        ],[
            'id' => 44,
            'name' => '厨房用品',
            'pid' => 40,
        ],[
            'id' => 45,
            'name' => '生活用品',
            'pid' => 40,
        ],[
            'id' => 46,
            'name' => '餐具',
            'pid' => 40,
        ]]);

        //用户表d
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'a',
            'password' => encrypt('111111'),
            'email' => 'a@a.com'
        ]);
    }
}
