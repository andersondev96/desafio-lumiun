<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainRequest;
use App\Models\Domain;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $domains = Domain::orderBy('id');

        if ($request->name) {
            $domains->where('name', 'like', "%$request->name%");
        }

        $domains = $domains->simplePaginate(10);

        return view('domains.index', ['domains' => $domains]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id')->get();
        return view('domains.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DomainRequest $request)
    {

        $domain = Domain::create([
            'domain_id' => rand(10000000, 9999999999).'_DOMAIN_CON_ID'.date('YmdHis'),
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->url,
            'server_name' => $request->server_name,
            'organization_name' => $request->organization_name,
            'email_organization' => $request->email_organization,
            'phone_organization' => $request->phone_organization,
            'category_id' => $request->category_id,
            'expiration_date' => Carbon::createFromFormat('d/m/Y', $request->expiration_date)->format('Y-m-d'),
        ]);

        $domain->save();
        session()->flash('message', 'Domínio criado com sucesso');
        return redirect()->route('domains.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        return view('domains.show', ['domain' => $domain]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        $categories = Category::orderBy('id')->get();

        return view('domains.edit', ['domain' => $domain, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        $domain->update([
            'domain_id' => $domain->domain_id,
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->url,
            'server_name' => $request->server_name,
            'organization_name' => $request->organization_name,
            'email_organization' => $request->email_organization,
            'phone_organization' => $request->phone_organization,
            'category_id' => $request->category_id,
            'expiration_date' => Carbon::createFromFormat('d/m/Y', $request->expiration_date)->format('Y-m-d'),
        ]);

        $domain->save();
        session()->flash('message', 'Domínio atualizado com sucesso');
        return redirect()->route('domains.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        session()->flash('remove', 'Domínio excluído com sucesso');
        return redirect()->route('domains.index');
    }
}
