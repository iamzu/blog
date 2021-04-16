<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BillType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bill-type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $types = '{"0":"餐饮","1":"三餐","2":"早餐","3":"中餐","4":"晚餐","5":"买菜","6":"水果","7":"零食","8":"加餐","9":"下午茶","10":"烟酒饮品","11":"粮油调料","13":"交通","14":"公交地铁","15":"打车","16":"私家车","17":"飞机火车","18":"共享单车","20":"购物","21":"日用品","22":"衣帽鞋包","23":"护肤美妆","24":"饰品","25":"数码","26":"电器","27":"家装","29":"居家","30":"水电煤","31":"话费","32":"网费","33":"房租","34":"物业","35":"维修","37":"人情","38":"送礼","39":"请客","40":"孝心","41":"亲密付","42":"发红包","43":"借出","44":"还钱","46":"医疗","47":"药品","48":"保健","49":"治疗","50":"美容","52":"娱乐","53":"休闲","54":"约会","55":"聚会","56":"游戏","57":"健身","59":"学习","60":"书籍","61":"培训","62":"网课","64":"金融","65":"房贷","66":"车贷","67":"购物分期","68":"手续费","69":"保险","70":"养卡","72":"其他","73":"旅游","74":"装修","75":"宝宝","76":"生意","77":"宠物","78":"坏账","79":"丢失"}';
       $types = json_decode($types,true);

       $data = [];
       foreach ($types as $k => $v){
           $data[] = [
               'tag' => $v,
           ];
       }
       \App\Models\BillType::query()->insert($data);
       $this->info('SUCCESS');
    }
}
