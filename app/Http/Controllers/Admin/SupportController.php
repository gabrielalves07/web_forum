<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Services\SupportService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        // supports is an object of Class "PaginationPresenter"
        // we have access of all methods of the Class above
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin.supports.index', compact('supports', 'filters'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function show(string $id)
    {
        if(!$support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));

    }

    public function edit(string $id)
    {
        //if(!$support = $support->where('id', '=', $id)->first()) {
        if(!$support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, string $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if(!$support) {
            return redirect()->back();
        }

        return redirect()->route('supports.index');

    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
