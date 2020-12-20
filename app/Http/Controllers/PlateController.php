<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlateModel;
class PlateController extends Controller
{
    public function AddPlate(Request $req){
        $validatedData = $req->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ],
        [
            'name.required' => 'Поле Название обязательно для заполнения',
            'description.required'  => 'Поле Описание обязательно для заполнения',
        ]
        );
        $plate = new PlateModel();
        $plate->name = $req->input('name');
        $plate->description = $req->input('description');
        $plate->save();
        return redirect()->route('welcome')->with('success', 'Новая пластинка добавлена');
    }
    public function deletePlate($id, Request $req){
        $plate = PlateModel::find($id);
        $plate->delete();
        return redirect()->route('welcome')->with('success', 'Пластинка удалена');
    }
    public function allDate() {
       // $plate = DB::table('plate_models')->paginate(15);
       $plate = new PlateModel();
        return view('welcome', ['data'=>$plate->paginate(5)]);
        
    }
    public function editDate($id, Request $req) {
        $plate= new PlateModel();
        return view('editplate', ['data'=>$plate->find($id)]);
        
    }
    public function editPlate($id, Request $req){
        $validatedData = $req->validate([
            'name' => 'required',
            'description' => 'required',
        ],
        [
            'name.required' => 'Поле Название обязательно для заполнения',
            'description.required'  => 'Поле Описание обязательно для заполнения',
        ]
        );
        $plate = PlateModel::find($id);
        $plate->name=$req->input('name');
        $plate->description = $req->input('description');
        $plate->save();
        return redirect()->route('welcome')->with('success', 'Редактирование прошло успешно');
    }
}
