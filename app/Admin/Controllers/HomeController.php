<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Box;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Requests;
use App\User;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $requestsCount = Requests::where('status_id',1)->count();
        $infoBoxRequests = new InfoBox('New Requests', 'requests', 'yellow', '/admin/requests', $requestsCount);

        $usersCount = User::where('is_active',1)->count();
        $infoBoxUsers = new InfoBox('Active Users', 'users', 'yellow', '/admin/users', $usersCount);

        return $content
            ->title('Dashboard')
            ->row(function (Row $row) use ($infoBoxRequests,$infoBoxUsers) {
                $row->column(6, function (Column $column) use ($infoBoxRequests) {
                    $column->append($infoBoxRequests->render());
                });
                $row->column(6, function (Column $column) use ($infoBoxUsers) {
                    $column->append($infoBoxUsers->render());
                });

                $paidRequests= Requests::where('payment_status_id',1)->count();

                $notPaidRequests= Requests::where('payment_status_id',2)->count();

                $pendingRequests= Requests::where('payment_status_id',null)->where('status_id',1)->count();

                $dataset = [
                    'paidRequests' => $paidRequests,
                    'notPaidRequests'  => $notPaidRequests,
                    'pendingRequests'  => $pendingRequests
                ];

                $requestsPie = view( 'admin.charts.pieRequest', ['dataset' => $dataset] );
                $row->column( 12, new Box( 'Requests', $requestsPie ) );
            });
    }
    public function notifiyOrder(Request $request)
    {
        if(\Auth::guard('admin')){
            $notifications =  Notification::where('admin_read',0)->get();
            return $notifications;
        }
        return;

    }
}
