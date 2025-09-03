<?php
namespace App\Controllers;

use App\Models\Laptop_service;

class Service extends Secure_Controller
{
    protected Laptop_service $service;

    public function __construct()
    {
        parent::__construct('services');
        $this->service = model(Laptop_service::class);
    }

    public function getIndex(): void
    {
        $data['table_headers'] = get_services_manage_table_headers();
        echo view('services/manage', $data);
    }

    public function getView(int $id = NEW_ENTRY): void
    {
        $data['service_info'] = $this->service->get_info($id);
        echo view('services/form', $data);
    }

    public function postSave(int $id = NEW_ENTRY): void
    {
        $service_data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'device_type' => $this->request->getPost('device_type'),
            'issue_description' => $this->request->getPost('issue_description'),
            'status' => $this->request->getPost('status'),
        ];

        if ($this->service->save_value($service_data, $id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
}
