<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Dashboard\Admin\Suppliers\EditSupplierRequest;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return View('dashboard.admin.suppliers.list')->with([
            "term" => "",
            "title"     => "Manage Suppliers",
            "suppliers" => $suppliers->paginate(5)

        ]);
    }

    /**
     * Show the form for creating a new supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add New Supplier';
        return view('dashboard.admin.suppliers.create')->with([
            "title" => $title,
            "suppliers" => Supplier::all()
        ]);
    }

    /**
     * Store a newly created supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
        Supplier::create([
            "supplier_name" => $request->validated("supplier_name"),
            "email" => $request->validated("email"),
            "phone" => $request->validated("phone"),
            "address" => $request->validated("address"),
        ]);
        return redirect()->route("dashboard.admin.suppliers")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Supplier Created</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.view')->with([

            "supplier"    => $supplier,
            "title"     => "Supplier - {$supplier->name}"
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $title = 'Edit Supplier';
        return view('dashboard.admin.suppliers.edit')->with([
            "title" => $title,
            "supplier" => $supplier,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSupplierRequest $request)
    {
        $supplier = Supplier::where("id", $request->validated('id'))->first();

        // Update the Supplier
        $supplier->supplier_name = ucwords($request->validated('supplier_name'));
        $supplier->email = ucfirst($request->validated('email'));
        $supplier->phone = ucfirst($request->validated('phone'));
        $supplier->address = ucfirst($request->validated('address'));
        $supplier->save();

        // Redirect the user to the Supplier index page
        return redirect()->route("dashboard.admin.suppliers")->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Supplier Updated</div>');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Supplier = Supplier::find($id);
        $Supplier->delete();
        return redirect()->back()->with('message', '<div style="background-color: #d4edda; padding: 10px; border-radius: 10px;">Supplier Deleted</div>');
    }
}
