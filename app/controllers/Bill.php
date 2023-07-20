<?php
class Bill extends Controller
{
    public $InvoiceModel;

    function __construct()
    {
        if (isset($_SESSION['admin'])) {
            if ($this->checkAdmin()) {
                header('location: ./Dashboard');
            }
        } else {
            header('location: ./LogoutAdmin');
        }
        $this->InvoiceModel = $this->callModel('InvoiceModel');
    }

    public function Show()
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'ListBillPage',
                'ListBill' => $this->InvoiceModel->GetBill(),
            ]
        );
    }

    public function DetailBill($id)
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'DetailBillPage',
                'DetailBill' => $this->InvoiceModel->BillDetailById($id),
                'BillId' => $this->InvoiceModel->BillById($id),

            ]
        );
    }

    function ShowUpdateBill($id)
    {
        $this->callView(
            'MasterAdmin',
            [
                'Page' => 'UpdateBillPage',
                'BillId' => $this->InvoiceModel->BillById($id),
            ]
        );
    }

    public function UpdateBill()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = $_POST['status'];
            $id = $_POST['id'];
            $res = $this->InvoiceModel->UpdateBill($status, $id);
            if ($res) {
                header('location: ./');
            }
        } else {
            $this->callView(
                'MasterAdmin',
                [
                    'Page' => 'UpdateBillPage',
                ]
            );
        }
    }
}
