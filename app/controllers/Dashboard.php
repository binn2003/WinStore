<?php
class DashBoard extends Controller
{

    private $Total;
    function __construct()
    {
        if (isset($_SESSION['admin'])) {
            if ($this->checkAdmin()) {
               header('location: ./Dashboard');
            }
         }else{
            header('location: ./LogoutAdmin');
         }
        $this->Total = $this->callModel('DashboardModel');
    }

    function Show()
    {
        $this->callView('MasterAdmin', [
            'Page' => 'DashBoardPage',
            'Total' => $this->Total->GetDashboards(),
            'Product' => $this->Total->ProductStatistical(),
            'Post' => $this->Total->PostStatistical(),
        ]);
    }
}
