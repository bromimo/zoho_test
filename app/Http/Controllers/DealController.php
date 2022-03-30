<?php

namespace App\Http\Controllers;

use Asciisd\Zoho\ZohoModule;
use zcrmsdk\crm\crud\ZCRMModule;
use App\Http\Requests\DealCreate;
use App\Http\Requests\TaskCreate;
use Asciisd\Zoho\Facades\ZohoManager;

class DealController extends Controller
{
    public function index()
    {
        $user = ZohoManager::currentOrg()->getCurrentUser()[0];
        $deals = ZohoManager::useModule('Deals')->getRecords();

        return view('index', compact([
            'user',
            'deals'
        ]));
    }

    public function create()
    {
        $user = ZohoManager::currentOrg()->getCurrentUser()[0];
        $accounts = ZohoManager::useModule('Accounts')->getRecords();

        return view('deal.create', compact([
            'user',
            'accounts'
        ]));
    }

    public function store(DealCreate $request)
    {
        $user = ZohoManager::currentOrg()->getCurrentUser()[0];

        $deals = ZohoManager::useModule('Deals');
        $deal = $deals->getRecordInstance();

        $deal->setOwner($user);
        $deal->setCreatedBy($user);

        $deal->setFieldValue('Deal_Name', $request->input('Deal_Name'));
        $deal->setFieldValue('Account_Name', $request->input('Account_Name'));
        $deal->setFieldValue('Type', $request->input('Type'));
        $deal->setFieldValue('Amount', $request->input('Amount'));
        $deal->setFieldValue('Closing_Date', $request->input('Closing_Date'));
        $deal->setFieldValue('Stage', $request->input('Stage'));
        $deal->setFieldValue('Probability', $request->input('Probability'));
        $deal->setFieldValue('Description', $request->input('Description'));

        $deal_id = $deal->create()->getData()->getEntityId();

        return \redirect('/deal/' . $deal_id . '/task/create');
    }

    public function createTask($deal_id)
    {
        $user = ZohoManager::currentOrg()->getCurrentUser()[0];
        $deal = ZohoManager::useModule('Deals')->getRecord($deal_id);
        $who_id = $deal->getFieldValue('Account_Name');
        $deal_name = $deal->getFieldValue('Deal_Name');

        return view('task.create', compact([
            'user',
            'deal_id',
            'deal_name',
            'who_id'
        ]));
    }

    public function storeTask(TaskCreate $request)
    {
        $user = ZohoManager::currentOrg()->getCurrentUser()[0];

        $tasks = ZohoManager::useModule('Tasks');
        $task = $tasks->getRecordInstance();
//        $task = $tasks->getRecords()[27];
//        dd($task);
//        $task->setEntityId(null);
        $task->setOwner($user);
        $task->setCreatedBy($user);

        $account = ZohoManager::useModule('Accounts')->getRecord($request->input('Who_Id'));
        $contact = $account->getRelatedListRecords('Contacts')->getData()[0];

        $deal = ZohoManager::useModule('Deals')->getRecord($request->input('What_Id'));

        $task->setFieldValue('Subject', $request->input('Subject'));
        $task->setFieldValue('Due_Date', $request->input('Due_Date'));
        $task->setFieldValue('Who_Id', $contact);
        $task->setFieldValue('What_Id', $deal);
        $task->setFieldValue('Status', $request->input('Status'));
        $task->setFieldValue('Priority', $request->input('Priority'));
        $task->setFieldValue('Description', $request->input('Description'));
//        dd($task);
        $task_id = $task->create();

        dd($task_id);

        return \redirect('/deal/' . $deal_id . '/task/create');
    }
}
