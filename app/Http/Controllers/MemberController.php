<?php

namespace App\Http\Controllers;

use App\Classes\CatchErrors;
use App\Http\Requests\MemberStoreRequest;
use App\Imports\MembersImport;
use App\Repositories\Member\MemberInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    protected $memberInterface;

    public function __construct(MemberInterface $memberInterface)
    {
        $this->memberInterface = $memberInterface;
    }

    public function index()
    {
        try {
            $members = $this->memberInterface->getPaginated();
            return view('member.index')->with(['members' => $members]);
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }


    public function create()
    {
        try {
            return view('member.create');
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }

    public function store(MemberStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::user()->id;
            $this->memberInterface->store($data);
            DB::commit();
            return redirect()->route('members.index')->with(['success' => 'Member registered']);
        } catch (Exception $e) {
            return CatchErrors::rollback($e);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->memberInterface->destroy($id);
            DB::commit();
            return redirect()->route('members.index')->with(['success' => 'Member deleted']);
        } catch (Exception $e) {
            return CatchErrors::rollback($e);
        }
    }

    public function show($id)
    {
        try {
            $member = $this->memberInterface->getById($id);
            return view('member.show', ['member' => $member]);
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }

    public function edit($id)
    {
        try {
            $member = $this->memberInterface->getById($id);
            return view('member.edit', ['member' => $member]);
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }

    public function update($id, MemberStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::user()->id;
            $this->memberInterface->update($id, $data);
            return redirect()->route('members.index')->with(['success' => 'Member updated']);
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }

    public function import(Request $request)
    {
        DB::beginTransaction();
        try {
            Excel::import(new MembersImport(), $request->file('file'));
            DB::commit();
            return redirect()->route('members.index')->with('success', 'Excel imported');
        } catch (Exception $e) {
            return CatchErrors::rollback($e);
        }
    }
}
