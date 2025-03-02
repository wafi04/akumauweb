<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pembelian;
use App\Models\Layanan;
use App\Http\Controllers\JstoreController as JS;

class Jstore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js';

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
        $orders = Pembelian::where('status', 'Pending')->get();
        
        if(!$orders){
            return "DONE";
        }
        
        $js = new JS;
        
        foreach($orders as $order){
            $layanan = Layanan::where('layanan', $order->layanan)->where('provider', 'jstoregame')->first();
            
            if(!$layanan) continue;

            $order->update([
                'status' => 'Processing'
            ]);
            
            $provider_ids = explode('|',$layanan->provider_id);
            $total_denom = count($provider_ids);
            $denom_ordered = 0;
            
            foreach($provider_ids as $provider_id){
                $buyGp = $js->order($order->order_id, $provider_id, $order->user_id, $order->zone);
                
                if($buyGp['status']){
                    $poid[] = $buyGp['id'];
                    $denom_ordered++;
                }else{
                    $poid[] = $buyGp['message'];
                }
            }    
            
            if($denom_ordered == $total_denom){
                $buy['status'] = true;
                $success = true;
            }else if($denom_ordered > 0 && $denom_ordered < $total_denom){
                $buy['status'] = true;
            }else{
                $buy['status'] = false;
            }               
            
            $buy['data']['sn'] = $order->nickname.'/'.$order->order_id.'/-';
            $buy['id'] = implode(',', $poid);
            $buy['data']['status'] = $buy['status'] ? "Pending" : "Error";
            
            if($buy['data']['status'] == "Pending"){
                $order->update([
                    'provider_order_id' => $buy['id'],
                    'log' => json_encode($buy),
                    'status' => 'Success'
                ]);
            }else{
                $order->update([
                    'provider_order_id' => $buy['id'],
                    'log' => json_encode($buy),
                    'status' => 'Error'
                ]);
            }
        }
        
        return 0;
    
    }
}
