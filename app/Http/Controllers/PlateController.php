<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlateModel;
use App\Http\Requests\PlateRequest;

class PlateController extends Controller
{
    public function AddPlate(PlateRequest $req)
    {
        $plate = new PlateModel();
        $plate->name = $req->input('name');
        $plate->description = $req->input('description');
        $plate->save();
        return redirect()->route('welcome')->with('success', 'Новая пластинка добавлена');
    }

    public function deletePlate(Request $req)
    {   $id=$req->input('id');
        if($plate = PlateModel::find($id))
        {
            $plate->delete();
            return redirect()->route('welcome')->with('success', 'Пластинка удалена');
        } else return redirect()->route('welcome')->with('success', 'Пластинки не существует');    
    }

    public function getPage() 
    {
       $plate = new PlateModel();
        return view('welcome', ['data'=>$plate->paginate(5)]);
    }

    public function getPlate($id) 
    {   
        if($plate = PlateModel::find($id))
        {
            return view('editplate', ['data'=>$plate->find($id)]);
        } else return redirect()->route('welcome')->with('success', 'Пластинки не существует');
    }

    public function editPlate(PlateRequest $req)
    {   
        $id=$req->input('id');
        if($plate = PlateModel::find($id))
        {
            $plate->name=$req->input('name');
            $plate->description = $req->input('description');
            $plate->save();
            return redirect()->route('welcome')->with('success', 'Редактирование прошло успешно');
        } else return redirect()->route('welcome')->with('success', 'Пластинки не существует');     
    }
}
