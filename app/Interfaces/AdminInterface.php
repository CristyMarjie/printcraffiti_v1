<?php

namespace App\Interfaces;

interface AdminInterface
{
    public function createUser($request);

    public function viewUsers($request);

    public function updateUserInformation($request, int $id = null);

    public function updateUserCredentials($request, int $id = null);

    public function viewLogDetails(int $id);

    public function viewfinanceLogsDetails();

    public function actionUserUpdate($request, $id);

    public function storeRequest($request);

    public function validateEmail($validatedEmail,$isProfile, $currentID);

    public function fetchTenantMaster($tenantID);

    public function removeSoa($id);

    public function removeOR($id);

    public function removeOthers($id);
}
