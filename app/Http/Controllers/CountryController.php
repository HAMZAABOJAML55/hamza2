<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('id' , 'desc')->paginate(10);


        return response()->view('cms.country.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = Validator($request->all(),[
            'name' => 'required|string|min:3|max:20',
            'code' => 'required|digits:4'
        ] , [
            'name.required' => 'يا بني هذا الحقل مطلوب',
            'code.required' => 'يا بني هذا الحقل مطلوب',
            'name.min' => 'لا يقبل اقل من ثلاث حروف',

        ]);

        if( $Validator->fails()){
            return response()->json([
                'icon' => 'error',
                'title' => $Validator->getMessageBag()->first(),
            ] , 400);
        }else{

        $countries = new Country();
        $countries->name = $request->get('name');
        $countries->code = $request->input('code');

        $isSaved = $countries->save();

        return response()->json([
            'icon' => 'success' ,
            'title' => 'Created is Successfully',
        ] , 200);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.show' , compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit' ,compact('countries'));
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
        $validator = validator($request->all() , [
            'name' => 'required|string|min:3',
            'code' => 'required|digits:4',
        ]);

        if(! $validator->fails()){
            $countries = Country::findOrFail($id);
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');

            $isUpdated = $countries->save();

            return ['redirect'=>route('countries.index')];
            // return response()->json([
            //     'icon' => 'success' ,
            //     'title' => "Uodated is Successfully" ,
            // ] , 200) ;
        }
        else{
           return response()->json([
            'icon' => 'error' ,
            'title' => $validator->getMessageBag()->first(),
           ] , 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries = Country::destroy($id);
    }
}
