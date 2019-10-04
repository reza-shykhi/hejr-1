<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\FormStatus;
use App\FormType;
use App\FormField;
use App\Form_FormField;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        return view('admin.form.form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_types = FormType::where('status', 1)->get();
        $form_statuses = FormStatus::where('form_type', 1)->get();
        return view('admin.form.form.create', compact('form_types', 'form_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:forms|max:190',
            'form_type_id' => 'required|numeric',
            'form_status_id' => 'required|numeric'
        ],[
            'name.required' => 'نام فرم را وارد کنید',
            'name.unique' => 'این نام قبلا استفاده شده است',
            'name.max' => 'تعداد کاراکتر وارد دشه بیش از حد مجاز است',
            'form_type_id.required' => 'این فیلد را خالی رها نکنید',
            'form_status_id.required' => 'این فیلد را خالی رها نکنید'
        ]);

        $form = new Form();
        $form = $form->create($request->all());

        return redirect()->route('admin.form.form.edit', $form);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        $fields = FormField::where('status', 1)->get();
        foreach($fields as $key=>$field)
        {
            if($field->type == 1)
                $fields[$key]->type_name = "text Box";
            elseif($field->type == 2)
                $fields[$key]->type_name = "check Box";
            elseif($field->type == 3)
                $fields[$key]->type_name = "Drop Down";
            else
                $fields[$key]->type_name = "Undefined";
        }
        $form_types = FormType::where('status', 1)->get();
        $form_statuses = FormStatus::where('form_type', 1)->get();
        return view('admin.form.form.edit', compact('form', 'form_types', 'form_statuses', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update_general(Request $request, $id)
    {
        $form = Form::find($id);
        $this->validate($request, [
            'name' => 'required|max:190|unique:forms,name,'.$form->id,
            'form_type_id' => 'required|numeric',
            'form_status_id' => 'required|numeric'
        ],[
            'name.required' => 'نام فرم را وارد کنید',
            'name.unique' => 'این نام قبلا استفاده شده است',
            'name.max' => 'تعداد کاراکتر وارد دشه بیش از حد مجاز است',
            'form_type_id.required' => 'این فیلد را خالی رها نکنید',
            'form_status_id.required' => 'این فیلد را خالی رها نکنید'
        ]);

        $form = $form->update($request->all());

        return response('general update completed');
    }

    public function add_field(Request $request)
    {
        $form_form_field = new Form_FormField();
        $form_form_field->create($request->all());
        return response('form_form_field added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        dd('del', $id);;
    }
}
