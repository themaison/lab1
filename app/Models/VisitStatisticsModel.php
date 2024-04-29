<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;

class VisitStatisticsModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'visit_statistics';
    protected $fillable = ['time_statistic', 'web_page', 'ip_address', 'host_name', 'browser_name'];

    public static function save_statistic($page)
    {
        $agent = new Agent();

        // Получение названия браузера и его версии
        $browser = $agent->browser();
        $version = $agent->version($browser);

        $statistic = new VisitStatisticsModel;
        $statistic->time_statistic = date('Y-m-d H:i:s');
        $statistic->web_page = $page;
        $statistic->ip_address = Request::ip();
        $statistic->host_name = gethostbyaddr(Request::ip());
        $statistic->browser_name = "$browser/$version";
        //$statistic->browser_name = Request::header('User-Agent');
        $statistic->save();
    }
}
